<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendaftarModel;
use App\Models\DataPendidikanModel;
use App\Models\DataOrangTuaModel;
use App\Models\DataKesehatanModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/pendaftar/dashboard');
        }
        return view('auth/login');
    }

    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/pendaftar/dashboard');
        }
        return view('auth/register');
    }

    public function attemptRegister()
    {
        $db = \Config\Database::connect();
        $pendaftarModel = new PendaftarModel();
        $pendidikanModel = new DataPendidikanModel();
        $ortuModel = new DataOrangTuaModel();
        $kesehatanModel = new DataKesehatanModel();

        // 1. VALIDASI (Sesuai Poin A Wajib Isi)
        $rules = [
            'nama_lengkap' => 'required',
            'email'        => 'required|valid_email|is_unique[pendaftar.email]',
            'nik'          => 'required|numeric|min_length[16]',
            'no_kk'        => 'required|numeric|min_length[16]',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp'        => 'required',
            'alamat_lengkap' => 'required',
            'program_pilihan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db->transStart();

        // 2. GENERATE NO REGISTRASI
        $tahun = date('Y');
        $random = strtoupper(substr(uniqid(), -4));
        $no_registrasi = "PSB-{$tahun}-{$random}";

        // 3. SIMPAN PENDAFTAR (POIN A)
        // Password diisi hash dari No Registrasi (karena user tidak input password)
        $dataPendaftar = [
            'email'           => $this->request->getPost('email'),
            'password'        => password_hash($no_registrasi, PASSWORD_DEFAULT),
            'no_registrasi'   => $no_registrasi,
            'nama_lengkap'    => $this->request->getPost('nama_lengkap'),
            'jenis_kelamin'   => $this->request->getPost('jenis_kelamin'),
            'tempat_lahir'    => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'   => $this->request->getPost('tanggal_lahir'),
            'nik'             => $this->request->getPost('nik'),
            'no_kk'           => $this->request->getPost('no_kk'),
            'anak_ke'         => $this->request->getPost('anak_ke'),
            'dari_bersaudara' => $this->request->getPost('dari_bersaudara'),
            'alamat_lengkap'  => $this->request->getPost('alamat_lengkap'),
            'no_hp'           => $this->request->getPost('no_hp'),
            'program_pilihan' => $this->request->getPost('program_pilihan'),
            'status_akhir'    => 'Menunggu'
        ];
        $pendaftarModel->insert($dataPendaftar);
        $idPendaftar = $pendaftarModel->getInsertID();

        // 4. SIMPAN PENDIDIKAN (POIN B)
        $dataPendidikan = [
            'id_pendaftar'                => $idPendaftar,
            'status'                      => $this->request->getPost('status_pendidikan'),
            'nama_pt'                     => $this->request->getPost('nama_pt') ?: '-',
            'nisn'                        => $this->request->getPost('nisn') ?: '0',
            'asal_sekolah'                => $this->request->getPost('asal_sekolah') ?: '-',
            'kelas_terakhir'              => $this->request->getPost('kelas_terakhir') ?: '-',
            'status_siswa'                => $this->request->getPost('status_siswa') ?: '-',
            'jenjang_pendidikan_didaftar' => $this->request->getPost('jenjang_pendidikan_didaftar') ?: '-',
            'nama_sekolah'                => $this->request->getPost('nama_sekolah') ?: '-',
            'prestasi'                    => $this->request->getPost('prestasi') ?: '-',
        ];
        $pendidikanModel->insert($dataPendidikan);

        // 5. SIMPAN ORANG TUA (POIN C - DINAMIS/LOOPING)
        // Kita ambil data array dari form
        $hubungan   = $this->request->getPost('hubungan_ortu');
        $nama       = $this->request->getPost('nama_ortu');
        $pekerjaan  = $this->request->getPost('pekerjaan_ortu');
        $pendidikan = $this->request->getPost('pendidikan_ortu');
        $pendapatan = $this->request->getPost('pendapatan_ortu');
        $status     = $this->request->getPost('status_ortu');
        $no_hp      = $this->request->getPost('no_hp_ortu');

        if ($hubungan) {
            foreach ($hubungan as $key => $val) {
                // Hanya simpan jika nama tidak kosong
                if (!empty($nama[$key])) {
                    $ortuModel->insert([
                        'id_pendaftar' => $idPendaftar,
                        'hubungan'     => $val,
                        'nama'         => $nama[$key],
                        'pekerjaan'    => $pekerjaan[$key],
                        'pendidikan'   => $pendidikan[$key],
                        'pendapatan'   => $pendapatan[$key],
                        'status'       => $status[$key],
                        'no_hp'        => $no_hp[$key],
                    ]);
                }
            }
        }

        // 6. SIMPAN KESEHATAN (POIN D)
        $dataKesehatan = [
            'id_pendaftar'     => $idPendaftar,
            'gol_darah'        => $this->request->getPost('gol_darah'),
            'riwayat_penyakit' => $this->request->getPost('riwayat_penyakit'),
            'alergi'           => $this->request->getPost('alergi'),
        ];
        $kesehatanModel->insert($dataKesehatan);

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }

        // Redirect ke Login dengan pesan sukses berisi No Registrasi
        return redirect()->to('login')->with('success', '<b>Pendaftaran Berhasil!</b><br>Silakan Login menggunakan:<br>Email: ' . $this->request->getPost('email') . '<br>No. Registrasi: <b>' . $no_registrasi . '</b> (Harap dicatat!)');
    }

    public function attemptLogin()
    {
        $session = session();
        $model = new PendaftarModel();

        // Ambil Inputan
        $email = $this->request->getPost('email');
        $no_registrasi = $this->request->getPost('no_registrasi'); // Input login pakai No Reg

        // Cek User berdasarkan Email DAN No Registrasi
        $data = $model->where('email', $email)
            ->where('no_registrasi', $no_registrasi)
            ->first();

        if ($data) {
            // Set Session Login
            $ses_data = [
                'id_pendaftar'  => $data['id_pendaftar'],
                'nama_lengkap'  => $data['nama_lengkap'],
                'email'         => $data['email'],
                'no_registrasi' => $data['no_registrasi'],
                'isLoggedIn'    => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to('/pendaftar/dashboard');
        } else {
            return redirect()->back()->with('error', 'Email atau Nomor Registrasi salah.');
        }
    }

    public function adminLogin()
    {
        if (session()->get('isLoggedIn')) {
            // Kalau admin sudah login, lempar ke dashboard admin
            if (session()->get('role') == 'admin' || session()->get('role') == 'pimpinan') {
                return redirect()->to('/admin/dashboard');
            }
        }
        return view('auth/login_admin');
    }

    public function attemptAdminLogin()
    {
        $session = session();
        $db = \Config\Database::connect();
        $builder = $db->table('users');

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $builder->getWhere(['username' => $username])->getRowArray();

        if ($user) {
            if (password_verify($password, $user['password'])) {

                // 1. Simpan data user ke sesi
                $ses_data = [
                    'id_user'       => $user['id_user'],
                    'nama_lengkap'  => $user['nama_lengkap'],
                    'username'      => $user['username'],
                    'role'          => $user['role'], // Penting! Role (admin/pimpinan) disimpan disini
                    'isLoggedIn'    => TRUE
                ];
                $session->set($ses_data);

                // 2. LOGIKA REDIRECT (INI BAGIAN YANG BARU)
                // Cek isi kolom 'role' dari database
                if ($user['role'] == 'pimpinan') {
                    // Kalau Pimpinan, lempar ke Controller Pimpinan
                    return redirect()->to('pimpinan/dashboard');
                } else {
                    // Kalau Admin (atau role lain), lempar ke Controller Admin biasa
                    return redirect()->to('admin/dashboard');
                }
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan.');
        }
    }

    public function logout()
    {
        // Ambil role sebelum session dihapus
        $role = session()->get('role');

        // Hapus semua session
        session()->destroy();

        // Cek role untuk menentukan arah redirect
        if ($role === 'admin' || $role === 'pimpinan') {
            // Redirect ke halaman login admin/pimpinan
            return redirect()->to('admin/login')->with('success', 'Anda telah berhasil keluar.');
        } else {
            // Redirect ke halaman login santri/user umum
            return redirect()->to('login')->with('success', 'Sesi Anda telah berakhir.');
        }
    }
}
