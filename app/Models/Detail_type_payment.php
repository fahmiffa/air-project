<?php namespace App\Models;

use CodeIgniter\Model;

class Detail_type_payment extends Model
{
	protected $table      = 'detail_type_payment';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['payment_type_id','period_id','detail_payment_type','created_at','updated_at','deleted_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getData($id = null)
    {
        return $this->select('period.period_start, period.period_end, period.period_status, type_payment.payment_type_name, detail_type_payment.*')
        ->join('period','period.id = detail_type_payment.period_id')
        ->join('type_payment','type_payment.id = detail_type_payment.payment_type_id')
        ->orderBy('detail_type_payment.id','desc')
        ->findAll();
    
    }



    
}
