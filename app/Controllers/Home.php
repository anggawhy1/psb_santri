<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PromosiModel;
use App\Models\InformasiPsbModel; 

class Home extends BaseController
{
    protected PromosiModel $promosiModel;
    protected InformasiPsbModel $infoPsbModel;

    public function __construct()
    {
        $this->promosiModel = new PromosiModel();
        $this->infoPsbModel = new InformasiPsbModel();
    }

    public function index()
    {
        // 1. Ambil Info Tahun
        $info_tahun = $this->infoPsbModel->find(1);
        $tahun_psb = $info_tahun ? $info_tahun['isi'] : '2026/2027';

        $data = [
            'title' => 'Selamat Datang | PSB Online',
            'tahun_psb' => $tahun_psb,
            'berita_terbaru' => $this->promosiModel
                ->where('type', 'berita')
                ->orderBy('created_at', 'DESC')
                ->findAll(3),
            'prestasi_terbaru' => $this->promosiModel
                ->where('type', 'prestasi')
                ->orderBy('created_at', 'DESC')
                ->findAll(3),
            'galeri_terbaru' => $this->promosiModel
                ->where('type', 'galeri')
                ->orderBy('created_at', 'DESC')
                ->findAll(4),
        ];

        return view('beranda', $data);
    }

    public function psb()
    {
        // 1. Ambil Info Tahun PSB
        $info_tahun = $this->infoPsbModel->find(1);
        $tahun_psb = $info_tahun ? $info_tahun['isi'] : '2026/2027';

        // 2. Ambil Info Sekolah Tujuan
        $infoSekolah = $this->infoPsbModel->where('judul', 'Sekolah Tujuan')->first();

        $daftar_sekolah = [];
        if ($infoSekolah && !empty($infoSekolah['isi'])) {
            $arraySekolah = explode(',', $infoSekolah['isi']);
            $daftar_sekolah = array_map('trim', $arraySekolah);
        }

        // 3. Ambil Info Biaya Pendaftaran
        $infoBiaya = $this->infoPsbModel->where('judul', 'Biaya Pendaftaran')->first();
        $biaya_pendaftaran = $infoBiaya ? $infoBiaya['isi'] : 'Rp 200.000';

        // 4. Ambil Info Pengumuman (Perhatian)
        $infoPengumuman = $this->infoPsbModel->where('judul', 'Pengumuman')->first();
        $pengumuman = $infoPengumuman ? $infoPengumuman['isi'] : 'Untuk saat ini, kami baru membuka penerimaan pendaftaran khusus untuk <strong class="text-amber-900 border-b border-amber-400">Santri Putra</strong>.';

        // 5. Ambil Info Gelombang (DIPISAH PAKAI TANDA | )
        $infoModel = $this->infoPsbModel;
        $getGelombang = function ($judul) use ($infoModel) {
            $data = $infoModel->where('judul', $judul)->first();
            if ($data && !empty($data['isi'])) {
                $pecah = explode('|', $data['isi']);
                return [trim($pecah[0]), trim($pecah[1] ?? '')];
            }
            return ['Jadwal Menyusul', 'Deskripsi belum tersedia.'];
        };

        $gelombang_1 = $getGelombang('Gelombang 1');
        $gelombang_2 = $getGelombang('Gelombang 2');
        $gelombang_3 = $getGelombang('Gelombang 3');

        // 6. Ambil Info Slogan Promo
        $infoSlogan = $this->infoPsbModel->where('judul', 'Slogan Promo')->first();
        $slogan_promo = $infoSlogan ? $infoSlogan['isi'] : 'UANG PONDOK GRATIS';

        // 7. Masukkan SEMUANYA ke $data buat dikirim ke View
        $data = [
            'title'             => 'Info Pendaftaran | Ponpes Banyu Agung Ibnu Saut Bintoro',
            'tahun_psb'         => $tahun_psb,
            'daftar_sekolah'    => $daftar_sekolah,
            'biaya_pendaftaran' => $biaya_pendaftaran,
            'pengumuman'        => $pengumuman,
            'gelombang_1'       => $gelombang_1,
            'gelombang_2'       => $gelombang_2,
            'gelombang_3'       => $gelombang_3,
            'slogan_promo'      => $slogan_promo,
        ];

        return view('psb', $data);
    }

    public function profil()
    {
        $data = ['title' => 'Profil Pondok'];
        return view('profil', $data);
    }

    public function program()
    {
        // 1. Tarik data "Sekolah Tujuan" dari tabel informasi_psb
        $infoSekolah = $this->infoPsbModel->where('judul', 'Sekolah Tujuan')->first();

        $daftar_sekolah = [];

        // 2. Pecah teks koma jadi Array
        if ($infoSekolah && !empty($infoSekolah['isi'])) {
            $arraySekolah = explode(',', $infoSekolah['isi']);
            $daftar_sekolah = array_map('trim', $arraySekolah);
        }

        $data = [
            'title'          => 'Program Pendidikan',
            'daftar_sekolah' => $daftar_sekolah
        ];

        return view('program', $data);
    }

    public function berita()
    {
        $data = [
            'title' => 'Berita & Kegiatan',
            'berita' => $this->promosiModel->where('type', 'berita')
                ->orderBy('created_at', 'DESC')
                ->paginate(9, 'berita'),
            'pager' => $this->promosiModel->pager
        ];
        return view('berita_index', $data);
    }

    public function detailBerita($id)
    {
        $berita = $this->promosiModel
            ->select('promosi.*, users.nama_lengkap as nama_penulis')
            ->join('users', 'users.id_user = promosi.id_user')
            ->find($id);

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $berita['judul'],
            'berita' => $berita,
            'recents' => $this->promosiModel->where('type', 'berita')
                ->where('id_promosi !=', $id)
                ->orderBy('created_at', 'DESC')
                ->findAll(5)
        ];
        return view('berita_detail', $data);
    }

    public function prestasi()
    {
        $data = [
            'title' => 'Prestasi Santri',
            'prestasi' => $this->promosiModel->where('type', 'prestasi')
                ->orderBy('created_at', 'DESC')
                ->paginate(9, 'prestasi'),
            'pager' => $this->promosiModel->pager
        ];
        return view('prestasi', $data);
    }

    public function galeri()
    {
        $data = [
            'title' => 'Galeri Foto',
            'galeri' => $this->promosiModel->where('type', 'galeri')
                ->orderBy('created_at', 'DESC')
                ->paginate(9, 'galeri'),
            'pager' => $this->promosiModel->pager
        ];
        return view('galeri', $data);
    }

    public function kontak()
    {
        $data = ['title' => 'Hubungi Kami'];
        return view('kontak', $data);
    }
}
