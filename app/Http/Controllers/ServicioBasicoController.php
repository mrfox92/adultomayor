<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServicioBasicoRequest;

use App\ServicioBasico;

class ServicioBasicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios_basicos = ServicioBasico::paginate(5);
        return view('admin.servicios_basicos.index', compact('servicios_basicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicio_basico = new ServicioBasico();
        $btnText = __("Guardar");
        return view('admin.servicios_basicos.form', compact('servicio_basico', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicioBasicoRequest $servicioBasico_request)
    {
        ServicioBasico::create( $servicioBasico_request->input() );

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("El Servicio Basico ha sido creado exitosamente")
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
        $servicio_basico = ServicioBasico::find($id);
        $btnText = __("Actualizar");

        return view('admin.servicios_basicos.form', compact('servicio_basico', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServicioBasicoRequest $servicioBasico_request, $id)
    {
        $servicio_basico = ServicioBasico::find($id);

        $servicio_basico->fill( $servicioBasico_request->input() )->save();

        return redirect()->route('serviciosbasicos.edit', ['id' => $servicio_basico->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("El Servicio Básico ha sido actualizado exitosamente")
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
        $servicio_basico = ServicioBasico::find($id);
        
        try {

            $servicio_basico->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("El Servicio Básico ha sido eliminado con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar el Servicio Básico")
            ]);
        }
    }
}
