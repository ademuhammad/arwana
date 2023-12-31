<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspController;
use App\Http\Controllers\PompaController;

use App\Http\Controllers\ControlModeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/esp', [EspController::class, 'store'])->name('data.store');
Route::post('/relay', [EspController::class, 'storeRelayControl'])->name('relay');
Route::get('/relay', [EspController::class, 'getRelayData']);

// routes/api.php
Route::get('/status-mode', 'App\Http\Controllers\ControlModeController@getStatus')->name('control.getStatus');

Route::get('/get-pompa-data', [ControlModeController::class, 'getPompaData'])->name('api.get.pompa.data');


// routes/api.php
Route::get('/esp-data', [EspController::class, 'getEspData']);