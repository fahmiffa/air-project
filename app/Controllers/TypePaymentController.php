<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Type_payment;

class TypePaymentController extends Controller
{

	public function __construct()
	{
		$this->model = new Type_payment();
	}

	public function index()
	{
		$data = [
			'main'	=> 'page/jenis_pembayaran/list',
			'title'	=> 'Data Jenis Pembayaran',
			'list'	=> $this->model->orderBy('id','desc')->findAll(),
		];
		return view('page/main', $data);
	}

	public function add()
	{
		$data = [
			'main'	=> 'page/jenis_pembayaran/form',
			'title'	=> 'Tambah  Jenis Pembayaran',
			'action'=> '/admin/jenis_pembayaran/store',
		];
		return view('page/main', $data);
	}

	public function store()
	{
		$data = [
			'payment_type_name'	=> $this->request->getPost('payment_type_name'),
			'payment_type_desc'	=> $this->request->getPost('payment_type_desc'),
		];

		$this->model->save($data);
        session()->setFlashData('notif','Data berhasil ditambah');
        return redirect()->to('/admin/jenis_pembayaran');
	}

	public function update($id = null)
	{
		$data = $this->model->find($id);
		$data = [
			'main'	=> 'page/jenis_pembayaran/form',
			'title'	=> 'Ubah  Jenis Pembayaran : ' . $data['payment_type_name'],
			'edit_data'	=> $data,
			'action'=> '/admin/jenis_pembayaran/edit/'.$id,
		];
		return view('page/main', $data);
	}

	public function edit($id = null)
	{
		$data = [
			'payment_type_name'	=> $this->request->getPost('payment_type_name'),
			'payment_type_desc'	=> $this->request->getPost('payment_type_desc'),
		];

		$this->model->update($id, $data);
        session()->setFlashData('notif','Data berhasil diubah');
        return redirect()->to('/admin/jenis_pembayaran');
	}

	public function delete($id = null)
    {
        $this->model->delete($id);
        session()->setFlashData('notif','Data berhasil dihapus');
        return redirect()->to('/admin/jenis_pembayaran');
    }

}