<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\AdultoMayor;
use App\Acompanante;
use App\AmTaller;
use App\DiscapacidadAm;
use App\AmActividad;
use App\AmPrograma;
use App\AmAtencion;
use App\AmTrabajoBano;
use App\AmAyudaTecnica;
use App\AmIngreso;
use App\AmRed;

use Illuminate\Support\Str;

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

    public function PDFAM($id) {

        $adultomayor = AdultoMayor::with(['nacionalidad', 'alfabetizacion', 'tipoVivienda', 'nucleoFamiliar', 'amEtnias'])
            ->where('id', $id)->first();

        $acompanante = Acompanante::where('am_id', $adultomayor->id)->first();
        
        $discapacidades = DiscapacidadAm::with(['tipoDiscapacidad'])->where('am_id', $adultomayor->id)->get();
        $amTaller = AmTaller::with(['taller'])->where('am_id', $adultomayor->id)->get();
        $amActividad = AmActividad::with(['actividad'])->where('am_id', $adultomayor->id)->get();
        
        $amAyudaTecnica = AmAyudaTecnica::with(['ayudaTecnica'])->where('am_id', $adultomayor->id)->get();
        $amAtencion = AmAtencion::with(['atencion'])->where('am_id', $adultomayor->id)->get();
        $amTrabajoBano = AmTrabajoBano::with(['atencion'])->where('am_id', $adultomayor->id)->get();

        //  programas am

        $amPrograma = AmPrograma::with(['programa'])->where('am_id', $adultomayor->id)->get();

        //  redes am
        $amRedes = AmRed::with(['red'])->where('am_id', $adultomayor->id)->get();


        $amIngresos = AmIngreso::with(['ingreso'])->where('am_id', $adultomayor->id)->get();

        //  nombre archivo

        $nombre_archivo = $adultomayor->nombres .' '. $adultomayor->apellidos.' ';
        $nombre_archivo .= 'ficha adulto mayor ';

        $nombre_archivo .= $adultomayor->updated_at->toDateString();

        $nombre_archivo = Str::slug($nombre_archivo, '-');
        
        $pdf = \PDF::loadView('admin.adultosmayores.adultosmayores', compact('adultomayor', 'acompanante', 'discapacidades', 'amTaller', 'amActividad', 'amAyudaTecnica', 'amAtencion', 'amTrabajoBano', 'amPrograma', 'amRedes', 'amIngresos'));
        return $pdf->stream($nombre_archivo.'.pdf');
    }
}
