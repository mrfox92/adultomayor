<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OtraOcupacionPSDRequest;
use App\OtraOcupacionPsd;
use App\PersonaDiscapacitada;
use Illuminate\Support\Str; //  utilizar fachada para trabajar con string

class OtraOcupacionPSDController extends Controller
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
        $otra_ocupacion = new OtraOcupacionPsd();
        $btnText = __("Guardar");

        return view('admin.otras_ocupaciones.form', compact('psd', 'otra_ocupacion', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OtraOcupacionPSDRequest $otra_ocupacion_request)
    {
        $otra_ocupacion = OtraOcupacionPsd::create( $otra_ocupacion_request->input() );

        return redirect()->route('otras.edit', $otra_ocupacion->psd_id )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La ficha Otra ocupación PSD ha sido registrada exitosamente")
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
        $otra_ocupacion = OtraOcupacionPsd::with(['psd'])->where('psd_id', $id)->first();

        $nombre_archivo = $otra_ocupacion->psd->nombres .' '. $otra_ocupacion->psd->apellidos.' ';
        $nombre_archivo .= 'ficha otra ocupación ';

        $nombre_archivo .= $otra_ocupacion->updated_at->toDateString();

        $nombre_archivo = Str::slug($nombre_archivo, '-');

        $pdf = \PDF::loadView('admin.otras_ocupaciones.ocupacionpsd', compact('otra_ocupacion'));
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
        $otra_ocupacion = OtraOcupacionPsd::with(['psd'])->where('psd_id', $id)->first();
        $btnText = __("Actualizar");

        return view('admin.otras_ocupaciones.form', compact('otra_ocupacion', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OtraOcupacionPSDRequest $otra_ocupacion_request, $id)
    {
        $otra_ocupacion = OtraOcupacionPsd::find($id);

        $otra_ocupacion->fill( $otra_ocupacion_request->input() )->save();

        return redirect()->route('otras.edit', ['id' => $otra_ocupacion->psd_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Ficha Otra ocupación PSD actualizada exitosamente")
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
