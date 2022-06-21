<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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


Route::post('/item/updatePrice/{id}', [BidController::class, 'updatePrice'])->name('update-price');
Route::get('/item/winner/{id}', [BidController::class, 'findWinner'])->name('findWinner');

Route::get('/item/create', [PostController::class, 'create'])->name('create-post');
Route::get('/item/edit/{id}', [PostController::class, 'edit'])->name('edit-post');
Route::post('/item/update/{id}', [PostController::class, 'update'])->name('update-post');
Route::delete('/item/delete/{id}', [PostController::class, 'destroy']);
Route::delete('/item/removeImage/{id}', [PostController::class, 'removeImage']);
Route::get('/item/{id}', [HomeController::class, 'show'])->name('show');

Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('update-user');
Route::delete('/user/removeImage/{id}', [UserController::class, 'removeAvatar']);
Route::post('/profile', [PostController::Class, 'store']);

Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/user/{id}/list', [UserController::class, 'winnerList']);

Route::group(['middleware' => 'admin'], function(){
    Route::get('/profile/admin', [AdminController::class, 'dashboard'])->name('admin');
    Route::get('/profile/admin/users', [AdminController::class, 'users'])->name('users');
    Route::get('/profile/admin/conditions', [AdminController::class, 'conditions'])->name('conditions');

    Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

    Route::post('/condition', [AdminController::Class, 'store']);
    Route::delete('/condition/delete/{id}', [AdminController::class, 'destroy']);
});

Auth::routes();