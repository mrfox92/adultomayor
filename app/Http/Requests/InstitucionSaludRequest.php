<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitucionSaludRequest extends FormRequest
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
                    'descripcion'   =>  'nullable|max:500',
                    'localidad'     =>  'nullable|max:200'
                ];
            case 'PUT':
                return [
                    'nombre'        =>  'required',
                    'descripcion'   =>  'nullable|max:500',
                    'localidad'     =>  'nullable|max:200'
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
                    'nombre.required'   =>  'El nombre de la institución de salud es un campo obligatorio',
                    'descripcion.max'   =>  'El texto debe tener un máximo de 500 caracteres',
                    'localidad.max'     =>  'El texto debe tener un máximo de 200 caracteres'
                ];
            case 'PUT':
                return [
                    'nombre.required'   =>  'El nombre de la institución de salud es un campo obligatorio',
                    'descripcion.max'   =>  'El texto debe tener un máximo de 500 caracteres',
                    'localidad.max'     =>  'El texto debe tener un máximo de 200 caracteres'
                ];
        }
    }
}
