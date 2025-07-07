<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        $usuario = Usuario::where("usuario", $request->usuario)
            ->where("password", $request->password)->first();
        if($usuario)
        {
            return response()->json($usuario);
        }
        else
        {
            return response()->json(["codigo"=>"error"],404);
        }
    }
}
