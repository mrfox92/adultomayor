<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstablecimientoRequest extends FormRequest
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
                    'direccion'                     =>  'nullable',
                    'email'                         =>  'nullable',
                    'telefono'                      =>  'nullable',
                    'encargado'                     =>  'required',
                    'curso_actual'                  =>  'required',
                    'profesor'                      =>  'nullable',
                    'programa_pie'                  =>  'required'
                ];
            case 'PUT':
                return [
                    'nombre'                        =>  'required',
                    'direccion'                     =>  'nullable',
                    'email'                         =>  'nullable',
                    'telefono'                      =>  'nullable',
                    'encargado'                     =>  'required',
                    'curso_actual'                  =>  'required',
                    'profesor'                      =>  'nullable',
                    'programa_pie'                  =>  'required'
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
                    'nombre.required'               =>  'El nombre establecimiento es un campo obligatorio. Por favor ingrese nombre',
                    'encargado.required'            =>  'El nombre encargado establecimiento es un campo obligatorio. Por favor ingrese nombre encargado establecimiento',
                    'curso_actual.required'         =>  'El curso actual es un campo obligatorio. Por favor ingrese curso actual estudiante',
                    'programa_pie.required'         =>  'Programa pie es un campo obligatorio. Por favor seleccione una opción'
                ];
            case 'PUT':
                return [
                    'nombre.required'               =>  'El nombre establecimiento es un campo obligatorio. Por favor ingrese nombre',
                    'encargado.required'            =>  'El nombre encargado establecimiento es un campo obligatorio. Por favor ingrese nombre encargado establecimiento',
                    'curso_actual.required'         =>  'El curso actual es un campo obligatorio. Por favor ingrese curso actual estudiante',
                    'programa_pie.required'         =>  'Programa pie es un campo obligatorio. Por favor seleccione una opción'
                ];
        }
    }
}
