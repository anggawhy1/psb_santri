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
use App\Models\InformasiPsbModel;

class Pendaftar extends BaseController
{
    protected PendaftarModel $pendaftarModel;
    protected DataPendidikanModel $pendidikanModel;
    protected DataOrangTuaModel $ortuModel;
    protected DataKesehatanModel $kesehatanModel;
    protected PembayaranModel $pembayaranModel;
    protected BerkasModel $berkasModel;
    protected JadwalWawancaraModel $jadwalModel;
    protected InformasiPsbModel $infoPsbModel;
    protected $id_pendaftar;

    public function __construct()
    {
        $this->pendaftarModel   = new PendaftarModel();
        $this->pendidikanModel  = new DataPendidikanModel();
        $this->ortuModel        = new DataOrangTuaModel();
        $this->kesehatanModel   = new DataKesehatanModel();
        $this->pembayaranModel  = new PembayaranModel();
        $this->berkasModel      = new BerkasModel();
        $this->jadwalModel      = new JadwalWawancaraModel();
        $this->infoPsbModel     = new InformasiPsbModel();

        $this->id_pendaftar = session()->get('id_pendaftar');
    }

    public function dashboard()
    {

        $id = $this->id_pendaftar;
        $pendaftar  = $this->pendaftarModel->find($id);
        $pendidikan = $this->pendidikanModel->where('id_pendaftar', $id)->first();
        $kesehatan  = $this->kesehatanModel->where('id_pendaftar', $id)->first();
        $ortu       = $this->ortuModel->where('id_pendaftar', $id)->findAll();
        $bayar      = $this->pembayaranModel->where('id_pendaftar', $id)->first();
        $berkas     = $this->berkasModel->where('id_pendaftar', $id)->first();
        $jadwal     = $this->jadwalModel->where('id_pendaftar', $id)->first();
        $info_tahun = $this->infoPsbModel->find(1);
        $tahun_psb  = $info_tahun ? $info_tahun['isi'] : '2026/2027';

        $data = [
            'title'      => 'Dashboard Utama',
            'pendaftar'  => $pendaftar,
            'pendidikan' => $pendidikan,
            'kesehatan'  => $kesehatan,
            'ortu'       => $ortu,
            'bayar'      => $bayar,
            'berkas'     => $berkas,
            'jadwal'     => $jadwal,
            'tahun_psb'  => $tahun_psb
        ];

        return view('pendaftar/dashboard', $data);
    }

    public function biodata()
    {
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
        $data = [
            'title' => 'Pembayaran',
            'bayar' => $this->pembayaranModel->where('id_pendaftar', $this->id_pendaftar)->first()
        ];
        return view('pendaftar/pembayaran', $data);
    }

    public function uploadPembayaran()
    {
        $file = $this->request->getFile('bukti_bayar');

        if ($file && $file->isValid()) {
            $aturanValidasi = [
                'bukti_bayar' => [
                    'rules'  => 'is_image[bukti_bayar]|mime_in[bukti_bayar,image/jpg,image/jpeg,image/png]|max_size[bukti_bayar,2048]',
                    'errors' => [
                        'is_image' => 'File yang diupload harus berupa gambar.',
                        'mime_in'  => 'Format gambar hanya diperbolehkan JPG, JPEG, atau PNG.',
                        'max_size' => 'Ukuran file maksimal adalah 2 MB.'
                    ]
                ]
            ];

            if (!$this->validate($aturanValidasi)) {
                return redirect()->back()->with('error', $this->validator->getError('bukti_bayar'));
            }
        }

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/pembayaran', $newName);
            $data = [
                'id_pendaftar'      => $this->id_pendaftar,
                'tanggal_bayar'     => date('Y-m-d'),
                'bukti_bayar'       => $newName,
                'status_pembayaran' => 'Menunggu',
                'keterangan'        => 'Menunggu verifikasi admin'
            ];

            $cek = $this->pembayaranModel->where('id_pendaftar', $this->id_pendaftar)->first();

            if ($cek) {
                $this->pembayaranModel->update($cek['id_pembayaran'], $data);
            } else {
                $this->pembayaranModel->insert($data);
            }

            return redirect()->to('pendaftar/pembayaran')->with('success', 'Bukti pembayaran berhasil diunggah.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah gambar.');
    }

    public function berkas()
    {
        $data = [
            'title'      => 'Unggah Berkas',
            'berkas'     => $this->berkasModel->where('id_pendaftar', $this->id_pendaftar)->first(),
            'pembayaran' => $this->pembayaranModel->where('id_pendaftar', $this->id_pendaftar)->first(),
            'pendidikan' => $this->pendidikanModel->where('id_pendaftar', $this->id_pendaftar)->first(),
        ];
        return view('pendaftar/berkas', $data);
    }

    public function uploadBerkas()
    {
        $jenis = $this->request->getPost('jenis_berkas');
        $file = $this->request->getFile('file_berkas');

        $allowed_types = ['akta_kelahiran', 'kartu_keluarga', 'ktp_ortu', 'ktp_pendaftar', 'ijazah_raport', 'pas_foto'];

        if ($file && $file->isValid()) {
            $aturanValidasi = [
                'file_berkas' => [
                    'rules'  => 'mime_in[file_berkas,image/jpg,image/jpeg,image/png,application/pdf]|max_size[file_berkas,2048]',
                    'errors' => [
                        'mime_in'  => 'Format file hanya diperbolehkan JPG, JPEG, PNG, atau PDF.',
                        'max_size' => 'Ukuran file maksimal adalah 2 MB.'
                    ]
                ]
            ];

            if (!$this->validate($aturanValidasi)) {
                return redirect()->back()->with('error', $this->validator->getError('file_berkas'));
            }
        }

        if (in_array($jenis, $allowed_types) && $file->isValid() && !$file->hasMoved()) {

            $newName = $this->id_pendaftar . '_' . $jenis . '_' . $file->getRandomName();
            $file->move('uploads/berkas', $newName);

            $cek = $this->berkasModel->where('id_pendaftar', $this->id_pendaftar)->first();

            $data = [];
            $data[$jenis] = $newName;
            $data['id_pendaftar'] = $this->id_pendaftar;
            $data['status_berkas'] = 'Menunggu';
            $data['keterangan'] = null;

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
        $data = [
            'title'     => 'Status Pendaftaran',
            'pendaftar' => $this->pendaftarModel->find($this->id_pendaftar),
            'berkas'    => $this->berkasModel->where('id_pendaftar', $this->id_pendaftar)->first(),
            'bayar'     => $this->pembayaranModel->where('id_pendaftar', $this->id_pendaftar)->first(),
            'jadwal'    => $this->jadwalModel->where('id_pendaftar', $this->id_pendaftar)->first(),
        ];
        return view('pendaftar/status', $data);
    }
}
