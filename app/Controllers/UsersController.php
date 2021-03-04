<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User;
use App\Models\Level;

class UsersController extends Controller
{

	public function __construct()
	{
		$this->model = new User();
		$this->level = new Level();
		$this->options = ['cost'=> 12];
	}

	public function index()
	{
		$data = [
			'main'	=> 'page/user/list',
			'title'	=> 'Data Pengguna',
			'list'	=> $this->model->getData(),
		];
		return view('page/main', $data);
	}

	public function add()
	{
		$data = [
			'main'	=> 'page/user/form',
			'title'	=> 'Tambah Pengguna',
			'action'=> '/page/user/store',
			'levels'=> $this->level->where('level_status', 1)->findAll(),
		];
		return view('page/main', $data);
	}

	public function store()
	{

		$data = [
			'level_id'	=> $this->request->getPost('level_id'),
			'fullname'	=> $this->request->getPost('fullname'),
			'email'		=> $this->request->getPost('email'),
			'password'	=> password_hash($this->request->getPost('password'), PASSWORD_BCRYPT, $this->options),
		];

		$this->model->save($data);
		session()->setFlashData('notif','Data berhasil ditambah');
		return redirect()->to('/page/user');
	}

	public function update($id = null)
	{
		$data = $this->model->find($id);
		$data = [
			'main'	=> 'page/user/form',
			'title'	=> 'Ubah  Pengguna : ' . $data['fullname'],
			'edit_data'	=> $data,
			'action'=> '/page/user/edit/'.$id,
			'levels'=> $this->level->findAll(),
		];
		return view('page/main', $data);
	}

	public function edit($id = null)
	{
		$password = [];
		// print_r($data); die;
		if ($this->request->getPost('password')) {
			$data = [
				'level_id'	=> $this->request->getPost('level_id'),
				'fullname'	=> $this->request->getPost('fullname'),
				'email'		=> $this->request->getPost('email'),
				'password'	=> password_hash($this->request->getPost('password'), PASSWORD_BCRYPT, $this->options),
			];

		}else{
			$data = [
				'level_id'	=> $this->request->getPost('level_id'),
				'fullname'	=> $this->request->getPost('fullname'),
				'email'		=> $this->request->getPost('email'),
			];
		}
		$this->model->update($id, $this->request->getPost());
		session()->setFlashData('notif','Data berhasil diubah');
		return redirect()->to('/page/user');
	}

	public function delete($id = null)
	{
		$this->model->delete($id);
		session()->setFlashData('notif','Data berhasil dihapus');
		return redirect()->to('/page/user');
	}

}