<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NacionalidadRequest;
use App\Nacionalidad;

class NacionalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nacionalidades = Nacionalidad::paginate(5);

        return view('admin.nacionalidad.index', compact('nacionalidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nacionalidad = new Nacionalidad();
        $btnText = __("Guardar");
        return view('admin.nacionalidad.form', compact('nacionalidad', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NacionalidadRequest $nacionalidad_request)
    {
        Nacionalidad::create($nacionalidad_request->input());

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nacionalidad agregada con éxito")
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
        $nacionalidad = Nacionalidad::find($id);
        $btnText = __("Actualizar");

        return view('admin.nacionalidad.form', compact('nacionalidad', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NacionalidadRequest $nacionalidad_request, $id)
    {
        $nacionalidad = Nacionalidad::find($id);

        $nacionalidad->fill( $nacionalidad_request->input() )->save();

        return redirect()->route('nacionalidad.edit', ['id' => $nacionalidad->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nacionalidad actualizada exitosamente")
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
        $nacionalidad = Nacionalidad::find($id);
        
        try {

            $nacionalidad->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Nacionalidad eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar nacionalidad")
            ]);
        }
    }
}
