<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HabitabilidadViviendaRequest;
use App\HabitabilidadVivienda;
use App\AdultoMayor;
use App\User;

class HabitabilidadViviendaController extends Controller
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
        $adultomayor = AdultoMayor::find($id);

        $habitabilidad = new HabitabilidadVivienda();

        $btnText = __("Guardar");

        return view('admin.habitabilidades_viviendas.form', compact('habitabilidad', 'adultomayor', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HabitabilidadViviendaRequest $habitabilidad_request)
    {

        $user = User::get()->first();
        $habitabilidad_request->merge(['user_id' => $user->id]);
        $habitabilidad = HabitabilidadVivienda::create( $habitabilidad_request->input() );

        return redirect()->route('habitabilidad.edit', ['id' => $habitabilidad->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La ficha de Habitabilidad Vivienda Adulto mayor ha sido registrada exitosamente en el sistema")
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
        $habitabilidad = HabitabilidadVivienda::with(['adultomayor'])->where('am_id', $id)->first();
        $pdf = \PDF::loadView('admin.habitabilidades_viviendas.habitabilidad', compact('habitabilidad'));
        return $pdf->stream('habitabilidad.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habitabilidad = HabitabilidadVivienda::with(['adultomayor'])->where('am_id', $id)->first();

        $btnText = __("Actualizar");

        return view('admin.habitabilidades_viviendas.form', compact('habitabilidad', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HabitabilidadViviendaRequest $habitabilidad_request, $id)
    {
        $habitabilidad = HabitabilidadVivienda::find($id);

        $habitabilidad->fill( $habitabilidad_request->input() )->save();

        return redirect()->route('habitabilidad.edit', ['id' => $habitabilidad->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Ficha Habitabilidad Vivienda actualizada exitosamente")
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
        //
    }
}
