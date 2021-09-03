<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AmTrabajoBanoRequest;
use App\AmTrabajoBano;
use App\AdultoMayor;

class AmTrabajoBanoController extends Controller
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
        $am_trabajo_bano = new AmTrabajoBano();
        $adultomayor = AdultoMayor::find($id);
        $btnText = __("Guardar");
        return view('admin.am_trabajos_banos.form', compact('adultomayor', 'am_trabajo_bano', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmTrabajoBanoRequest $am_trabajo_bano_request)
    {
        $am_trabajo_bano = AmTrabajoBano::create( $am_trabajo_bano_request->input() );

        return redirect()->route('trabajosbanoam.show', ['id' => $am_trabajo_bano->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Inscripción en Atención Trabajo Baño Adulto Mayor realizada con éxito")
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
        $trabajos_banos = AmTrabajoBano::with(['trabajoBano', 'adultomayor'])->where('am_id', $id)->get();
        // dd( $trabajos_banos[0]->trabajoBano()->first() );
        $adultomayor = AdultoMayor::find($id);
        return view('admin.am_trabajos_banos.show', compact('trabajos_banos', 'adultomayor'));
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
        $trabajobano = AmTrabajoBano::find($id);
        
        try {

            $trabajobano->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("La Atención Trabajo Baño fue desinscrita con éxito para el Adulto Mayor")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al desinscribir Atención Trabajo Baño A.M")
            ]);
        }
    }
}
