<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AmProgramaRequest extends FormRequest
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
                    'programa_id'   => [ 
                        'required',
                        Rule::unique('am_programa')->where(function ($query) {
                            return $query->where('programa_id', \request()->programa_id)->where('am_id', \request()->am_id);
                        })
                    ]
                ];

            case 'PUT':
                return [
                    'programa_id'   => 'required'
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
                    'programa_id.required'  =>  'El programa es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'programa_id.unique'       =>  'El adulto mayor ya está inscrito en el programa seleccionado. pruebe con otro programa de la lista',
                ];
            case 'PUT':
                return [
                    'programa_id.required'  =>  'El programa es un campo obligatorio. Por favor seleccione una opción de la lista',
                ];
        }
    }
}
