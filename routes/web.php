<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/profile/add', [PostController::class, 'index'])->name('post');
Route::post('store-form', [PostController::class, 'store']);
