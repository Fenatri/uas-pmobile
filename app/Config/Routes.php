<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

//Bendahara
$routes->resource('biaya', ['controller' => 'BiayaController']);

//siswa dan Wali Murid
$routes->resource('siswa', ['controller' => 'SiswaController']);

//Kepala Sekolah
$routes->resource('kepala_sekolah', ['controller' => 'HeadController']);
