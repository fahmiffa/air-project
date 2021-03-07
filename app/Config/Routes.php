<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/login', 'LoginController::index');
$routes->post('/login/login_action', 'LoginController::login_action');
$routes->get('/login/logout', 'LoginController::logout');
// user routes
$routes->group('dashboard', ['filter' => 'loginfilter'],  function ($routes) {
});
$routes->group('page', ['filter' => 'loginfilter'],  function ($routes) {
	$routes->get('dashboard', 'DashboardController::index');

	$routes->get('operator', 'OperatorController::index');
	$routes->get('operator/add', 'OperatorController::add');
	$routes->post('operator/store', 'OperatorController::store');
	$routes->get('operator/update/(:num)', 'OperatorController::update/$1');
	$routes->add('operator/edit/(:num)', 'OperatorController::edit/$1');
	$routes->add('operator/delete/(:num)', 'OperatorController::delete/$1');

	$routes->get('level', 'LevelController::index');
	$routes->get('level/data', 'LevelController::data');
	$routes->get('level/add', 'LevelController::add');
	$routes->post('level/store', 'LevelController::store');
	$routes->get('level/update/(:num)', 'LevelController::update/$1');
	$routes->add('level/edit/(:num)', 'LevelController::edit/$1');
	$routes->add('level/delete/(:num)', 'LevelController::delete/$1');


	$routes->get('harga', 'HargaController::index');
	$routes->get('harga/add', 'HargaController::add');
	$routes->post('harga/store', 'HargaController::store');
	$routes->get('harga/update/(:num)', 'HargaController::update/$1');
	$routes->add('harga/edit/(:num)', 'HargaController::edit/$1');
	$routes->add('harga/delete/(:num)', 'HargaController::delete/$1');



	$routes->get('jenis', 'JenisController::index');
	$routes->get('jenis/add', 'JenisController::add');
	$routes->post('jenis/store', 'JenisController::store');
	$routes->get('jenis/update/(:num)', 'JenisController::update/$1');
	$routes->add('jenis/edit/(:num)', 'JenisController::edit/$1');
	$routes->add('jenis/delete/(:num)', 'JenisController::delete/$1');



	$routes->get('customer', 'CustomerController::index');
	$routes->get('customer/add', 'CustomerController::add');
	$routes->get('customer/import', 'CustomerController::csv');
	$routes->post('customer/import', 'CustomerController::csv');
	$routes->post('customer/store', 'CustomerController::store');
	$routes->get('customer/update/(:num)', 'CustomerController::update/$1');
	$routes->add('customer/edit/(:num)', 'CustomerController::edit/$1');
	$routes->add('customer/delete/(:num)', 'CustomerController::delete/$1');

	$routes->get('user', 'UsersController::index');
	$routes->get('user/add', 'UsersController::add');
	$routes->post('user/store', 'UsersController::store');
	$routes->get('user/update/(:num)', 'UsersController::update/$1');
	$routes->add('user/edit/(:num)', 'UsersController::edit/$1');
	$routes->add('user/delete/(:num)', 'UsersController::delete/$1');

	$routes->get('sales', 'SalesController::index');
	$routes->get('sales/add', 'SalesController::add');
	$routes->post('sales/store', 'SalesController::store');
	$routes->get('sales/update/(:num)', 'SalesController::update/$1');
	$routes->add('sales/edit/(:num)', 'SalesController::edit/$1');
	$routes->add('sales/delete/(:num)', 'SalesController::delete/$1');
	$routes->add('sales/detail/(:num)', 'SalesController::detail/$1');
	$routes->get('sales/import', 'SalesController::import');
	$routes->add('sales/print/(:num)', 'SalesController::print/$1');
	$routes->get('sales/cek_print', 'SalesController::cek_print');
	$routes->get('sales/print', 'SalesController::cetak');

	$routes->get('jenis_pembayaran', 'TypePaymentController::index');
	$routes->get('jenis_pembayaran/add', 'TypePaymentController::add');
	$routes->post('jenis_pembayaran/store', 'TypePaymentController::store');
	$routes->get('jenis_pembayaran/update/(:num)', 'TypePaymentController::update/$1');
	$routes->add('jenis_pembayaran/edit/(:num)', 'TypePaymentController::edit/$1');
	$routes->add('jenis_pembayaran/delete/(:num)', 'TypePaymentController::delete/$1');

	$routes->get('detail_jenis_pembayaran', 'DetailTypePaymentController::index');
	$routes->get('detail_jenis_pembayaran/add', 'DetailTypePaymentController::add');
	$routes->post('detail_jenis_pembayaran/store', 'DetailTypePaymentController::store');
	$routes->get('detail_jenis_pembayaran/update/(:num)', 'DetailTypePaymentController::update/$1');
	$routes->add('detail_jenis_pembayaran/edit/(:num)', 'DetailTypePaymentController::edit/$1');
	$routes->add('detail_jenis_pembayaran/delete/(:num)', 'DetailTypePaymentController::delete/$1');
	$routes->get('detail_jenis_pembayaran/monthly/(:num)', 'DetailTypePaymentController::monthly/$1');

	$routes->add('detail_jenis_pembayaran/delete_bill_monthly/(:num)', 'DetailTypePaymentController::delete_bill_monthly/$1');

	// tambah berdasarkan kelas
	$routes->get('detail_jenis_pembayaran/add_payment_class/(:num)', 'DetailTypePaymentController::add_payment_class/$1');
	$routes->post('detail_jenis_pembayaran/store_payment_class/(:num)', 'DetailTypePaymentController::store_payment_class/$1');

	// tambah berdasarkan siswa
	$routes->get('detail_jenis_pembayaran/add_payment_student/(:num)', 'DetailTypePaymentController::add_payment_student/$1');
	$routes->post('detail_jenis_pembayaran/store_payment_student/(:num)', 'DetailTypePaymentController::store_payment_student/$1');

	// tambah berdasarkan siswa
	$routes->get('detail_jenis_pembayaran/free_payment/(:num)', 'DetailTypePaymentController::free_payment/$1');
	$routes->post('detail_jenis_pembayaran/store_payment_student/(:num)', 'DetailTypePaymentController::store_payment_student/$1');
});



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
