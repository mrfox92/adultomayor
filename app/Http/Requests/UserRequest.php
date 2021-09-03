<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch ( $this->method() ) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    // 'picture'   =>  'sometimes|image|mimes:jpg,jpeg,png',
                    'name'      =>  'required',
                    'sexo'      =>  'required',
                    'email'     =>  'required|unique:users,email',
                    'password'  =>  'required|required_with:password_confirmation|string|confirmed',
                ];
                
            case 'PUT':

                return [
                    'name'      =>  'required',
                    'sexo'      =>  'required',
                    'email'     =>  ['required', Rule::unique('users', 'email')->ignore($this->id, 'id')],
                    'password'  =>  'sometimes|required_with:password_confirmation|confirmed',
                    'role_id'   =>  ['required', Rule::exists('roles', 'id')],
                    
                ];
        }
    }

    public function messages() {


        switch ( $this->method() ) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    // 'picture.image'         =>  'El archivo a subir debe tener un formato de imagen válido, pruebe subir una imagen con extension jpg, jpeg o png',
                    'name.required'         =>  'Nombre de usuario es un campo obligatorio. Por favor ingrese un nombre de usuario',
                    'sexo.required'         =>  'Campo obligatorio, por favor seleccione una opción sexo usuario',
                    'email.required'        =>  'Email es un campo obligatorio, por favor ingrese un email para el usuario',
                    'email.unique'          =>  'El email ya ha sido registrado para otro usuario del sistema, por favor reintente con otro email',
                    'password.required'     =>  'La contraseña es un campo obligatorio, por favor ingrese una contraseña para el usuario',
                    'password.confirmed'    =>  'La confirmación de la contraseña no coincide.',
                ];
            case 'PUT':

                return [
                    // 'picture.image'         =>  'El archivo a subir debe tener un formato de imagen válido, pruebe subir una imagen con extension jpg, jpeg o png',
                    'role_id.required'      =>  'Por favor seleccione un rol usuario de la lista',
                    'name.required'         =>  'Nombre de usuario es un campo obligatorio. Por favor ingrese un nombre de usuario',
                    'sexo.required'         =>  'Campo obligatorio, por favor seleccione una opción sexo usuario',
                    'email.required'        =>  'Email es un campo obligatorio, por favor ingrese un email para el usuario',
                    'email.unique'          =>  'El email proporcionado ya ha sido registrado para otro usuario del sistema, por favor reintente con otro email',
                    'password.confirmed'    =>  'La confirmación de la contraseña no coincide.',
                ];
        }
    }
}
