<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.usuarios.index');
    }

    public function listar( Request $request ) {
        // return User::all();
        // return User::with(['role'])->get();
        if ( ! $request->ajax() ) {

            return abort(401, 'acción no autorizada');
        }

        return User::with(['role'])->withTrashed()->get();
    }

    /**
     * Show the form for creating a new resource.
     *{{ route('usuarios.index') }}
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $btnText = __("Guardar");
        return view('admin.usuarios.create', compact('btnText'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $user_request)
    {
        // dd( $user_request->role_id );

        $user = User::create([
            'name'      =>  $user_request->name,
            'email'     =>  $user_request->email,
            'sexo'      =>  $user_request->sexo,
            'password'  =>  Hash::make($user_request->password)
        ]);

        return redirect()->route('usuarios.index')->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Usuario ha sido registrado exitosamente")
        ]);
    }


    public function restaurar(Request $request) {

        //  validar que la peticion venga desde ajax con axios

        //  buscar usuario eliminado y restaurar
        $usuario = User::onlyTrashed()->find( $request->id )->restore();

        if ( isset( $usuario ) && !empty( $usuario ) ) {

            $data = array(
                'status' => true,
                'code'   => 200,
                'message'   =>  'Usuario restablecido con exito'
            );

        } else {

            $data = array(
                'status' => false,
                'code'   => 400,
                'message'   =>  'No se ha podido restablecer usuario'
            );
        }

        return response()->json($data, $data['code']);
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
        $usuario = User::find($id);
        $btnText = __("Actualizar");

        return view('admin.usuarios.update', compact('usuario', 'btnText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $user_request, $id)
    {
        $usuario = User::find($id);

        $usuario->fill([
            'role_id'   =>  $user_request->role_id,
            'name'      =>  $user_request->name,
            'email'     =>  $user_request->email,
            'sexo'      =>  $user_request->sexo,
            'password'  =>  (isset( $user_request->password ) && !empty($user_request->password) ) ? Hash::make($user_request->password) : $usuario->password
        ])->save();

        return redirect()->route('usuarios.index')->with('message', [
            'class'     =>  'success',
            'message'   =>  __("Información usuario actualizada exitosamente")
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
        //  Comprobar si el usuario autenticado intenta eliminarse a si mismo
        //  resolver con error en caso de que intente eliminar su propio usuario
        if ( (int)$id  === (int)auth()->user()->id ) {

            $data = array(
                'status'    =>  false,
                'code'      =>  400,
                'message'   =>  'No puede eliminar su propio usuario'
            );

        } else {

            $usuario = User::find($id);
            $usuario->delete();

            $data = array(
                'status'    =>  true,
                'code'      =>  200,
                'message'   =>  'Usuario eliminado exitosamente'
            );
        }

        return response()->json($data, $data['code']);
    }
}
