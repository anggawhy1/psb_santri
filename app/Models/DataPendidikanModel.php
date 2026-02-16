<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPendidikanModel extends Model
{
    protected $table            = 'data_pendidikan';
    protected $primaryKey       = 'id_pendidikan';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    
    protected $allowedFields    = [
        'id_pendaftar', 'status', 'nama_pt', 'nisn', 
        'asal_sekolah', 'kelas_terakhir', 'status_siswa', 
        'jenjang_pendidikan_didaftar', 'nama_sekolah', 'prestasi'
    ];
}