<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BeneficioEstatalPSDRequest;

use App\BeneficioEstatalPsd;
use App\PersonaDiscapacitada;

class BeneficioEstatalPSDController extends Controller
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
        $beneficiopsd = new BeneficioEstatalPsd();
        $psd = PersonaDiscapacitada::find($id);
        $btnText = __("Guardar");
        return view('admin.beneficios_psd.form', compact('psd', 'beneficiopsd', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeneficioEstatalPSDRequest $beneficio_psd_request)
    {
        // dd( $beneficio_psd_request->input() );

        $beneficiopsd = BeneficioEstatalPsd::create([
            'psd_id'                =>   $beneficio_psd_request->psd_id,
            'beneficio_estatal_id'  =>   $beneficio_psd_request->beneficio_estatal_id
        ]);

        return redirect()->route('beneficiopsd.show', ['id' => $beneficiopsd->psd_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Inscripción de Beneficio estatal realizado con éxito")
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
        $beneficios = BeneficioEstatalPsd::with(['psd', 'beneficioEstatal'])->where('psd_id', $id)->get();
        $psd = PersonaDiscapacitada::find($id);
        return view('admin.beneficios_psd.show', compact('beneficios', 'psd'));
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
        $beneficio = BeneficioEstatalPsd::find($id);
        
        try {

            $beneficio->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Adulto Mayor desinscrito con éxito del beneficio estatal")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al desinscribir beneficio estatal")
            ]);
        }
    }
}
