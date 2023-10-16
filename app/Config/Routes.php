<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::dashboard', ['filter' => 'auth']);
$routes->get('dashboard', 'Home::dashboard', ['filter' => 'auth']);
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('register', 'AuthController::register', ['filter' => 'auth']);
$routes->post('register', 'AuthController::attemptRegister', ['filter' => 'auth']);
$routes->get('logout', 'AuthController::logout');
 $routes->get('claims', 'ClaimController::index', ['filter' => 'auth']);
// $routes->get('claims/create', 'ClaimController::create');
$routes->post('claims', 'ClaimController::create', ['filter' => 'auth']);
$routes->get('claims/edit/(:num)', 'ClaimController::edit/$1', ['filter' => 'auth']);
$routes->post('claims/update/(:num)', 'ClaimController::update/$1', ['filter' => 'auth']);
$routes->get('claims/delete/(:num)', 'ClaimController::delete/$1', ['filter' => 'auth']);
$routes->get('admin/users', 'AdminController::users', ['filter' => 'auth']);
$routes->get('admin/users/edit/(:num)', 'AdminController::editUser/$1', ['filter' => 'auth']);
$routes->post('admin/users/update/(:num)', 'AdminController::updateUser/$1', ['filter' => 'auth']);
$routes->post('admin/users/delete', 'AdminController::deleteUser', ['filter' => 'auth']);
//$routes->get('uploads/(:any)', 'ClaimController::display/$1');
$routes->get('/uploads/(:any)', 'FilesController::displayFile/$1');
