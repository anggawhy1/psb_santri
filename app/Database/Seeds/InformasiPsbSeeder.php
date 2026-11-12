<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InformasiPsbSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_informasi' => 1,
                'judul'        => 'Tahun Ajaran',
                'isi'          => '2026/2027',
                'created_at'   => '2026-02-12 05:01:50',
                'updated_at'   => '2026-04-14 17:36:13',
            ],
            [
                'id_informasi' => 2,
                'judul'        => 'Sekolah Tujuan',
                'isi'          => 'MTs Negeri 7 Bantul, SMP Negeri 1 Piyungan, SMP Negeri 2 Piyungan, SMA Negeri 1 Piyungan',
                'created_at'   => '2026-04-14 16:09:48',
                'updated_at'   => '2026-04-14 16:09:48',
            ],
            [
                'id_informasi' => 3,
                'judul'        => 'Biaya Pendaftaran',
                'isi'          => 'Rp 200.000',
                'created_at'   => '2026-04-14 16:31:11',
                'updated_at'   => '2026-04-14 16:31:11',
            ],
            [
                'id_informasi' => 4,
                'judul'        => 'Pengumuman',
                'isi'          => 'Untuk saat ini, kami baru membuka penerimaan pendaftaran khusus untuk <strong class="text-amber-900 border-b border-amber-400">Santri Putra</strong>.',
                'created_at'   => '2026-04-14 16:31:11',
                'updated_at'   => '2026-04-14 16:42:43',
            ],
            [
                'id_informasi' => 5,
                'judul'        => 'Gelombang 1',
                'isi'          => '1 Mar - 30 Mei 2026 | Periode pendaftaran awal untuk Tahun Ajaran berjalan.',
                'created_at'   => '2026-04-14 17:23:35',
                'updated_at'   => '2026-04-14 17:23:35',
            ],
            [
                'id_informasi' => 6,
                'judul'        => 'Gelombang 2',
                'isi'          => '1 Jun - 31 Ags 2026 | Periode pendaftaran lanjutan setelah gelombang pertama berakhir.',
                'created_at'   => '2026-04-14 17:23:35',
                'updated_at'   => '2026-04-14 17:23:35',
            ],
            [
                'id_informasi' => 7,
                'judul'        => 'Gelombang 3',
                'isi'          => '1 Sep - 31 Des 2026 | Periode pendaftaran akhir sebelum tahun ajaran baru dimulai.',
                'created_at'   => '2026-04-14 17:23:35',
                'updated_at'   => '2026-04-14 17:23:35',
            ],
            [
                'id_informasi' => 9,
                'judul'        => 'Slogan Promo',
                'isi'          => 'UANG PONDOK GRATIS',
                'created_at'   => '2026-04-14 17:46:54',
                'updated_at'   => '2026-04-14 17:47:42',
            ],
        ];

        $this->db->table('informasi_psb')->insertBatch($data);
    }
}