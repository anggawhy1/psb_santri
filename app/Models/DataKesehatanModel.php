<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKesehatanModel extends Model
{
    protected $table            = 'data_kesehatan';
    protected $primaryKey       = 'id_kesehatan';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    
    protected $allowedFields    = [
        'id_pendaftar', 'gol_darah', 'riwayat_penyakit', 'alergi'
    ];
}