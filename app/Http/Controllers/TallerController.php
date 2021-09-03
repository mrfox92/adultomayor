<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TallerRequest;
use App\Taller;
use Carbon\Carbon;

class TallerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talleres = Taller::with('tipotaller')->paginate(5);
        return view('admin.talleres.index', compact('talleres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $taller = new Taller();
        $btnText = __("Guardar");
        return view('admin.talleres.form', compact('taller', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TallerRequest $taller_request)
    {
        // dd( $request );
        Taller::create( $taller_request->input() );

        return back()->with('message', [
            'class'     =>  'success',
            'message'   =>  __("El taller ha sido creado exitosamente")
        ]);
    }

    public function listar(Request $request)
    {
        if ( $request->ajax() ) 
        {
            $talleres = Taller::where('tipo_taller_id', $request->tipo_taller_id)->get();
            foreach ($talleres as $taller) {
                $talleresArray[$taller->id] = $taller->nombre; 
            }

            return response()->json($talleresArray);
        }
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
        $taller = Taller::with(['tipotaller'])->find($id);
        $btnText = __("Actualizar");

        // Parseamos las fechas para poder trabajarlas bien en el formulario
        if ( $taller->fecha_inicio ) {

            $taller->fecha_inicio = Carbon::parse($taller->fecha_inicio)->format('Y-m-d');
        }

        if ( $taller->fecha_fin ) {

            $taller->fecha_fin = Carbon::parse($taller->fecha_fin)->format('Y-m-d');
        }

        return view('admin.talleres.form', compact('taller', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TallerRequest $taller_request, $id)
    {
        $taller = Taller::find($id);

        $taller->fill( $taller_request->input() )->save();

        return redirect()->route('talleres.edit', ['id' => $taller->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("El Taller ha sido actualizado exitosamente")
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
        $taller = Taller::find($id);
        
        try {

            $taller->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("El Taller ha sido eliminado con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar el Taller")
            ]);
        }
    }
}
