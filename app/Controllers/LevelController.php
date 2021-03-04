<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Level;

class LevelController extends Controller
{

	public function __construct()
	{
		$this->model = new Level();
	}

	public function index()
	{
		$data = [
			'main'	=> 'page/level/list',
			'title'	=> 'Data Level Pengguna',
			'list'	=> $this->model->orderBy('id','desc')->findAll(),
			// 'uri'	=> base_url('page/level/data'),
		];

		return view('page/main', $data);
	}

	public function data()
	{
		$data = $this->model->findAll();
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

	public function add()
	{
		$data = [
			'main'	=> 'page/level/form',
			'title'	=> 'Tambah Level Pengguna',
			'action'=> '/page/level/store',
		];
		return view('page/main', $data);
	}

	public function store()
	{
		$data = [
			'level_name'	=> $this->request->getPost('level_name'),
			'level_desc'	=> $this->request->getPost('level_desc'),
			'level_status'	=> $this->request->getPost('level_status'),
		];

		$this->model->save($data);
		session()->setFlashData('notif','Data berhasil ditambah');
		return redirect()->to('/page/level');
	}

	public function update($id = null)
	{
		$data = $this->model->find($id);
		$data = [
			'main'	=> 'page/level/form',
			'title'	=> 'Ubah Level Pengguna : ' . $data['level_name'],
			'edit_data'	=> $data,
			'action'=> '/page/level/edit/'.$id,
		];
		return view('page/main', $data);
	}

	public function edit($id = null)
	{
		$data = [
			'level_name'	=> $this->request->getPost('level_name'),
			'level_desc'	=> $this->request->getPost('level_desc'),
			'level_status'	=> $this->request->getPost('level_status'),
		];

		$this->model->update($id, $data);
		session()->setFlashData('notif','Data berhasil diubah');
		return redirect()->to('/page/level');
	}

	public function delete($id = null)
	{
		$this->model->delete($id);
		session()->setFlashData('notif','Data berhasil dihapus');
		return redirect()->to('/page/level');
	}

}