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
        // 1. Data Cards
        $totalPendaftar = $this->pendaftarModel->countAllResults();
        $totalBayar     = $this->pembayaranModel->where('status_pembayaran', 'Diterima')->countAllResults();
        $totalLulus     = $this->pendaftarModel->where('status_akhir', 'Lulus')->countAllResults();
        $totalGagal     = $this->pendaftarModel->where('status_akhir', 'Tidak Lulus')->countAllResults();

        // 2. Data Pie Chart
        $db = \Config\Database::connect();
        $queryPie = $db->query("SELECT program_pilihan, COUNT(*) as jumlah FROM pendaftar GROUP BY program_pilihan");
        $pieData = $queryPie->getResultArray();

        // 3. Data Line Chart
        $queryLine = $db->query("
            SELECT DATE(created_at) as tanggal, COUNT(*) as jumlah 
            FROM pendaftar 
            WHERE created_at >= DATE(NOW()) - INTERVAL 7 DAY 
            GROUP BY DATE(created_at)
        ");
        $lineData = $queryLine->getResultArray();

        $data = [
            'title' => 'Dashboard Pimpinan',
            'stats' => [
                'pendaftar' => $totalPendaftar,
                'bayar'     => $totalBayar,
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
    public function pendaftar()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        
        $builder->select('pendaftar.*, data_pendidikan.asal_sekolah');
        $builder->join('data_pendidikan', 'data_pendidikan.id_pendaftar = pendaftar.id_pendaftar', 'left');
        
        // Hanya yang status akhirnya belum diputuskan
        $builder->where('pendaftar.status_akhir', 'Menunggu');
        
        $data = [
            'title' => 'Monitoring Data Pendaftar',
            'data'  => $builder->get()->getResultArray()
        ];
        return view('pimpinan/pendaftar_list', $data);
    }

    // LIST RIWAYAT (Arsip)
    public function riwayat()
    {
        // 1. Ambil keyword DAN parameter sort
        $keyword = $this->request->getGet('keyword');
        $sort    = $this->request->getGet('sort'); // <--- TAMBAHAN 1

        // Gunakan Model langsung (agar pagination mendeteksi filter)
        // Jangan pakai ->builder() terpisah agar paginate jalan normal
        $model = $this->pendaftarModel;

        $model->select('pendaftar.*, pembayaran.status_pembayaran, berkas.status_berkas');
        $model->join('pembayaran', 'pembayaran.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $model->join('berkas', 'berkas.id_pendaftar = pendaftar.id_pendaftar', 'left');

        // Filter Status Akhir (Hanya yang sudah selesai)
        $model->whereIn('pendaftar.status_akhir', ['Lulus', 'Tidak Lulus']);

        // Fitur Search (Nama & No Reg)
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
            'sort'    => $sort ? $sort : 'newest' // <--- TAMBAHAN 3: Kirim status sort ke View
        ];

        return view('pimpinan/riwayat_list', $data);
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