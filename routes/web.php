<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backoffice\RoleController;
use App\Http\Controllers\Backoffice\StokController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\Backoffice\ProductController;
use App\Http\Controllers\Backoffice\CategoryController;
use App\Http\Controllers\Backoffice\SupplierController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\PermissionController;
use App\Http\Controllers\Backoffice\TransactionController;

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
    return view('auth.login');
});

Route::group(['prefix' => 'backoffice', 'as' => 'backoffice.', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/permission', PermissionController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/product', ProductController::class);
    Route::controller(StokController::class)->prefix('/stock')->as('stock.')->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::put('/update/{id}', 'update')->name('update');
    });
    Route::get('/transaction', TransactionController::class)->name('transaction');
});
