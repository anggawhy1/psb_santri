<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendaftarModel;
use App\Models\DataPendidikanModel;
use App\Models\DataOrangTuaModel;
use App\Models\DataKesehatanModel;
use App\Models\PembayaranModel;
use App\Models\BerkasModel;
use App\Models\JadwalWawancaraModel;

class Pendaftar extends BaseController
{
    protected $pendaftarModel;
    protected $pendidikanModel;
    protected $ortuModel;
    protected $kesehatanModel;
    protected $pembayaranModel;
    protected $berkasModel;
    protected $id_pendaftar;
    protected $jadwalModel;

    public function __construct()
    {
        $this->pendaftarModel = new PendaftarModel();
        $this->pendidikanModel = new DataPendidikanModel();
        $this->ortuModel = new DataOrangTuaModel();
        $this->kesehatanModel = new DataKesehatanModel();
        $this->pembayaranModel = new PembayaranModel();
        $this->berkasModel = new BerkasModel();
        $this->jadwalModel     = new JadwalWawancaraModel();

        $this->id_pendaftar = session()->get('id_pendaftar');
    }

    public function dashboard()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to('login');

        // Gunakan Query Builder agar kita bisa menarik data dari semua tabel terkait
        $db = \Config\Database::connect();

        // Asumsi $this->id_pendaftar sudah didefinisikan di BaseController/konstruktor Anda
        $id = $this->id_pendaftar;

        // 1. Ambil data dari tabel formulir
        $pendaftar  = $db->table('pendaftar')->where('id_pendaftar', $id)->get()->getRowArray();
        $pendidikan = $db->table('data_pendidikan')->where('id_pendaftar', $id)->get()->getRowArray();
        $kesehatan  = $db->table('data_kesehatan')->where('id_pendaftar', $id)->get()->getRowArray();
        // BENAR
        $ortu = $db->table('data_orang_tua')->where('id_pendaftar', $id)->get()->getResultArray();

        // 2. Ambil data status tahapan agar sinkron dengan halaman Status
        $bayar  = $db->table('pembayaran')->where('id_pendaftar', $id)->get()->getRowArray();
        $berkas = $db->table('berkas')->where('id_pendaftar', $id)->get()->getRowArray();
        $jadwal = $db->table('jadwal_wawancara')->where('id_pendaftar', $id)->get()->getRowArray();

        // 3. TAMBAHAN: Ambil data Tahun Ajaran dari tabel informasi_psb
        $info_tahun = $db->table('informasi_psb')->where('id_informasi', 1)->get()->getRowArray();
        $tahun_psb  = $info_tahun ? $info_tahun['isi'] : '2025/2026';

        // 4. Kirim semua data ke View dengan nama variabel yang tepat
        $data = [
            'title'      => 'Dashboard Utama',
            'pendaftar'  => $pendaftar,
            'pendidikan' => $pendidikan,
            'kesehatan'  => $kesehatan,
            'ortu'       => $ortu,
            'bayar'      => $bayar,
            'berkas'     => $berkas,
            'jadwal'     => $jadwal,
            'tahun_psb'  => $tahun_psb // <-- Lempar variabel ini ke View
        ];

