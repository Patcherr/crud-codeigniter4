<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Users;
/**
 * @var RouteCollection $routes
 */
$routes->get('/', "UserController::index");
$routes->get('/users/create', "UserController::create");
$routes->post('/users/store', 'UserController::store');
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');
$routes->post('/users/update/(:num)', 'UserController::update/$1');
$routes->get('/users/delete/(:num)', 'UserController::delete/$1');




