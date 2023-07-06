<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspController;
use App\Http\Controllers\PompaController;

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
