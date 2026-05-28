<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index', ['cache' => 60]);
$routes->get('event/register/(:num)', 'RegistrationController::create/$1');
$routes->post('event/register/(:num)', 'RegistrationController::store/$1');
$routes->get('registration/success/(:num)', 'RegistrationController::success/$1');
$routes->get('registration/photo/(:num)', 'RegistrationController::photo/$1');

$routes->get('admin/login', 'AuthController::login');
$routes->post('admin/login', 'AuthController::attemptLogin');
$routes->get('admin/logout', 'AuthController::logout');

$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'AdminController::dashboard');
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('attendees', 'AdminController::attendees');
    $routes->get('uploads/(:segment)', 'AdminController::image/$1');
    $routes->post('attendees/delete/(:num)', 'AdminController::deleteAttendee/$1');
});
