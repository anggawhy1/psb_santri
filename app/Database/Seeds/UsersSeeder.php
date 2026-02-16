<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lengkap' => 'Administrator Utama',
                'username'     => 'admin',
                'password'     => password_hash('admin123', PASSWORD_DEFAULT),
                'role'         => 'admin',
                'created_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nama_lengkap' => 'Bapak Pimpinan',
                'username'     => 'pimpinan',
                'password'     => password_hash('pimpinan123', PASSWORD_DEFAULT),
                'role'         => 'pimpinan',
                'created_at'   => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}