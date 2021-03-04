<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User;

class DashboardController extends Controller
{

	public function index()
	{
		$data = [
			'main'	=> 'page/dashboard/list',
			'title'	=> 'Selamat Datang',
		];
		return view('page/main', $data);
	}

	public function add()
	{
		return "Halooo add";
	}

}