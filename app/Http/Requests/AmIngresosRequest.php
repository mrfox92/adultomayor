<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class AmIngresosRequest extends FormRequest
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
                    'ingreso_id'   => [ 
                        'required',
                        Rule::unique('am_ingreso')->where(function ($query) {
                            return $query->where('ingreso_id', \request()->ingreso_id)->where('am_id', \request()->am_id);
                        })
                    ]
                ];

            case 'PUT':
                return [
                    'ingreso_id'   => 'required'
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
                    'ingreso_id.required' =>  'El Ingreso es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'ingreso_id.unique'   =>  'El adulto mayor ya tiene inscrito este tipo de ingreso. pruebe con otra tipo ingreso de la lista',
                ];
            case 'PUT':
                return [
                    'ingreso_id.required' =>  'El Ingreso es un campo obligatorio. Por favor seleccione una opción de la lista',
                ];
        }
    }
}
