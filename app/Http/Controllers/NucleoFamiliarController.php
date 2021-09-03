<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NucleoFamiliarRequest;
use App\NucleoFamiliar;

class NucleoFamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nucleosfamiliares = NucleoFamiliar::paginate(10);
        return view('admin.nucleosfamiliares.index', compact('nucleosfamiliares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nucleofamiliar = new NucleoFamiliar();
        $btnText = __("Guardar");
        return view('admin.nucleosfamiliares.form', compact('nucleofamiliar', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NucleoFamiliarRequest $nucleofamiliar_request)
    {
        NucleoFamiliar::create($nucleofamiliar_request->input());

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nuevo Nucleo Familiar agregado con éxito")
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
        $nucleofamiliar = NucleoFamiliar::find($id);
        $btnText = __("Actualizar");

        return view('admin.nucleosfamiliares.form', compact('nucleofamiliar', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NucleoFamiliarRequest $nucleofamiliar_request, $id)
    {
        $nucleofamiliar = NucleoFamiliar::find($id);

        $nucleofamiliar->fill( $nucleofamiliar_request->input() )->save();

        return redirect()->route('nucleofamiliar.edit', ['id' => $nucleofamiliar->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nucleo Familiar actualizado exitosamente")
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
        $nucleofamiliar = NucleoFamiliar::find($id);
        
        try {

            $nucleofamiliar->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Nucleo familiar eliminado con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar nucleo familiar")
            ]);
        }
    }
}
