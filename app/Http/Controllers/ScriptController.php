<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScriptController extends Controller
{
    //  

    public function show($id)
    {

        $claves = [
           [
                "codigo_materia" => "I-PMAT",
                "codigo_examen" => "299454"
           ],
           [
                "codigo_materia" => "I-CNET",
                "codigo_examen" => "67890"
           ]
        ];
        $contenido = view("script", [
            "claves" => $claves,
        ])->render();

        return response($contenido)
            ->header('Content-Type', 'application/javascript; charset=UTF-8');
    }
}
