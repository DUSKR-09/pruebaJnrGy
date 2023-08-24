<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncisosController extends Controller
{
    public function factorial(Request $request)
    {
        if(count($request->all()) > 0) {
            $num = $request->num;
            return view('incisos.factorial', compact('num'));
        }
        return view('incisos.factorial');
    }

    public function amortizacion(Request $request)
    {
        if(count($request->all()) > 0) {
            $monto = $request->monto;
            $tasa = $request->tasa;
            $periodo = $request->periodo;

            return view('incisos.amortizacion', compact('monto', 'tasa', 'periodo'));
        }
        return view('incisos.amortizacion');
    }
}
