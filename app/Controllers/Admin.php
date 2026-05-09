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
use App\Models\UsersModel;

class Admin extends BaseController
{
    protected PromosiModel $promosiModel;
    protected InformasiPsbModel $infoPsbModel;
    protected PendaftarModel $pendaftarModel;
    protected DataPendidikanModel $pendidikanModel;
    protected DataOrangTuaModel $ortuModel;
    protected DataKesehatanModel $kesehatanModel;
    protected BerkasModel $berkasModel;
    protected PembayaranModel $pembayaranModel;
    protected JadwalWawancaraModel $jadwalModel;
    protected UsersModel $userModel; // Tambahan

    public function __construct()
    {
        $this->promosiModel    = new PromosiModel();
        $this->infoPsbModel    = new InformasiPsbModel();
        $this->pendaftarModel  = new PendaftarModel();
        $this->pendidikanModel = new DataPendidikanModel();
        $this->ortuModel       = new DataOrangTuaModel();
        $this->kesehatanModel  = new DataKesehatanModel();
        $this->berkasModel     = new BerkasModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->jadwalModel     = new JadwalWawancaraModel();
        $this->userModel       = new UsersModel(); // Inisialisasi
    }

    public function dashboard()
    {

        $wait_bayar  = $this->pembayaranModel->where('status_pembayaran', 'Menunggu')->countAllResults();
        $wait_berkas = $this->berkasModel->where('status_berkas', 'Menunggu')->countAllResults();

        $wait_wawancara = $this->pendaftarModel
            ->join('pembayaran b', 'pendaftar.id_pendaftar = b.id_pendaftar')
            ->join('berkas k', 'pendaftar.id_pendaftar = k.id_pendaftar')
            ->join('jadwal_wawancara j', 'pendaftar.id_pendaftar = j.id_pendaftar', 'left')
            ->where('b.status_pembayaran', 'Diterima')
            ->where('k.status_berkas', 'Diterima')
            ->where('j.id_pendaftar IS NULL')
            ->countAllResults();

        $wait_hasil = $this->pendaftarModel
            ->join('jadwal_wawancara j', 'pendaftar.id_pendaftar = j.id_pendaftar')
            ->groupStart()
            ->where('pendaftar.status_akhir IS NULL')
            ->orWhere('pendaftar.status_akhir', '')
            ->orWhere('pendaftar.status_akhir', 'Menunggu')
            ->groupEnd()
            ->countAllResults();

        $total_pendaftar = $this->pendaftarModel->countAllResults();
        $total_lulus     = $this->pendaftarModel->where('status_akhir', 'Lulus')->countAllResults();
        $total_ditolak   = $this->pendaftarModel->where('status_akhir', 'Tidak Lulus')->countAllResults();

        $grafik_data_desc = $this->pendaftarModel
            ->select('DATE(created_at) as tgl, COUNT(id_pendaftar) as jumlah')
            ->where('created_at IS NOT NULL')
            ->groupBy('DATE(created_at)')
            ->orderBy('DATE(created_at)', 'DESC')
            ->findAll(10);

        $grafik_data = array_reverse($grafik_data_desc);

        $label_grafik = [];
        $data_grafik  = [];
        foreach ($grafik_data as $g) {
            $label_grafik[] = date('d M Y', strtotime($g['tgl']));
            $data_grafik[]  = $g['jumlah'];
        }

        $data = [
            'title'           => 'Dashboard Admin',
            'wait_bayar'      => $wait_bayar,
            'wait_berkas'     => $wait_berkas,
            'wait_wawancara'  => $wait_wawancara,
            'wait_hasil'      => $wait_hasil,
            'total_pendaftar' => $total_pendaftar,
            'total_lulus'     => $total_lulus,
            'total_ditolak'   => $total_ditolak,
            'label_grafik'    => json_encode($label_grafik),
            'data_grafik'     => json_encode($data_grafik)
        ];

        return view('admin/dashboard', $data);
    }

    private function _getPromosiData($type)
    {
        $sort = $this->request->getGet('sort');
        $order = ($sort == 'oldest') ? 'ASC' : 'DESC';

        $data = $this->promosiModel->where('type', $type)
            ->orderBy('id_promosi', $order)
            ->paginate(15, 'promosi');

        return [
            'title' => 'Kelola ' . ucfirst($type),
            'type'  => $type,
            'sort'  => ($sort == 'oldest') ? 'oldest' : 'newest',
            'data'  => $data,
            'pager' => $this->promosiModel->pager
        ];
    }

