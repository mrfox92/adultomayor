<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdultoMayorRequest;

use App\AdultoMayor;
use App\Autonomia;
use App\Acompanante;
use App\HabitabilidadVivienda;
use App\Salud;
use App\User;
use App\AmEtnia;
use App\ViviendaAm;
use Carbon\Carbon;

class AdultoMayorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adultosmayores = AdultoMayor::paginate(10);

        // $user = User::get()->first();
        // dd( $user );

        return view('admin.adultosmayores.index', compact('adultosmayores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adultomayor = new AdultoMayor();
        $btnText = __("Guardar");

        return view('admin.adultosmayores.form', compact('adultomayor', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdultoMayorRequest $adultomayor_request)
    {

        // dd( $adultomayor_request );

        $user = User::get()->first();
        $adultomayor_request->merge(['user_id' => $user->id]);

        // dd( $adultomayor_request );

        AdultoMayor::create( $adultomayor_request->input() );

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("El Adulto Mayor ha sido registrado exitosamente en el sistema")
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
        $adultomayor = AdultoMayor::find($id);
        //  comprobar ficha autonomia adulto mayor
        $autonomia = Autonomia::where('am_id', $id)->first();
        //  comprobar ficha acompañante adulto mayor
        $acompanante = Acompanante::where('am_id', $id)->first();
        //  comprobar ficha habitabilidad adulto mayor
        $habitabilidad = HabitabilidadVivienda::where('am_id', $id)->first();
        //  vivienda adulto mayor
        $vivienda = ViviendaAm::where('am_id', $id)->first();
        //  comprobar ficha identificacion adulto mayor
        $am_etnia = AmEtnia::where('adulto_mayor_id', $id)->first();
        //  comprobar ficha salud adulto mayor
        $salud = Salud::where('am_id', $id)->first();
        //  si autonomia es null entonces no tiene su ficha creada
        //  en caso de tener la ficha creada permitir editarla
        return view('admin.adultosmayores.show', compact('adultomayor', 'autonomia', 'acompanante', 'am_etnia', 'habitabilidad', 'vivienda', 'salud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adultomayor = AdultoMayor::find($id);
        $btnText = __("Actualizar");

        // Parseamos las fechas para poder trabajarlas bien en el formulario
        if ( $adultomayor->fecha_nacimiento ) {

            $adultomayor->fecha_nacimiento = Carbon::parse($adultomayor->fecha_nacimiento)->format('Y-m-d');
        }

        if ( $adultomayor->fecha_postulacion_fosis ) {

            $adultomayor->fecha_postulacion_fosis = Carbon::parse($adultomayor->fecha_postulacion_fosis)->format('Y-m-d');
        }

        return view('admin.adultosmayores.form', compact('adultomayor', 'btnText'));
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
