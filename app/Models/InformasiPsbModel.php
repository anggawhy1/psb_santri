<?php

namespace App\Models;

use CodeIgniter\Model;

class InformasiPsbModel extends Model
{
    protected $table            = 'informasi_psb';
    protected $primaryKey       = 'id_informasi';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    
    protected $allowedFields    = [
        'judul', 'isi'
    ];
}