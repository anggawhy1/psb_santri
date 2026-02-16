<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalWawancaraModel extends Model
{
    protected $table            = 'jadwal_wawancara';
    protected $primaryKey       = 'id_jadwal';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    
    protected $allowedFields    = [
        'id_pendaftar', 'tanggal_wawancara', 'tautan_video', 'status_wawancara'
    ];
}