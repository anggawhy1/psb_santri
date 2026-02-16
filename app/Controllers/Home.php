<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PromosiModel;

class Home extends BaseController
{
    protected $promosiModel;

    public function __construct()
    {
        $this->promosiModel = new PromosiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Selamat Datang | PSB Online',
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
        $data = ['title' => 'Info Pendaftaran | Ponpes Banyu Agung Ibnu Saut Bintoro'];
        return view('psb', $data);
    }

    public function profil()
    {
        $data = ['title' => 'Profil Pondok'];
        return view('profil', $data);
    }

    public function program()
    {
        $data = ['title' => 'Program Pendidikan'];
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
        // JOIN tabel promosi dengan users untuk ambil nama admin
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
            // Ganti findAll() dengan paginate()
            'prestasi' => $this->promosiModel->where('type', 'prestasi')
                ->orderBy('created_at', 'DESC')
                ->paginate(9, 'prestasi'),
            'pager' => $this->promosiModel->pager // Tambahkan ini
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
