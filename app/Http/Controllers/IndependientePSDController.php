<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IndependientePSDRequest;
use App\Independiente;
use App\PersonaDiscapacitada;
use Illuminate\Support\Str; //  utilizar fachada para trabajar con string

class IndependientePSDController extends Controller
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
        $independiente = new Independiente();
        $btnText = __("Guardar");

        return view('admin.independientes.form', compact('psd', 'independiente', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndependientePSDRequest $independiente_request)
    {
        $independiente = Independiente::create( $independiente_request->input() );

        return redirect()->route('independientes.edit', $independiente->psd_id )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La ficha Independiente PSD ha sido registrada exitosamente")
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
        $independiente = Independiente::with(['psd'])->where('psd_id', $id)->first();

        $nombre_archivo = $independiente->psd->nombres .' '. $independiente->psd->apellidos.' ';
        $nombre_archivo .= 'ficha otra ocupación ';

        $nombre_archivo .= $independiente->updated_at->toDateString();

        $nombre_archivo = Str::slug($nombre_archivo, '-');

        $pdf = \PDF::loadView('admin.independientes.independientepsd', compact('independiente'));
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
        $independiente = Independiente::with(['psd'])->where('psd_id', $id)->first();
        $btnText = __("Actualizar");

        return view('admin.independientes.form', compact('independiente', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IndependientePSDRequest $independiente_request, $id)
    {
        $independiente = Independiente::find($id);

        $independiente->fill( $independiente_request->input() )->save();

        return redirect()->route('independientes.edit', ['id' => $independiente->psd_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Ficha Independiente PSD actualizada exitosamente")
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