    public function berita()
    {
        $data = $this->_getPromosiData('berita');
        return view('admin/konten/promosi_index', $data);
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

    public function tambahPromosi($type)
    {
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

    public function savePromosi()
    {
        $cekFile = $this->request->getFile('gambar');
        if ($cekFile && $cekFile->isValid()) {
            $aturanValidasi = [
                'gambar' => [
                    'rules'  => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]',
                    'errors' => [
                        'is_image' => 'File yang diupload harus berupa gambar.',
                        'mime_in'  => 'Format gambar hanya diperbolehkan JPG, JPEG, atau PNG.',
                        'max_size' => 'Ukuran gambar maksimal adalah 2 MB.'
                    ]
                ]
            ];

            if (!$this->validate($aturanValidasi)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getError('gambar'));
            }
        }

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

    public function editPromosi($id)
    {
        if (empty($id)) return redirect()->back();

        $row = $this->promosiModel->find($id);

        if (!$row) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $type = (string)($row['type'] ?? 'berita');

        $data = [
            'title' => 'Edit ' . ucfirst($type),
            'type'  => $type,
            'mode'  => 'edit',
            'row'   => $row
        ];
        return view('admin/konten/promosi_form', $data);
    }

    public function updatePromosi()
    {

        $id = $this->request->getPost('id_promosi');

        $dataLama = $this->promosiModel->find($id);

        if (!$dataLama) {
            return redirect()->to('admin/dashboard')->with('error', 'Data asli tidak ditemukan.');
        }

        $cekFile = $this->request->getFile('gambar');
        if ($cekFile && $cekFile->isValid()) {
            $aturanValidasi = [
                'gambar' => [
                    'rules'  => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]',
                    'errors' => [
                        'is_image' => 'File yang diupload harus berupa gambar.',
                        'mime_in'  => 'Format gambar hanya diperbolehkan JPG, JPEG, atau PNG.',
                        'max_size' => 'Ukuran gambar maksimal adalah 2 MB.'
                    ]
                ]
            ];

            if (!$this->validate($aturanValidasi)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getError('gambar'));
            }
        }

        $type = (string)$dataLama['type'];
        $namaGambar = $dataLama['path_gambar'];

        $file = $this->request->getFile('gambar');
        if ($file && $file->isValid() && !$file->hasMoved()) {

            if (!empty($dataLama['path_gambar']) && file_exists('uploads/konten/' . $dataLama['path_gambar'])) {
                unlink('uploads/konten/' . $dataLama['path_gambar']);
            }

            $namaGambar = $file->getRandomName();
            $file->move('uploads/konten', $namaGambar);
        }

        $this->promosiModel->update($id, [
            'judul'       => $this->request->getPost('judul'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'path_gambar' => $namaGambar
        ]);

        return redirect()->to('admin/' . $type)->with('success', 'Data berhasil diperbarui.');
    }

