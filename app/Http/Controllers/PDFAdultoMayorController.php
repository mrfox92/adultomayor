<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\AdultoMayor;

class PDFAdultoMayorController extends Controller
{
    public function PDF() {

        $pdf = \PDF::loadView('admin.adultosmayores.prueba');
        //  generar nombre archivo a partir de la fecha
        // $date = Carbon::now()->format('Y-m-d-H-i-m');
        // $date .= '-PDF-Adulto-Mayor';
        // dd( $date );
        // return $pdf->download('prueba.pdf');
        return $pdf->stream('prueba.pdf');
    }

    public function PDFAM() {

        $adultosmayores = AdultoMayor::all();

        $pdf = \PDF::loadView('admin.adultosmayores.adultosmayores', compact('adultosmayores'));
        return $pdf->download('adultosmayores.pdf');
        // return $pdf->stream('adultosmayores.pdf');
    }
}
