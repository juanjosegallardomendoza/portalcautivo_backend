<?php

namespace App\Http\Controllers;

use App\Models\Actividad;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;


class ActividadController extends Controller
{
    use SoftDeletes;

    public function index()
    { 
        return Actividad::orderBy("nombre", "ASC")->get();
    }   
}
