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

        $db = \Config\Database::connect();

        $wait_bayar = $db->table('pembayaran')->where('status_pembayaran', 'Menunggu')->countAllResults();
        $wait_berkas = $db->table('berkas')->where('status_berkas', 'Menunggu')->countAllResults();

        $query_wawancara = $db->query("
            SELECT COUNT(p.id_pendaftar) as total 
            FROM pendaftar p
            JOIN pembayaran b ON p.id_pendaftar = b.id_pendaftar
            JOIN berkas k ON p.id_pendaftar = k.id_pendaftar
            LEFT JOIN jadwal_wawancara j ON p.id_pendaftar = j.id_pendaftar
            WHERE b.status_pembayaran = 'Diterima' 
              AND k.status_berkas = 'Diterima' 
              AND j.id_pendaftar IS NULL
        ");
        $wait_wawancara = $query_wawancara->getRow()->total;

        $query_hasil = $db->query("
            SELECT COUNT(p.id_pendaftar) as total 
            FROM pendaftar p
            JOIN jadwal_wawancara j ON p.id_pendaftar = j.id_pendaftar
            WHERE p.status_akhir IS NULL 
               OR p.status_akhir = '' 
               OR p.status_akhir = 'Menunggu'
        ");
        $wait_hasil = $query_hasil->getRow()->total;

        $total_pendaftar = $db->table('pendaftar')->countAllResults();
        $total_lulus = $db->table('pendaftar')->where('status_akhir', 'Lulus')->countAllResults();
        $total_ditolak = $db->table('pendaftar')->where('status_akhir', 'Tidak Lulus')->countAllResults();

        $grafik_query = $db->query("
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
        $grafik_data = $grafik_query->getResultArray();

        $label_grafik = [];
        $data_grafik = [];
        foreach ($grafik_data as $g) {
            $label_grafik[] = date('d M Y', strtotime($g['tgl'])); // Contoh: 12 Nov 2023
            $data_grafik[] = $g['jumlah'];
        }

        $data = [
            'title'             => 'Dashboard Admin',
            'wait_bayar'        => $wait_bayar,
            'wait_berkas'       => $wait_berkas,
            'wait_wawancara'    => $wait_wawancara,
            'wait_hasil'        => $wait_hasil,
            'total_pendaftar'   => $total_pendaftar,
            'total_lulus'       => $total_lulus,
            'total_ditolak'     => $total_ditolak,
            // Lempar data grafik berbentuk JSON agar bisa dibaca Javascript
            'label_grafik'      => json_encode($label_grafik),
            'data_grafik'       => json_encode($data_grafik)
        ];

        return view('admin/dashboard', $data);
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
        $db = \Config\Database::connect();

        // =======================================================
        // 1. UPDATE TABEL PENDAFTAR (Data Diri)
        // =======================================================
        $this->pendaftarModel->update($id, [
            'nama_lengkap'    => $this->request->getPost('nama_lengkap'),
            'no_hp'           => $this->request->getPost('no_hp'),
            'nik'             => $this->request->getPost('nik'),
            'no_kk'           => $this->request->getPost('no_kk'),
            'tempat_lahir'    => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'   => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
            'anak_ke'         => $this->request->getPost('anak_ke'),
            'dari_bersaudara' => $this->request->getPost('dari_bersaudara'),
            'program_pilihan' => $this->request->getPost('program_pilihan'),
            'alamat_lengkap'  => $this->request->getPost('alamat_lengkap'),
        ]);

        // =======================================================
        // 2. UPDATE TABEL DATA PENDIDIKAN
        // =======================================================
        // Catatan: name di form adalah 'status_pendidikan', disimpan ke kolom 'status'
        $db->table('data_pendidikan')->where('id_pendaftar', $id)->update([
            'status'                      => $this->request->getPost('status_pendidikan'),
            'nama_pt'                     => $this->request->getPost('nama_pt'),
            'nisn'                        => $this->request->getPost('nisn'),
            'asal_sekolah'                => $this->request->getPost('asal_sekolah'),
            'kelas_terakhir'              => $this->request->getPost('kelas_terakhir'),
            'status_siswa'                => $this->request->getPost('status_siswa'),
            'jenjang_pendidikan_didaftar' => $this->request->getPost('jenjang_pendidikan_didaftar'),
            'nama_sekolah'                => $this->request->getPost('nama_sekolah'),
            'prestasi'                    => $this->request->getPost('prestasi'),
        ]);

        // =======================================================
        // 3. UPDATE TABEL DATA KESEHATAN
        // =======================================================
        $db->table('data_kesehatan')->where('id_pendaftar', $id)->update([
            'gol_darah'        => $this->request->getPost('gol_darah'),
            'alergi'           => $this->request->getPost('alergi'),
            'riwayat_penyakit' => $this->request->getPost('riwayat_penyakit'),
        ]);

        // =======================================================
        // 4. UPDATE TABEL DATA ORANG TUA (Array)
        // =======================================================
        $id_ortu         = $this->request->getPost('id_ortu');
        $hubungan_ortu   = $this->request->getPost('hubungan_ortu');
        $nama_ortu       = $this->request->getPost('nama_ortu');
        $pekerjaan_ortu  = $this->request->getPost('pekerjaan_ortu');
        $no_hp_ortu      = $this->request->getPost('no_hp_ortu');
        $pendidikan_ortu = $this->request->getPost('pendidikan_ortu');
        $pendapatan_ortu = $this->request->getPost('pendapatan_ortu');
        $status_ortu     = $this->request->getPost('status_ortu');

        // Lakukan perulangan karena data orang tua bisa lebih dari 1 (Ayah, Ibu, dll)
        if (!empty($id_ortu)) {
            for ($i = 0; $i < count($id_ortu); $i++) {
                if (!empty($id_ortu[$i])) {
                    $db->table('data_orang_tua')->where('id', $id_ortu[$i])->update([
                        'hubungan'   => $hubungan_ortu[$i],
                        'nama'       => $nama_ortu[$i],
                        'pekerjaan'  => $pekerjaan_ortu[$i],
                        'no_hp'      => $no_hp_ortu[$i],
                        'pendidikan' => $pendidikan_ortu[$i],
                        'pendapatan' => $pendapatan_ortu[$i],
                        'status'     => $status_ortu[$i],
                    ]);
                }
            }
        }

        return redirect()->to('admin/viewFormulir/' . $id)->with('success', 'Seluruh data formulir berhasil diperbarui.');
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

        // 1. Cek apakah ada ID di session
        if (!$idUser) {
            return redirect()->to('/login')->with('error', 'Sesi habis, silakan login kembali.');
        }

        // Ambil data user admin dari tabel users
        $user = $db->table('users')->where('id_user', $idUser)->get()->getRowArray();

        // 2. Cek apakah data user ditemukan di database
        if (!$user) {
            // Hapus session error dan lempar ke login
            session()->destroy();
            return redirect()->to('/login')->with('error', 'Data user tidak ditemukan.');
        }

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
