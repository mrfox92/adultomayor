<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TipoDiscapacidadRequest;
use App\TipoDiscapacidad;

class TipoDiscapacidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_discapacidades = TipoDiscapacidad::paginate(5);

        return view('admin.tipo_discapacidades.index', compact('tipo_discapacidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_discapacidad = new TipoDiscapacidad();
        $btnText = __("Guardar");

        return view('admin.tipo_discapacidades.form', compact('tipo_discapacidad', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoDiscapacidadRequest $tipoDiscapacidad_request)
    {
        TipoDiscapacidad::create( $tipoDiscapacidad_request->input() );

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nuevo Tipo Discapacidad agregado con éxito")
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
        $tipo_discapacidad = TipoDiscapacidad::find($id);
        $btnText = __("Actualizar");

        return view('admin.tipo_discapacidades.form', compact('tipo_discapacidad', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoDiscapacidadRequest $tipoDiscapacidad_request, $id)
    {
        $tipo_discapacidad = TipoDiscapacidad::find($id);

        $tipo_discapacidad->fill( $tipoDiscapacidad_request->input() )->save();

        return redirect()->route('tipodiscapacidades.edit', ['id' => $tipo_discapacidad->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Tipo Discapacidad actualizado exitosamente")
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
        $tipo_discapacidad = TipoDiscapacidad::find($id);
        
        try {

            $tipo_discapacidad->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Tipo Discapacidad eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar Tipo Discapacidad")
            ]);
        }
    }
}
