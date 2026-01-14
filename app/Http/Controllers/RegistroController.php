<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\Usuario;

use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class RegistroController extends Controller
{
    public function generarReporte(Request $request)
    {
        ini_set('max_execution_time', 600); // 300 segundos = 5 minutos
        ini_set('memory_limit', '4096M'); // (opcional) aumenta el límite de memoria

        $mes = $request->mes;
        $anio =  $request->anio;
        $dia =  $request->dia;
        
        $registros = Registro::with(['usuario' => function ($query) {
            $query->withTrashed();
        }])
        ->filtrarFecha($dia, $mes, $anio)
        ->get();
        //return response()->json($registros);
        
        $pdf = Pdf::loadView('reporte', compact('registros'))->setPaper('letter', 'landscape');
        return $pdf->stream('reporte_usuarios.pdf');
        


    }

   public function generarReporteAceptacion(Request $request)
    {
        ini_set('max_execution_time', 600);
        ini_set('memory_limit', '4096M');

        $grupos= [
            2801=>[
                "especialidad"=>"Produccion industrial de los alimentos",
                "semestre"=>"5",
                "grupo"=>"2801",
                "generacion"=>"2023-2026"
            ],

            3005=>[
                "especialidad"=>"Produccion industrial de los alimentos",
                "semestre"=>"5",
                "grupo"=>"2801",
                "generacion"=>"2023-2026"
            ],
        ];

        $mes = $request->mes;
        $anio = $request->anio;
        $dia = $request->dia;
        $actividad = $request->actividad;
        $grupo = $request->grupo;
        $documento = $request->documento;
        $profesor = $request->profesor;
        $arr_actividad = explode("-",$actividad);

        $materia = $arr_actividad[1];
        // 1️⃣ Usuarios únicos ordenados por nombre
        $usuarios = Usuario::withTrashed()
            ->with(['registros' => function ($query) use ($dia, $mes, $anio, $actividad) {
                $query->filtrarFecha($dia, $mes, $anio)
                    ->where('actividad', $actividad);
            }])
            ->where('grupo', $grupo)
            ->whereHas('registros', function ($query) use ($dia, $mes, $anio, $actividad) {
                $query->filtrarFecha($dia, $mes, $anio)
                    ->where('actividad', $actividad);
            })
            ->orderBy('nombre')
            ->get();

        // 2️⃣ Aplanar → agrupar por usuario_id → dejar un registro por usuario
        $registros = $usuarios
            ->flatMap(fn ($usuario) => $usuario->registros)
            ->groupBy('usuario_id')
            ->map(fn ($grupo) => $grupo->first())
            ->values();

        $pdf = Pdf::loadView($documento, [
                'registros' => $registros,
                'materia'=>$materia,
                'grupo'=>$grupos[$grupo],
                'mes'=>$mes,
                'dia'=>$dia,
                'anio'=>$anio,
                'profesor'=>$profesor
                

        ])->setPaper('letter', $documento=='aceptacion'?'landscape':'portrait');

        return $pdf->stream('reporte_'. $grupo.'_'. $materia. '_aceptacion.pdf');
    }



    public function generarReporteAccesos()
    {
        $datos = Registro::selectRaw('
            MONTH(created_at) AS mes,
            YEAR(created_at) AS anio,
            SUBSTRING_INDEX(SUBSTRING_INDEX(ip, ".", 3), ".", -1) AS tercer_octeto,
            COUNT(DISTINCT usuario_id) AS total
        ')
        ->groupBy('anio', 'mes', 'tercer_octeto')
        ->orderBy('anio')
        ->orderBy('mes')
        ->orderByRaw('CAST(tercer_octeto AS UNSIGNED)')
        ->get();
        
        $pdf = Pdf::loadView('accesos', compact('datos'))->setPaper('letter', 'portrait');
        return $pdf->stream('reporte_usuarios.pdf');
    }


    public function me(Request $request)
    {
        $now = Carbon::now();
      
        
        $registro = Registro::where('ip', $request->ip())
        ->where('ended_at', '>', $now)
        ->where('created_at', '<', $now)
        ->with(["usuario.datos"])
        ->orderBy("created_at","DESC")
        ->first();



        if($request->test)
        {

           
            $registro = Registro::whereHas('usuario', function ($query) use ($request) {
                $query->where("usuario", "=", $request->test);
             
            })
            ->with('usuario.datos')
            ->orderBy('created_at', 'DESC')
            ->first();

            $registro->actividad = $request->url;
        }

        if(!$registro)
        {
            return view("nouser");
        }
        
        $registro->usuario->datos = $registro->usuario->datos->keyBy('propiedad')->toArray();

              //  return response()->json($registro->actividad);
        if($request->url )
        {
            if(  strtolower($registro->actividad) !=  strtolower($request->url) && $request->url!="correo" && $request->url!="calificaciones")
                return view("nouser");
            return view($request->url, ['registro' => $registro]);
        }
     
        
        return view("me", ['registro' => $registro]);
    }

    

    
}
