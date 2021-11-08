<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ViviendaAmRequest;
use App\ViviendaAm;
use App\AdultoMayor;
use App\User;
use Illuminate\Support\Facades\Auth;

class ViviendaAmController extends Controller
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
        $vivienda = new ViviendaAm();
        $btnText = __("Guardar");

        // dd($adultomayor->id);

        return view('admin.viviendas.form', compact('adultomayor', 'vivienda', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ViviendaAmRequest $vivienda_am_request)
    {
        $user = Auth::user();
        $adultomayor = AdultoMayor::find($vivienda_am_request->input('am_id'));
        $vivienda_am_request->merge(['user_id' => $user->id]);

        $vivienda = ViviendaAm::create( $vivienda_am_request->input() );

        return redirect()->route('vivienda.edit', $adultomayor->id )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La ficha de Vivienda Adulto mayor ha sido registrada exitosamente en el sistema")
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
        $vivienda = ViviendaAm::with(['adultomayor', 'tipoVivienda'])->where('am_id', $id)->first();
        $pdf = \PDF::loadView('admin.viviendas.vivienda', compact('vivienda'));
        return $pdf->stream('vivienda.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vivienda = ViviendaAm::with(['adultomayor'])->where('am_id', $id)->first();
        $btnText = __("Actualizar");

        return view('admin.viviendas.form', compact('vivienda', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ViviendaAmRequest $vivienda_am_request, $id)
    {

        $vivienda = ViviendaAm::find($id);

        $vivienda->fill( $vivienda_am_request->input() )->save();

        return redirect()->route('vivienda.edit', ['id' => $vivienda->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Ficha Vivienda adulto mayor actualizada exitosamente")
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
