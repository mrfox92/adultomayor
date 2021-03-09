<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InstitucionSaludRequest;
use App\InstitucionSalud;

class InstitucionSaludController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituciones_salud = InstitucionSalud::paginate(4);

        return view('admin.institucion_salud.index', compact('instituciones_salud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institucion_salud = new InstitucionSalud();
        $btnText = __("Guardar");

        return view('admin.institucion_salud.form', compact('institucion_salud', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstitucionSaludRequest $institucionSalud_request)
    {
        InstitucionSalud::create( $institucionSalud_request->input() );

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nueva institución salud agregada exitosamente")
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
        $institucion_salud = InstitucionSalud::find($id);
        $btnText = __("Actualizar");

        return view('admin.institucion_salud.form', compact('institucion_salud', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstitucionSaludRequest $institucionSalud_request, $id)
    {
        $institucion_salud = InstitucionSalud::find($id);

        $institucion_salud->fill( $institucionSalud_request->input() )->save();

        return redirect()->route('institucionsalud.edit', ['id' => $institucion_salud->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Institución actualizada exitosamente")
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
        $institucion_salud = InstitucionSalud::find($id);
        
        try {

            $institucion_salud->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Institución Salud eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar Institución Salud")
            ]);
        }
        
    }
}
