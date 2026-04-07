<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendaftarModel;
use App\Models\PembayaranModel;
use App\Models\UsersModel; // Sesuaikan dengan nama model user kamu (UserModel atau UsersModel)

class Pimpinan extends BaseController
{
    protected $pendaftarModel;
    protected $pembayaranModel;
    protected $userModel;

    public function __construct()
    {
        $this->pendaftarModel  = new PendaftarModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->userModel       = new UsersModel();
    }

    // =========================================================================
    // 1. DASHBOARD & STATISTIK
    // =========================================================================
    public function dashboard()
    {
        $db = \Config\Database::connect();

        // 1. Data Cards
        $totalPendaftar = $this->pendaftarModel->countAllResults();
        $totalBayar     = $this->pembayaranModel->where('status_pembayaran', 'Diterima')->countAllResults();

        // PERBAIKAN: Menghitung yang JADWALNYA UDAH ADA TAPI STATUS KELULUSAN MASIH KOSONG
        $queryWawancara = $db->query("
            SELECT COUNT(p.id_pendaftar) as total 
            FROM pendaftar p
            JOIN jadwal_wawancara j ON p.id_pendaftar = j.id_pendaftar
            WHERE p.status_akhir IS NULL 
               OR p.status_akhir = '' 
               OR p.status_akhir = 'Menunggu'
        ");
        $totalWawancara = $queryWawancara->getRow()->total;

        $totalLulus     = $this->pendaftarModel->where('status_akhir', 'Lulus')->countAllResults();
        $totalGagal     = $this->pendaftarModel->where('status_akhir', 'Tidak Lulus')->countAllResults();

        // 2. Data Pie Chart
        $queryPie = $db->query("SELECT program_pilihan, COUNT(id_pendaftar) as jumlah FROM pendaftar GROUP BY program_pilihan");
        $pieData = $queryPie->getResultArray();

        // 3. Data Bar Chart (10 hari aktif terakhir)
        $queryLine = $db->query("
            SELECT tgl, jumlah FROM (
                SELECT DATE(created_at) as tgl, COUNT(id_pendaftar) as jumlah 
                FROM pendaftar 
                WHERE created_at IS NOT NULL 
                GROUP BY DATE(created_at)
                ORDER BY DATE(created_at) DESC
                LIMIT 10
            ) as subquery
            ORDER BY tgl ASC
        ");
        $grafik_data = $queryLine->getResultArray();

        $lineData = [];
        foreach ($grafik_data as $g) {
            $lineData[] = [
                'tanggal' => date('d M Y', strtotime($g['tgl'])),
                'jumlah'  => $g['jumlah']
            ];
        }

        $data = [
            'title' => 'Dashboard Pimpinan',
            'stats' => [
                'pendaftar' => $totalPendaftar,
                'bayar'     => $totalBayar,
                'wawancara' => $totalWawancara,
                'lulus'     => $totalLulus,
                'gagal'     => $totalGagal
            ],
            'pieData'  => $pieData,
            'lineData' => $lineData
        ];

        return view('pimpinan/dashboard', $data);
    }

    // =========================================================================
    // 2. KELOLA ADMIN
    // =========================================================================
    public function kelolaAdmin()
    {
        $data = [
            'title'  => 'Kelola Akun Admin',
            'admins' => $this->userModel->where('role', 'admin')->findAll()
        ];
        return view('pimpinan/admin_list', $data);
    }

    public function createAdmin()
    {
        return view('pimpinan/admin_form', ['title' => 'Tambah Admin Baru']);
    }

    public function saveAdmin()
    {
        if (!$this->validate([
            'username' => 'required|is_unique[users.username]',
            'password' => 'required|min_length[6]'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Username sudah ada atau password kurang aman.');
        }

        $this->userModel->save([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => $this->request->getPost('username'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'         => 'admin'
        ]);

        return redirect()->to('pimpinan/kelolaAdmin')->with('success', 'Admin baru berhasil ditambahkan.');
    }

    public function updateAdmin()
    {
        $id = $this->request->getPost('id_user');
        $password = $this->request->getPost('password');

        $dataUpdate = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => $this->request->getPost('username'),
        ];

        if (!empty($password)) {
            $dataUpdate['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $dataUpdate);
        return redirect()->to('pimpinan/kelolaAdmin')->with('success', 'Data Admin diperbarui.');
    }

    public function hapusAdmin($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('pimpinan/kelolaAdmin')->with('success', 'Akses admin telah dihapus.');
    }

    // =========================================================================
    // 3. MONITORING & RIWAYAT (LOGIC UTAMA)
    // =========================================================================

    // HELPER: Ambil semua data detail santri (Private, biar gak tergantung Admin)
    private function _getCompleteData($id)
    {
        $db = \Config\Database::connect();

        // Cek data utama
        $pendaftar = $this->pendaftarModel->find($id);
        if (!$pendaftar) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data santri tidak ditemukan");
        }

        // Ambil data pendukung dari tabel-tabel lain
        return [
            'pendaftar'  => $pendaftar,
            'pendidikan' => $db->table('data_pendidikan')->where('id_pendaftar', $id)->get()->getRowArray() ?? [],
            'ortu'       => $db->table('data_orang_tua')->where('id_pendaftar', $id)->get()->getResultArray() ?? [],
            'kesehatan'  => $db->table('data_kesehatan')->where('id_pendaftar', $id)->get()->getRowArray() ?? [],
            'berkas'     => $db->table('berkas')->where('id_pendaftar', $id)->get()->getRowArray() ?? [],
            'pembayaran' => $db->table('pembayaran')->where('id_pendaftar', $id)->get()->getRowArray() ?? [],
            'jadwal'     => $db->table('jadwal_wawancara')->where('id_pendaftar', $id)->get()->getRowArray() ?? [],
        ];
    }

    // LIST PENDAFTAR AKTIF (Monitoring)
    // LIST PENDAFTAR AKTIF (Monitoring)
    public function pendaftar()
    {
        // 1. Ambil keyword dan parameter filter dari URL
        $keyword = $this->request->getGet('keyword');
        $status_wawancara = $this->request->getGet('status_wawancara'); // Ambil filter wawancara

        // Gunakan Model langsung untuk mendeteksi pagination
        $model = $this->pendaftarModel;

        $model->select('pendaftar.*, data_pendidikan.asal_sekolah, jadwal_wawancara.tanggal_wawancara, jadwal_wawancara.tautan_video');
        $model->join('data_pendidikan', 'data_pendidikan.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $model->join('jadwal_wawancara', 'jadwal_wawancara.id_pendaftar = pendaftar.id_pendaftar', 'left');

        // Hanya yang status akhirnya belum diputuskan
        $model->where('pendaftar.status_akhir', 'Menunggu');

        // 2. Logika Filter Pencarian
        if ($keyword) {
            $model->groupStart()
                ->like('pendaftar.nama_lengkap', $keyword)
                ->orLike('pendaftar.no_registrasi', $keyword)
                ->groupEnd();
        }

        // 3. Logika Filter Wawancara Dijadwalkan
        if ($status_wawancara === 'Dijadwalkan') {
            // Memfilter hanya yang tanggal wawancaranya sudah terisi
            $model->where('jadwal_wawancara.tanggal_wawancara IS NOT NULL');
        }

        $data = [
            'title'            => 'Monitoring Data Pendaftar',
            'data'             => $model->paginate(10, 'pendaftar'), // Ubah jadi paginate
            'pager'            => $model->pager,                     // Kirim pager ke view
            'keyword'          => $keyword,
            'status_wawancara' => $status_wawancara              // Kirim status filter
        ];

        return view('pimpinan/pendaftar_list', $data);
    }

    // LIST RIWAYAT (Arsip)
    public function riwayat()
    {
        // 1. Ambil keyword, sort, DAN status dari URL
        $keyword = $this->request->getGet('keyword');
        $sort    = $this->request->getGet('sort');
        $status  = $this->request->getGet('status'); // <--- TAMBAHAN UNTUK FILTER KELULUSAN

        // Gunakan Model langsung (agar pagination mendeteksi filter)
        // Jangan pakai ->builder() terpisah agar paginate jalan normal
        $model = $this->pendaftarModel;

        $model->select('pendaftar.*, pembayaran.status_pembayaran, berkas.status_berkas');
        $model->join('pembayaran', 'pembayaran.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $model->join('berkas', 'berkas.id_pendaftar = pendaftar.id_pendaftar', 'left');

        // 2. Filter Status Kelulusan (Dinamis)
        if ($status === 'Lulus') {
            $model->where('pendaftar.status_akhir', 'Lulus');
        } elseif ($status === 'Tidak Lulus') {
            $model->where('pendaftar.status_akhir', 'Tidak Lulus');
        } else {
            // Default: Tampilkan semua yang prosesnya sudah selesai (Lulus & Tidak Lulus)
            $model->whereIn('pendaftar.status_akhir', ['Lulus', 'Tidak Lulus']);
        }

        // 3. Fitur Search (Nama & No Reg)
        if ($keyword) {
            $model->groupStart()
                ->like('pendaftar.nama_lengkap', $keyword)
                ->orLike('pendaftar.no_registrasi', $keyword)
                ->groupEnd();
        }

        // 2. Logika Sorting (Terbaru vs Terlama)
        if ($sort == 'oldest') {
            // Jika user minta 'oldest', urutkan dari ID kecil (lama) ke besar
            $model->orderBy('pendaftar.id_pendaftar', 'ASC');
        } else {
            // Default (newest): urutkan dari ID besar (baru) ke kecil
            $model->orderBy('pendaftar.id_pendaftar', 'DESC');
        }

        $data = [
            'title'   => 'Riwayat Pendaftar',
            'data'    => $model->paginate(10, 'pendaftar'),
            'pager'   => $model->pager,
            'keyword' => $keyword,
            'sort'    => $sort ? $sort : 'newest',
            'status'  => $status // <--- INI DIA PENYELAMATNYA! Tambahkan baris ini
        ];

        return view('admin/pendaftar/riwayat', $data);
    }

    // VIEW DETAIL SANTRI (Untuk Monitoring Aktif)
    public function detailSantri($id)
    {
        try {
            $data = $this->_getCompleteData($id);
            $data['title'] = 'Detail Data Santri';
            $data['is_riwayat'] = false; // Flag: Ini data aktif

            // Arahkan ke view khusus pimpinan (Read Only)
            return view('pimpinan/detail_santri', $data);
        } catch (\Exception $e) {
            return redirect()->to('pimpinan/pendaftar')->with('error', 'Data tidak ditemukan.');
        }
    }

    // VIEW DETAIL RIWAYAT (Untuk Arsip)
    public function detailRiwayat($id)
    {
        try {
            $data = $this->_getCompleteData($id);
            $data['title'] = 'Arsip Data Santri';
            $data['is_riwayat'] = true; // Flag: Ini data riwayat/arsip

            // Gunakan view yang sama, tapi nanti tombol "Kembali" nya beda arah
            return view('pimpinan/detail_santri', $data);
        } catch (\Exception $e) {
            return redirect()->to('pimpinan/riwayat')->with('error', 'Data tidak ditemukan.');
        }
    }
}
