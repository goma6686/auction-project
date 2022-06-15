<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\Authenticate;
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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

Route::get('/item/{id}', [HomeController::class, 'show'])->name('show');

Route::post('/item/updatePrice/{id}', [BidController::class, 'updatePrice'])->name('update-price');

Route::get('/profile/create', [PostController::class, 'create'])->name('create-post');
Route::get('/profile/edit/{id}', [PostController::class, 'edit'])->name('edit-post');
Route::post('/profile/update/{id}', [PostController::class, 'update'])->name('update-post');
Route::delete('/profile/delete/{id}', [PostController::class, 'destroy']);
Route::delete('/profile/removeImage/{id}', [PostController::class, 'removeImage']);

Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('update-user');
Route::post('/profile', [PostController::Class, 'store']);

Route::get('/user/{id}', [UserController::class, 'show']);

Route::group(['middleware' => 'admin'], function(){
    Route::get('/profile/admin', [AdminController::class, 'dashboard'])->name('admin');
    Route::get('/profile/admin/users', [AdminController::class, 'users'])->name('users');

    Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

    Route::post('/condition', [AdminController::Class, 'store']);
    Route::delete('/condition/delete/{id}', [AdminController::class, 'destroy']);
});

Auth::routes();