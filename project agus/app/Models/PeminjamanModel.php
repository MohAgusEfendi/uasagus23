<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'id_peminjaman';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_peminjaman','nama_pemnjam','tgl_peminjaman','tgl_kem'];

   
}
