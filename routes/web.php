<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistroController;
Route::get('/', function () {
    return view('welcome');
});



Route::get('/test', function () {
    return view('portal');
});


Route::get("reporte",[RegistroController::class, "generarReporte"]);