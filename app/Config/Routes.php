<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/', 'User::login');
$routes->post('/register', 'User::register');
$routes->post('/mitra/register', 'Supermarket::register');
$routes->resource('transaction');
$routes->resource('supermarket');

