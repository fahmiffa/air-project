<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Harga;
use App\Models\Jenis;
use App\Models\Customer;

class CustomerController extends Controller
{

	public function __construct()
	{
		$this->model = new Customer();
		$this->price = new Harga();
		$this->jenis = new Jenis();
		helper('form');
		$this->session = \Config\Services::session();
	}

	public function index()
	{
		$data = [
			'main'	=> 'page/customer/list',
			'title'	=> 'Data Pelanggan',
			'list'	=> $this->model->getData(),
		];

		// dd($data['list']);
		return view('page/main', $data);
	}

	public function add()
	{
		$data = [
			'main'	=> 'page/customer/form',
			'title'	=> 'Tambah Customer',
			'action' => '/page/customer/store',
			'price'	=> $this->jenis->findAll(),
		];
		return view('page/main', $data);
	}

	public function store()
	{

		// $data = [
		// 	'price_id'				=> $this->request->getPost('price_id'),
		// 	'customer_name'			=> $this->request->getPost('customer_name'),
		// 	'customer_telphone'		=> $this->request->getPost('customer_telphone'),
		// 	'customer_pic'			=> $this->request->getPost('customer_pic'),
		// 	'customer_hp'			=> $this->request->getPost('customer_hp'),
		// 	'customer_address'		=> $this->request->getPost('customer_address'),
		// 	'customer_nopol'		=> $this->request->getPost('customer_nopol'),
		// ];

		$data = $this->request->getPost();

		$this->model->save($data);
		session()->setFlashData('notif', 'Data berhasil ditambah');
		return redirect()->to('/page/customer');
	}

	public function update($id = null)
	{
		$data = $this->model->find($id);
		$data = [
			'main'	=> 'page/customer/form',
			'title'	=> 'Ubah  Pelanggan : ' . $data['customer_name'],
			'edit_data'	=> $data,
			'action' => '/page/customer/edit/' . $id,
			'price' => $this->jenis->findAll(),
		];
		return view('page/main', $data);
	}

	public function edit($id = null)
	{
		$data = [
			'jenis_id'				=> $this->request->getPost('jenis_id'),
			'customer_name'			=> $this->request->getPost('customer_name'),
			'customer_telphone'		=> $this->request->getPost('customer_telphone'),
			'customer_pic'			=> $this->request->getPost('customer_pic'),
			'customer_hp'			=> $this->request->getPost('customer_hp'),
			'customer_address'		=> $this->request->getPost('customer_address'),
			'customer_nopol'		=> $this->request->getPost('customer_nopol'),
		];
		$this->model->update($id, $data);
		session()->setFlashData('notif', 'Data berhasil diubah');
		return redirect()->to('/page/customer');
	}

	public function delete($id = null)
	{
		$this->model->delete($id);
		session()->setFlashData('notif', 'Data berhasil dihapus');
		return redirect()->to('/page/customer');
	}

	public function csv()
	{
		$this->valid =  \Config\Services::validation();

		$data = array('success' => false, 'messages' => array());
		$this->valid->setRule('csv', 'CSV', 'uploaded[csv]|ext_in[csv,csv]');

		$val = $this->valid->withRequest($this->request);
		if ($val->run() == FALSE) {
			foreach ($_FILES as $key => $value) {
				$data['messages'][$key] = $this->valid->showError($key, 'errtemp');
			}
		} else {
			$df = ['jenis_id', 'customer_name', 'customer_telephone', 'customer_hp', 'customer_nopol', 'customer_address', 'customer_pic'];
			$length = count($df);
			$data['success'] = true;
			$id = 'al' . rand(10, 100);
			$ff = $this->request->getFile('csv');
			$csf = array_map('str_getcsv', file($ff));
			$key = array_slice($csf, 0, 1);
			$n = count($key[0]);
			$dif = count(array_diff($df, $key[0]));



			if ($n == $length && $dif == 0) {
				$key = array_slice($csf, 0, 1);
				$da = array_slice($csf, 1);
				$name = array_column($da, 0);
				$al = array_column($da, 2);
				$hp = array_column($da, 3);

				if (in_array("", $hp, TRUE)) {
					$this->session->setFlashdata(
						'info',
						"<div class='alert alert-danger alert-dismissible' role='alert'>
					// <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					<strong>Gagal</strong> value import Nomor hp harus diisi  </div>"
					);
				} else if (in_array("", $al, TRUE)) {
					$this->session->setFlashdata(
						'info',
						"<div class='alert alert-danger alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<strong>Gagal</strong> value import Alamat harus diisi  </div>"
					);
				} else if (in_array("", $name, TRUE)) {
					$this->session->setFlashdata(
						'info',
						"<div class='alert alert-danger alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<strong>Gagal</strong> value import nama harus diisi  </div>"
					);
				} else {
					$ci = ['deleted_at'];
					$keyf = array_merge($key[0], $ci);
					$n = count($da);
					for ($i = 0; $i < $n; $i++) {
						$f[$i] = [7 => null];
						$dataf = array_replace_recursive($da, $f);
						$c[$i] = array_combine($keyf, $dataf[$i]);

						$this->model->save($c[$i]);
					}

					$this->session->setFlashdata(
						'info',
						"<div class='alert alert-success alert-dismissible' role='alert'>
					   <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					   <strong>Berhasil</strong> Import data </div>"
					);
				}
			} else {
				$this->session->setFlashdata(
					'info',
					"<div class='alert alert-danger alert-dismissible' role='alert'>
				   <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				   <strong>Gagal</strong> value import data tidak valid . </div>"
				);
			}


			$data['redirect'] = base_url('page/customer');
		}
		echo json_encode($data);
	}
}
