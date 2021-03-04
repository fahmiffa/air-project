<?php namespace App\Models;

use CodeIgniter\Model;

class Level extends Model
{
	protected $table      = 'level';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['level_name','level_desc','level_status','created_at','updated_at','deleted_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getData()
    {
        $data = $this->findAll();
        if (!$data) {
            $res = [
                'data'      => '',
                'success'   => false,
                'status'    => 200,
            ];
        }else{
            $no = 1;
            $row_data = [];
            foreach ($data as $key => $value) {
                $sub_data = [];
                $sub_data[] = $no++;
                $sub_data[] = $value['level_name'];
                $sub_data[] = ($value['level_status'] == 1)?'<span class="badge badge-success">Aktif</span>':'<span class="badge badge-warning">Tidak Aktif</span>';
                $sub_data[] =  "";
                $row_data[] = $sub_data;
            }
            $res = [
                'data'      => $row_data,
                'status'    => 200,
                'success'   => true,
            ];


        }
        print_r(json_encode($res));
    }

    public function tes()
    {
        $fetch_data = $this->model->findAll();
        $data = array();
        $no = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $no++;
            $sub_array[] = $row->price_type;
            $sub_array[] = $row->cost;
            $sub_array[] = $row->price_unit;
            $sub_array[] = '<button type="button" uri="' . base_url('harga/dcommon') . '"  name="delete" id="' . $row->id . '" class="btn btn-danger btn-xs del"><i class="fa fa-trash"></i></button>&nbsp;
            <a href="' . base_url('harga/edit/' . $row->id) . '"  class="btn btn-primary btn-xs ekar"><i class="fa fa-edit"></i></a>';
            $data[] = $sub_array;
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }


    
}
