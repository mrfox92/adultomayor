<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AmAyudaTecnicaRequest extends FormRequest
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
                    'ayuda_tecnica_id'   => [ 
                        'required',
                        Rule::unique('am_ayuda_tecnica')->where(function ($query) {
                            return $query->where('ayuda_tecnica_id', \request()->ayuda_tecnica_id)->where('am_id', \request()->am_id);
                        })
                    ]
                ];

            case 'PUT':
                return [
                    'ayuda_tecnica_id'   => 'required'
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
                    'ayuda_tecnica_id.required' =>  'La Ayuda Técnica es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'ayuda_tecnica_id.unique'   =>  'El adulto mayor ya está inscrito para la ayuda tecnica seleccionada. pruebe con otra ayuda tecnica de la lista',
                ];
            case 'PUT':
                return [
                    'ayuda_tecnica_id.required' =>  'La Ayuda Técnica es un campo obligatorio. Por favor seleccione una opción de la lista',
                ];
        }
    }
}
