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

        // 1. Validasi Dasar (Data Diri Utama)
        $rules = [
            'nama_lengkap'      => 'required',
            'email'             => 'required|valid_email|is_unique[pendaftar.email]',
            'nik'               => 'required|numeric|min_length[16]',
            'no_kk'             => 'required|numeric|min_length[16]',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'jenis_kelamin'     => 'required',
            'no_hp'             => 'required',
            'alamat_lengkap'    => 'required',
            'program_pilihan'   => 'required',
            'status_pendidikan' => 'required',
        ];

        // 2. Validasi Dinamis Pendidikan
        $statusPendidikan = $this->request->getPost('status_pendidikan');
        $statusSiswa      = $this->request->getPost('status_siswa');

        if ($statusPendidikan == 'Pelajar') {
            $rules['nisn']         = 'required';
            $rules['status_siswa'] = 'required';
            $rules['nama_sekolah'] = 'required'; // Berlaku untuk dropdown maupun input text

            // Jika "Siswa Baru", wajiban kolom sekolah sebelumnya
            if ($statusSiswa == 'Siswa Baru') {
                $rules['asal_sekolah']                = 'required';
                $rules['kelas_terakhir']              = 'required';
                $rules['jenjang_pendidikan_didaftar'] = 'required';
            }
        } elseif ($statusPendidikan == 'Mahasiswa') {
            $rules['nama_pt'] = 'required';
        }

        // Jalankan Validasi
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db->transStart();
        $tahun = date('Y');
        $random = strtoupper(substr(uniqid(), -4));
        $no_registrasi = "PSB-{$tahun}-{$random}";

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

        // Siapkan Data Pendidikan sesuai dengan statusnya
        $dataPendidikan = [
            'id_pendaftar' => $idPendaftar,
            'status'       => $statusPendidikan,
            'prestasi'     => $this->request->getPost('prestasi') ?: null,
        ];

        // Filter data yang dimasukkan ke database berdasarkan pilihan
        if ($statusPendidikan == 'Pelajar') {
            $dataPendidikan['nisn']         = $this->request->getPost('nisn');
            $dataPendidikan['status_siswa'] = $statusSiswa;
            $dataPendidikan['nama_sekolah'] = $this->request->getPost('nama_sekolah');

            if ($statusSiswa == 'Siswa Baru') {
                $dataPendidikan['asal_sekolah']                = $this->request->getPost('asal_sekolah');
                $dataPendidikan['kelas_terakhir']              = $this->request->getPost('kelas_terakhir');
                $dataPendidikan['jenjang_pendidikan_didaftar'] = $this->request->getPost('jenjang_pendidikan_didaftar');
            } else {
                // Set NULL jika 'Sudah Bersekolah' agar aman di database
                $dataPendidikan['asal_sekolah']                = null;
                $dataPendidikan['kelas_terakhir']              = null;
                $dataPendidikan['jenjang_pendidikan_didaftar'] = null;
            }
            $dataPendidikan['nama_pt'] = null; // Pastikan null jika bukan mahasiswa

        } elseif ($statusPendidikan == 'Mahasiswa') {
            $dataPendidikan['nama_pt'] = $this->request->getPost('nama_pt');
            // Set NULL untuk semua data pelajar
            $dataPendidikan['nisn']                        = null;
            $dataPendidikan['status_siswa']                = null;
            $dataPendidikan['nama_sekolah']                = null;
            $dataPendidikan['asal_sekolah']                = null;
            $dataPendidikan['kelas_terakhir']              = null;
            $dataPendidikan['jenjang_pendidikan_didaftar'] = null;
        }

        $pendidikanModel->insert($dataPendidikan);

        $hubungan   = $this->request->getPost('hubungan_ortu');
        $nama       = $this->request->getPost('nama_ortu');
        $pekerjaan  = $this->request->getPost('pekerjaan_ortu');
        $pendidikan = $this->request->getPost('pendidikan_ortu');
        $pendapatan = $this->request->getPost('pendapatan_ortu');
        $status     = $this->request->getPost('status_ortu');
        $no_hp      = $this->request->getPost('no_hp_ortu');

        if ($hubungan) {
            foreach ($hubungan as $key => $val) {
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

        $dataKesehatan = [
            'id_pendaftar'     => $idPendaftar,
            'gol_darah'        => $this->request->getPost('gol_darah'),
            'riwayat_penyakit' => $this->request->getPost('riwayat_penyakit') ?: null,
            'alergi'           => $this->request->getPost('alergi') ?: null,
        ];
        $kesehatanModel->insert($dataKesehatan);

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }

        $email_pendaftar = $this->request->getPost('email');
        $nama_lengkap    = $this->request->getPost('nama_lengkap');

        $this->_kirimEmailBukti($email_pendaftar, $nama_lengkap, $no_registrasi);

        return redirect()->to('login')->with('success', '<b>Pendaftaran Berhasil!</b><br>Silakan Login menggunakan:<br>Email: ' . $this->request->getPost('email') . '<br>No. Registrasi: <b>' . $no_registrasi . '</b> (Bukti pendaftaran telah dikirim ke email Anda)');
    }

    public function attemptLogin()
    {
        $session = session();
        $model = new PendaftarModel();

        $email = $this->request->getPost('email');
        $no_registrasi = $this->request->getPost('no_registrasi');

        $data = $model->where('email', $email)
            ->where('no_registrasi', $no_registrasi)
            ->first();

        if ($data) {
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
                $ses_data = [
                    'id_user'       => $user['id_user'],
                    'nama_lengkap'  => $user['nama_lengkap'],
                    'username'      => $user['username'],
                    'role'          => $user['role'],
                    'isLoggedIn'    => TRUE
                ];
                $session->set($ses_data);

                if ($user['role'] == 'pimpinan') {
                    return redirect()->to('pimpinan/dashboard');
                } else {
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
        $role = session()->get('role');
        session()->destroy();

        if ($role === 'admin' || $role === 'pimpinan') {
            return redirect()->to('admin/login')->with('success', 'Anda telah berhasil keluar.');
        } else {
            return redirect()->to('login')->with('success', 'Sesi Anda telah berakhir.');
        }
    }

    private function _kirimEmailBukti($email_tujuan, $nama, $no_reg)
    {
        $emailService = \Config\Services::email();

        $emailService->setTo($email_tujuan);
        $emailService->setSubject('Pendaftaran Berhasil - No. Registrasi: ' . $no_reg);

        $pesan = "
        <div style='font-family: Helvetica, Arial, sans-serif; max-width: 600px; margin: auto; border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden;'>
            <div style='background-color: #059669; padding: 20px; text-align: center;'>
                <h2 style='color: white; margin: 0;'>Alhamdulillah, Pendaftaran Berhasil!</h2>
            </div>
            <div style='padding: 30px; color: #374151; line-height: 1.6;'>
                <p><i>Assalamu'alaikum Warahmatullahi Wabarakatuh,</i></p>
                <p>Ahlan wa sahlan, calon santri <b>$nama</b>.</p>
                <p><i>Jazakumullah khairan</i> atas niat baik dan kepercayaannya mendaftar di <b>Pondok Pesantren Banyu Agung Ibnu Saut Bintoro</b>. Insya Allah, data formulir pendaftaran Anda telah kami terima dengan baik.</p>
                
                <div style='background-color: #f3f4f6; border-left: 4px solid #059669; padding: 15px; margin: 25px 0; border-radius: 4px;'>
                    <p style='margin: 0; font-size: 14px; color: #6b7280;'>Nomor Registrasi Anda:</p>
                    <h1 style='margin: 5px 0 0 0; color: #047857; font-size: 28px; letter-spacing: 2px;'>$no_reg</h1>
                </div>
                
                <p>Mohon simpan <b>Nomor Registrasi</b> ini dengan baik. Silakan gunakan <b>Email</b> dan <b>Nomor Registrasi</b> di atas sebagai kata sandi untuk <b>Login</b> ke Portal Calon Santri.</p>
                <p>Langkah selanjutnya, silakan login ke portal untuk mengunggah berkas persyaratan dan melakukan konfirmasi pembayaran administrasi pendaftaran.</p>
                <p>Semoga Allah SWT senantiasa meridhoi, memberikan kelancaran, dan kemudahan dalam setiap niat baik kita menuntut ilmu agama. Aamiin Ya Rabbal 'Alamin.</p>
                <br>
                <p><i>Wassalamu'alaikum Warahmatullahi Wabarakatuh,</i><br><br><b>Panitia PSB Banyu Agung</b></p>
            </div>
            <div style='background-color: #f9fafb; padding: 15px; text-align: center; font-size: 12px; color: #9ca3af;'>
                Pesan ini dihasilkan secara otomatis oleh sistem. Mohon tidak membalas email ini.
            </div>
        </div>
        ";

        $emailService->setMessage($pesan);

        if ($emailService->send()) {
            return true;
        } else {
            echo $emailService->printDebugger(['headers']);
            exit;
        }
    }
}