        return view('pendaftar/dashboard', $data);
    }

    public function biodata()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to('login');

        $data = [
            'title'      => 'Biodata Diri',
            'pendaftar'  => $this->pendaftarModel->find($this->id_pendaftar),
            'pendidikan' => $this->pendidikanModel->where('id_pendaftar', $this->id_pendaftar)->first(),
            'ayah'       => $this->ortuModel->where('id_pendaftar', $this->id_pendaftar)->where('hubungan', 'Ayah')->first(),
            'ibu'        => $this->ortuModel->where('id_pendaftar', $this->id_pendaftar)->where('hubungan', 'Ibu')->first(),
            'kesehatan'  => $this->kesehatanModel->where('id_pendaftar', $this->id_pendaftar)->first(),
        ];
        return view('pendaftar/biodata', $data);
    }

    public function pembayaran()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to('login');

        $data = [
            'title' => 'Pembayaran',
            'bayar' => $this->pembayaranModel->where('id_pendaftar', $this->id_pendaftar)->first()
        ];
        return view('pendaftar/pembayaran', $data);
    }

    public function uploadPembayaran()
    {
        $file = $this->request->getFile('bukti_bayar');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/pembayaran', $newName);

            // Jika diupload, status kembali jadi 'Menunggu' agar admin cek lagi
            $data = [
                'id_pendaftar'      => $this->id_pendaftar,
                'tanggal_bayar'     => date('Y-m-d'),
                'bukti_bayar'       => $newName,
                'status_pembayaran' => 'Menunggu',
                'keterangan'        => 'Menunggu verifikasi admin'
            ];

            // LOGIKA PENTING: Cek sudah ada data belum?
            $cek = $this->pembayaranModel->where('id_pendaftar', $this->id_pendaftar)->first();

            if ($cek) {
                // Kalau sudah ada (misal Ditolak), kita UPDATE barisnya
                $this->pembayaranModel->update($cek['id_pembayaran'], $data);
            } else {
                // Kalau belum ada, kita INSERT baru
                $this->pembayaranModel->insert($data);
            }

            return redirect()->to('pendaftar/pembayaran')->with('success', 'Bukti pembayaran berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah gambar.');
    }

    public function berkas()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to('login');

        $data = [
            'title'      => 'Unggah Berkas',
            'berkas'     => $this->berkasModel->where('id_pendaftar', $this->id_pendaftar)->first(),
            // TAMBAHAN: Kirim data pembayaran untuk cek status lunas
            'pembayaran' => $this->pembayaranModel->where('id_pendaftar', $this->id_pendaftar)->first(),
            // TAMBAHAN: Kirim data pendidikan untuk cek Mahasiswa/Pelajar
            'pendidikan' => $this->pendidikanModel->where('id_pendaftar', $this->id_pendaftar)->first(),
        ];
        return view('pendaftar/berkas', $data);
    }

    public function uploadBerkas()
    {
        $jenis = $this->request->getPost('jenis_berkas');
        $file = $this->request->getFile('file_berkas');

        // Validasi tambahan
        $allowed_types = ['akta_kelahiran', 'kartu_keluarga', 'ktp_ortu', 'ktp_pendaftar', 'ijazah_raport', 'pas_foto'];

        if (in_array($jenis, $allowed_types) && $file->isValid() && !$file->hasMoved()) {

            // 1. Proses Upload
            $newName = $this->id_pendaftar . '_' . $jenis . '_' . $file->getRandomName();
            $file->move('uploads/berkas', $newName);

            // 2. Cek Data Lama
            $cek = $this->berkasModel->where('id_pendaftar', $this->id_pendaftar)->first();

            // 3. Siapkan Data Update
            $data = [];
            $data[$jenis] = $newName; // Nama file baru masuk ke kolom yang sesuai
            $data['id_pendaftar'] = $this->id_pendaftar;

            // --- PERBAIKAN DI SINI ---
            // Paksa status jadi 'Menunggu' setiap kali ada file baru yang masuk
            // Supaya Admin tahu ada update, dan Alert Merah di santri hilang (jadi Kuning)
            $data['status_berkas'] = 'Menunggu';

            // (Opsional tapi Bagus) Hapus catatan penolakan lama biar bersih
            $data['keterangan'] = null;
            // -------------------------

            if ($cek) {
                $this->berkasModel->update($cek['id_berkas'], $data);
            } else {
                $this->berkasModel->insert($data);
            }

            return redirect()->to('pendaftar/berkas')->with('success', 'Berkas berhasil diperbarui. Menunggu verifikasi ulang.');
        }

        return redirect()->back()->with('error', 'Gagal upload file atau format salah.');
    }

    public function status()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to('login');

        $data = [
            'title'     => 'Status Pendaftaran',
            'pendaftar' => $this->pendaftarModel->find($this->id_pendaftar),
            'berkas'    => $this->berkasModel->where('id_pendaftar', $this->id_pendaftar)->first(),
            'bayar'     => $this->pembayaranModel->where('id_pendaftar', $this->id_pendaftar)->first(),
            'jadwal'    => $this->jadwalModel->where('id_pendaftar', $this->id_pendaftar)->first(), // Ambil Jadwal
        ];
        return view('pendaftar/status', $data);
    }
}
