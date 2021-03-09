<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AtencionRequest;

use App\Atencion;
use Carbon\Carbon;

class AtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atenciones = Atencion::paginate(5);
        return view('admin.atenciones.index', compact('atenciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $atencion = new Atencion();
        $btnText = __("Guardar");
        return view('admin.atenciones.form', compact('atencion', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtencionRequest $atencion_request)
    {
        Atencion::create( $atencion_request->input() );

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La atención ha sido creada exitosamente")
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
        $atencion = Atencion::find($id);
        $btnText = __("Actualizar");

        // Parseamos las fechas para poder trabajarlas bien en el formulario
        if ( $atencion->fecha_inicio ) {

            $atencion->fecha_inicio = Carbon::parse($atencion->fecha_inicio)->format('Y-m-d');
        }

        if ( $atencion->fecha_fin ) {

            $atencion->fecha_fin = Carbon::parse($atencion->fecha_fin)->format('Y-m-d');
        }

        return view('admin.atenciones.form', compact('atencion', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtencionRequest $atencion_request, $id)
    {
        $atencion = Atencion::find($id);

        $atencion->fill( $atencion_request->input() )->save();

        return redirect()->route('atenciones.edit', ['id' => $atencion->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La información de la atención ha sido actualizada exitosamente")
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
        $atencion = Atencion::find($id);
        
        try {

            $atencion->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("La atención ha sido eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar la Atencion")
            ]);
        }
    }
}
