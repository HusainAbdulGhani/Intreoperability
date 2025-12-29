<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', 'EmployeeController@index');           // Halaman List
$router->get('/create', 'EmployeeController@create');    // Halaman Form Tambah
$router->post('/store', 'EmployeeController@store');     // Proses Simpan
$router->get('/detail/{id}', 'EmployeeController@show'); // Halaman Detail
$router->get('/edit/{id}', 'EmployeeController@edit');   // Halaman Form Edit
$router->post('/update/{id}', 'EmployeeController@update'); // Proses Update (Pake POST method spoofing)
$router->get('/delete/{id}', 'EmployeeController@destroy'); // Proses Hapus