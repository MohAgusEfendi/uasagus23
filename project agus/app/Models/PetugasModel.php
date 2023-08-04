<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'petugas';
    protected $primaryKey       = 'id_nama';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_nama','nama','asrama','kelas',];

   
}
