<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AmAtencionRequest extends FormRequest
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
                    'atencion_id'   => [ 
                        'required',
                        Rule::unique('am_atencion')->where(function ($query) {
                            return $query->where('atencion_id', \request()->atencion_id)->where('am_id', \request()->am_id);
                        })
                    ],
                    'obs_atencion'      =>  'nullable|max:500',
                    'fecha_atencion'    =>  'date|nullable',
                ];

            case 'PUT':
                return [
                    'atencion_id'       => 'required',
                    'obs_atencion'      =>  'nullable|max:500',
                    'fecha_atencion'    =>  'date|nullable',
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
                    'atencion_id.required'      =>  'La Atencion es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'atencion_id.unique'        =>  'El adulto mayor ya está inscrito en la atención seleccionada. pruebe con otra atencion de la lista',
                    'obs_atencion.max'          =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'fecha_atencion.date'       =>  'Debe ingresar una fecha válida, por favor reintente',
                ];
            case 'PUT':
                return [
                    'atencion_id.required'      =>  'La Atencion es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'obs_atencion.max'          =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'fecha_atencion.date'       =>  'Debe ingresar una fecha válida, por favor reintente',
                ];
        }
    }
}
