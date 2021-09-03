<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AmTallerRequest;
use App\AmTaller;
use App\AdultoMayor;

class TallerAmController extends Controller
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
        $amTaller = new AmTaller();
        $adultomayor = AdultoMayor::find($id);
        $btnText = __("Guardar");
        return view('admin.talleres_am.form', compact('adultomayor', 'amTaller', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmTallerRequest $am_taller_request)
    {
        // dd( $am_taller_request->input() );
        $talleram = AmTaller::create([
            'am_id'         =>   $am_taller_request->am_id,
            'taller_id'     =>   $am_taller_request->taller_id
        ]);

        return redirect()->route('talleram.show', ['id' => $talleram->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Inscripción en taller realizada con éxito")
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
        $talleres = AmTaller::with(['taller.tipotaller', 'adultomayor'])->where('am_id', $id)->get();
        $adultomayor = AdultoMayor::find($id);
        return view('admin.talleres_am.show', compact('talleres', 'adultomayor'));
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
        $taller = AmTaller::find($id);
        
        try {

            $taller->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("Adulto Mayor desinscrito con éxito del taller")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al eliminar el Taller")
            ]);
        }
    }
}
