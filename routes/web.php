<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PompaController;



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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [MenuController::class, 'home'])->name('home');
    Route::get('/data', [MenuController::class, 'data'])->name('data');
    Route::get('/kontrol', [MenuController::class, 'kontrol'])->name('kontrol');
    Route::get('/datadetail', [MenuController::class, 'datadetail'])->name('datadetail');
    Route::get('/dashboard', [MenuController::class, 'dashboard'])->name('dashboard');
});


Route::post('/kontrol', [EspController::class, 'store'])->name('data.store');
Route::post('/pompa/control', [MenuController::class, 'pompa'])->name('pompa.control');
