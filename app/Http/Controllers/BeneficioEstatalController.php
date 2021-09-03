<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BeneficioEstatalRequest;
use App\BeneficioEstatal;

class BeneficioEstatalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beneficios = BeneficioEstatal::paginate(10);

        return view('admin.beneficios_estatales.index', compact('beneficios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beneficio = new BeneficioEstatal();
        $btnText = __("Guardar");

        return view('admin.beneficios_estatales.form', compact('beneficio', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeneficioEstatalRequest $beneficio_request)
    {
        $beneficio = BeneficioEstatal::create( $beneficio_request->input() );

        return redirect()->route('beneficios.edit', ['id' => $beneficio->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Beneficio estatal ha sido agregado exitosamente")
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
        $beneficio = BeneficioEstatal::find($id);
        $btnText = __("Actualizar");

        return view('admin.beneficios_estatales.form', compact('beneficio', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BeneficioEstatalRequest $beneficio_request, $id)
    {
        $beneficio = BeneficioEstatal::find($id);

        $beneficio->fill( $beneficio_request->input() )->save();

        return redirect()->route('beneficios.edit', ['id' => $beneficio->id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Beneficio estatal ha sido actualizado exitosamente")
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
        $beneficio = BeneficioEstatal::find($id);
        
        try {

            $beneficio->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("El beneficio ha sido eliminado con éxito")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar el Beneficio")
            ]);
        }
    }
    
}
