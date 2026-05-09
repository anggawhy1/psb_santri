<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendaftarModel;
use App\Models\PembayaranModel;
use App\Models\UsersModel;
use App\Models\DataPendidikanModel;
use App\Models\DataOrangTuaModel;
use App\Models\DataKesehatanModel;
use App\Models\BerkasModel;
use App\Models\JadwalWawancaraModel;

class Pimpinan extends BaseController
{
    protected PendaftarModel $pendaftarModel;
    protected PembayaranModel $pembayaranModel;
    protected UsersModel $userModel;

    public function __construct()
    {
        $this->pendaftarModel  = new PendaftarModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->userModel       = new UsersModel();
    }

    public function dashboard()
    {
        // 1. Total Pendaftar & Pembayaran Diterima
        $totalPendaftar = $this->pendaftarModel->countAllResults();
        $totalBayar     = $this->pembayaranModel->where('status_pembayaran', 'Diterima')->countAllResults();

        // 2. Total Wawancara (Menggunakan Query Builder dari Model)
        $totalWawancara = $this->pendaftarModel
            ->join('jadwal_wawancara j', 'pendaftar.id_pendaftar = j.id_pendaftar')
            ->groupStart()
                ->where('pendaftar.status_akhir IS NULL')
                ->orWhere('pendaftar.status_akhir', '')
                ->orWhere('pendaftar.status_akhir', 'Menunggu')
            ->groupEnd()
            ->countAllResults();

        // 3. Status Lulus / Gagal
        $totalLulus     = $this->pendaftarModel->where('status_akhir', 'Lulus')->countAllResults();
        $totalGagal     = $this->pendaftarModel->where('status_akhir', 'Tidak Lulus')->countAllResults();

        // 4. Data Pie Chart
        $pieData = $this->pendaftarModel
            ->select('program_pilihan, COUNT(id_pendaftar) as jumlah')
            ->groupBy('program_pilihan')
            ->findAll();

        // 5. Data Line Chart (10 Hari Terakhir)
        $grafik_data_desc = $this->pendaftarModel
            ->select('DATE(created_at) as tgl, COUNT(id_pendaftar) as jumlah')
            ->where('created_at IS NOT NULL')
            ->groupBy('DATE(created_at)')
            ->orderBy('DATE(created_at)', 'DESC')
            ->findAll(10);
            
        // Balik urutan array menjadi ASC (tanggal lama ke baru) pakai fungsi PHP
        $grafik_data = array_reverse($grafik_data_desc); 

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

    private function _getCompleteData($id)
    {
        // Inisialisasi Model secara lokal
        $pendidikanModel = new DataPendidikanModel();
        $ortuModel       = new DataOrangTuaModel();
        $kesehatanModel  = new DataKesehatanModel();
        $berkasModel     = new BerkasModel();
        $jadwalModel     = new JadwalWawancaraModel();

        $pendaftar = $this->pendaftarModel->find($id);
        if (!$pendaftar) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data santri tidak ditemukan");
        }

        return [
            'pendaftar'  => $pendaftar,
            // Gunakan first() untuk data tunggal (getRowArray)
            // Gunakan findAll() untuk data banyak (getResultArray) seperti Orang Tua
            'pendidikan' => $pendidikanModel->where('id_pendaftar', $id)->first() ?? [],
            'ortu'       => $ortuModel->where('id_pendaftar', $id)->findAll() ?? [],
            'kesehatan'  => $kesehatanModel->where('id_pendaftar', $id)->first() ?? [],
            'berkas'     => $berkasModel->where('id_pendaftar', $id)->first() ?? [],
            'pembayaran' => $this->pembayaranModel->where('id_pendaftar', $id)->first() ?? [],
            'jadwal'     => $jadwalModel->where('id_pendaftar', $id)->first() ?? [],
        ];
    }

    public function pendaftar()
    {
        $keyword = $this->request->getGet('keyword');
        $status_wawancara = $this->request->getGet('status_wawancara');
        $model = $this->pendaftarModel;
        
        $model->select('pendaftar.*, data_pendidikan.asal_sekolah, jadwal_wawancara.tanggal_wawancara, jadwal_wawancara.tautan_video');
        $model->join('data_pendidikan', 'data_pendidikan.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $model->join('jadwal_wawancara', 'jadwal_wawancara.id_pendaftar = pendaftar.id_pendaftar', 'left');
        $model->where('pendaftar.status_akhir', 'Menunggu');

        if ($keyword) {
            $model->groupStart()
                ->like('pendaftar.nama_lengkap', $keyword)
                ->orLike('pendaftar.no_registrasi', $keyword)
                ->groupEnd();
        }

        if ($status_wawancara === 'Dijadwalkan') {
            $model->where('jadwal_wawancara.tanggal_wawancara IS NOT NULL');
        }

        $data = [
            'title'            => 'Monitoring Data Pendaftar',
            'data'             => $model->paginate(10, 'pendaftar'),
            'pager'            => $model->pager,
            'keyword'          => $keyword,
            'status_wawancara' => $status_wawancara
        ];

        return view('pimpinan/pendaftar_list', $data);
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

    public function detailSantri($id)
    {
        try {
            $data = $this->_getCompleteData($id);
            $data['title'] = 'Detail Data Santri';
            $data['is_riwayat'] = false;
            return view('pimpinan/detail_santri', $data);
        } catch (\Exception $e) {
            return redirect()->to('pimpinan/pendaftar')->with('error', 'Data tidak ditemukan.');
        }
    }

    public function detailRiwayat($id)
    {
        try {
            $data = $this->_getCompleteData($id);
            $data['title'] = 'Arsip Data Santri';
            $data['is_riwayat'] = true; // Flag: Ini data riwayat/arsip
            return view('pimpinan/detail_santri', $data);
        } catch (\Exception $e) {
            return redirect()->to('pimpinan/riwayat')->with('error', 'Data tidak ditemukan.');
        }
    }
}