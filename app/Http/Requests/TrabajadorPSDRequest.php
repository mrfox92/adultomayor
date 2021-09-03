<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajadorPSDRequest extends FormRequest
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
                    'nombre'                        =>  'required',
                    'direccion'                     =>  'required',
                    'email'                         =>  'nullable',
                    'telefono'                      =>  'nullable',
                    'cargo'                         =>  'required',
                    'encargado'                     =>  'required',
                ];
            case 'PUT':
                return [
                    'nombre'                        =>  'required',
                    'direccion'                     =>  'nullable',
                    'email'                         =>  'nullable',
                    'telefono'                      =>  'nullable',
                    'cargo'                         =>  'nullable',
                    'encargado'                     =>  'nullable',
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
                    'nombre.required'               =>  'El nombre lugar de trabajo es un campo obligatorio. Por favor complete este campo',
                    'direccion.required'            =>  'La dirección lugar de trabajo es un campo obligatorio. Por favor ingrese dirección',
                    'cargo.required'                =>  'El cargo trabajador es un campo obligatorio. Por favor ingrese cargo trabajador',
                    'encargado.required'            =>  'El nombre encargado lugar de trabajo es un campo obligatorio. Por favor ingrese nombre encargado',
                ];
            case 'PUT':
                return [
                    'nombre.required'               =>  'El nombre lugar de trabajo es un campo obligatorio. Por favor ingrese complete este campo',
                    'direccion.required'            =>  'La dirección lugar de trabajo es un campo obligatorio. Por favor ingrese dirección',
                    'cargo.required'                =>  'El cargo trabajador es un campo obligatorio. Por favor ingrese cargo trabajador',
                    'encargado.required'            =>  'El nombre encargado lugar de trabajo es un campo obligatorio. Por favor ingrese nombre encargado',
                ];
        }
    }
}
