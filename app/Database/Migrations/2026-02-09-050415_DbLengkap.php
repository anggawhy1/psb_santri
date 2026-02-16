<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbLengkap extends Migration
{
    public function up()
    {
        // 1. Tabel Users (Admin/Pimpinan)
        $this->forge->addField([
            'id_user'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_lengkap'  => ['type' => 'VARCHAR', 'constraint' => '100'],
            'username'      => ['type' => 'VARCHAR', 'constraint' => '50'],
            'password'      => ['type' => 'VARCHAR', 'constraint' => '255'],
            'role'          => ['type' => 'ENUM', 'constraint' => ['admin', 'pimpinan']],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');

        // 2. Tabel Informasi PSB
        $this->forge->addField([
            'id_informasi' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'judul'        => ['type' => 'VARCHAR', 'constraint' => '100'],
            'isi'          => ['type' => 'TEXT'],
            'created_at'   => ['type' => 'DATETIME', 'null' => true],
            'updated_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_informasi', true);
        $this->forge->createTable('informasi_psb');

        // 3. Tabel Pendaftar (Tabel Utama)
        $this->forge->addField([
            'id_pendaftar'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'email'           => ['type' => 'VARCHAR', 'constraint' => '50'],
            'password'        => ['type' => 'VARCHAR', 'constraint' => '255'], // Password untuk login santri
            'no_registrasi'   => ['type' => 'VARCHAR', 'constraint' => '20'],
            'nama_lengkap'    => ['type' => 'VARCHAR', 'constraint' => '100'],
            'jenis_kelamin'   => ['type' => 'ENUM', 'constraint' => ['L', 'P']],
            'tempat_lahir'    => ['type' => 'VARCHAR', 'constraint' => '50'],
            'tanggal_lahir'   => ['type' => 'DATE'],
            'nik'             => ['type' => 'CHAR', 'constraint' => '16'],
            'no_kk'           => ['type' => 'CHAR', 'constraint' => '16'],
            'anak_ke'         => ['type' => 'INT', 'constraint' => 11],
            'dari_bersaudara' => ['type' => 'INT', 'constraint' => 11],
            'alamat_lengkap'  => ['type' => 'TEXT'],
            'no_hp'           => ['type' => 'VARCHAR', 'constraint' => '15'],
            'program_pilihan' => ['type' => 'ENUM', 'constraint' => ['Kitab Kuning', 'Tahfidz']],
            'status_akhir'    => ['type' => 'ENUM', 'constraint' => ['Lulus', 'Tidak Lulus', 'Menunggu'], 'default' => 'Menunggu'],
            'keterangan'      => ['type' => 'TEXT', 'null' => true],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_pendaftar', true);
        $this->forge->createTable('pendaftar');

        // 4. Tabel Data Orang Tua
        $this->forge->addField([
            'id_ortu'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_pendaftar'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'hubungan'      => ['type' => 'ENUM', 'constraint' => ['Ayah', 'Ibu', 'Wali']],
            'nama'          => ['type' => 'VARCHAR', 'constraint' => '100'],
            'pekerjaan'     => ['type' => 'VARCHAR', 'constraint' => '50'],
            'pendidikan'    => ['type' => 'VARCHAR', 'constraint' => '50'],
            'no_hp'         => ['type' => 'VARCHAR', 'constraint' => '15'],
            'pendapatan'    => ['type' => 'VARCHAR', 'constraint' => '50'],
            'status'        => ['type' => 'ENUM', 'constraint' => ['hidup', 'meninggal']],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_ortu', true);
        $this->forge->addForeignKey('id_pendaftar', 'pendaftar', 'id_pendaftar', 'CASCADE', 'CASCADE');
        $this->forge->createTable('data_orang_tua');

        // 5. Tabel Data Pendidikan
        $this->forge->addField([
            'id_pendidikan'               => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_pendaftar'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'status'                      => ['type' => 'ENUM', 'constraint' => ['Pelajar', 'Mahasiswa']], // Sesuai class diagram
            'nama_pt'                     => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true],
            'nisn'                        => ['type' => 'CHAR', 'constraint' => '10'],
            'asal_sekolah'                => ['type' => 'VARCHAR', 'constraint' => '100'],
            'kelas_terakhir'              => ['type' => 'VARCHAR', 'constraint' => '50'],
            'status_siswa'                => ['type' => 'ENUM', 'constraint' => ['Siswa Baru', 'Siswa Pindahan']],
            'jenjang_pendidikan_didaftar' => ['type' => 'VARCHAR', 'constraint' => '50'],
            'nama_sekolah'                => ['type' => 'VARCHAR', 'constraint' => '50'],
            'prestasi'                    => ['type' => 'TEXT', 'null' => true],
            'created_at'                  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'                  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_pendidikan', true);
        $this->forge->addForeignKey('id_pendaftar', 'pendaftar', 'id_pendaftar', 'CASCADE', 'CASCADE');
        $this->forge->createTable('data_pendidikan');

        // 6. Tabel Data Kesehatan
        $this->forge->addField([
            'id_kesehatan'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_pendaftar'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'gol_darah'        => ['type' => 'ENUM', 'constraint' => ['A', 'B', 'AB', 'O', 'No']],
            'riwayat_penyakit' => ['type' => 'TEXT', 'null' => true],
            'alergi'           => ['type' => 'TEXT', 'null' => true],
            'created_at'       => ['type' => 'DATETIME', 'null' => true],
            'updated_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_kesehatan', true);
        $this->forge->addForeignKey('id_pendaftar', 'pendaftar', 'id_pendaftar', 'CASCADE', 'CASCADE');
        $this->forge->createTable('data_kesehatan');

        // 7. Tabel Berkas
        $this->forge->addField([
            'id_berkas'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_pendaftar'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'akta_kelahiran' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'kartu_keluarga' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'ktp_pendaftar'  => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'ktp_ortu'       => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'pas_foto'       => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'ijazah_raport'  => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'status_berkas'  => ['type' => 'ENUM', 'constraint' => ['Menunggu', 'Diterima', 'Ditolak'], 'default' => 'Menunggu'],
            'keterangan'     => ['type' => 'TEXT', 'null' => true],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_berkas', true);
        $this->forge->addForeignKey('id_pendaftar', 'pendaftar', 'id_pendaftar', 'CASCADE', 'CASCADE');
        $this->forge->createTable('berkas');

        // 8. Tabel Pembayaran
        $this->forge->addField([
            'id_pembayaran'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_pendaftar'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'tanggal_bayar'     => ['type' => 'DATE', 'null' => true],
            'bukti_bayar'       => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'status_pembayaran' => ['type' => 'ENUM', 'constraint' => ['Menunggu', 'Diterima', 'Ditolak'], 'default' => 'Menunggu'],
            'keterangan'        => ['type' => 'TEXT', 'null' => true],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_pembayaran', true);
        $this->forge->addForeignKey('id_pendaftar', 'pendaftar', 'id_pendaftar', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');

        // 9. Tabel Jadwal Wawancara
        $this->forge->addField([
            'id_jadwal'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_pendaftar'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'tanggal_wawancara' => ['type' => 'DATETIME', 'null' => true],
            'tautan_video'      => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'status_wawancara'  => ['type' => 'ENUM', 'constraint' => ['Dijadwalkan', 'Selesai'], 'default' => 'Dijadwalkan'],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_jadwal', true);
        $this->forge->addForeignKey('id_pendaftar', 'pendaftar', 'id_pendaftar', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jadwal_wawancara');

        // 10. Tabel Promosi
        $this->forge->addField([
            'id_promosi'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_user'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'type'        => ['type' => 'ENUM', 'constraint' => ['berita', 'prestasi', 'galeri']],
            'judul'       => ['type' => 'VARCHAR', 'constraint' => '200'],
            'deskripsi'   => ['type' => 'TEXT'],
            'path_gambar' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id_promosi', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('promosi');
    }

    public function down()
    {
        // Hapus tabel urut dari anak ke induk biar tidak error FK
        $this->forge->dropTable('promosi');
        $this->forge->dropTable('jadwal_wawancara');
        $this->forge->dropTable('pembayaran');
        $this->forge->dropTable('berkas');
        $this->forge->dropTable('data_kesehatan');
        $this->forge->dropTable('data_pendidikan');
        $this->forge->dropTable('data_orang_tua');
        $this->forge->dropTable('pendaftar');
        $this->forge->dropTable('informasi_psb');
        $this->forge->dropTable('users');
    }
}