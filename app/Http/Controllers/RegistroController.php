<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
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



        if($request->test==true)
        {

           
            $registro = Registro::whereHas('usuario', function ($query) {
                $query->where("id", "=", value: 116);
             
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
            if(  strtolower($registro->actividad) != $request->url)
                return view("nouser");
            return view($request->url, ['registro' => $registro]);
        }
     
        
        return view("me", ['registro' => $registro]);
    }


    
}
