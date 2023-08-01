<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return response()->json(['status' => 'Connected']);
});
Route::post('login', [AuthController::class, 'login']);
Route::post('cadastrar/usuario', [UsuarioController::class, 'store']);

Route::group([ 'middleware' => 'auth:api' ], function ($router) {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    
    Route::apiResource('usuario', UsuarioController::class);

    Route::apiResource('despesa', DespesaController::class);
});


