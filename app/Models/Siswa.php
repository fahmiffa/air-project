<?php namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
	protected $table      = 'students';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['students_nis', 'students_nisn','students_fullname','students_gender','students_born_place','students_born_date','students_email','students_phone','students_address','students_name_of_mother','students_name_of_father','students_parent_phone','class_id','students_status'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getData()
    {
        $query = $this->select('class.class_name, students.*')
        ->join('class','class.id = students.class_id')
        ->orderBy('students.id','desc')
        ->findAll();

        return $query;
    }


    
}
