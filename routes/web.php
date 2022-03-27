<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

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

Route::get('/test', [
    HomeController::class, 'itemTest'
]);

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/add', [PostController::class, 'index'])->name('create-post');
Route::post('store-form', [PostController::class, 'store']);
Route::resource('conditions', 'ConditionController');
Route::resource('items', 'ItemController');
