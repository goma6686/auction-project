<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BidController;
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

Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

Route::get('/profile/admin', [HomeController::class, 'admin']);

Route::post('/profile', [PostController::Class, 'store']);
Route::get('/profile/create', [PostController::class, 'create'])->name('create-post');
Route::get('/profile/edit/{id}', [PostController::class, 'edit'])->name('edit-post');
Route::post('/profile/update/{id}', [PostController::class, 'update'])->name('update-post');
Route::delete('/profile/delete/{id}', [PostController::class, 'destroy']);
Route::delete('/profile/removeImage/{id}', [PostController::class, 'removeImage']);

Auth::routes();