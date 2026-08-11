<?php

namespace App\Http\Controllers;

use App\Models\Actividad;

use Illuminate\Http\Request;


class ActividadController extends Controller
{

    public function index()
    { 
        return Actividad::orderBy("nombre", "ASC")->get();
    }   
}
