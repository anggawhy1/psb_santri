<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkasModel extends Model
{
    protected $table            = 'berkas';
    protected $primaryKey       = 'id_berkas';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    
    protected $allowedFields    = [
        'id_pendaftar', 'akta_kelahiran', 'kartu_keluarga', 
        'ktp_pendaftar', 'ktp_ortu', 'pas_foto', 
        'ijazah_raport', 'status_berkas', 'keterangan'
    ];
}