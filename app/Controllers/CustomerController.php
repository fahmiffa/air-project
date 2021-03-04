<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Harga;
use App\Models\Customer;

class CustomerController extends Controller
{

	public function __construct()
	{
		$this->model = new Customer();
		$this->price = new Harga();
	}

	public function index()
	{
		$data = [
			'main'	=> 'page/customer/list',
			'title'	=> 'Data Pelanggan',
			'list'	=> $this->model->getData(),
		];
		return view('page/main', $data);
	}

	public function add()
	{
		$data = [
			'main'	=> 'page/customer/form',
			'title'	=> 'Tambah Customer',
			'action'=> '/page/customer/store',
			'price'	=> $this->price->where('price_status', 1)->findAll(),
		];
		return view('page/main', $data);
	}

	public function store()
	{

		$data = [
			'price_id'				=> $this->request->getPost('price_id'),
			'customer_name'			=> $this->request->getPost('customer_name'),
			'customer_telphone'		=> $this->request->getPost('customer_telphone'),
			'customer_pic'			=> $this->request->getPost('customer_pic'),
			'customer_hp'			=> $this->request->getPost('customer_hp'),
			'customer_address'		=> $this->request->getPost('customer_address'),
			'customer_nopol'		=> $this->request->getPost('customer_nopol'),
		];

		$this->model->save($data);
		session()->setFlashData('notif','Data berhasil ditambah');
		return redirect()->to('/page/customer');
	}

	public function update($id = null)
	{
		$data = $this->model->find($id);
		$data = [
			'main'	=> 'page/customer/form',
			'title'	=> 'Ubah  Pelanggan : ' . $data['customer_name'],
			'edit_data'	=> $data,
			'action'=> '/page/customer/edit/'.$id,
			'price'=> $this->price->findAll(),
		];
		return view('page/main', $data);
	}

	public function edit($id = null)
	{
		$data = [
			'price_id'				=> $this->request->getPost('price_id'),
			'customer_name'			=> $this->request->getPost('customer_name'),
			'customer_telphone'		=> $this->request->getPost('customer_telphone'),
			'customer_pic'			=> $this->request->getPost('customer_pic'),
			'customer_hp'			=> $this->request->getPost('customer_hp'),
			'customer_address'		=> $this->request->getPost('customer_address'),
			'customer_nopol'		=> $this->request->getPost('customer_nopol'),
		];
		$this->model->update($id, $data);
		session()->setFlashData('notif','Data berhasil diubah');
		return redirect()->to('/page/customer');
	}

	public function delete($id = null)
	{
		$this->model->delete($id);
		session()->setFlashData('notif','Data berhasil dihapus');
		return redirect()->to('/page/customer');
	}

}