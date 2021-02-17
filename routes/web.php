<?php

use App\Http\Controllers\BulletinController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainPageController::class, 'index']);
Route::get('/show/{bulletin}', [MainPageController::class, 'show'])->name('show');
Route::post('/show/{bulletin}', [MainPageController::class, 'addComment'])->name('show');
Route::post('/rating/{bulletin}', [MainPageController::class, 'postStar'])->name('rating');


Auth::routes();

Route::get('/home', [UserController::class, 'index'])->name('home');

Route::get('/edit-info/{user}', [UserController::class, 'show'])->name('edit-info');
Route::put('/edit-info/{user}', [UserController::class, 'edit'])->name('edit-info');

Route::get('/bulletins-all', [BulletinController::class, 'index'])->name('bulletins-all');
Route::get('/create-bulletin', [BulletinController::class, 'create'])->name('create-bulletin');
Route::post('/create-bulletin', [BulletinController::class, 'store'])->name('create-bulletin');

Route::get('/show-bulletin/{bulletin}', [BulletinController::class, 'show'])->name('show-bulletin');
Route::put('/edit-bulletin/{bulletin}', [BulletinController::class, 'edit'])->name('edit-bulletin');

Route::delete('/delete-bulletin/{bulletin}', [BulletinController::class, 'destroy'])->name('delete-bulletin');


