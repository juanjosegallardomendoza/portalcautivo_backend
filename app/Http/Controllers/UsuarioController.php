<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Registro;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {

        if($request->actividad =="")
        {
             return response()->json(["codigo"=>"error", "message"=>"Especifica la actividad" ],400);
        }
        $usuario = Usuario::where("usuario", $request->usuario)
            ->where("password", $request->password)->first();
 
        if($usuario)
        {
            $usuario->codigo = "cecyteg";
            $duraciones = ["alumno_50"=>50, "alumno_100"=>100, "alumno_150"=>150];

            $registro = new Registro();
            $registro->usuario_id= $usuario->id;
            $registro->ip = request()->ip();
            $registro->duracion =  $duraciones[$request->duracion];
            $registro->actividad =  $request->actividad;
            $registro->save();

            
            return response()->json($usuario);
        }
        else
        {
            return response()->json(["codigo"=>"error", "message"=>"Usuario o password incorrectos" ],404);
        }
    }
}
