<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndependientePSDRequest extends FormRequest
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
                    'nombre.required'               =>  'El nombre lugar de actividad PSD es un campo obligatorio. Por favor ingrese un nombre para la actividad/trabajo',
                    'direccion.required'            =>  'La dirección lugar de actividad independiente PSD es un campo obligatorio. Por favor ingrese dirección',
                    'cargo.required'                =>  'El cargo es un campo obligatorio. Por favor ingrese cargo PSD',
                    'encargado.required'            =>  'El nombre encargado lugar de actividad independiente PSD es un campo obligatorio. Por favor ingrese nombre encargado',
                ];
            case 'PUT':
                return [
                    'nombre.required'               =>  'El nombre lugar de actividad PSD es un campo obligatorio. Por favor ingrese un nombre para la actividad/trabajo',
                    'direccion.required'            =>  'La dirección lugar de actividad independiente PSD es un campo obligatorio. Por favor ingrese dirección',
                    'cargo.required'                =>  'El cargo es un campo obligatorio. Por favor ingrese cargo PSD',
                    'encargado.required'            =>  'El nombre encargado lugar de actividad independiente PSD es un campo obligatorio. Por favor ingrese nombre encargado',
                ];
        }
    }
}
