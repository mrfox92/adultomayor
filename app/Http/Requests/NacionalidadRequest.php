<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NacionalidadRequest extends FormRequest
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
                    'nombre'    =>  'required'
                ];
            case 'PUT':
                return [
                    'nombre'    =>  'required'
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
                    'nombre.required'   =>  'El nombre nacionalidad es campo obligatorio'
                ];
            case 'PUT':
                return [
                    'nombre.required'   =>  'El nombre nacionalidad es campo obligatorio'
                ];
        }
    }
}
