<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActividadRequest;
use Carbon\Carbon;

use App\Actividad;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = Actividad::paginate(4);

        return view('admin.actividades.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividad = new Actividad();
        $btnText = __("Guardar");

        return view('admin.actividades.form', compact('actividad', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActividadRequest $actividad_request)
    {
        Actividad::create( $actividad_request->input() );

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La Actividad ha sido agregada exitosamente")
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
        $actividad = Actividad::find($id);
        $btnText = __("Actualizar");

        // Parseamos las fechas para poder trabajarlas bien en el formulario
        if ( $actividad->fecha_inicio ) {

            $actividad->fecha_inicio = Carbon::parse($actividad->fecha_inicio)->format('Y-m-d');
        }

        if ( $actividad->fecha_fin ) {

            $actividad->fecha_fin = Carbon::parse($actividad->fecha_fin)->format('Y-m-d');
        }

        return view('admin.actividades.form', compact('actividad', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActividadRequest $actividad_request, $id)
    {
        $actividad = Actividad::find($id);

        $actividad->fill( $actividad_request->input() )->save();

        return redirect()->route('actividades.edit', ['id' => $actividad->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La actividad ha sido actualizada exitosamente")
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
        $actividad = Actividad::find($id);
        
        try {

            $actividad->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("La actividad ha sido eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar la actividad")
            ]);
        }
    }
}
