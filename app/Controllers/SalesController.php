<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Sales;
use App\Models\Customer;
use Dompdf\Dompdf;
use Dompdf\Options;

class SalesController extends Controller
{

	public function __construct()
	{
		$this->model 	= new Sales();
		$this->customer = new Customer();
		$this->form_validation = \Config\Services::validation();
	}

	public function index()
	{
		$data = [
			'main'	=> 'page/sales/list',
			'title'	=> 'Data Penjualan',
			'list'	=> [],
		];
		return view('page/main', $data);
	}

	public function add()
	{
		$data = [
			'main'	=> 'page/sales/add',
			'title'	=> 'Tambah Penjualan',
			'customer'=> $this->customer->findAll(),
			'no_urut' => $this->model->nourut(),
		];
		return view('page/main', $data);
	}

	public function store()
	{

		$data = [
			'students_fullname'			=> $this->request->getPost('students_fullname'),
			'students_phone'		=> $this->request->getPost('students_phone'),
			'students_gender'		=> $this->request->getPost('students_gender'),
			'students_born_place'	=> $this->request->getPost('students_born_place'),
			'students_born_date'	=> $this->request->getPost('students_born_date'),
			'students_email'	=> $this->request->getPost('students_email'),
			'students_phone'	=> $this->request->getPost('students_phone'),
			'students_address'	=> $this->request->getPost('students_address'),
			'class_id'				=> $this->request->getPost('class_id'),
			'students_nis'			=> $this->request->getPost('students_nis'),
			'students_nisn'			=> $this->request->getPost('students_nisn'),
			'students_name_of_mother'		=> $this->request->getPost('students_name_of_mother'),
			'students_name_of_father'		=> $this->request->getPost('students_name_of_father'),
			'students_parent_phone'		=> $this->request->getPost('students_parent_phone'),
			'students_status'		=> $this->request->getPost('students_status'),
		];
		if ($this->form_validation->run($data, 'siswa') == FALSE ) {
			// print_r($this->form_validation->getErrors()); die;
			session()->setFlashdata('error_validation', ['class'=> 'danger', 'strong'=>'Upss!!','message'=>  $this->form_validation->getErrors()]);
			return redirect()->back()->withInput();
		}else{
			$this->model->save($data);
			session()->setFlashData('notif','Data berhasil ditambah');
			return redirect()->to('/admin/siswa');

		}
		



	}

	public function update($id = null)
	{
		$data = $this->model->find($id);
		$data = [
			'main'	=> 'page/siswa/edit',
			'title'	=> 'Ubah  Siswa : ' . $data['students_fullname'],
			'edit_data'	=> $data,
			'kelas'=> $this->kelas->findAll(),
		];
		return view('page/main', $data);
	}

	public function edit($id = null)
	{
		$data = [
			'students_fullname'			=> $this->request->getPost('students_fullname'),
			'students_phone'		=> $this->request->getPost('students_phone'),
			'students_gender'		=> $this->request->getPost('students_gender'),
			'students_born_place'	=> $this->request->getPost('students_born_place'),
			'students_born_date'	=> $this->request->getPost('students_born_date'),
			'students_email'	=> $this->request->getPost('students_email'),
			'students_phone'	=> $this->request->getPost('students_phone'),
			'students_address'	=> $this->request->getPost('students_address'),
			'class_id'				=> $this->request->getPost('class_id'),
			'students_nis'			=> $this->request->getPost('students_nis'),
			'students_nisn'			=> $this->request->getPost('students_nisn'),
			'students_name_of_mother'		=> $this->request->getPost('students_name_of_mother'),
			'students_name_of_father'		=> $this->request->getPost('students_name_of_father'),
			'students_parent_phone'		=> $this->request->getPost('students_parent_phone'),
			'students_status'		=> $this->request->getPost('students_status'),
		];

		if ($this->form_validation->run($data, 'siswa') == FALSE ) {
			// print_r($this->form_validation->getErrors()); die;
			session()->setFlashdata('error_validation', ['class'=> 'danger', 'strong'=>'Upss!!','message'=>  $this->form_validation->getErrors()]);
			return redirect()->back()->withInput();
		}else{
			
			$this->model->update($id, $this->request->getPost());
			session()->setFlashData('notif','Data berhasil diubah');
			return redirect()->to('/admin/siswa');

		}

	}

	public function delete($id = null)
	{
		$this->model->delete($id);
		session()->setFlashData('notif','Data berhasil dihapus');
		return redirect()->to('/admin/siswa');
	}

	public function detail($id = null)
	{
		$data = $this->model->find($id);
		$data = [
			'main'	=> 'page/siswa/detail',
			'title'	=> 'Detail  Siswa : ' . $data['students_fullname'],
			'detail'	=> $data,
			'kelas'=> $this->kelas->findAll(),
		];
		return view('page/main', $data);
	}


	public function import()
	{
		$data = [
			'main'	=> 'page/siswa/import',
			'title'	=> 'Import  Siswa',
		];
		return view('page/main', $data);
	}

	public function print($id = null)
	{
		if ($id !== null) {
			$data = $this->model->find($id);
			$dompdf = new Dompdf(); 
			$options = new Options(); 
			$options->set('defaultFont','Arial');

			$data = [
				'title'	=> 'Data Siswa',
				'data'	=> $data,
			];
			$dompdf->loadHtml(view('page/print_view', $data));
			$dompdf->setPaper('A4', 'potrait');
			$dompdf->render();
			$dompdf->stream('cetak_siswa.pdf', array('Attachment'=>false));
		}
	}

	public function cek_print()
	{
		return view('page/print_view');
	}
}