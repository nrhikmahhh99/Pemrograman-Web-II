<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/buku', 'Buku::index', ['filter' => 'auth']);
$routes->get('/buku/create', 'Buku::create', ['filter' => 'auth']);
$routes->post('/buku/store', 'Buku::store', ['filter' => 'auth']);
$routes->get('/buku/(:num)/edit', 'Buku::edit/$1', ['filter' => 'auth']);
$routes->post('/buku/(:num)/update', 'Buku::update/$1', ['filter' => 'auth']);
$routes->post('/buku/(:num)/delete', 'Buku::delete/$1', ['filter' => 'auth']);
$routes->get('/dashboard', 'Home::dashboard', ['filter' => 'auth']);
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginAuth');
$routes->get('/logout', 'Auth::logout');
$routes->delete('buku/(:num)/delete', 'Buku::delete/$1');
$routes->get('buku/resetId', 'Buku::resetId');

// Include environment specific routes if available
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}