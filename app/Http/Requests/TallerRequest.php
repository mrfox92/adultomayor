<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TallerRequest extends FormRequest
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
                    'descripcion'       =>  'nullable|max:500',
                    'tipo_taller_id'    =>  ['required', Rule::exists('tipo_taller', 'id')],
                    'fecha_inicio'      =>  'date|nullable',
                    'fecha_fin'         =>  'date|nullable|after_or_equal:fecha_inicio'
                ];
            case 'PUT':
                return [
                    'nombre'        =>  'required',
                    'descripcion'   =>  'nullable|max:500',
                    'tipo_taller_id'    =>  ['required', Rule::exists('tipo_taller', 'id')],
                    'fecha_inicio'      =>  'date|nullable',
                    'fecha_fin'         =>  'date|nullable|after_or_equal:fecha_inicio'
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
                    'nombre.required'           =>  'El nombre del taller es un campo obligatorio. Por favor ingrese un nombre para el taller',
                    'descripcion.max'           =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'tipo_taller_id.required'   =>  'Este campo es obligatorio, por favor seleccione una categoria para el taller',
                    'fecha_inicio.date'         =>  'Debe ingresar una fecha válida, por favor reintente',
                    'fecha_fin.after_or_equal'  =>  'La fecha fin debe ser una fecha después de o igual a fecha de inicio, por favor reintente.'
                ];
            case 'PUT':
                return [
                    'nombre.required'           =>  'El nombre del taller es un campo obligatorio. Por favor ingrese un nombre para el taller',
                    'descripcion.max'           =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'tipo_taller_id.required'   =>  'Este campo es obligatorio, por favor seleccione una categoria para el taller',
                    'fecha_inicio.date'         =>  'Debe ingresar una fecha válida, por favor reintente',
                    'fecha_fin.after_or_equal'  =>  'La fecha fin debe ser una fecha después de o igual a fecha de inicio, por favor reintente.'
                ];
        }
    }
}
