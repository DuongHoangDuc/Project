<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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


// back-end
Route::get('/admin', [Admincontroller::class, "index"])->name('admin.index');
// front-end
Route::get('/home', [HomeController::class, "index"])->name('client.home');
Route::get('/', [HomeController::class, "index"])->name('client.home');

