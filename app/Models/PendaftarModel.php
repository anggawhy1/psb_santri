<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $table            = 'pendaftar';
    protected $primaryKey       = 'id_pendaftar';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useTimestamps    = true; 

    protected $allowedFields    = [
        'email', 'no_registrasi', 'nama_lengkap', 'jenis_kelamin',
        'tempat_lahir', 'tanggal_lahir', 'nik', 'no_kk', 
        'anak_ke', 'dari_bersaudara', 'alamat_lengkap', 'no_hp', 
        'program_pilihan', 'status_akhir', 'keterangan'
    ];
}