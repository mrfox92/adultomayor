<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PerfilRequest extends FormRequest
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
        return [
            'name'      =>  'required',
            'picture'   =>  'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            'email'     =>  ['required', Rule::unique('users', 'email')->ignore($this->id, 'id')],
            'password'  =>  'sometimes|required_with:password_confirmation|confirmed'
            
        ];
    }

    public function messages()
    {
        return [
            'name.required'         =>  'Nombre de usuario es un campo obligatorio. Por favor ingrese un nombre de usuario',
            'picture.image'         =>  'El archivo a subir debe tener un formato de imagen válido, pruebe subir una imagen con extension jpg, jpeg o png',
            'picture.max'           =>  'Debe subir una imagen con un peso no superior a los 2 MB, por favor reintente con una imagen más liviana',
            'email.required'        =>  'Email es un campo obligatorio, por favor ingrese un email para el usuario',
            'email.unique'          =>  'El email proporcionado ya ha sido registrado para otro usuario del sistema, por favor reintente con otro email',
            'password.confirmed'    =>  'La confirmación de la contraseña no coincide.',
        ];
    }
}
