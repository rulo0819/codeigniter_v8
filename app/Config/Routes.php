<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\inicio;
use App\Controllers\Login;
use App\Controllers\Pane1\Dashboard;
use App\Controllers\Test;
/**
 * @var RouteCollection $routes
 *  
 */
$routes->get('/', 'Home::index');

$routes->get('login', [Login::class, 'index']);
$routes->post('login', [Login::class, 'processLogin']);
$routes->get('logout', [Login::class, 'logout']);

$routes->get('login1', [inicio::class, 'index']);
//login a
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', [Dashboard::class, 'index'], ['as' => 'admin.dashboard']);
    $routes->get('lt3/dashboard', [Dashboard::class, 'index']);
});

// db test
$routes->get('db/test-connect', [Test::class, 'testconnect']);
