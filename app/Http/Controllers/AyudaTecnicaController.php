<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AyudaTecnicaRequest;
use App\AyudaTecnica;

class AyudaTecnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ayudas_tecnicas = AyudaTecnica::paginate(5);
        return view('admin.ayudas_tecnicas.index', compact('ayudas_tecnicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ayuda_tecnica = new AyudaTecnica();
        $btnText =  __("Guardar");

        return view('admin.ayudas_tecnicas.form', compact('ayuda_tecnica', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AyudaTecnicaRequest $ayudaTecnica_request)
    {
        AyudaTecnica::create( $ayudaTecnica_request->input() );

        return back()->with('message', [
            'class' =>  'success',
            'message'   =>  __("La ayuda tecnica ha sido ingresada correctamente")
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
        $ayuda_tecnica = AyudaTecnica::find($id);
        $btnText = __("Actualizar");
        return view('admin.ayudas_tecnicas.form', compact('ayuda_tecnica', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AyudaTecnicaRequest $ayudaTecnica_request, $id)
    {
        $ayuda_tecnica = AyudaTecnica::find($id);
        $ayuda_tecnica->fill( $ayudaTecnica_request->input() )->save();

        return redirect()->route('ayudastecnicas.edit', ['id' => $ayuda_tecnica->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La información de la ayuda tecnica ha sido actualizada exitosamente")
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
        $ayuda_tecnica = AyudaTecnica::find($id);
        
        try {

            $ayuda_tecnica->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Ayuda Tecnica eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar Ayuda Tecnica")
            ]);
        }
    }
}
