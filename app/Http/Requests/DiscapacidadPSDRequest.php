<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DiscapacidadPSDRequest extends FormRequest
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
                    'tipo_discapacidad_id'      =>  ['required', Rule::exists('tipo_discapacidad', 'id')],
                    'nombre'                    =>  'required',
                    'observacion'               =>  'nullable|max:500',
                    'porcentaje_discapacidad'   =>  'nullable',
                    'picture'                   =>  'sometimes|image|mimes:jpg,jpeg,png',
                ];
            case 'PUT':
                return [
                    'tipo_discapacidad_id'      =>  ['required', Rule::exists('tipo_discapacidad', 'id')],
                    'nombre'                    =>  'required',
                    'observacion'               =>  'nullable|max:500',
                    'porcentaje_discapacidad'   =>  'nullable',
                    'picture'                   =>  'sometimes|image|mimes:jpg,jpeg,png',
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
                    'tipo_discapacidad_id.required'     =>  'Campo obligatorio, por favor seleccione una opción',
                    'nombre.required'                   =>  'Campo obligatorio, por favor ingrese un nombre discapacidad',
                    'observacion.max'                   =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'picture.image'                     =>  'El archivo a subir debe tener un formato de imagen válido, pruebe subir una imagen con extension jpg, jpeg o png'
                ];
            case 'PUT':
                return [
                    'tipo_discapacidad_id.required'     =>  'Campo obligatorio, por favor seleccione una opción',
                    'nombre.required'                   =>  'Campo obligatorio, por favor ingrese un nombre discapacidad',
                    'observacion.max'                   =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'picture.image'                     =>  'El archivo a subir debe tener un formato de imagen válido, pruebe subir una imagen con extension jpg, jpeg o png'
                ];
        }
    }
}
