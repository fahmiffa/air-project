<?php

namespace App\Models;

use CodeIgniter\Model;

class Customer extends Model
{
    protected $table      = 'customer';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['jenis_id', 'customer_name', 'customer_telphone', 'customer_pic', 'customer_address', 'customer_hp', 'customer_nopol'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;



    public function getData()
    {
        $query = $this->select('jenis.jenis_customer, customer.*')
            ->join('jenis', 'jenis.id = customer.jenis_id')
            ->orderBy('customer.id', 'desc')
            ->findAll();

        return $query;
    }


    public function getWhere($id)
    {
        $query = $this->select('*')
            ->join('jenis', 'jenis.id = customer.jenis_id')
            ->orderBy('customer.id', 'desc')
            ->find($id);

        return $query;
    }
}
