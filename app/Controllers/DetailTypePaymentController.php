<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Detail_type_payment;
use App\Models\Period;
use App\Models\Type_payment;
use App\Models\Kelas;
use App\Models\Spp_bill;

class DetailTypePaymentController extends Controller
{

	public function __construct()
	{
		$this->model = new Detail_type_payment();
		$this->period = new Period();
		$this->type_payment = new Type_payment();
		$this->kelas = new Kelas();
		$this->spp_bill = new Spp_bill();
	}

	public function index()
	{
		$data = [
			'main'	=> 'page/detail_jenis_pembayaran/list',
			'title'	=> 'Data Detail Jenis Pembayaran',
			'list'	=> $this->model->getData(),
		];
		// print_r($data['list']); die;
		return view('page/main', $data);
	}

	public function add()
	{
		$data = [
			'main'	=> 'page/detail_jenis_pembayaran/form',
			'title'	=> 'Tambah  Detail Jenis Pembayaran',
			'action'=> '/admin/detail_jenis_pembayaran/store',
			'period'=> $this->period->where('period_status', 1)->findAll(),
			'type_payment'=> $this->type_payment->findAll(),
		];
		return view('page/main', $data);
	}

	public function store()
	{
		$data = [
			'period_id'				=> $this->request->getPost('period_id'),
			'payment_type_id'		=> $this->request->getPost('payment_type_id'),
			'detail_payment_type'	=> $this->request->getPost('detail_payment_type'),
		];
		$this->model->save($data);
		session()->setFlashData('notif','Data berhasil ditambah');
		return redirect()->to('/admin/detail_jenis_pembayaran');
	}

	public function update($id = null)
	{
		$data = $this->model->find($id);
		$data = [
			'main'	=> 'page/detail_jenis_pembayaran/form',
			'title'	=> 'Ubah  Detail Jenis Pembayaran : ',
			'edit_data'	=> $data,
			'action'=> '/admin/detail_jenis_pembayaran/edit/'.$id,
			'type_payment'=> $this->type_payment->findAll(),
			'period'=> $this->period->where('period_status', 1)->findAll(),
		];
		return view('page/main', $data);
	}

	public function edit($id = null)
	{
		$data = [
			'period_id'				=> $this->request->getPost('period_id'),
			'payment_type_id'		=> $this->request->getPost('payment_type_id'),
			'detail_payment_type'	=> $this->request->getPost('detail_payment_type'),
		];

		$this->model->update($id, $data);
		session()->setFlashData('notif','Data berhasil diubah');
		return redirect()->to('/admin/detail_jenis_pembayaran');
	}

	public function delete($id = null)
	{
		$this->model->delete($id);
		session()->setFlashData('notif','Data berhasil dihapus');
		return redirect()->to('/admin/detail_jenis_pembayaran');
	}

	public function monthly($id = null)
	{
		$spp_bill = [];
		$data = $this->model->find($id);
		$period = $this->period->find($data['period_id']);
		$kelas = new Kelas();
		if (!empty($this->request->getGet('kelas'))) {
			$class_id = $this->request->getGet('kelas');
			$spp_bill = $this->spp_bill->getDataByClassId($class_id);
		}else{
			// $spp_bill = $this->spp_bill->getData($id);
			$spp_bill = [];
		}
		$data = [
			'main'	=> 'page/detail_jenis_pembayaran/monthly_payment_form',
			'title'	=> 'Tarif Pembayaran T.A  ' . $period['period_start']."/".$period['period_end'],
			'edit_data'	=> $data,
			'period'=> $period,
			'kelas'	=> $kelas->findAll(),
			'type_payment'=> $this->type_payment->findAll(),
			'list_spp'	  => $spp_bill
		];
		return view('page/main', $data);
	}


	public function add_payment_class($id = null)
	{
		$data = $this->model->find($id);
		$period = $this->period->find($data['period_id']);
		$type_payment = $this->type_payment->find($data['payment_type_id']);
		// untuk mengetahui data sudah ada apa blm di table spp_bill
		$data = [
			'main'	=> 'page/detail_jenis_pembayaran/add_payment_class',
			'title'	=> 'Tambah Tarif Pembayaran T.A  ' . $period['period_start']."/".$period['period_end'],
			'edit_data'	=> $data,
			'period'=> $period,
			'kelas'	=> $this->kelas->findAll(),
			'type_payment'=> $type_payment,
		];
		return view('page/main', $data);
	}

	public function store_payment_class($id = null)
	{	
		$data = [
			'class_id'					=> $this->request->getPost('class_id'),
			'detail_type_payment_id'	=> $id,
			'jumlah'					=> $this->request->getPost('jumlah'),
		];	
		// print_r($data); die;
		if ($this->request->getPost('spp_bill_id')) {
			$this->spp_bill->update($id, $data);
			session()->setFlashData('notif','Data berhasil diubah');
			return redirect()->to($_SERVER['HTTP_REFERER']);
		}else{
			// validasi duplicate class
			$validasi_class = $this->spp_bill->getClassBySppBill($data['class_id']);
			if ($validasi_class) {
				$kelas  =  $this->kelas->where('id', $data['class_id'])->first();
				session()->setFlashData('warning','Kelas ' . $kelas['class_name'] . ' sudah ada');
				return redirect()->back()->withInput();
			}else{
				$this->spp_bill->insert($data);
				session()->setFlashData('notif','Data berhasil ditambah');
				return redirect()->to("/admin/detail_jenis_pembayaran/monthly/".$id);

			}

		}		

	}

	public function delete_bill_monthly($id)
	{
		$this->spp_bill->delete($id);
		session()->setFlashData('notif','Data berhasil dihapus');
		return redirect()->to($_SERVER['HTTP_REFERER']);
	}


	public function add_payment_student($id = null)
	{
		$data = $this->model->find($id);
		$period = $this->period->find($data['period_id']);
		$type_payment = $this->type_payment->find($data['payment_type_id']);
		
		$data = [
			'main'	=> 'page/detail_jenis_pembayaran/add_payment_student',
			'title'	=> 'Tambah Tarif Pembayaran T.A  ' . $period['period_start']."/".$period['period_end'],
			'edit_data'	=> $data,
			'period'=> $period,
			'kelas'	=> $this->kelas->findAll(),
			'type_payment'=> $type_payment,
		];
		return view('page/main', $data);
	}

	public function free_payment($id = null)
	{
		$spp_bill = [];
		$data = $this->model->find($id);
		$period = $this->period->find($data['period_id']);
		$kelas = new Kelas();
		if (!empty($this->request->getGet('kelas'))) {
			$class_id = $this->request->getGet('kelas');
			$spp_bill = $this->spp_bill->getDataByClassId($class_id);
		}else{
			// $spp_bill = $this->spp_bill->getData($id);
			$spp_bill = [];
		}
		$data = [
			'main'	=> 'page/detail_jenis_pembayaran/free_payment_form',
			'title'	=> 'Tarif Pembayaran T.A  ' . $period['period_start']."/".$period['period_end'],
			'edit_data'	=> $data,
			'period'=> $period,
			'kelas'	=> $kelas->findAll(),
			'type_payment'=> $this->type_payment->findAll(),
			'list_spp'	  => $spp_bill
		];
		return view('page/main', $data);
	}

}