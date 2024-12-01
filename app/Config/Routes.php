<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::login');
$routes->match(['get', 'post'], 'login', 'UserController::login');
$routes->get('logout', 'UserController::logout');
$routes->get('dashboard', 'ImageController::index');
$routes->post('/upload', 'ImageController::upload');
$routes->get('/delete/(:num)', 'ImageController::delete/$1');

