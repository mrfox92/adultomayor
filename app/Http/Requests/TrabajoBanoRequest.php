<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajoBanoRequest extends FormRequest
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
                    'nombre'    =>  'required',
                    'descripcion'   =>  'nullable|max:500'
                ];
            case 'PUT':
                return [
                    'nombre'    =>  'required',
                    'descripcion'   =>  'nullable|max:500'
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
                    'nombre.required'   =>  'El nombre de trabajo baño es un campo obligatorio, por favor agregue un nombre para trabajo baño',
                    'descripcion.max'   =>  'El texto debe tener un máximo de 500 caracteres'
                ];
            case 'PUT':
                return [
                    'nombre.required'   =>  'El nombre de trabajo baño es un campo obligatorio, por favor agregue un nombre para trabajo baño',
                    'descripcion.max'   =>  'El texto debe tener un máximo de 500 caracteres'
                ];
        }
    }
}
