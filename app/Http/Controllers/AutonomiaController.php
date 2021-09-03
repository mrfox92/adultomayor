<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AutonomiaRequest;
use App\Autonomia;
use App\AdultoMayor;
use App\User;

class AutonomiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $autonomias = Autonomia::with(['adultomayor'])->paginate(5);

        // return view('admin.autonomias.index', compact('autonomias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // dd($id);
        $adultomayor = AdultoMayor::find($id);

        $autonomia = new Autonomia();

        $btnText = __("Guardar");

        return view('admin.autonomias.form', compact('autonomia', 'adultomayor', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutonomiaRequest $autonomia_request)
    {
        // dd( $autonomia_request );
        $user = User::get()->first();
        $autonomia_request->merge(['user_id' => $user->id]);

        // dd( $autonomia_request );

        $autonomia = Autonomia::create( $autonomia_request->input() );

        return redirect()->route('autonomia.edit', $autonomia->am_id )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La ficha de Autonomia Adulto mayor ha sido registrada exitosamente en el sistema")
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
        $autonomia = Autonomia::with(['adultomayor'])->where('am_id', $id)->first();
        $pdf = \PDF::loadView('admin.autonomias.autonomia', compact('autonomia'));
        return $pdf->stream('autonomia.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd( $id );
        $autonomia = Autonomia::with(['adultomayor'])->where('am_id', $id)->first();

        // dd( $autonomia );
        $btnText = __("Actualizar");

        return view('admin.autonomias.form', compact('autonomia', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AutonomiaRequest $autonomia_request, $id)
    {
        $autonomia = Autonomia::find($id);

        $autonomia->fill( $autonomia_request->input() )->save();

        return redirect()->route('autonomia.edit', ['id' => $autonomia->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Ficha Autonomia adulto mayor actualizada exitosamente")
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
