<?php

use CodeIgniter\Router\RouteCollection;

$routes->group('', function ($routes) {
	$routes->get('/', 'Main\HomeController::index');
	$routes->get('home', 'Main\HomeController::index');
	$routes->get('operations', 'Main\OperationsController::index');
});

$routes->group('auth', ['filter' => 'notLoggedIn'], function ($routes) {
	$routes->get('doctor/register', 'Auth\DoctorController::register');
	$routes->post('doctor/store', 'Auth\DoctorController::store');

	$routes->get('doctor/login', 'Auth\DoctorController::login');
	$routes->post('doctor/login/action', 'Auth\DoctorController::login_action');

	$routes->get('patient/register', 'Auth\PatientController::register');
	$routes->post('patient/store', 'Auth\PatientController::store');

	$routes->get('patient/login', 'Auth\PatientController::login');
	$routes->post('patient/login/action', 'Auth\PatientController::login_action');

	$routes->get('admin/register', 'Auth\AdminController::register');
	$routes->post('admin/store', 'Auth\AdminController::store');
	
	$routes->get('admin/login', 'Auth\AdminController::login');
	$routes->post('admin/login/action', 'Auth\AdminController::login_action');
});

$routes->group('auth', function ($routes) {
	$routes->get('doctor/logout', 'Auth\DoctorController::logout');
	$routes->get('patient/logout', 'Auth\PatientController::logout');
	$routes->get('admin/logout', 'Auth\AdminController::logout');
});

$routes->group('admin/specialization', ['filter' => 'adminAuth'], function ($routes) {
	$routes->get('/', 'Admin\SpecializationController::index');
	$routes->get('create', 'Admin\SpecializationController::create');
	$routes->post('store', 'Admin\SpecializationController::store');
	$routes->get('edit/(:num)', 'Admin\SpecializationController::edit/$1');
	$routes->post('update/(:num)', 'Admin\SpecializationController::update/$1');
	$routes->get('delete/(:num)', 'Admin\SpecializationController::delete/$1');
});

$routes->group('admin/region', ['filter' => 'adminAuth'], function ($routes) {
	$routes->get('/', 'Admin\RegionController::index');
	$routes->get('create', 'Admin\RegionController::create');
	$routes->post('store', 'Admin\RegionController::store');
	$routes->get('edit/(:num)', 'Admin\RegionController::edit/$1');
	$routes->post('update/(:num)', 'Admin\RegionController::update/$1');
	$routes->get('delete/(:num)', 'Admin\RegionController::delete/$1');
});

$routes->group('admin/institution', ['filter' => 'adminAuth'], function ($routes) {
	$routes->get('/', 'Admin\InstitutionController::index');
	$routes->get('create', 'Admin\InstitutionController::create');
	$routes->post('store', 'Admin\InstitutionController::store');
	$routes->get('edit/(:num)', 'Admin\InstitutionController::edit/$1');
	$routes->post('update/(:num)', 'Admin\InstitutionController::update/$1');
	$routes->get('delete/(:num)', 'Admin\InstitutionController::delete/$1');
});

$routes->group('admin', ['filter' => 'adminAuth'], function ($routes) {
	$routes->get('/', 'Admin\AdminController::index');
	$routes->get('dashboard', 'Admin\AdminController::index');
	$routes->get('doctor', 'Admin\DoctorController::index');
});

$routes->group('patient', ['filter' => 'userAuth:patient'], function ($routes) {
	$routes->get('/', 'Patient\AppointmentController::index');
	$routes->get('dashboard', 'Patient\AppointmentController::index');
	$routes->get('profile', 'Patient\AppointmentController::profile');
	$routes->get('doctors/search', 'Patient\AppointmentController::searchDoctors');
});

$routes->group('doctor', ['filter' => 'userAuth:doctor'], function ($routes) {
	$routes->get('/', 'Doctor\AppointmentController::index');
	$routes->get('dashboard', 'Doctor\AppointmentController::index');
	$routes->get('profile', 'Doctor\AppointmentController::profile');
});
