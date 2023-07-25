<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PompaController;
use App\Http\Controllers\ControlModeController;



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

Route::get('api/get-status/pompa1/last', [EspController::class, 'getPompa1']);
Route::get('api/get-status/pompa2/last', [EspController::class, 'getPompa2']);
Route::get('api/get-status/pompa3/last', [EspController::class, 'getPompa3']);

// Menampilkan halaman kontrol
Route::get('/status', [MenuController::class, 'status'])->name('status');

// Mengatur mode manual
Route::post('/status/manual', [ControlModeController::class, 'setManualMode'])->name('control.setManualMode');

// Mengatur mode otomatis
Route::post('/status/automatic', [ControlModeController::class, 'setAutomaticMode'])->name('control.setAutomaticMode');
