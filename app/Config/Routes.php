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
});