    public function deletePromosi($id)
    {

        if (empty($id)) return redirect()->back();

        $data = $this->promosiModel->find($id);

        if ($data) {

            $redirectType = (string)($data['type'] ?? 'dashboard');

            if (!empty($data['path_gambar']) && file_exists('uploads/konten/' . $data['path_gambar'])) {
                unlink('uploads/konten/' . $data['path_gambar']);
            }

            $this->promosiModel->delete($id);

            return redirect()->to('admin/' . $redirectType)->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }

    public function informasi()
    {
        $data = [
            'title' => 'Informasi Pendaftaran',
            'data'  => $this->infoPsbModel->orderBy('id_informasi', 'ASC')->findAll()
        ];
        return view('admin/konten/informasi_index', $data);
    }

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

    public function updateInformasi()
    {

        $id = $this->request->getPost('id_informasi');

        if (empty($id)) {
            return redirect()->to('admin/informasi')->with('error', 'ID tidak valid.');
        }

        $this->infoPsbModel->update($id, [
            'isi' => $this->request->getPost('isi')
        ]);

        return redirect()->to('admin/informasi')->with('success', 'Informasi berhasil diperbarui.');
    }

    public function pendaftar()
    {
        $keyword  = $this->request->getGet('keyword');
        $fBayar   = $this->request->getGet('status_pembayaran');
        $fBerkas  = $this->request->getGet('status_berkas');
        $fJadwal  = $this->request->getGet('status_wawancara');
        $fLulus   = $this->request->getGet('status_akhir');

        $model = $this->pendaftarModel;

        $model->select('pendaftar.*, pembayaran.status_pembayaran, berkas.status_berkas, jadwal_wawancara.status_wawancara, jadwal_wawancara.tanggal_wawancara');
        $model->join('pembayaran', 'pembayaran.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $model->join('berkas', 'berkas.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $model->join('jadwal_wawancara', 'jadwal_wawancara.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $model->where('pendaftar.status_akhir', 'Menunggu');

        if ($keyword) {
            $model->groupStart()
                ->like('pendaftar.nama_lengkap', $keyword)
                ->orLike('pendaftar.no_registrasi', $keyword)
                ->groupEnd();
        }
        if ($fBayar) {
            $model->where('pembayaran.status_pembayaran', $fBayar);
        }
        if ($fBerkas) {
            $model->where('berkas.status_berkas', $fBerkas);
        }
        if ($fJadwal) {
            if ($fJadwal == 'Belum') $model->where('jadwal_wawancara.id_jadwal IS NULL');
            else $model->where('jadwal_wawancara.status_wawancara', $fJadwal);
        }

        $model->orderBy('pendaftar.id_pendaftar', 'DESC');

        $data = [
            'title'    => 'Data Pendaftar Masuk',
            'data'     => $model->paginate(10, 'pendaftar'),
            'pager'    => $model->pager,
            'keyword'  => $keyword,
            'f_bayar'  => $fBayar,
            'f_berkas' => $fBerkas,
            'f_jadwal' => $fJadwal,
            'f_lulus'  => $fLulus
        ];
        return view('admin/pendaftar/index', $data);
    }

    public function riwayat()
    {
        $keyword = $this->request->getGet('keyword');
        $sort    = $this->request->getGet('sort');
        $status  = $this->request->getGet('status');

        $model = $this->pendaftarModel;

        $model->select('pendaftar.*, pembayaran.status_pembayaran, berkas.status_berkas');
        $model->join('pembayaran', 'pembayaran.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $model->join('berkas', 'berkas.id_pendaftar = pendaftar.id_pendaftar', 'left');

        if ($status === 'Lulus') {
            $model->where('pendaftar.status_akhir', 'Lulus');
        } elseif ($status === 'Tidak Lulus') {
            $model->where('pendaftar.status_akhir', 'Tidak Lulus');
        } else {
            $model->whereIn('pendaftar.status_akhir', ['Lulus', 'Tidak Lulus']);
        }

        if ($keyword) {
            $model->groupStart()
                ->like('pendaftar.nama_lengkap', $keyword)
                ->orLike('pendaftar.no_registrasi', $keyword)
                ->groupEnd();
        }

        if ($sort == 'oldest') {
            $model->orderBy('pendaftar.id_pendaftar', 'ASC');
        } else {
            $model->orderBy('pendaftar.id_pendaftar', 'DESC');
        }

        $data = [
            'title'   => 'Riwayat Pendaftar',
            'data'    => $model->paginate(10, 'pendaftar'),
            'pager'   => $model->pager,
            'keyword' => $keyword,
            'sort'    => $sort ? $sort : 'newest',
            'status'  => $status
        ];

        return view('admin/pendaftar/riwayat', $data);
    }

    public function detailRiwayat($id)
    {
        $data = $this->_getAllData($id);
        $data['title'] = 'Detail Lengkap Pendaftar';

        return view('admin/pendaftar/detail_lengkap', $data);
    }

    private function _getAllData($id)
    {
        $pendaftar = $this->pendaftarModel->find($id);
        if (!$pendaftar) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Pendaftar tidak ditemukan");
        }

        return [
            'pendaftar'  => $pendaftar,
            'pendidikan' => $this->pendidikanModel->where('id_pendaftar', $id)->first() ?? [],
            'ortu'       => $this->ortuModel->where('id_pendaftar', $id)->findAll() ?? [],
            'kesehatan'  => $this->kesehatanModel->where('id_pendaftar', $id)->first() ?? [],
            'berkas'     => $this->berkasModel->where('id_pendaftar', $id)->first() ?? [],
            'pembayaran' => $this->pembayaranModel->where('id_pendaftar', $id)->first() ?? [],
            'jadwal'     => $this->jadwalModel->where('id_pendaftar', $id)->first() ?? [],
        ];
    }

    public function viewFormulir($id)
    {
        $data = $this->_getAllData($id);
        $data['title'] = 'Edit Data Formulir';
        $data['mode']  = 'formulir';
        return view('admin/pendaftar/detail', $data);
    }

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

        $this->pendidikanModel->where('id_pendaftar', $id)->set([
            'status'                      => $this->request->getPost('status_pendidikan'),
            'nama_pt'                     => $this->request->getPost('nama_pt'),
            'nisn'                        => $this->request->getPost('nisn'),
            'asal_sekolah'                => $this->request->getPost('asal_sekolah'),
            'kelas_terakhir'              => $this->request->getPost('kelas_terakhir'),
            'status_siswa'                => $this->request->getPost('status_siswa'),
            'jenjang_pendidikan_didaftar' => $this->request->getPost('jenjang_pendidikan_didaftar'),
            'nama_sekolah'                => $this->request->getPost('nama_sekolah'),
            'prestasi'                    => $this->request->getPost('prestasi'),
        ])->update();

        $this->kesehatanModel->where('id_pendaftar', $id)->set([
            'gol_darah'        => $this->request->getPost('gol_darah'),
            'alergi'           => $this->request->getPost('alergi'),
            'riwayat_penyakit' => $this->request->getPost('riwayat_penyakit'),
        ])->update();

        $id_ortu         = $this->request->getPost('id_ortu');
        $hubungan_ortu   = $this->request->getPost('hubungan_ortu');
        $nama_ortu       = $this->request->getPost('nama_ortu');
        $pekerjaan_ortu  = $this->request->getPost('pekerjaan_ortu');
        $no_hp_ortu      = $this->request->getPost('no_hp_ortu');
        $pendidikan_ortu = $this->request->getPost('pendidikan_ortu');
        $pendapatan_ortu = $this->request->getPost('pendapatan_ortu');
        $status_ortu     = $this->request->getPost('status_ortu');

        if (!empty($id_ortu)) {
            for ($i = 0; $i < count($id_ortu); $i++) {
                if (!empty($id_ortu[$i])) {
                    // Update ortu menggunakan primary key id_ortu
                    $this->ortuModel->update($id_ortu[$i], [
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
        $this->pembayaranModel->where('id_pendaftar', $id)
            ->set(['status_pembayaran' => $this->request->getPost('status'), 'keterangan' => $this->request->getPost('keterangan')])
            ->update();
        return redirect()->to('admin/viewPembayaran/' . $id)->with('success', 'Pembayaran diperbarui.');
    }

    public function verifikasiBerkas()
    {
        $id = $this->request->getPost('id_pendaftar');
        $this->berkasModel->where('id_pendaftar', $id)
            ->set([
                'status_berkas' => $this->request->getPost('status'),
                'keterangan'    => $this->request->getPost('keterangan')
            ])
            ->update();

        return redirect()->to('admin/viewBerkas/' . $id)->with('success', 'Berkas diperbarui.');
    }

    public function setJadwal()
    {
        $id = $this->request->getPost('id_pendaftar');
        $data = ['id_pendaftar' => $id, 'tanggal_wawancara' => $this->request->getPost('tanggal') . ' ' . $this->request->getPost('jam'), 'tautan_video' => $this->request->getPost('lokasi'), 'status_wawancara' => 'Dijadwalkan'];

        $cek = $this->jadwalModel->where('id_pendaftar', $id)->first();
        if ($cek) {
            $this->jadwalModel->update($cek['id_jadwal'], $data);
        } else {
            $this->jadwalModel->insert($data);
        }
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
        $idUser = session()->get('id_user');

        if (!$idUser) {
            return redirect()->to('/login')->with('error', 'Sesi habis, silakan login kembali.');
        }

        $user = $this->userModel->find($idUser);

        if (!$user) {
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
        $idUser = session()->get('id_user');

        $username    = $this->request->getPost('username');
        $passOld     = $this->request->getPost('password_old');
        $passNew     = $this->request->getPost('password');
        $passConfirm = $this->request->getPost('password_confirm');

        $dataUpdate = ['username' => $username];

        if (!empty($passNew)) {
            $currentUser = $this->userModel->find($idUser);

            if (empty($passOld)) {
                return redirect()->back()->with('error', 'Masukkan password lama untuk mengganti password.');
            }

            if (!password_verify((string)$passOld, (string)$currentUser['password'])) {
                return redirect()->back()->with('error', 'Password lama salah!');
            }

            if ($passNew !== $passConfirm) {
                return redirect()->back()->with('error', 'Konfirmasi password baru tidak cocok.');
            }

            $dataUpdate['password'] = password_hash($passNew, PASSWORD_DEFAULT);
        }

        $this->userModel->update($idUser, $dataUpdate);

        session()->set('username', $username);

        return redirect()->to('admin/profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
