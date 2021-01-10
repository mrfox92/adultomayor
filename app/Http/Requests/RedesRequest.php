<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RedesRequest extends FormRequest
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
                    'nombre'        =>  'required',
                    'num_contacto'  =>  'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:6'
                ];
            case 'PUT':
                return [
                    'nombre'        =>  'required',
                    'num_contacto'  =>  'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:6'
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
                    'nombre.required'       =>  'El nombre red es un campo obligatorio',
                    'num_contacto.regex'    =>  'El formato del número de contacto no es válido, por favor reintente',
                    'num_contacto.min'      =>  'El número de contacto debe tener un mínimo de 6 dígitos'
                ];
            case 'PUT':
                return [
                    'nombre.required'   =>  'El nombre red es un campo obligatorio',
                    'num_contacto.regex'    =>  'El formato del número de contacto no es válido, por favor reintente',
                    'num_contacto.min'      =>  'El número de contacto debe tener un mínimo de 6 dígitos'
                ];
        }
    }
}
