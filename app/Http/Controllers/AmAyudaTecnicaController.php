<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AmAyudaTecnicaRequest;

use App\AmAyudaTecnica;
use App\AdultoMayor;

class AmAyudaTecnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $am_ayuda_tecnica = new AmAyudaTecnica();
        $adultomayor = AdultoMayor::find($id);
        $btnText = __("Guardar");
        return view('admin.am_ayuda_tecnica.form', compact('adultomayor', 'am_ayuda_tecnica', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmAyudaTecnicaRequest $am_ayuda_tecnica_request)
    {
        $am_ayuda_tecnica = AmAyudaTecnica::create([
            'am_id'                =>   $am_ayuda_tecnica_request->am_id,
            'ayuda_tecnica_id'     =>   $am_ayuda_tecnica_request->ayuda_tecnica_id 
        ]);

        return redirect()->route('amayudastecnica.show', ['id' => $am_ayuda_tecnica->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Inscripción en Ayuda Técnica realizada con éxito")
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
        $ayudas_tecnicas = AmAyudaTecnica::with(['ayudaTecnica', 'adultoMayor'])->where('am_id', $id)->get();
        $adultomayor = AdultoMayor::find($id);
        return view('admin.am_ayuda_tecnica.show', compact('ayudas_tecnicas', 'adultomayor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ayuda_tecnica = AmAyudaTecnica::find($id);
        
        try {

            $ayuda_tecnica->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("La Ayuda técnica fue desinscrita para el Adulto Mayor con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al desinscribir Ayuda Técnica")
            ]);
        }
    }
}
