<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Auth
$routes->match(['POST', 'GET'], '/', 'Auth::index');
$routes->get('logout', 'Auth::Logout');

//Dashboard
$routes->group('dashboard', ['filter' => 'auth'], function($routes) { 
    $routes->get('/', 'Dashboard::index');
    //UserOps
    $routes->group('users', function($routes) {
        $routes->match(['POST', 'GET'], '/', 'User::index');
        $routes->match(['POST', 'GET'], 'edit/(:num)', 'User::edit/$1');
        $routes->get('delete/(:num)', 'User::delete/$1');
    });
    //TanamanOps
    $routes->group('tanaman', function($routes) {
        $routes->match(['POST', 'GET'], '/', 'Tanaman::index');
        $routes->match(['POST', 'GET'], 'edit/(:num)', 'Tanaman::edit/$1');
        $routes->get('delete/(:num)', 'Tanaman::delete/$1');
    });
    //EmployeeOps
    $routes->group('employee', function($routes) {
        $routes->match(['POST', 'GET'], '/', 'Employee::index');
        $routes->match(['POST', 'GET'], 'edit/(:num)', 'Employee::edit/$1');
        $routes->get('delete/(:num)', 'Employee::delete/$1');
        $routes->post('export', 'Employee::export');
    });
    //ProfileOps
    $routes->group('profile', function($routes) {
        $routes->match(['POST', 'GET'], 'update/(:any)', 'Dashboard::profile/$1');
        $routes->post('ganti/password/(:any)', 'Dashboard::changePassword/$1');
    });
});
