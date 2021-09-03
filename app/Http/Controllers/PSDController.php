<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PSDRequest;
use App\PersonaDiscapacitada;
use App\OrganizacionPsd;
use App\OtraOcupacionPsd;
use App\User;
use App\EstablecimientoEducacional;
use App\Independiente;
use App\BeneficioEstatalPsd;
use App\DiscapacidadPsd;
use Carbon\Carbon;
use App\Helpers\Helper; //  hacemos uso de nuestro Helper creado para manipulacion de guardado de imagenes

class PSDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.psd.index');
    }

    public function listar(Request $request)
    {
        if ( ! $request->ajax() ) {

            return abort(401, 'acción no autorizada');
        }

        $usuarios = PersonaDiscapacitada::with(['nacionalidad'])->get();

        return response()->json([
            'usuarios' => $usuarios,
            'message' => 'Success'
            ], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $psd = new PersonaDiscapacitada();
        $btnText = __("Guardar");

        return view('admin.psd.form', compact('psd', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PSDRequest $psd_request)
    {
        //  validamos que si viene una imagen
        if ( $psd_request->hasFile('picture') ) {

            $picture = Helper::uploadFile('picture', 'psd');
            $psd_request->merge(['picture' => $picture]);
        }
        
        //  agregamos el usuario actual
        $psd_request->merge(['user_id' => auth()->user()->id]);

        $psd = PersonaDiscapacitada::create( $psd_request->input() );

        return redirect()->route('psd.edit', $psd->id )->with('message', [
            'class'     =>  'success',
            'message'   =>  __("PSD ha sido registrado exitosamente en el sistema")
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

        $establecimiento = EstablecimientoEducacional::where('psd_id', $id)->first();
        $trabajador = OrganizacionPsd::where('psd_id', $id)->first();
        $otras = OtraOcupacionPsd::where('psd_id', $id)->first();
        $independiente = Independiente::where('psd_id', $id)->first();
        $independiente = Independiente::where('psd_id', $id)->first();

        $beneficio = BeneficioEstatalPsd::where('psd_id', $id)->first();

        $discapacidad = DiscapacidadPsd::where('psd_id', $id)->first();

        return view('admin.psd.show', compact('psd', 'establecimiento', 'trabajador', 'otras', 'independiente', 'beneficio', 'discapacidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $psd = PersonaDiscapacitada::find($id);
        $btnText = __("Actualizar");

        // Parseamos las fechas para poder trabajarlas bien en el formulario
        if ( $psd->fecha_nacimiento ) {

            $psd->fecha_nacimiento = Carbon::parse($psd->fecha_nacimiento)->format('Y-m-d');
        }

        return view('admin.psd.form', compact('psd', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PSDRequest $psd_request, $id)
    {
        $psd = PersonaDiscapacitada::find($id);

        //  validamos que si viene una imagen
        if ( $psd_request->hasFile('picture') ) {

            \Storage::delete('psd/'. $psd->picture);   //  eliminamos la imagen desde el storage
            //  subimos la imagen actualizada
            $picture = Helper::uploadFile('picture', 'psd');
            $psd_request->merge(['picture' => $picture]);
        }

        $psd->fill( $psd_request->input() )->save();

        return redirect()->route('psd.edit', ['id' => $psd->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Información PSD actualizada exitosamente")
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
        $psd = PersonaDiscapacitada::find($id);
        
        try {

            $psd->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("PSD eliminado con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar PSD")
            ]);
        }
    }
}
