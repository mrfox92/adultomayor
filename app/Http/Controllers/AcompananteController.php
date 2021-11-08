<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AcompananteRequest;
use App\AdultoMayor;
use App\Acompanante;
use App\User;
use Illuminate\Support\Facades\Auth;

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

        $user = Auth::user();
        $acompanante_request->merge(['user_id' => $user->id]);

        $acompanante = Acompanante::create( $acompanante_request->input() );

        return redirect()->route('acompanante.edit', $acompanante->am_id )->with('message', [
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
    public function update(AcompananteRequest $request_acompanante, $id)
    {
        $acompanante = Acompanante::find($id);
        
        $acompanante->fill( $request_acompanante->input() )->save();

        return redirect()->route('acompanante.edit', ['id' => $acompanante->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Información acompanante actualizado exitosamente")  
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
        $acompanante = Acompanante::where('am_id', $id)->first();
        
        try {

            $acompanante->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Acompañante eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar Acompañante")
            ]);
        }
    }
}
