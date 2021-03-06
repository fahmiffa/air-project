<?php namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
	protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['level_id', 'fullname','email','password'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function getUsername($username)
    {

        return $this->where('username', $username)->first();
        
    }

    public function getEmail($email)
    {

        return $this->where('email', $email)->first();
        
    }

    public function getData()
    {
        $query = $this->select('level.level_name, users.*')
        ->join('level','level.id = users.level_id')
        ->orderBy('users.id','desc')
        ->findAll();

        return $query;
    }


    
}
