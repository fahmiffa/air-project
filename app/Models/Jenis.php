<?php

namespace App\Models;

use CodeIgniter\Model;

class Jenis extends Model
{
    protected $table      = 'jenis';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['jenis_value', 'jenis_customer', 'created_at', 'updated_at', 'deleted_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
