<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistroController extends Controller
{
    public function generarReporte(Request $request)
    {
        $registros =  Registro::with("usuario")->get();
        $pdf = Pdf::loadView('reporte', compact('registros'));
        return $pdf->download('reporte_usuarios.pdf');
    }
}
