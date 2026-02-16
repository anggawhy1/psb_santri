<?php

namespace App\Models;

use CodeIgniter\Model;

class PromosiModel extends Model
{
    protected $table            = 'promosi';
    protected $primaryKey       = 'id_promosi';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    
    protected $allowedFields    = [
        'id_user', 'type', 'judul', 'deskripsi', 'path_gambar'
    ];
}