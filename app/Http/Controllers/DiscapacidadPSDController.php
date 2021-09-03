<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscapacidadPSDRequest;
use App\DiscapacidadPsd;
use App\PersonaDiscapacitada;

use App\Helpers\Helper; //  hacemos uso de nuestro Helper creado para manipulacion de guardado de imagenes

class DiscapacidadPSDController extends Controller
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
        $psd = PersonaDiscapacitada::find($id);
        $discapacidad = new DiscapacidadPsd();
        $btnText = __("Guardar");

        return view('admin.psd_discapacidades.form', compact('psd', 'discapacidad', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscapacidadPSDRequest $discapacidad_psd_request)
    {

        //  validamos que si viene una imagen
        if ( $discapacidad_psd_request->hasFile('picture') ) {

            $picture = Helper::uploadFile('picture', 'discapacidadpsd');
            $discapacidad_psd_request->merge(['picture' => $picture]);
        }

        $discapacidad = DiscapacidadPsd::create( $discapacidad_psd_request->input() );

        return redirect()->route('discapacidadpsd.show', ['id' => $discapacidad->psd_id] )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La discapacidad PSD ha sido registrada exitosamente en el sistema")
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
        $psd = PersonaDiscapacitada::find($id);
        $discapacidades = DiscapacidadPsd::with(['tipoDiscapacidad'])->where('psd_id', $id)->get();

        return view('admin.psd_discapacidades.show', compact('discapacidades', 'psd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discapacidad = DiscapacidadPsd::with(['psd', 'tipoDiscapacidad'])->where('id', $id)->first();
        $psd = $discapacidad->psd;
        $btnText = __("Actualizar");

        return view('admin.psd_discapacidades.form', compact('discapacidad', 'psd', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscapacidadPSDRequest $discapacidad_psd_request, $id)
    {

        $discapacidad = DiscapacidadPsd::find($id);

        //  validamos que si viene una imagen
        if ( $discapacidad_psd_request->hasFile('picture') ) {

            \Storage::delete('discapacidadpsd/'. $discapacidad->picture);   //  eliminamos la imagen desde el storage
            //  subimos la imagen actualizada
            $picture = Helper::uploadFile('picture', 'discapacidadpsd');
            $discapacidad_psd_request->merge(['picture' => $picture]);
        }

        $discapacidad->fill( $discapacidad_psd_request->input() )->save();

        return redirect()->route('discapacidadpsd.show', ['id' => $discapacidad->psd_id] )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La discapacidad PSD ha sido actualizada exitosamente")
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
        $discapacidad = DiscapacidadPsd::find($id);
        
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
