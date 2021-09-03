<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AmActividadRequest extends FormRequest
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
                    'actividad_id'   => [ 
                        'required',
                        Rule::unique('am_actividad')->where(function ($query) {
                            return $query->where('actividad_id', \request()->actividad_id)->where('am_id', \request()->am_id);
                        })
                    ]
                ];

            case 'PUT':
                return [
                    'actividad_id'   => 'required'
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
                    'actividad_id.required' =>  'La Actividad es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'actividad_id.unique'   =>  'El adulto mayor ya está inscrito en la actividad seleccionada. pruebe con otra actividad de la lista',
                ];
            case 'PUT':
                return [
                    'actividad_id.required' =>  'La Actividad es un campo obligatorio. Por favor seleccione una opción de la lista',
                ];
        }
    }
}
