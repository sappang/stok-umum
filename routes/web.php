<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\CartController;
use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\Backoffice\RoleController;
use App\Http\Controllers\Backoffice\StokController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\Backoffice\OrderController;
use App\Http\Controllers\Backoffice\BagianController;
use App\Http\Controllers\Backoffice\ReportController;
use App\Http\Controllers\Backoffice\ProductController;
use App\Http\Controllers\Backoffice\CategoryController;
use App\Http\Controllers\Backoffice\SupplierController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\PermissionController;
use App\Http\Controllers\Backoffice\TransactionController;
use App\Http\Controllers\Landing\ProductController as LandingProductController;
use App\Http\Controllers\Landing\CategoryController as LandingCategoryController;
use App\Http\Controllers\Landing\TransactionController as LandingTransactionController;

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

Route::get('/', HomeController::class)->name('home');

Route::controller(LandingProductController::class)->as('product.')->group(function(){
    Route::get('/product', [LandingProductController::class, 'index'])->name('index');
    Route::get('/product/{product:slug}', [LandingProductController::class, 'show'])->name('show');
});
Route::controller(LandingCategoryController::class)->as('category.')->group(function(){
    Route::get('/category', [LandingCategoryController::class, 'index'])->name('index');
    Route::get('/category/{category:slug}', [LandingCategoryController::class, 'show'])->name('show');
});

Route::controller(CartController::class)->middleware('auth')->as('cart.')->group(function(){
    Route::get('/cart', 'index')->name('index');
    Route::post('/cart/{product:id}', 'store')->name('store');
    Route::put('/cart/update/{cart:id}', 'update')->name('update');
    Route::delete('/cart/delete/{cart}', 'destroy')->name('destroy');
});

Route::post('/transaction', LandingTransactionController::class)->middleware('auth')->name('transaction.store');

Route::group(['prefix' => 'backoffice', 'as' => 'backoffice.', 'middleware' => ['auth']], function(){
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/permission', PermissionController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/bagian', BagianController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/product', ProductController::class);
    Route::controller(StokController::class)->prefix('/stock')->as('stock.')->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::put('/update/{id}', 'update')->name('update');
    });
    Route::get('/transaction', TransactionController::class)->name('transaction');
    Route::resource('/order', OrderController::class);
    Route::controller(ReportController::class)->prefix('/report')->as('report.')->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::get('/filter', 'filter')->name('filter');
        Route::get('/pdf/{fromDate}/{toDate}', 'pdf')->name('pdf');
    });
});
