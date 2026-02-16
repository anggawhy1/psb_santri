<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PromosiModel;
use App\Models\InformasiPsbModel;
use App\Models\PendaftarModel;
use App\Models\DataPendidikanModel;
use App\Models\DataOrangTuaModel;
use App\Models\DataKesehatanModel;
use App\Models\PembayaranModel;
use App\Models\BerkasModel;
use App\Models\JadwalWawancaraModel;

class Admin extends BaseController
{
    protected $promosiModel;
    protected $infoPsbModel;
    protected $pendaftarModel;
    protected $pendidikanModel;
    protected $ortuModel;
    protected $kesehatanModel;
    protected $berkasModel;
    protected $pembayaranModel;
    protected $jadwalModel;

    public function __construct()
    {
        // Load semua model
        $this->promosiModel = new PromosiModel();
        $this->infoPsbModel = new InformasiPsbModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->pendidikanModel = new DataPendidikanModel();
        $this->ortuModel = new DataOrangTuaModel();
        $this->kesehatanModel = new DataKesehatanModel();
        $this->berkasModel = new BerkasModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->jadwalModel = new JadwalWawancaraModel();
    }

    public function dashboard()
    {
        if (!session()->get('isLoggedIn') || (session()->get('role') != 'admin' && session()->get('role') != 'pimpinan')) {
            return redirect()->to('admin/login');
        }
        return view('admin/dashboard', ['title' => 'Dashboard Admin']);
    }

    // --- MANAJEMEN KONTEN ---

    // Helper private untuk mengambil data dengan sorting dan pagination
    private function _getPromosiData($type)
    {
        $sort = $this->request->getGet('sort'); // ambil dari URL ?sort=asc
        $order = ($sort == 'oldest') ? 'ASC' : 'DESC'; // Default DESC (Terbaru)

        // Gunakan group name 'promosi' agar pagination tidak bentrok
        $data = $this->promosiModel->where('type', $type)
            ->orderBy('id_promosi', $order)
            ->paginate(15, 'promosi');

        return [
            'title' => 'Kelola ' . ucfirst($type),
            'type'  => $type,
            'sort'  => ($sort == 'oldest') ? 'oldest' : 'newest',
            'data'  => $data,
            'pager' => $this->promosiModel->pager // KIRIM OBJECT PAGER KE VIEW
        ];
    }

    public function berita()
    {
        $data = $this->_getPromosiData('berita');
        return view('admin/konten/promosi_index', $data); // View Index (Tabel)
    }

    public function prestasi()
    {
        $data = $this->_getPromosiData('prestasi');
        return view('admin/konten/promosi_index', $data);
    }

    public function galeri()
    {
        $data = $this->_getPromosiData('galeri');
        return view('admin/konten/promosi_index', $data);
    }

    // --- HALAMAN FORM TAMBAH (TERPISAH) ---
    // =========================================================================
    // 1. MANAJEMEN KONTEN (BERITA, PRESTASI, GALERI)
    // =========================================================================

    // --- HALAMAN FORM TAMBAH ---
    public function tambahPromosi($type)
    {
        // Validasi tipe agar user tidak asal ketik di URL
        if (!in_array($type, ['berita', 'prestasi', 'galeri'])) {
            return redirect()->to('admin/dashboard');
        }

        $data = [
            'title' => 'Tambah ' . ucfirst($type),
            'type'  => $type,
            'mode'  => 'add',
            'row'   => null
        ];
        return view('admin/konten/promosi_form', $data);
    }

    // --- PROSES SIMPAN BARU ---
    public function savePromosi()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to('admin/login');

