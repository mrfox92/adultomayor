<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaludRequest;

use App\AdultoMayor;
use App\Salud;
use App\User;

class SaludController extends Controller
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

        $salud = new Salud();

        $btnText = __("Guardar");

        return view('admin.salud_am.form', compact('salud', 'adultomayor', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaludRequest $salud_request)
    {
        $user = User::get()->first();
        $salud_request->merge(['user_id' => $user->id]);

        $salud = Salud::create( $salud_request->input() );

        return redirect()->route('salud.edit', ['id' => $salud->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La ficha de Salud Adulto mayor ha sido registrada exitosamente en el sistema")
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
        $salud = Salud::with(['adultomayor'])->where('am_id', $id)->first();
        $pdf = \PDF::loadView('admin.salud_am.salud', compact('salud'));
        return $pdf->stream('salud.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salud = Salud::with(['adultomayor'])->where('am_id', $id)->first();

        $btnText = __("Actualizar");

        return view('admin.salud_am.form', compact('salud', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaludRequest $salud_request, $id)
    {
        $salud = Salud::find($id);

        $salud->fill( $salud_request->input() )->save();

        return redirect()->route('salud.edit', ['id' => $salud->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Ficha Salud Adulto Mayor actualizada exitosamente")
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
