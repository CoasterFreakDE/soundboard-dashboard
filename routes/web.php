<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'index'])->name('index');


Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'users'])->name('users');
    Route::get('/{id}', [UserController::class, 'user'])->name('user');
});


Route::get('/projects', [UserController::class, 'projects'])->name('projects');
Route::get('/about', [UserController::class, 'about'])->name('about');