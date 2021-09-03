<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TipoViviendaRequest;
use App\TipoVivienda;

class TipoViviendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('admin.tipo_viviendas.index');
    }

    public function listar()
    {
        return TipoVivienda::all();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipovivienda = new TipoVivienda();
        $btnText = __("Guardar");
        return view('admin.tipo_viviendas.form', compact('tipovivienda', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoViviendaRequest $tipovivienda_request)
    {
        TipoVivienda::create($tipovivienda_request->input());

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nuevo Tipo Vivienda agregado con éxito")
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
        $tipovivienda = TipoVivienda::find($id);
        $btnText = __("Actualizar");

        return view('admin.tipo_viviendas.form', compact('tipovivienda', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoViviendaRequest $tipovivienda_request, $id)
    {
        $tipovivienda = TipoVivienda::find($id);

        $tipovivienda->fill( $tipovivienda_request->input() )->save();

        return redirect()->route('tipoviviendas.edit', ['id' => $tipovivienda->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Tipo Vivienda actualizada exitosamente")
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
        $tipovivienda = TipoVivienda::find($id);
        $tipovivienda->delete();
    }
}
