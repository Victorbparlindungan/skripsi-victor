<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Website::index');
$routes->get('/', 'Frontend::index');
$routes->get('/about', 'Frontend::about');
$routes->get('/rent', 'Frontend::rent');
$routes->get('/contact', 'Frontend::contact');
$routes->get('/booking_payment/(:num)', 'Frontend::booking/$1');
$routes->get('/payment/(:num)', 'Frontend::payment/$1');

$routes->post('/save_booking', 'Frontend::save_booking');


$routes->get('/login', 'Login::index');
$routes->post('/login_action', 'Login::login');
$routes->get('/logout', 'Login::logout');


$routes->get('/profileuser', 'User::profile',['filter' => 'authfilter']);
$routes->post('/change_profile', 'User::change_profile',['filter' => 'authfilter']);
$routes->post('/change_password', 'User::change_password',['filter' => 'authfilter']);

$routes->get('/user', 'User::index',['filter' => 'authfilter']);
$routes->get('/add_user', 'User::create',['filter' => 'authfilter']);
$routes->post('/add_action_user', 'User::create_action',['filter' => 'authfilter']);
$routes->get('/update_user/(:num)', 'User::update/$1',['filter' => 'authfilter']);
$routes->post('/update_action_user', 'User::update_action',['filter' => 'authfilter']);
$routes->get('/hapus_user/(:num)', 'User::delete/$1',['filter' => 'authfilter']);

$routes->get('/groupuser', 'Groupuser::index',['filter' => 'authfilter']);
$routes->get('/add_groupuser', 'Groupuser::create',['filter' => 'authfilter']);
$routes->post('/add_action_groupuser', 'Groupuser::create_action',['filter' => 'authfilter']);
$routes->get('/update_groupuser/(:num)', 'Groupuser::update/$1',['filter' => 'authfilter']);
$routes->post('/update_action_groupuser', 'Groupuser::update_action',['filter' => 'authfilter']);
$routes->get('/hapus_groupuser/(:num)', 'Groupuser::delete/$1',['filter' => 'authfilter']);

$routes->get('/type', 'Type::index',['filter' => 'authfilter']);
$routes->get('/add_type', 'Type::create',['filter' => 'authfilter']);
$routes->post('/add_action_type', 'Type::create_action',['filter' => 'authfilter']);
$routes->get('/update_type/(:num)', 'Type::update/$1',['filter' => 'authfilter']);
$routes->post('/update_action_type', 'Type::update_action',['filter' => 'authfilter']);
$routes->get('/hapus_type/(:num)', 'Type::delete/$1',['filter' => 'authfilter']);

$routes->get('/transport', 'Transport::index',['filter' => 'authfilter']);
$routes->get('/add_transport', 'Transport::create',['filter' => 'authfilter']);
$routes->post('/add_action_transport', 'Transport::create_action',['filter' => 'authfilter']);
$routes->get('/update_transport/(:num)', 'Transport::update/$1',['filter' => 'authfilter']);
$routes->post('/update_action_transport', 'Transport::update_action',['filter' => 'authfilter']);
$routes->get('/hapus_transport/(:num)', 'Transport::delete/$1',['filter' => 'authfilter']);

$routes->get('/unit/(:num)', 'Unit::index/$1',['filter' => 'authfilter']);
$routes->get('/add_unit/(:num)', 'Unit::create/$1',['filter' => 'authfilter']);
$routes->post('/add_action_unit', 'Unit::create_action',['filter' => 'authfilter']);
$routes->get('/update_unit/(:num)/(:num)', 'Unit::update/$1/$2',['filter' => 'authfilter']);
$routes->post('/update_action_unit', 'Unit::update_action',['filter' => 'authfilter']);
$routes->get('/hapus_unit/(:num)/(:num)', 'Unit::delete/$1/$2',['filter' => 'authfilter']);

$routes->get('/booking', 'Booking::index',['filter' => 'authfilter']);
$routes->get('/update_booking/(:num)', 'Booking::update/$1',['filter' => 'authfilter']);
$routes->post('/update_action_booking', 'Booking::update_action',['filter' => 'authfilter']);
$routes->get('/done/(:num)', 'Booking::done/$1',['filter' => 'authfilter']);
$routes->get('/pdf_laporan', 'Pdf::pdf_laporan',['filter' => 'authfilter']);






/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
