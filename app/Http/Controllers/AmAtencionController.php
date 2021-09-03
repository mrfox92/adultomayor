<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AmAtencionRequest;
use App\AmAtencion;
use App\AdultoMayor;

class AmAtencionController extends Controller
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
        $am_atencion = new AmAtencion();
        $adultomayor = AdultoMayor::find($id);
        $btnText = __("Guardar");
        return view('admin.am_atenciones.form', compact('adultomayor', 'am_atencion', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmAtencionRequest $am_atencion_request)
    {
        // dd( $am_atencion_request->input() );
        $am_atencion = AmAtencion::create( $am_atencion_request->input() );

        return redirect()->route('atencionesam.show', ['id' => $am_atencion->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Inscripción en Atención Adulto Mayor realizada con éxito")
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
        $atenciones = AmAtencion::with(['atencion', 'adultomayor'])->where('am_id', $id)->get();
        $adultomayor = AdultoMayor::find($id);
        return view('admin.am_atenciones.show', compact('atenciones', 'adultomayor'));
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
        $atencion = AmAtencion::find($id);
        
        try {

            $atencion->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("La Atención fue desinscrita con éxito para el Adulto Mayor")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al desinscribir Atención A.M")
            ]);
        }
    }
}
