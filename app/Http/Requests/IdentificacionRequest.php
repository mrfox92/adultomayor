<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IdentificacionRequest extends FormRequest
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
                    'etnias'    =>  ['required', Rule::exists('etnias', 'id')]
                ];
            case 'PUT':
                return [
                    'etnias'    =>  ['required', Rule::exists('etnias', 'id')]
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
                    'etnias.required'    =>  'Este campo es obligatorio, por favor seleccione a lo menos una opción'
                ];
            case 'PUT':
                return [
                    'etnias.required'    =>  'Este campo es obligatorio, por favor seleccione a lo menos una opción'
                ];
        }

    }
}
