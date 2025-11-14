<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', [UsuarioController::class, "logout"]);

Route::get('/me', [RegistroController::class, "me"]);
Route::get('/correo', [RegistroController::class, "correo"]);

Route::get('/test', function () {
    return view('portal');
});

Route::get('/success', function () {
   [UsuarioController::class, "logout"];
});

Route::get('/busqueda', function () {
    return view('busqueda');
});



Route::get("reporte",[RegistroController::class, "generarReporte"]);


Route::get("accesos",[RegistroController::class, "generarReporteAccesos"]);
