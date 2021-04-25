<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AcompananteRequest;
use App\AdultoMayor;
use App\Acompanante;
use App\User;

class AcompananteController extends Controller
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
        $acompanante = new Acompanante();
        $btnText = __("Guardar");

        return view('admin.acompanantes.form', compact('adultomayor', 'acompanante', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AcompananteRequest $acompanante_request)
    {

        // dd($acompanante_request->input());

        $user = User::get()->first();
        $acompanante_request->merge(['user_id' => $user->id]);

        $acompanante = Acompanante::create( $acompanante_request->input() );

        return redirect()->route('acompanante.edit', $acompanante->id )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La ficha de Acompañante Adulto mayor ha sido registrada exitosamente en el sistema")
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
        $acompanante = Acompanante::with(['adultomayor'])->where('am_id', $id)->first();

        $btnText = __("Actualizar");

        return view('admin.acompanantes.form', compact('acompanante', 'btnText'));
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
        //
    }
}
