<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Operator;

class OperatorController extends Controller
{

	public function __construct()
	{
		$this->model = new Operator();
		$this->options = ['cost'=> 12];
	}

	public function index()
	{
		$data = [
			'main'	=> 'page/operator/list',
			'title'	=> 'Data Operator',
			'list'	=> $this->model->orderBy('id','desc')->findAll(),
		];
		return view('page/main', $data);
	}

	public function add()
	{
		$data = [
			'main'	=> 'page/operator/form',
			'title'	=> 'Tambah  Operator',
			'action'=> '/page/operator/store',
		];
		return view('page/main', $data);
	}

	public function store()
	{
		$data = [
			'operator_name'		=> $this->request->getPost('operator_name'),
			'operator_username'	=> $this->request->getPost('operator_username'),
			'operator_password'	=> password_hash($this->request->getPost('operator_password'), PASSWORD_BCRYPT, $this->options)
		];

		$this->model->save($data);
        session()->setFlashData('notif','Data berhasil ditambah');
        return redirect()->to('/page/operator');
	}

	public function update($id = null)
	{
		$data = $this->model->find($id);
		$data = [
			'main'	=> 'page/operator/form',
			'title'	=> 'Ubah  Operator : ' . $data['operator_name'],
			'edit_data'	=> $data,
			'action'=> '/page/operator/edit/'.$id,
		];
		return view('page/main', $data);
	}

	public function edit($id = null)
	{
		if ($this->request->getPost('operator_password')) {
			$data = [
				'operator_name'		=> $this->request->getPost('operator_name'),
				'operator_username'	=> $this->request->getPost('operator_username'),
				'operator_password'	=> password_hash($this->request->getPost('operator_password'), PASSWORD_BCRYPT, $this->options)
			];
		}else{
			$data = [
				'operator_name'		=> $this->request->getPost('operator_name'),
				'operator_username'	=> $this->request->getPost('operator_username'),
			];
		}

		$this->model->update($id, $data);
        session()->setFlashData('notif','Data berhasil diubah');
        return redirect()->to('/page/operator');
	}

	public function delete($id = null)
    {
        $this->model->delete($id);
        session()->setFlashData('notif','Data berhasil dihapus');
        return redirect()->to('/page/operator');
    }

}