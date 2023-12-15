<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'User::login');
$routes->post('/', 'Home::index');
$routes->post('/register', 'User::register');
$routes->post('/mitra/register', 'Supermarket::register');
$routes->post('/mitra/login', 'Supermarket::login');
$routes->resource('transaction');
$routes->resource('supermarket');

