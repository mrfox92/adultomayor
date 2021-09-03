<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AmIngresosRequest;

use App\AmIngreso;
use App\AdultoMayor;

class AmIngresosController extends Controller
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
        $amIngreso = new AmIngreso();
        $adultomayor = AdultoMayor::find($id);
        $btnText = __("Guardar");
        return view('admin.am_ingresos.form', compact('adultomayor', 'amIngreso', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmIngresosRequest $am_ingreso_request)
    {
        // dd( $am_ingreso_request->input() );

        $amIngreso = AmIngreso::create([
            'am_id'         =>   $am_ingreso_request->am_id,
            'ingreso_id'    =>   $am_ingreso_request->ingreso_id
        ]);

        return redirect()->route('amingresos.show', ['id' => $amIngreso->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Agregado Tipo ingreso adulto mayor con éxito")
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
        $ingresos = AmIngreso::with(['ingreso', 'adultomayor'])->where('am_id', $id)->get();
        $adultomayor = AdultoMayor::find($id);
        return view('admin.am_ingresos.show', compact('ingresos', 'adultomayor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $ingreso = AmIngreso::find($id);
        
        try {

            $ingreso->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Se ha desinscrito el tipo de ingreso Adulto mayor con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al desinscribir tipo ingreso")
            ]);
        }
    }
}
