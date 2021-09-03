<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AmRedRequest extends FormRequest
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
                    'red_id'   => [ 
                        'required',
                        Rule::unique('am_red')->where(function ($query) {
                            return $query->where('red_id', \request()->red_id)->where('am_id', \request()->am_id);
                        })
                    ]
                ];

            case 'PUT':
                return [
                    'red_id'   => 'required'
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
                    'red_id.required' =>  'La red adulto mayor es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'red_id.unique'   =>  'La red seleccionada ya se encuentra inscrita para este adulto mayor. pruebe con otra red de la lista',
                ];
            case 'PUT':
                return [
                    'red_id.required' =>  'La red adulto mayor es un campo obligatorio. Por favor seleccione una opción de la lista',
                ];
        }
    }
}
