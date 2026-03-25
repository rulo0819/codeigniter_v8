<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Dashboard;
use App\Controllers\Inicio;
use App\Controllers\Login;
use App\Controllers\Test;
/**
 * @var RouteCollection $routes
 *  
 */
$routes->get('/', 'Home::index');

$routes->get('login', [Login::class, 'index']);
$routes->post('login', [Login::class, 'processLogin']);
$routes->get('logout', [Login::class, 'logout']);
$routes->get('validar-sesion', [Login::class, 'inicioSesion']);
$routes->post('validar-sesion', [Login::class, 'verificarSesion']);

//login1
$routes->get('login1', [Inicio::class, 'index']);
$routes->get('dashboard', [Dashboard::class, 'index'], ['as' => 'admin.dashboard', 'filter' => 'auth']);
$routes->get('lt3/dashboard', [Dashboard::class, 'index'], ['filter' => 'auth']);

// db test
$routes->get('db/test-connect', [Test::class, 'testconnect']);
