<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Test1;
use App\Controllers\Prueba2;
use App\Controllers\inicio;
use App\Controllers\Pane1\Dashboard;
/**
 * @var RouteCollection $routes
 *  
 */
//$routes->get('/', 'Home::index');
$routes->get('/test1', [Test1::class, 'index']);

$routes->get('/', 'Home::index');

$routes->get('login', 'Login::index');
$routes->post('login', 'Login::processLogin');
$routes->get('logout', 'Login::logout');

$routes->get('usuario/inicio', [inicio::class, 'index']);
//login a
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
});

//dashboard
$routes->get('/Dashboard', [Dashboard::class, 'index']);

/* <?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Test1;
use App\Controllers\Prueba2;
use App\Controllers\inicio;
use App\Controllers\Pane1\Dashboard;

/**
 * @var RouteCollection $routesw

$routes->get('/', 'Home::index');
$routes->get('/test1', [Test1::class, 'index']);

$routes->get('login', 'Login::index');
$routes->post('login', 'Login::processLogin');
$routes->get('logout', 'Login::logout');

$routes->get('usuario/inicio', [inicio::class, 'index']);

// rutas protegidas con autenticación
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', [Dashboard::class, 'index']);
});*/