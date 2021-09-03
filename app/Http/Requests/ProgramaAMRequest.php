<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramaAMRequest extends FormRequest
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
                    'nombre'            =>  'required',
                    'descripcion'       =>  'required|max:1000',
                    'objetivo'          =>  'nullable|max:1000',
                    'requisitos'        =>  'nullable|max:1000',
                ];
            case 'PUT':
                return [
                    'nombre'            =>  'required',
                    'descripcion'       =>  'required|max:1000',
                    'objetivo'          =>  'nullable|max:1000',
                    'requisitos'        =>  'nullable|max:1000',
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
                    'nombre.required'           =>  'El nombre del programa es un campo obligatorio. Por favor ingrese un nombre para el programa',
                    'descripcion.required'      =>  'La descripción del programa es un campo obligatorio. Por favor ingrese una descripcion para el programa',
                    'descripcion.max'           =>  'El texto es demasiado largo, debe tener un máximo de 1000 caracteres',
                    'objetivo.max'              =>  'El texto es demasiado largo, debe tener un máximo de 1000 caracteres',
                    'requisitos.max'            =>  'El texto es demasiado largo, debe tener un máximo de 1000 caracteres',
                ];
            case 'PUT':
                return [
                    'nombre.required'           =>  'El nombre del programa es un campo obligatorio. Por favor ingrese un nombre para el programa',
                    'descripcion.required'      =>  'La descripción del programa es un campo obligatorio. Por favor ingrese una descripcion para el programa',
                    'descripcion.max'           =>  'El texto es demasiado largo, debe tener un máximo de 1000 caracteres',
                    'objetivo.max'              =>  'El texto es demasiado largo, debe tener un máximo de 1000 caracteres',
                    'requisitos.max'            =>  'El texto es demasiado largo, debe tener un máximo de 1000 caracteres',
                ];
        }
    }
}