        // Pastikan type diambil sebagai string
        $type = (string)$this->request->getPost('type');
        $file = $this->request->getFile('gambar');
        $namaGambar = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaGambar = $file->getRandomName();
            $file->move('uploads/konten', $namaGambar);
        }

        $this->promosiModel->save([
            'id_user'     => session()->get('id_user'),
            'type'        => $type,
            'judul'       => $this->request->getPost('judul'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'path_gambar' => $namaGambar
        ]);

        return redirect()->to('admin/' . $type)->with('success', 'Data berhasil ditambahkan.');
    }

    // --- HALAMAN FORM EDIT ---
    public function editPromosi($id)
    {
        if (empty($id)) return redirect()->back();

        // Cari data
        $row = $this->promosiModel->find($id);

        // Jika data tidak ditemukan
        if (!$row) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Ambil type dari database untuk judul halaman
        // Kita paksa jadi string agar error IDE hilang
        $type = (string)($row['type'] ?? 'berita');

        $data = [
            'title' => 'Edit ' . ucfirst($type),
            'type'  => $type,
            'mode'  => 'edit',
            'row'   => $row
        ];
        return view('admin/konten/promosi_form', $data);
    }

    // --- PROSES UPDATE ---
    public function updatePromosi()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to('admin/login');

        $id = $this->request->getPost('id_promosi');

        // Cari data lama dulu untuk memastikan data ada & ambil tipe aslinya
        $dataLama = $this->promosiModel->find($id);

        if (!$dataLama) {
            return redirect()->to('admin/dashboard')->with('error', 'Data asli tidak ditemukan.');
        }

        // Ambil type dari data lama (Lebih aman daripada dari POST form)
        $type = (string)$dataLama['type'];
        $namaGambar = $dataLama['path_gambar']; // Default pakai gambar lama

        // Cek apakah ada gambar baru yang diupload
        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {

            // Hapus gambar lama fisik jika ada
            if (!empty($dataLama['path_gambar']) && file_exists('uploads/konten/' . $dataLama['path_gambar'])) {
                unlink('uploads/konten/' . $dataLama['path_gambar']);
            }

            // Upload gambar baru
            $namaGambar = $file->getRandomName();
            $file->move('uploads/konten', $namaGambar);
        }

        // Update Database
        $this->promosiModel->update($id, [
            'judul'       => $this->request->getPost('judul'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'path_gambar' => $namaGambar
        ]);

        return redirect()->to('admin/' . $type)->with('success', 'Data berhasil diperbarui.');
    }

    // --- PROSES HAPUS ---
    public function deletePromosi($id)
    {
        if (!session()->get('isLoggedIn')) return redirect()->to('admin/login');

        if (empty($id)) return redirect()->back();

        $data = $this->promosiModel->find($id);

        if ($data) {
            // Ambil tipe sebelum dihapus untuk redirect
            $redirectType = (string)($data['type'] ?? 'dashboard');

            // Hapus file gambar
            if (!empty($data['path_gambar']) && file_exists('uploads/konten/' . $data['path_gambar'])) {
                unlink('uploads/konten/' . $data['path_gambar']);
            }

            // Hapus data database
            $this->promosiModel->delete($id);

            return redirect()->to('admin/' . $redirectType)->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }

    // =========================================================================
    // 2. MANAJEMEN INFORMASI PENDAFTARAN (READ & UPDATE ONLY)
    // =========================================================================

    // HALAMAN INDEX (LIST DATA)
    public function informasi()
    {
        $data = [
            'title' => 'Informasi Pendaftaran',
            'data'  => $this->infoPsbModel->orderBy('id_informasi', 'ASC')->findAll()
        ];
        return view('admin/konten/informasi_index', $data);
    }

    // HALAMAN FORM EDIT
    public function editInformasi($id)
    {
        if (empty($id)) return redirect()->back();

        $row = $this->infoPsbModel->find($id);

        if (!$row) {
            return redirect()->to('admin/informasi')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Informasi',
            'row'   => $row
        ];
        return view('admin/konten/informasi_form', $data);
    }

    // PROSES UPDATE
    public function updateInformasi()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to('admin/login');

        $id = $this->request->getPost('id_informasi');

        // Validasi ID
        if (empty($id)) {
            return redirect()->to('admin/informasi')->with('error', 'ID tidak valid.');
        }

        $this->infoPsbModel->update($id, [
            // Judul saya biarkan bisa diedit jika ada typo, tapi bisa di-disable di view jika mau strict
            'judul' => $this->request->getPost('judul'),
            'isi'   => $this->request->getPost('isi')
        ]);

        return redirect()->to('admin/informasi')->with('success', 'Informasi berhasil diperbarui.');
    }

    // --- MANAJEMEN PENDAFTAR (Full Logic) ---

    public function pendaftar()
    {
        // 1. Ambil Semua Input Filter
        $keyword  = $this->request->getGet('keyword'); // Pencarian Nama/No.Reg
        $fBayar   = $this->request->getGet('status_pembayaran');
        $fBerkas  = $this->request->getGet('status_berkas');
        $fJadwal  = $this->request->getGet('status_wawancara');
        $fLulus   = $this->request->getGet('status_akhir');

        $db = \Config\Database::connect();
        $builder = $this->pendaftarModel->builder();

        // Select Data Lengkap
        $builder->select('pendaftar.*, pembayaran.status_pembayaran, berkas.status_berkas, jadwal_wawancara.status_wawancara, jadwal_wawancara.tanggal_wawancara');
        $builder->join('pembayaran', 'pembayaran.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $builder->join('berkas', 'berkas.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $builder->join('jadwal_wawancara', 'jadwal_wawancara.id_pendaftar = pendaftar.id_pendaftar', 'left');

        // Hanya tampilkan yang AKTIF (Menunggu) di tabel utama. 
        // Yang sudah selesai masuk Riwayat.
        $builder->where('pendaftar.status_akhir', 'Menunggu');

        // 2. Terapkan Filter
        if ($keyword) {
            $builder->groupStart()
                ->like('pendaftar.nama_lengkap', $keyword)
                ->orLike('pendaftar.no_registrasi', $keyword)
                ->groupEnd();
        }
        if ($fBayar) {
            $builder->where('pembayaran.status_pembayaran', $fBayar);
        }
        if ($fBerkas) {
            $builder->where('berkas.status_berkas', $fBerkas);
        }
        if ($fJadwal) {
            if ($fJadwal == 'Belum') $builder->where('jadwal_wawancara.id_jadwal IS NULL');
            else $builder->where('jadwal_wawancara.status_wawancara', $fJadwal);
        }

        $builder->orderBy('pendaftar.id_pendaftar', 'DESC');

        $data = [
            'title'    => 'Data Pendaftar Masuk',
            'data'     => $this->pendaftarModel->paginate(10, 'pendaftar'),
            'pager'    => $this->pendaftarModel->pager,
            // Kirim balik status filter ke view
            'keyword'  => $keyword,
            'f_bayar'  => $fBayar,
            'f_berkas' => $fBerkas,
            'f_jadwal' => $fJadwal,
            'f_lulus'  => $fLulus
        ];
        return view('admin/pendaftar/index', $data);
    }

    // =========================================================================
    // RIWAYAT (ARSIP LULUS / TIDAK LULUS)
    // =========================================================================

    public function riwayat()
    {
        $keyword = $this->request->getGet('keyword');

        // Builder Khusus Riwayat
        $builder = $this->pendaftarModel->builder();
        $builder->select('pendaftar.*, pembayaran.status_pembayaran, berkas.status_berkas'); // Ambil status juga biar lengkap
        $builder->join('pembayaran', 'pembayaran.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $builder->join('berkas', 'berkas.id_pendaftar = pendaftar.id_pendaftar', 'left');

        // Filter Status Akhir (Hanya yang sudah selesai)
        $builder->whereIn('pendaftar.status_akhir', ['Lulus', 'Tidak Lulus']);

        // Fitur Search (Nama & No Reg)
        if ($keyword) {
            $builder->groupStart()
                ->like('pendaftar.nama_lengkap', $keyword)
                ->orLike('pendaftar.no_registrasi', $keyword)
                ->groupEnd();
        }

        $builder->orderBy('pendaftar.id_pendaftar', 'DESC');

        $data = [
            'title'   => 'Riwayat Pendaftar',
            'data'    => $this->pendaftarModel->paginate(10, 'pendaftar'),
            'pager'   => $this->pendaftarModel->pager,
            'keyword' => $keyword
        ];
        return view('admin/pendaftar/riwayat', $data);
    }

    // FUNGSI BARU: MELIHAT DETAIL LENGKAP (FULL DATA)
    public function detailRiwayat($id)
    {
        // Pakai helper _getAllData yang sudah kita buat sebelumnya
        $data = $this->_getAllData($id);
        $data['title'] = 'Detail Lengkap Pendaftar';

        return view('admin/pendaftar/detail_lengkap', $data);
    }

    // Tambahkan atau update fungsi ini di bagian bawah Controller Admin.php
    private function _getAllData($id)
    {
        $db = \Config\Database::connect();

        // 1. Ambil data utama pendaftar
        $pendaftar = $this->pendaftarModel->find($id);
        if (!$pendaftar) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pendaftar tidak ditemukan");
        }

        // 2. Ambil data pendukung dari tabel lain
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

    // 1. VIEW EDIT FORMULIR
    public function viewFormulir($id)
    {
        $data = $this->_getAllData($id);
        $data['title'] = 'Edit Data Formulir';
        $data['mode']  = 'formulir'; // Penanda Mode
        return view('admin/pendaftar/detail', $data);
    }

    // 2. VIEW VERIFIKASI PEMBAYARAN
    public function viewPembayaran($id)
    {
        try {
            $data = $this->_getAllData((string)$id);
            $data['title'] = 'Verifikasi Pembayaran';
            $data['mode']  = 'pembayaran';
            return view('admin/pendaftar/detail_fokus', $data);
        } catch (\Exception $e) {
            return redirect()->to('admin/pendaftar')->with('error', $e->getMessage());
        }
    }

    // 3. VIEW VERIFIKASI BERKAS
    public function viewBerkas($id)
    {
        try {
            $data = $this->_getAllData((string)$id);
            $data['title'] = 'Verifikasi Berkas';
            $data['mode']  = 'berkas';
            return view('admin/pendaftar/detail_fokus', $data);
        } catch (\Exception $e) {
            return redirect()->to('admin/pendaftar')->with('error', $e->getMessage());
        }
    }

    // 4. VIEW ATUR JADWAL
    public function viewWawancara($id)
    {
        try {
            $data = $this->_getAllData((string)$id);
            $data['title'] = 'Atur Jadwal Wawancara';
            $data['mode']  = 'wawancara';
            return view('admin/pendaftar/detail_fokus', $data);
        } catch (\Exception $e) {
            return redirect()->to('admin/pendaftar')->with('error', $e->getMessage());
        }
    }

    // 5. VIEW KEPUTUSAN AKHIR
    public function viewKelulusan($id)
    {
        try {
            $data = $this->_getAllData((string)$id);
            $data['title'] = 'Keputusan Kelulusan';
            $data['mode']  = 'kelulusan';
            return view('admin/pendaftar/detail_fokus', $data);
        } catch (\Exception $e) {
            return redirect()->to('admin/pendaftar')->with('error', $e->getMessage());
        }
    }

    public function updateDataPendaftar()
    {
        $id = $this->request->getPost('id_pendaftar');
        $this->pendaftarModel->update($id, [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nik'          => $this->request->getPost('nik'),
            'no_kk'        => $this->request->getPost('no_kk'),
            'program_pilihan' => $this->request->getPost('program_pilihan')
        ]);
        return redirect()->to('admin/viewFormulir/' . $id)->with('success', 'Data diubah.');
    }
    
    public function verifikasiPembayaran()
    {
        $id = $this->request->getPost('id_pendaftar');
        $this->pembayaranModel->where('id_pendaftar', $id)->set(['status_pembayaran' => $this->request->getPost('status'), 'keterangan' => $this->request->getPost('keterangan')])->update();
        return redirect()->to('admin/viewPembayaran/' . $id)->with('success', 'Pembayaran diperbarui.');
    }

    // --- PERBAIKAN DI SINI ---
    public function verifikasiBerkas()
    {
        $id = $this->request->getPost('id_pendaftar');
        // TAMBAHKAN 'keterangan' KE DALAM ARRAY UPDATE
        $this->berkasModel->where('id_pendaftar', $id)
            ->set([
                'status_berkas' => $this->request->getPost('status'),
                'keterangan'    => $this->request->getPost('keterangan') // Tambahan ini
            ])
            ->update();
            
        return redirect()->to('admin/viewBerkas/' . $id)->with('success', 'Berkas diperbarui.');
    }
    // -------------------------

    public function setJadwal()
    {
        $id = $this->request->getPost('id_pendaftar');
        $data = ['id_pendaftar' => $id, 'tanggal_wawancara' => $this->request->getPost('tanggal') . ' ' . $this->request->getPost('jam'), 'tautan_video' => $this->request->getPost('lokasi'), 'status_wawancara' => 'Dijadwalkan'];
        $cek = $this->jadwalModel->where('id_pendaftar', $id)->first();
        if ($cek) $this->jadwalModel->update($cek['id_jadwal'], $data);
        else $this->jadwalModel->insert($data);
        return redirect()->to('admin/viewWawancara/' . $id)->with('success', 'Jadwal disimpan.');
    }
    public function setKelulusan()
    {
        $id = $this->request->getPost('id_pendaftar');
        $this->pendaftarModel->update($id, ['status_akhir' => $this->request->getPost('status_akhir')]);
        return redirect()->to('admin/pendaftar')->with('success', 'Status Akhir Diperbarui.');
    }


    public function profile()
    {
        $db = \Config\Database::connect();
        $idUser = session()->get('id_user');

        // Ambil data user admin dari tabel users
        $user = $db->table('users')->where('id_user', $idUser)->get()->getRowArray();

        $data = [
            'title' => 'Profil Saya',
            'user'  => $user
        ];
        return view('admin/profile', $data);
    }

    public function updateProfile()
    {
        $db = \Config\Database::connect();
        $idUser = session()->get('id_user');

        $username   = $this->request->getPost('username');
        $passOld    = $this->request->getPost('password_old');
        $passNew    = $this->request->getPost('password');
        $passConfirm = $this->request->getPost('password_confirm');

        // 1. Update Username
        $dataUpdate = ['username' => $username];

        // 2. Cek jika user ingin ganti password
        if (!empty($passNew)) {

            // Ambil data user saat ini untuk cek password lama
            $currentUser = $db->table('users')->where('id_user', $idUser)->get()->getRowArray();

            // Validasi Password Lama
            if (empty($passOld)) {
                return redirect()->back()->with('error', 'Masukkan password lama untuk mengganti password.');
            }

            if (!password_verify($passOld, $currentUser['password'])) {
                return redirect()->back()->with('error', 'Password lama salah!');
            }

            // Validasi Konfirmasi Password
            if ($passNew !== $passConfirm) {
                return redirect()->back()->with('error', 'Konfirmasi password baru tidak cocok.');
            }

            // Hash Password Baru
            $dataUpdate['password'] = password_hash($passNew, PASSWORD_DEFAULT);
        }

        // Update ke database
        $db->table('users')->where('id_user', $idUser)->update($dataUpdate);

        // Update Session Username (biar di navbar langsung berubah)
        session()->set('username', $username);

        return redirect()->to('admin/profile')->with('success', 'Profil berhasil diperbarui.');
    }
}