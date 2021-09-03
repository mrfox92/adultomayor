<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AmActividadRequest;
use App\AmActividad;
use App\AdultoMayor;

class AmActividadController extends Controller
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
        $amActividad = new AmActividad();
        $adultomayor = AdultoMayor::find($id);
        $btnText = __("Guardar");
        return view('admin.actividades_am.form', compact('adultomayor', 'amActividad', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmActividadRequest $am_actividad_request)
    {
        $amActividad = AmActividad::create([
            'am_id'         =>   $am_actividad_request->am_id,
            'actividad_id'     =>   $am_actividad_request->actividad_id
        ]);

        return redirect()->route('actividadam.show', ['id' => $amActividad->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Inscripción en Actividad realizada con éxito")
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
        $actividades = AmActividad::with(['actividad', 'adultomayor'])->where('am_id', $id)->get();
        $adultomayor = AdultoMayor::find($id);
        return view('admin.actividades_am.show', compact('actividades', 'adultomayor'));
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
        $actividad = AmActividad::find($id);
        
        try {

            $actividad->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Adulto Mayor desinscrito con éxito de la actividad")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al desinscribir Actividad")
            ]);
        }
    }
}
