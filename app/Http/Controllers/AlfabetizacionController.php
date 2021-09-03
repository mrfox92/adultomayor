<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alfabetizacion;

use App\Http\Requests\AlfabetizacionRequest;

class AlfabetizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.alfabetizacion.index');
    }

    public function listar()
    {
        return Alfabetizacion::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alfabetizacion = new Alfabetizacion();
        $btnText = __("Guardar nivel");
        return view('admin.alfabetizacion.form', compact('alfabetizacion', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlfabetizacionRequest $alfabetizacion_request)
    {
        $alfabetizacion = Alfabetizacion::create($alfabetizacion_request->input());

        return redirect()->route('alfabetizacion.edit', ['id' => $alfabetizacion->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nivel alfabetización agregado exitosamente")  
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alfabetizacion = Alfabetizacion::find($id);
        $btnText = __("Actualizar nivel");
        return view('admin.alfabetizacion.form', compact('alfabetizacion', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlfabetizacionRequest $alfabetizacion_request, $id)
    {
        $alfabetizacion = Alfabetizacion::find($id);

        $alfabetizacion->fill( $alfabetizacion_request->input() )->save();

        return redirect()->route('alfabetizacion.edit', ['id' => $alfabetizacion->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nivel alfabetización actualizado exitosamente")  
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
        $alfabetizacion = Alfabetizacion::find($id);
        $alfabetizacion->delete();
    }
}
