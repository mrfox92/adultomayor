<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RedesRequest;
use App\Red;

class RedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $redes = Red::paginate(2);

        return view('admin.redes.index', compact('redes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $red = new Red();
        $btnText = __("Guardar");
        return view('admin.redes.form', compact('red', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RedesRequest $redes_request)
    {
        Red::create($redes_request->input());

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nueva Red agregada con éxito")
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
        $red = Red::find($id);
        $btnText = __("Actualizar");

        return view('admin.redes.form', compact('red', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RedesRequest $redes_request, $id)
    {
        $red = Red::find($id);

        $red->fill( $redes_request->input() )->save();

        return redirect()->route('redes.edit', ['id' => $red->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("red actualizada exitosamente")
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
        $red = Red::find($id);
        
        try {

            $red->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Red eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar Red")
            ]);
        }
    }
}
