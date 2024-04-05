<?php

use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProjectsController;
use App\Http\Controllers\Admin\AdminServicesController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ServiceController;
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
})->name('index');

Route::get('/company', [CompanyController::class,'index']);

Route::get('/services', [ServiceController::class,'index']);

Route::get('/projects', [ProjectsController::class,'index']);

Route::get('/customers', [CustomersController::class,'index']);

Route::get('/contacts', [ContactsController::class,'index']);

Auth::routes();

Route::group(['middleware' => ['role:admin'] , 'prefix' => 'admin'] , function (){
    Route::get('/', [AdminController::class,'index'])->name('admin');
    Route::resource('settings' , AdminSettingsController::class);
    Route::resource('users' , AdminUsersController::class);
    Route::resource('projects' , AdminProjectsController::class);
    Route::resource('services' , AdminServicesController::class);
    Route::resource('company' , AdminCompanyController::class);
});
