<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TrabajadorPSDRequest;
use App\PersonaDiscapacitada;
use App\OrganizacionPsd;
use Illuminate\Support\Str; //  utilizar fachada para trabajar con string


class TrabajadorPSDController extends Controller
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
        $trabajador = new OrganizacionPsd();
        $btnText = __("Guardar");

        return view('admin.trabajadores.form', compact('psd', 'trabajador', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrabajadorPSDRequest $trabajador_request)
    {
        $trabajador = OrganizacionPsd::create( $trabajador_request->input() );

        return redirect()->route('trabajador.edit', $trabajador->psd_id )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La ficha trabajador psd ha sido registrada exitosamente")
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
        $trabajador = OrganizacionPsd::with(['psd'])->where('psd_id', $id)->first();

        $nombre_archivo = $trabajador->psd->nombres .' '. $trabajador->psd->apellidos.' ';
        $nombre_archivo .= 'ficha lugar de trabajo ';

        $nombre_archivo .= $trabajador->updated_at->toDateString();

        $nombre_archivo = Str::slug($nombre_archivo, '-');

        $pdf = \PDF::loadView('admin.trabajadores.trabajopsd', compact('trabajador'));
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
        $trabajador = OrganizacionPsd::with(['psd'])->where('psd_id', $id)->first();
        $btnText = __("Actualizar");

        return view('admin.trabajadores.form', compact('trabajador', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrabajadorPSDRequest $trabajador_request, $id)
    {
        $trabajador = OrganizacionPsd::find($id);

        $trabajador->fill( $trabajador_request->input() )->save();

        return redirect()->route('trabajador.edit', ['id' => $trabajador->psd_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Ficha Trabajador PSD actualizada exitosamente")
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
