<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'User::login');
$routes->post('/login', 'User::login');
$routes->post('/register', 'User::register');
$routes->resource('transaction');
$routes->resource('supermarket');

