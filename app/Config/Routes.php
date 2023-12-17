<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LoginController::index');
$routes->post('/', 'LoginController::login_user');

$routes->get('/register', 'Registration::index');
$routes->post('/register', 'User::register');

$routes->post('/mitra/register', 'Supermarket::register');
$routes->get('/mitra/register', 'Registration::registration_supermarket');
$routes->post('/mitra/login', 'LoginController::login_supermarket');

$routes->post('/logout', 'LoginController::logout');

$routes->get('/transaction/(:any)/(:any)', 'Transaction::index/$1/$2');
$routes->get('/transactions/(:any)', 'Transaction::findSupermarket/$1');
$routes->post('/transaction', 'Transaction::create');
$routes->get('/transaction', 'Transaction::history');

$routes->get('/api/share/(:any)/(:any)', 'Core::index/$1/$2');

$routes->get('/supermarket', 'Supermarket::index');
$routes->get('/supermarket/(:any)', 'Supermarket::details/$1');

$routes->get('/checkout/(:any)', 'Checkout::index/$1');

$routes->get('/users/(:any)', 'User::findById/$1');