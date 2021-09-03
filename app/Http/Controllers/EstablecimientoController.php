<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EstablecimientoRequest;
use App\EstablecimientoEducacional;
use App\PersonaDiscapacitada;
use Illuminate\Support\Str; //  utilizar fachada para trabajar con string

class EstablecimientoController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $psd = PersonaDiscapacitada::find($id);
        $establecimiento = new EstablecimientoEducacional();
        $btnText = __("Guardar");

        return view('admin.establecimientos.form', compact('psd', 'establecimiento', 'btnText'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstablecimientoRequest $request_establecimiento)
    {
        $establecimiento = EstablecimientoEducacional::create( $request_establecimiento->input() );

        return redirect()->route('establecimiento.edit', $establecimiento->psd_id )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La ficha establecimiento educacional ha sido registrada exitosamente")
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $establecimiento = EstablecimientoEducacional::with(['psd'])->where('psd_id', $id)->first();

        $nombre_archivo = $establecimiento->psd->nombres .' '. $establecimiento->psd->apellidos.' ';
        $nombre_archivo .= 'ficha establecimiento educacional ';

        $nombre_archivo .= $establecimiento->updated_at->toDateString();

        $nombre_archivo = Str::slug($nombre_archivo, '-');
        $pdf = \PDF::loadView('admin.establecimientos.establecimientopsd', compact('establecimiento'));
        return $pdf->stream($nombre_archivo.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $establecimiento = EstablecimientoEducacional::with(['psd'])->where('psd_id', $id)->first();
        $btnText = __("Actualizar");

        return view('admin.establecimientos.form', compact('establecimiento', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstablecimientoRequest $request_establecimiento, $id)
    {
        $establecimiento = EstablecimientoEducacional::find($id);

        $establecimiento->fill( $request_establecimiento->input() )->save();

        return redirect()->route('establecimiento.edit', ['id' => $establecimiento->psd_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Ficha Establecimiento educacional actualizada exitosamente")
        ]);
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
