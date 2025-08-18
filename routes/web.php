<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistroController;
Route::get('/', function () {
    return view('welcome');
});



Route::get('/test', function () {
    return view('portal');
});

Route::get('/success', function () {
    return view('bienvenido');
});

Route::get('/busqueda', function () {
    return view('busqueda');
});



Route::get("reporte",[RegistroController::class, "generarReporte"]);
