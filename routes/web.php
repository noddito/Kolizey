<?php

use App\Http\Controllers\Admin\AdminSettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/company', 'CompanyController@getIndexPage');

Route::get('/services', 'ServiceController@getIndexPage');

Route::get('/projects', 'ProjectsController@getIndexPage');

Route::get('/customers', 'CustomersController@getIndexPage');

Route::get('/contacts', 'ContactsController@getIndexPage');

Auth::routes();

Route::get('/home', [ HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:admin'] , 'prefix' => 'admin'] , function (){
    Route::get('/', 'Admin\AdminController@getIndexPage');

    Route::resource('settings' , AdminSettingsController::class);
});

Route::get('/home', [ HomeController::class, 'index'])->name('home');
