<?php namespace App\Models;

use CodeIgniter\Model;

class Spp_bill extends Model
{
  protected $table      = 'spp_bill';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = true;

  protected $allowedFields = ['detail_type_payment_id','class_id','jumlah','created_at','updated_at','deleted_at'];

  protected $useTimestamps = false;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules    = [];
  protected $validationMessages = [];
  protected $skipValidation     = false;

  // public function getData($detail_type_payment_id)
  // {
  //   return $this->select('type_payment.payment_type_name, detail_type_payment.detail_payment_type, spp_bill.*, class.class_name')
  //   ->join('class','class.id = spp_bill.class_id','left')
  //   ->join('detail_type_payment','detail_type_payment.id = spp_bill.detail_type_payment_id')
  //   ->join('type_payment','type_payment.id = detail_type_payment.id')
  //   ->where('detail_payment_type','bulanan')
  //   ->where('spp_bill.detail_type_payment_id',$detail_type_payment_id)
  //   ->findAll();
  // }

  public function getDataByClassId($class_id)
  {
    return $this->select('type_payment.payment_type_name, detail_type_payment.detail_payment_type, spp_bill.*, class.class_name')
    ->join('class','class.id = spp_bill.class_id','left')
    ->join('detail_type_payment','detail_type_payment.id = spp_bill.detail_type_payment_id')
    ->join('type_payment','type_payment.id = detail_type_payment.id')
    ->where('detail_payment_type','bulanan')
    ->where('spp_bill.class_id', $class_id)
    ->findAll();
  }
  public function getClassBySppBill($class_id = null)
  {
    return $this->select('class_id')->where('class_id', $class_id)->first();
  }




}
