<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/addToCart', [App\Http\Controllers\TransactionController::class, 'addToCart'])->name('addToCart');
Route::post('/payNow', [App\Http\Controllers\TransactionController::class, 'payNow'])->name('payNow');
Route::post('/topUpNow', [App\Http\Controllers\WalletController::class, 'topUpNow'])->name('topUpNow');
Route::get('/download/{order_id}', [App\Http\Controllers\TransactionController::class, 'download'])->name('download');












// Route::prefix('/admin')->group(function(){
//     Route::get('/', [ProductController::class, 'index'])->name('admin.product.home');
//     Route::get('/{id}',[ProductController::class,'show']);
//     Route::post('/create', [ProductController::class, 'create']);
//     Route::put('/update/{id}', [ProductController::class, 'update']);
//     Route::delete('/delete/{id}', [ProductController::class, 'destroy']);

// });
Route::prefix('/kantin')->group(function(){
    Route::get('/', [ProductController::class, 'index'])->name('kantin.index');
    Route::get('/{id}',[ProductController::class,'show']);
    Route::post('/create', [ProductController::class, 'create']);
    Route::put('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);

});