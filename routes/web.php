<?php

use App\Http\Controllers\AdminSide\AdminCompanyController;
use App\Http\Controllers\AdminSide\AdminCompanyDescriptionController;
use App\Http\Controllers\AdminSide\AdminCompanyInfoController;
use App\Http\Controllers\AdminSide\AdminController;
use App\Http\Controllers\AdminSide\AdminProjectsController;
use App\Http\Controllers\AdminSide\AdminServicesController;
use App\Http\Controllers\AdminSide\AdminSettingsController;
use App\Http\Controllers\AdminSide\AdminUsersController;
use App\Http\Controllers\UserSide\CompanyController;
use App\Http\Controllers\UserSide\ContactsController;
use App\Http\Controllers\UserSide\CustomersController;
use App\Http\Controllers\UserSide\HomeController;
use App\Http\Controllers\UserSide\ProjectsController;
use App\Http\Controllers\UserSide\ServiceController;
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

Route::get('/', [HomeController::class,'index'])->name('index');

Route::get('/company', [CompanyController::class,'index']);

Route::get('/services', [ServiceController::class,'index']);

Route::get('/projects', [ProjectsController::class,'index']);

Route::get('/customers', [CustomersController::class,'index']);

Route::get('/contacts', [ContactsController::class,'index']);

Auth::routes();

Route::group(['middleware' => ['role:admin'] , 'prefix' => 'admin'] , function (){
    Route::get('index', [AdminController::class,'index'])->name('admin/index');
    Route::get('company-info/index', [AdminCompanyInfoController::class,'index'])->name('company-info/index');
    Route::get('company-description/edit', [AdminCompanyDescriptionController::class,'edit'])->name('company-description/edit');
    Route::resource('company-info' , AdminCompanyInfoController::class);
    Route::resource('company-description' , AdminCompanyDescriptionController::class);
    Route::resource('settings' , AdminSettingsController::class);
    Route::resource('users' , AdminUsersController::class);
    Route::resource('projects' , AdminProjectsController::class);
    Route::resource('services' , AdminServicesController::class);
    Route::resource('company' , AdminCompanyController::class);
});
