<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Buku';
    protected $primaryKey       = 'id_buku';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_buku','nama_buku','judul_buku','pengarang','penerbit','tahun'];

   
}