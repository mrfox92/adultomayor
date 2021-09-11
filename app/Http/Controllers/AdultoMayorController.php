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
use App\AmTaller;
use App\AmActividad;
use App\AmAyudaTecnica;
use App\AmAtencion;
use App\AmTrabajoBano;
use App\AmPrograma;
use App\AmRed;
use App\AmIngreso;
use App\DiscapacidadAm;
use Carbon\Carbon;

use App\Helpers\Helper; //  hacemos uso de nuestro Helper creado para manipulacion de guardado de imagenes

class AdultoMayorController extends Controller
{

    public function __construct() {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.adultosmayores.index');
    }

    public function listar(Request $request)
    {
        if ( ! $request->ajax() ) {

            return abort(401, 'acción no autorizada');
        }

        $adultosmayores = AdultoMayor::with(['nacionalidad', 'alfabetizacion', 'tipoVivienda', 'nucleoFamiliar', 'institucionSalud', 'amEtnias'])->get();


        return response()->json([
            'adultosmayores' => $adultosmayores,
            'message' => 'success'
            ], 200);

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

        //  validamos que si viene una imagen
        if ( $adultomayor_request->hasFile('picture') ) {

            $picture = Helper::uploadFile('picture', 'am');
            $adultomayor_request->merge(['picture' => $picture]);
        }

        $adultomayor_request->merge(['user_id' => auth()->user()->id]);

        $adultomayor = AdultoMayor::create( $adultomayor_request->input() );

        return redirect()->route('adultosmayores.edit', $adultomayor->id )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Adulto mayor ha sido registrado exitosamente en el sistema")
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
        $discapacidades = DiscapacidadAm::where('am_id', $id)->first();
        //  vivienda adulto mayor
        $vivienda = ViviendaAm::where('am_id', $id)->first();
        //  comprobar ficha identificacion adulto mayor
        $am_etnia = AmEtnia::where('adulto_mayor_id', $id)->first();
        //  talleres adulto mayor
        $talleram = AmTaller::where('am_id', $id)->first();
        //  actividades adulto mayor
        $actividadam = AmActividad::where('am_id', $id)->first();
        //  ayudas tecnicas adulto mayor
        $amAyudaTecnica = AmAyudaTecnica::where('am_id', $id)->first();
        //  atenciones adulto mayor
        $amAtencion = AmAtencion::where('am_id', $id)->first();
        //  atenciones trabajo baño adulto mayor
        $amTrabajoBano = AmTrabajoBano::where('am_id', $id)->first();
        //  programas adulto mayor
        $amPrograma = AmPrograma::where('am_id', $id)->first();
        //  redes adulto mayor
        $amRed = AmRed::where('am_id', $id)->first();
        //  tipos ingresos adulto mayor
        $amIngreso = AmIngreso::where('am_id', $id)->first();
        //  comprobar ficha salud adulto mayor
        $salud = Salud::where('am_id', $id)->first();
        //  si autonomia es null entonces no tiene su ficha creada
        //  en caso de tener la ficha creada permitir editarla
        return view('admin.adultosmayores.show', compact('adultomayor', 'amPrograma', 'amTrabajoBano', 'amAyudaTecnica', 'amAtencion', 'talleram', 'actividadam', 'discapacidades', 'autonomia', 'acompanante', 'am_etnia', 'habitabilidad', 'vivienda', 'salud', 'amRed', 'amIngreso'));
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
    public function update(AdultoMayorRequest $adultomayor_request, $id)
    {
        $adultomayor = AdultoMayor::find($id);

        //  validamos que si viene una imagen
        if ( $adultomayor_request->hasFile('picture') ) {

            \Storage::delete('am/'. $adultomayor->picture);   //  eliminamos la imagen desde el storage
            //  subimos la imagen actualizada
            $picture = Helper::uploadFile('picture', 'am');
            $adultomayor_request->merge(['picture' => $picture]);
        }

        $adultomayor->fill( $adultomayor_request->input() )->save();

        return redirect()->route('adultosmayores.edit', ['id' => $adultomayor->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Información Adulto Mayor actualizada exitosamente")
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
        $adultomayor = AdultoMayor::find($id);
        $adultomayor->delete();
    }
}
