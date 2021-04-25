<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Requests\IdentificacionRequest;
use App\Http\Requests\AgregarIdentificacionRequest;
use App\Etnia;
use App\AmEtnia;
use App\AdultoMayor;

use Carbon\Carbon;

class IdentificacionController extends Controller
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
        //  obtener datos adulto mayor
        $adultomayor = AdultoMayor::find($id);
        //  obtener listado etnias
        $etnias = Etnia::all();
        return view('admin.identificaciones.form', compact('etnias', 'adultomayor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdentificacionRequest $identificacion_request)
    {

        $etnias = $identificacion_request->etnias;

        try {

            \DB::beginTransaction();
            
            $detalle_etnias = [];
            foreach ($etnias as $etnia) {

                $detalle_etnias [] = [
                    "adulto_mayor_id"   =>  $identificacion_request->adulto_mayor_id,
                    "etnia_id"          =>  $etnia,
                    "created_at"        =>  Carbon::now(),
                    "updated_at"        =>  Carbon::now()
                ];
            }

            AmEtnia::insert($detalle_etnias);

            \DB::commit();

        } catch (\ModelNotFoundException $e) {
            \DB::rollback();
        }

        return redirect()->route('identificacion.create', $identificacion_request->adulto_mayor_id )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("La ficha identificación Adulto mayor ha sido registrada exitosamente en el sistema")
        ]);

    }


    public function agregarEtnia( AgregarIdentificacionRequest $request_agregar_etnia ) {

        dd( $request_agregar_etnia->input() );

        // $etnia = $request->input();

        // AmEtnia::create([
        //     "adulto_mayor_id"   =>  $etnia->adulto_mayor_id,
        //     "etnia_id"          =>  $etnia->etnia_id
        // ]);

        //  validar que el item agregado no exista en BD para el usuario seleccionado

        // return redirect()->route('identificacion.add', $request->adulto_mayor_id )->with('message', [
        //     'class'     =>  'success',
        //     'message'   =>  __("Identificación étnica agregada exitosamente en el sistema")
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle_etnias = AmEtnia::with(['etnia', 'adultoMayor'])->where('adulto_mayor_id', $id)->get();

        $adultomayor = $detalle_etnias[0]->adultoMayor;

        // dd( $adultomayor );

        // dd( $detalle_etnias );

        return view('admin.identificaciones.show', compact('detalle_etnias', 'adultomayor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //  enviar listado de etnias
        //  enviar etnias seleccionadas para adulto mayor
        // $etnias = Etnia::all();
        //  marcar en formulario las etnias
        // $detalle_etnias = AmEtnia::with(['etnia', 'adultoMayor'])->where('adulto_mayor_id', $id)->get();
        $detalle_etnias = AmEtnia::where('adulto_mayor_id', $id)->get();


        //  marcar las etnias seleccionadas como selected = true
        $adultomayor = AdultoMayor::find($id);

        // dd( $detalle_etnias );

        return view('admin.identificaciones.edit', compact('detalle_etnias', 'etnias', 'adultomayor'));
    }


    public function add($id) {
        $adultomayor = AdultoMayor::find($id);
        return view('admin.identificaciones.add', compact('adultomayor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IdentificacionRequest $identificacion_request, $id)
    {


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
