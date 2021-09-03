<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PerfilRequest;
use App\Helpers\Helper;
use App\User;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  obtener información usuario autenticado desde DB
        return view('admin.profile.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        $btnText = __("Actualizar");

        return view('admin.profile.edit', compact('usuario', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerfilRequest $user_request, $id)
    {

        // dd( $user_request->file() );

        $usuario = User::find($id);
        //  validamos que si viene una imagen
        if ( $user_request->hasFile('picture') ) {

            \Storage::delete('users/'. $usuario->picture);   //  eliminamos la imagen desde el storage
            //  subimos la imagen actualizada
            $picture = Helper::uploadFile('picture', 'users');
            $user_request->merge(['picture' => $picture]);
        }

        $usuario->fill([
            'name'      =>  $user_request->name,
            'email'     =>  $user_request->email,
            'picture'   =>  (isset( $user_request->picture ) && !empty($user_request->picture) ) ? $picture : $usuario->picture,
            'password'  =>  (isset( $user_request->password ) && !empty($user_request->password) ) ? Hash::make($user_request->password) : $usuario->password
        ])->save();

        return redirect()->route('perfil.index')->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Perfil usuario actualizado exitosamente")
        ]);

    }
}
