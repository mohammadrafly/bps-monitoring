<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Auth
$routes->match(['POST', 'GET'], '/', 'Auth::index');
$routes->get('logout', 'Auth::Logout');

//Dashboard
