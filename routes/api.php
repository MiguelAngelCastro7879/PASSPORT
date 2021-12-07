<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DhtController;
use App\Http\Controllers\ProximidadController;
use App\Http\Controllers\PuertaController;

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class , 'login']);
    Route::post('signup', [AuthController::class , 'signUp']);

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthController::class , 'logout']);
        Route::get('user', [AuthController::class , 'user']);
        
        
        
        
        
        
        Route::prefix('puerta')->group(function () {
            Route::get( '/datos', [PuertaController::class, 'datos']);
            Route::get( '/last', [PuertaController::class, 'ultimoDato']);
            Route::get( '/controller', [PuertaController::class, 'controlador']);
            Route::get( '/fechas', [PuertaController::class, 'fechas']);
        });
        
        Route::prefix('distancia')->group(function () {
            Route::get( '/datos', [ProximidadController::class, 'datos']);
            Route::get( '/last', [ProximidadController::class, 'ultimoDato']);
        });
        Route::prefix('dht')->group(function () {
            Route::get( 'temperatura/datos', [DhtController::class, 'datosTemperatura']);
            Route::get( 'temperatura/last', [DhtController::class, 'ultimoDatoTemperatura']);
            Route::get( 'humedad/datos', [DhtController::class, 'datosHumedad']);
            Route::get( 'humedad/last', [DhtController::class, 'ultimoDatoHumedad']);
        });
    });

    
});