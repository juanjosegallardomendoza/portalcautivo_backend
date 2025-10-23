<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistroController extends Controller
{
    public function generarReporte(Request $request)
    {
        ini_set('max_execution_time', 600); // 300 segundos = 5 minutos
        ini_set('memory_limit', '2048M'); // (opcional) aumenta el límite de memoria

        $mes = $request->mes;
        $anio =  $request->anio;
        $dia =  $request->dia;
        
        $registros =  Registro::with("usuario")
            ->filtrarFecha($dia, $mes, $anio)
            ->take(1000)
            ->get();
       
        $pdf = Pdf::loadView('reporte', compact('registros'))->setPaper('letter', 'landscape');
        return $pdf->stream('reporte_usuarios.pdf');
        


    }

    
}
