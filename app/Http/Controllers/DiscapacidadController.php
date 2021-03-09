<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscapacidadRequest;

use App\Discapacidad;

class DiscapacidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discapacidades = Discapacidad::with(['tipoDiscapacidad'])->paginate(4);
        // dd( $discapacidades );

        return view('admin.discapacidades.index', compact('discapacidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discapacidad = new Discapacidad();
        $btnText = __("Guardar");

        return view('admin.discapacidades.form', compact('discapacidad', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscapacidadRequest $discapacidad_request)
    {
        Discapacidad::create( $discapacidad_request->input() );

        return back()->with('message', [
            'class' =>  'success',
            'message'   =>  __("La discapacidad ha sido ingresada correctamente")
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
        $discapacidad = Discapacidad::find($id);
        $btnText = __("Actualizar");

        return view('admin.discapacidades.form', compact('discapacidad', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscapacidadRequest $discapacidad_request, $id)
    {
        $discapacidad = Discapacidad::find($id);

        $discapacidad->fill( $discapacidad_request->input() )->save();

        return redirect()->route('discapacidades.edit', ['id' => $discapacidad->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Discapacidad actualizada exitosamente")
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
        $discapacidad = Discapacidad::find($id);
        
        try {

            $discapacidad->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Discapacidad eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar discapacidad")
            ]);
        }
    }
}
