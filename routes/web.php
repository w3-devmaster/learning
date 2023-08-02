<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;

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

Route::get('/',[PagesController::class,'index'])->name('index');
Route::get('contact',[PagesController::class,'contact'])->name('contact');
Route::get('feature',[PagesController::class,'feature'])->name('feature');
Route::get('not-login',[PagesController::class,'not_login'])->name('not-login');

Route::middleware('auth')->group(function() {
    Route::resource('account',AccountController::class,['name' => 'account']);

    Route::resource('product',ProductController::class,['name' => 'product']);
    Route::prefix('products')->name('products.')->group(function() {
        Route::get('low-stock',[ProductOrderController::class,'lowStock'])->name('low-stock');
        Route::get('out-of-stock',[ProductOrderController::class,'outOfStock'])->name('out-of-stock');
        Route::post('search',[ProductOrderController::class,'searchPrice'])->name('search');
        Route::get('product-trash',[ProductOrderController::class,'trash'])->name('trash');
        Route::get('product-restore/{id}',[ProductOrderController::class,'restore'])->name('restore');
        Route::delete('product-delete/{id}',[ProductOrderController::class,'delete'])->name('delete');
    });

    Route::get('users',[HomeController::class,'users'])->name('users');
    Route::get('user/{user}',[HomeController::class,'user'])->name('user');


    Route::get('roles',[HomeController::class,'roles'])->name('roles');
    Route::get('role/{role}',[HomeController::class,'role'])->name('role');

    Route::resource('post',PostController::class,['name','post']);
    Route::put('update-user/{user}',[HomeController::class,'update_user'])->name('update-user');



    Route::prefix('manage')->name('manage.')->group(function() {
        Route::resource('users', UserController::class,['name' => 'users']);

    });
});

Route::view('all-user/test','users.test-function');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
