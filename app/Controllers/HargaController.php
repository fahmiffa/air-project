<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Harga;

class HargaController extends Controller
{

	public function __construct()
	{
		$this->model = new Harga();
	}

	public function index()
	{
		$data = [
			'main'	=> 'page/harga/list',
			'title'	=> 'Data Harga',
			'list'	=> $this->model->orderBy('id','desc')->findAll(),
		];
		return view('page/main', $data);
	}

	public function add()
	{
		$data = [
			'main'	=> 'page/harga/form',
			'title'	=> 'Tambah Harga',
			'action'=> '/page/harga/store',
		];
		return view('page/main', $data);
	}

	public function store()
	{
		$data = [
			'price_value'	=> $this->request->getPost('price_value'),
			'price_type'	=> $this->request->getPost('price_type'),
			'price_status'	=> $this->request->getPost('price_status'),
		];

		$this->model->save($data);
        session()->setFlashData('notif','Data berhasil ditambah');
        return redirect()->to('/page/harga');
	}

	public function update($id = null)
	{
		$data = $this->model->find($id);
		$data = [
			'main'	=> 'page/harga/form',
			'title'	=> 'Ubah Tipe Harga : ' . $data['price_type'],
			'edit_data'	=> $data,
			'action'=> '/page/harga/edit/'.$id,
		];
		return view('page/main', $data);
	}

	public function edit($id = null)
	{
		$data = [
			'price_value'	=> $this->request->getPost('price_value'),
			'price_type'	=> $this->request->getPost('price_type'),
			'price_status'	=> $this->request->getPost('price_status'),
		];

		$this->model->update($id, $data);
        session()->setFlashData('notif','Data berhasil diubah');
        return redirect()->to('/page/harga');
	}

	public function delete($id = null)
    {
        $this->model->delete($id);
        session()->setFlashData('notif','Data berhasil dihapus');
        return redirect()->to('/page/harga');
    }

}