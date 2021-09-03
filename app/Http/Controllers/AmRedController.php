<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AmRedRequest;

use App\AmRed;
use App\AdultoMayor;

class AmRedController extends Controller
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
        $amRed = new AmRed();
        $adultomayor = AdultoMayor::find($id);
        $btnText = __("Guardar");
        return view('admin.am_redes.form', compact('adultomayor', 'amRed', 'btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmRedRequest $am_red_request)
    {

        $amRed = AmRed::create([
            'am_id'         =>   $am_red_request->am_id,
            'red_id'     =>   $am_red_request->red_id
        ]);

        return redirect()->route('amred.show', ['id' => $amRed->am_id])->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Red Agragada a ficha adulto mayor con éxito")
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
        $redes = AmRed::with(['red', 'adultomayor'])->where('am_id', $id)->get();
        $adultomayor = AdultoMayor::find($id);
        return view('admin.am_redes.show', compact('redes', 'adultomayor'));
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
        $red = AmRed::find($id);
        
        try {

            $red->delete();

            return back()->with('message', [
                'class'     =>  'success',
                'message'   =>  __("La red ha sido desinscrita con éxito de la ficha")
            ]);
            

        } catch (\Exception $exception) {
            
            return back()->with('message', [
                'class'     =>  'danger',
                'message'   =>  __("Error al desinscribir red")
            ]);
        }
    }
}
