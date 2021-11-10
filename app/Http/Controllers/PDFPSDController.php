<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonaDiscapacitada;
use App\EstablecimientoEducacional;
use App\OrganizacionPsd;
use App\OtraOcupacionPsd;
use App\Independiente;
use App\BeneficioEstatalPsd;
use App\DiscapacidadPsd;

class PDFPSDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function reporte($id)
    {
        $psd = PersonaDiscapacitada::with(['nacionalidad'])
            ->where('id', $id)->first();
        
        $establecimiento = EstablecimientoEducacional::where('psd_id', $psd->id)->first();
        $trabajador = OrganizacionPsd::where('psd_id', $psd->id)->first();
        $otras = OtraOcupacionPsd::where('psd_id', $psd->id)->first();
        $independiente = Independiente::where('psd_id', $psd->id)->first();

        //  discapacidades PSD
        $discapacidades = DiscapacidadPsd::with(['psd', 'tipoDiscapacidad'])->where('psd_id', $psd->id)->get();

        $beneficiospsd = BeneficioEstatalPsd::with(['psd', 'beneficioEstatal'])->where('psd_id', $psd->id)->get();

        $pdf = \PDF::loadView('admin.psd.reporte', compact('psd', 'establecimiento', 'trabajador', 'otras', 'independiente', 'beneficiospsd', 'discapacidades'));
        return $pdf->stream('psd-reporte.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
