<?php

use API\RfidController;
use App\Http\Controllers\API\PatroliController;
use App\Http\Controllers\API\UUIDController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::resource('rfid', RfidController::class);
Route::post('mulai-patroli', [PatroliController::class,'mulaiPatroli']);
Route::get('get-uuid', [UUIDController::class, 'getUUID']);
