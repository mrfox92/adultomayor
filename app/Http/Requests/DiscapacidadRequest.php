<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DiscapacidadRequest extends FormRequest
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
                    'nombre'                =>  'required',
                    'descripcion'           =>  'nullable|max:500',
                    'tipo_discapacidad_id'  =>  ['required', Rule::exists('tipo_discapacidad', 'id')]
                ];
            case 'PUT':
                return [
                    'nombre'                =>  'required',
                    'descripcion'           =>  'nullable|max:500',
                    'tipo_discapacidad_id'  =>  ['required', Rule::exists('tipo_discapacidad', 'id')]
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
                    'nombre.required'                   =>  'El nombre de la discapacidad es un campo obligatorio. Por favor ingrese un nombre para la discapacidad',
                    'descripcion.max'                   =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'tipo_discapacidad_id.required'     =>  'Este campo es obligatorio, por favor seleccione una categoria para la discapacidad'
                ];
            case 'PUT':
                return [
                    'nombre.required'                   =>  'El nombre de la discapacidad es un campo obligatorio. Por favor ingrese un nombre para la discapacidad',
                    'descripcion.max'                   =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'tipo_discapacidad_id.required'     =>  'Este campo es obligatorio, por favor seleccione una categoria para la discapacidad'
                ];
        }
    }
}
