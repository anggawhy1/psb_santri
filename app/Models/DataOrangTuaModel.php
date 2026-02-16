<?php

namespace App\Models;

use CodeIgniter\Model;

class DataOrangTuaModel extends Model
{
    protected $table            = 'data_orang_tua';
    protected $primaryKey       = 'id_ortu';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    
    protected $allowedFields    = [
        'id_pendaftar', 'hubungan', 'nama', 'pekerjaan', 
        'pendidikan', 'no_hp', 'pendapatan', 'status'
    ];
}