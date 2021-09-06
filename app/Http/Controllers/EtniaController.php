<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EtniaRequest;
use App\Etnia;

class EtniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etnias = Etnia::paginate(25);

        return view('admin.etnias.index', compact('etnias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etnia = new Etnia();
        $btnText = __("Guardar");
        return view('admin.etnias.form', compact('etnia', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtniaRequest $etnia_request)
    {
        Etnia::create($etnia_request->input());

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nueva Etnia agregada con éxito")
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
        $etnia = Etnia::find($id);
        $btnText = __("Actualizar");

        return view('admin.etnias.form', compact('etnia', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EtniaRequest $etnia_request, $id)
    {
        $etnia = Etnia::find($id);

        $etnia->fill( $etnia_request->input() )->save();

        return redirect()->route('etnia.edit', ['id' => $etnia->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Etnia actualizada exitosamente")
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
        $etnia = Etnia::find($id);
        
        try {

            $etnia->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("etnia eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar etnia")
            ]);
        }
    }
}
