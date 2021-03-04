<?php namespace App\Models;

use CodeIgniter\Model;

class Customer extends Model
{
	protected $table      = 'customer';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['price_id', 'customer_name','customer_telphone','customer_pic','customer_address','customer_hp','customer_nopol'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;



    public function getData()
    {
        $query = $this->select('price.price_type, customer.*')
        ->join('price','price.id = customer.price_id')
        ->orderBy('customer.id','desc')
        ->findAll();

        return $query;
    }


    
}
