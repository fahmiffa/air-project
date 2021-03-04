<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Period;

class PeriodController extends Controller
{

	public function __construct()
	{
		$this->model = new Period();
	}

	public function index()
	{
		$data = [
			'main'	=> 'page/periode/list',
			'title'	=> 'Tahun Ajaran',
			'list'	=> $this->model->orderBy('id','desc')->findAll(),
		];
		return view('page/main', $data);
	}

	public function add()
	{
		$data = [
			'main'	=> 'page/periode/form',
			'title'	=> 'Tambah Tahun Ajaran',
			'action'=> '/admin/period/store',
		];
		return view('page/main', $data);
	}

	public function store()
	{
		$data = [
			'period_start'	=> $this->request->getPost('period_start'),
			'period_end'	=> $this->request->getPost('period_end'),
			'period_status'	=> $this->request->getPost('period_status'),
		];

		$this->model->save($data);
        session()->setFlashData('notif','Data berhasil ditambah');
        return redirect()->to('/admin/period');
	}

	public function update($id = null)
	{
		$data = $this->model->find($id);
		$data = [
			'main'	=> 'page/periode/form',
			'title'	=> 'Ubah Tahun Ajaran : ' . $data['period_start'] . "-" . $data['period_end'],
			'edit_data'	=> $data,
			'action'=> '/admin/period/edit/'.$id,
		];
		return view('page/main', $data);
	}

	public function edit($id = null)
	{
		$data = [
			'period_start'	=> $this->request->getPost('period_start'),
			'period_end'	=> $this->request->getPost('period_end'),
			'period_status'	=> $this->request->getPost('period_status'),
		];

		$this->model->update($id, $data);
        session()->setFlashData('notif','Data berhasil diubah');
        return redirect()->to('/admin/period');
	}

	public function delete($id = null)
    {
        $this->model->delete($id);
        session()->setFlashData('notif','Data berhasil dihapus');
        return redirect()->to('/admin/period');
    }

}