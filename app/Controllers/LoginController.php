<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User;

class LoginController extends Controller
{

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		$this->user = new User(); 
	}
	public function index()
	{
		return view('page/login');
	}

	public function login_action()
	{
		$dataJson = [];
		$data = [
			'username'		=> $this->request->getPost('username'),
			'password'	=> $this->request->getPost('password'),
		];

		$dataUser = $this->user->getUsername($data['username']);
		if (!$dataUser) {
			$dataJson = [
				'data'		=> "",
				'success'	=> false,
				'status'	=> 200,
				"message"	=> "failed",
			];
		}else{
			if (password_verify($data['password'], $dataUser['password'])) {
				session()->set([
					'LOGGED_IN'	=> TRUE,
					'FULLNAME'	=> $dataUser['fullname'],
					'CREATED_AT'=> date("d m Y", $dataUser['created_at']),
					'USER_ID'	=> $dataUser['id'],
					'ROLE_ID'	=> $dataUser['level_id']
				]);
				$dataJson = [
					'data'		=> $dataUser,
					'success'	=> true,
					'status'	=> 200,
					'message'	=> "Yeay Berhasil"
					
				];
			}
		}
		print_r(json_encode($dataJson));


	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/login');
	}
}