<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscapacidadAmRequest;
use App\DiscapacidadAm;
use App\AdultoMayor;
use App\User;

class DiscapacidadAmController extends Controller
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
        $discapacidad = new DiscapacidadAm();
        $btnText = __("Guardar");

        return view('admin.discapacidades.form', compact('adultomayor', 'discapacidad', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscapacidadAmRequest $discapacidad_am_request)
    {
        $user = User::get()->first();
        $discapacidad_am_request->merge(['user_id' => $user->id]);

        $discapacidad = DiscapacidadAm::create( $discapacidad_am_request->input() );

        return redirect()->route('discapacidades.show', ['id' => $discapacidad->am_id] )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La discapacidad Adulto mayor ha sido registrada exitosamente en el sistema")
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
        //  buscar a partir de id adulto mayor
        $discapacidades = DiscapacidadAm::with(['tipoDiscapacidad'])->where('am_id', $id)->get();
        $adultomayor = AdultoMayor::find($id);

        return view('admin.discapacidades.show', compact('discapacidades', 'adultomayor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discapacidad = DiscapacidadAm::with(['adultomayor'])->where('id', $id)->first();
        $btnText = __("Actualizar");

        $adultomayor = $discapacidad->adultomayor;

        return view('admin.discapacidades.form', compact('discapacidad', 'adultomayor', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscapacidadAmRequest $discapacidad_request, $id)
    {
        $discapacidad = DiscapacidadAm::find($id);
        $discapacidad->fill( $discapacidad_request->input() )->save();

        return redirect()->route('discapacidades.show', ['id' => $discapacidad->am_id] )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La discapacidad Adulto mayor ha sido actualizada exitosamente en el sistema")
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
        $discapacidad = DiscapacidadAm::find($id);
        
        try {

            $discapacidad->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("discapacidad eliminada con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar discapacidad")
            ]);
        }
    }
    
}
