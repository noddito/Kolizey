<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/company', 'CompanyController@getPage');

Route::get('/services', 'ServiceController@getPage');

Route::get('/projects', 'ProjectsController@getPage');

Route::get('/customers', 'CustomersController@getPage');

Route::get('/contacts', 'ContactsController@getPage');

Route::get('/services/create-service', 'ServiceController@createService');
