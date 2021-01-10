<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TipoTalleresRequest;
use App\TipoTaller;

class TipoTallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_talleres = TipoTaller::paginate(1);
        
        return view('admin.tipo_talleres.index', compact('tipo_talleres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipotaller = new TipoTaller();
        $btnText = __("Guardar");
        return view('admin.tipo_talleres.form', compact('tipotaller', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoTalleresRequest $tipo_talleres_request)
    {
        TipoTaller::create($tipo_talleres_request->input());

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Nuevo Tipo Taller agregado con éxito")
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
        $tipotaller = TipoTaller::find($id);
        $btnText = __("Actualizar");

        return view('admin.tipo_talleres.form', compact('tipotaller', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoTalleresRequest $tipo_talleres_request, $id)
    {
        $tipotaller = TipoTaller::find($id);

        $tipotaller->fill( $tipo_talleres_request->input() )->save();

        return redirect()->route('tipotalleres.edit', ['id' => $tipotaller->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Tipo Taller actualizado exitosamente")
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
        $tipotaller = TipoTaller::find($id);
        
        try {

            $tipotaller->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Tipo Taller eliminado con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar Tipo Taller")
            ]);
        }
    }
}
