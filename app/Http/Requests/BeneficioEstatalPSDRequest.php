<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BeneficioEstatalPSDRequest extends FormRequest
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
                    'beneficio_estatal_id'   => [ 
                        'required',
                        Rule::unique('beneficio_estatal_psd')->where(function ($query) {
                            return $query->where('beneficio_estatal_id', \request()->beneficio_estatal_id)->where('psd_id', \request()->psd_id);
                        })
                    ]
                ];

            case 'PUT':
                return [
                    'beneficio_estatal_id'   => 'required'
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
                    'beneficio_estatal_id.required' =>  'El beneficio estatal es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'beneficio_estatal_id.unique'   =>  'El adulto mayor ya está inscrito para el beneficio estatal seleccionado. pruebe con agregar otro beneficio de la lista',
                ];
            case 'PUT':
                return [
                    'beneficio_estatal_id.required' =>  'El beneficio estatal es un campo obligatorio. Por favor seleccione una opción de la lista',
                ];
        }
    }
}
