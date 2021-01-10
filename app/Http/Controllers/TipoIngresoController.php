<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IngresoRequest;
use App\Ingreso;

class TipoIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresos = Ingreso::paginate(3);
        return view('admin.ingresos.index', compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingreso = new Ingreso();
        $btnText = __("Guardar");
        return view('admin.ingresos.form', compact('ingreso', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngresoRequest $ingreso_request)
    {
        Ingreso::create($ingreso_request->input());

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nuevo Tipo Ingreso agregado con éxito")
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
        $ingreso = Ingreso::find($id);
        $btnText = __("Actualizar");

        return view('admin.ingresos.form', compact('ingreso', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IngresoRequest $ingreso_request, $id)
    {
        $ingreso = Ingreso::find($id);

        $ingreso->fill( $ingreso_request->input() )->save();

        return redirect()->route('ingresos.edit', ['id' => $ingreso->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Tipo Ingreso actualizado exitosamente")
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
        $ingreso = Ingreso::find($id);
        
        try {

            $ingreso->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Tipo ingreso eliminado con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar Tipo ingreso")
            ]);
        }
    }
}
