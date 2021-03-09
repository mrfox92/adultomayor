<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PatologiaRequest;
use App\Patologia;

class PatologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patologias = Patologia::paginate(4);

        return view('admin.patologias.index', compact('patologias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patologia = new Patologia();
        $btnText = __("Guardar");

        return view('admin.patologias.form', compact('patologia', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatologiaRequest $patologia_request)
    {
        Patologia::create( $patologia_request->input() );

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nueva Patología agregada exitosamente")
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
        $patologia = Patologia::find($id);
        $btnText = __("Actualizar");

        return view('admin.patologias.form', compact('patologia', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatologiaRequest $patologia_request, $id)
    {
        $patologia = Patologia::find($id);
        $patologia->fill( $patologia_request->input() )->save();

        return redirect()->route('patologias.edit', ['id' => $patologia->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Patologia actualizada exitosamente")
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
        $patologia = Patologia::find($id);
        
        try {

            $patologia->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Patologia eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar Patologia")
            ]);
        }
    }
}
