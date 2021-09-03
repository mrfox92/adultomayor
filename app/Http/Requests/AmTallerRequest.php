<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AmTallerRequest extends FormRequest
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
                    'tipo_taller_id'    =>  ['required', Rule::exists('tipo_taller', 'id')],
                    'taller_id'   => [ 
                        'required',
                        Rule::unique('am_taller')->where(function ($query) {
                            return $query->where('taller_id', \request()->taller_id)->where('am_id', \request()->am_id);
                        })
                    ]
                ];

            case 'PUT':
                return [
                    'tipo_taller_id'    =>  ['required', Rule::exists('tipo_taller', 'id')],
                    'taller_id'         =>  ['required', Rule::exists('talleres', 'id')],
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
                    'tipo_taller_id.required'   =>  'El tipo taller es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'taller_id.required'        =>  'El taller es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'taller_id.unique'          =>  'El adulto mayor ya está inscrito en el taller seleccionado. pruebe con otro taller de la lista',
                ];
            case 'PUT':
                return [
                    'tipo_taller_id.required'   =>  'El tipo taller es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'taller_id.required'        =>  'El taller es un campo obligatorio. Por favor seleccione una opción de la lista',
                ];
        }
    }
}
