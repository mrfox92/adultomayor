<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AmProgramaRequest;
use App\AmPrograma;
use App\AdultoMayor;

class AmProgramaController extends Controller
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
        $amPrograma = new AmPrograma();
        $adultomayor = AdultoMayor::find($id);
        $btnText = __("Guardar");
        return view('admin.am_programa.form', compact('adultomayor', 'amPrograma', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmProgramaRequest $am_programa_request)
    {
        $amPrograma = AmPrograma::create([
            'am_id'         =>   $am_programa_request->am_id,
            'programa_id'     =>   $am_programa_request->programa_id
        ]);

        return redirect()->route('amprograma.show', ['id' => $amPrograma->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Inscripción en Programa realizada con éxito")
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
        $programas = AmPrograma::with(['programa', 'adultomayor'])->where('am_id', $id)->get();
        $adultomayor = AdultoMayor::find($id);
        return view('admin.am_programa.show', compact('programas', 'adultomayor'));
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
        $programa = AmPrograma::find($id);
        
        try {

            $programa->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Adulto Mayor desinscrito con éxito del programa")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al desinscribir programa")
            ]);
        }
    }
}
