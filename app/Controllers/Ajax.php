<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Level;
use App\Models\Customer;

class Ajax extends Controller
{

	public function __construct()
	{
		$this->level = new Level();
		$this->customer = new Customer();
		
	}
	public function store_level()
	{
		$data = [
			'level_name'	=> $this->request->getPost('level_name'),
			'level_status'	=> $this->request->getPost('level_status'),
		];

		$insert = $this->level->save($data);
		if ($insert) {
			$res = [
				'status'	=> 201,
				'success'	=> true,
			];

			echo json_encode($res);
		}
	}	

	public function getCustomer($id = null)
	{
		$customer = $this->customer->where('id', $id)->first();
		if (!$customer) {
			$data = [
				'success' 	=> false,
				'data'		=> "",
				'status'	=>200,
			];
		}else{
			$data = [
				'success'	=> true,
				'data'		=> $customer,
				'status'	=> 200,
			];
		}

		echo json_encode($data);
	}

}