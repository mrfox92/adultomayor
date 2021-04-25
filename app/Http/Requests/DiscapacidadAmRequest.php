<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DiscapacidadAmRequest extends FormRequest
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
                    'id_tipo_discapacidad'  =>  ['required', Rule::exists('tipo_discapacidad', 'id')],
                    'nombre'                =>  'required',
                    'observacion'           =>  'nullable|max:500'
                ];
            case 'PUT':
                return [
                    'id_tipo_discapacidad'  =>  ['required', Rule::exists('tipo_discapacidad', 'id')],
                    'nombre'                =>  'required',
                    'observacion'           =>  'nullable|max:500'
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
                    'id_tipo_discapacidad.required'     =>  'Campo obligatorio, por favor seleccione una opción',
                    'nombre.required'                   =>  'Campo obligatorio, por favor ingrese un nombre discapacidad',
                    'observacion.max'                   =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                ];
            case 'PUT':
                return [
                    'id_tipo_discapacidad.required'     =>  'Campo obligatorio, por favor seleccione una opción',
                    'nombre.required'                   =>  'Campo obligatorio, por favor ingrese un nombre discapacidad',
                    'observacion.max'                   =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                ];
        }
    }
}
