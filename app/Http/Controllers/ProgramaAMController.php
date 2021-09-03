<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramaAMRequest;

use App\Programa;

class ProgramaAMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programa::paginate(4);

        return view('admin.programas.index', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programa = new Programa();
        $btnText = __("Guardar");

        return view('admin.programas.form', compact('programa', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramaAMRequest $programa_request)
    {
        // dd( $programa_request->input() );
        $programa = Programa::create( $programa_request->input() );

        return redirect()->route('programas.edit', $programa->id )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("El programa ha sido registrado exitosamente")
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
        $programa = Programa::find($id);
        $btnText = __("Actualizar");

        return view('admin.programas.form', compact('programa', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramaAMRequest $programa_request, $id)
    {
        // dd( $programa_request->input() );
        $programa = Programa::find($id);

        $programa->fill( $programa_request->input() )->save();

        return redirect()->route('programas.edit', ['id' => $programa->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("El programa ha sido actualizada exitosamente")
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
        $programa = Programa::find($id);
        
        try {

            $programa->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("El programa ha sido eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar el programa")
            ]);
        }
    }
}
