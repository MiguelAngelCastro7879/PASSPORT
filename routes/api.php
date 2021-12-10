<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DhtController;
use App\Http\Controllers\ProximidadController;
use App\Http\Controllers\PuertaController;
use App\Http\Controllers\SonidoController;
use App\Http\Controllers\ReleController;

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
            Route::post( '/datos', [PuertaController::class, 'datos']);
            Route::post( '/last', [PuertaController::class, 'ultimoDato']);
            Route::post( '/controller', [PuertaController::class, 'controlador']);
        });
        
        Route::prefix('distancia')->group(function () {
            Route::post( '/datos', [ProximidadController::class, 'datos']);
            Route::post( '/last', [ProximidadController::class, 'ultimoDato']);
        });
        Route::prefix('dht')->group(function () {
            Route::post( 'temperatura/datos', [DhtController::class, 'datosTemperatura']);
            Route::post( 'temperatura/last', [DhtController::class, 'ultimoDatoTemperatura']);
            Route::post( 'humedad/datos', [DhtController::class, 'datosHumedad']);
            Route::post( 'humedad/last', [DhtController::class, 'ultimoDatoHumedad']);
        });

        Route::prefix('sonido')->group(function () {
            Route::post( '/datos', [SonidoController::class, 'datos']);
            Route::post( '/last', [SonidoController::class, 'ultimoDato']);
        });
        
        Route::prefix('rele1')->group(function () {
            Route::post( '/datos', [PuertaController::class, 'datosR1']);
            Route::post( '/last', [PuertaController::class, 'ultimoDatoR1']);
            Route::post( '/controller', [PuertaController::class, 'controladorR1']);
        });
        
        
        Route::prefix('rele2')->group(function () {
            Route::post( '/datos', [PuertaController::class, 'datosR2']);
            Route::post( '/last', [PuertaController::class, 'ultimoDatoR2']);
            Route::post( '/controller', [PuertaController::class, 'controladorR2']);
        });
        


    });

    
});