<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
		'errtemp' => '_error_temp',
		'ertemp' => 'errtemp'
	];

	public $signin  = [
		'email'		=>  'required|valid_email',
		'password'	=> 'required|min_length[6]'
	];

	public $signin_errors = [
		'email'		=> [
			'required'		=> 'Email tidak boleh kosong',
			'valid_email'	=> 'Email anda tidak valid'
		],

		'password'	=> [
			'required'		=> 'Password tidak boleh kosong',
			'min_length'	=> 'Panjang password minimal 6 huruf',
		],
	];

	public $siswa = [
		'students_fullname'		=> 'required',
		'students_phone'	=> 'required|numeric|min_length[12]',
		'class_id'			=> 'required',
		'students_nis'		=> 'required',
		'students_nisn'		=> 'required',
		'students_name_of_father'	=> 'required',
		'students_name_of_mother'	=> 'required',
		'students_parent_phone'		=> 'required',
	];

	public $siswa_errors = [
		'students_fullname'	=> [
			'required'	=> 'Nama lengkap tidak boleh kosong'
		],
		'students_phone'	=> [
			'required'		=> 'No Handphone tidak boleh kosong',
			'numeric'		=> 'No Handphone harus angka',
			'min_length'	=> 'Panjang No Handphone kurang dari  12'
		],

		'class_id'			=> [
			'required'		=> 'Kelas tidak boleh kosong'
		],
		'students_nis'			=> [
			'required'		=> 'NIS tidak boleh kosong'
		],
		'students_nisn'			=> [
			'required'		=> 'NISN tidak boleh kosong'
		],
		'students_name_of_father'			=> [
			'required'		=> 'Nama Ayah Kandung tidak boleh kosong'
		],
		'students_name_of_mother'			=> [
			'required'		=> 'Nama Ibu Kandung tidak boleh kosong'
		],
		'students_parent_phone'			=> [
			'required'		=> 'No Handphone Orang tua tidak boleh kosong'
		],



	];



	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
