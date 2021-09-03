<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TrabajoBanoRequest;


use App\TrabajoBano;

class TrabajoBanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajos_bano = TrabajoBano::paginate(10);
        return view('admin.trabajos_bano.index', compact('trabajos_bano'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trabajo_bano = new TrabajoBano();
        $btnText =  __("Guardar");

        return view('admin.trabajos_bano.form', compact('trabajo_bano', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrabajoBanoRequest $trabajoBano_request)
    {
        TrabajoBano::create( $trabajoBano_request->input() );

        return back()->with('message', [
            'class' =>  'success',
            'message'   =>  __("El trabajo baño ha sido agregado exitosamente")
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
        $trabajo_bano = TrabajoBano::find($id);
        $btnText = __("Actualizar");
        return view('admin.trabajos_bano.form', compact('trabajo_bano', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrabajoBanoRequest $trabajoBano_request, $id)
    {
        $trabajo_bano = TrabajoBano::find($id);
        $trabajo_bano->fill( $trabajoBano_request->input() )->save();

        return redirect()->route('trabajosbano.edit', ['id' => $trabajo_bano->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La información del trabajo baño ha sido actualizada exitosamente")
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
        $trabajo_bano = TrabajoBano::find($id);
        
        try {

            $trabajo_bano->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Trabajo baño eliminado con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar Trabajo Baño")
            ]);
        }
    }
}
