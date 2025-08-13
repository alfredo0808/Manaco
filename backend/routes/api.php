<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categorias',CategoriaController::class); //acceder todos los metodos y peticiones q realiza el cliente

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);