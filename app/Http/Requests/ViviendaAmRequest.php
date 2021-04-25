<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ViviendaAmRequest extends FormRequest
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
                    'id_tipo_vivienda'      =>  ['required', Rule::exists('tipo_vivienda', 'id')],
                    'ocupacion_vivienda'    =>  'required',
                    'ocupacion_sitio'       =>  'required',
                    'comparte_terreno'      =>  'required'
                ];
            case 'PUT':
                return [
                    'id_tipo_vivienda'      =>  ['required', Rule::exists('tipo_vivienda', 'id')],
                    'ocupacion_vivienda'    =>  'required',
                    'ocupacion_sitio'       =>  'required',
                    'comparte_terreno'      =>  'required'
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
                    'id_tipo_vivienda.required'     =>  'Campo obligatorio, por favor seleccione una opción',
                    'ocupacion_vivienda.required'   =>  'Campo obligatorio, por favor seleccione una opción',
                    'ocupacion_sitio.required'      =>  'Campo obligatorio, por favor seleccione una opción',
                    'comparte_terreno.required'     =>  'Campo obligatorio, por favor seleccione una opción',
                ];
            case 'PUT':
                return [
                    'id_tipo_vivienda.required'     =>  'Campo obligatorio, por favor seleccione una opción',
                    'ocupacion_vivienda.required'   =>  'Campo obligatorio, por favor seleccione una opción',
                    'ocupacion_sitio.required'      =>  'Campo obligatorio, por favor seleccione una opción',
                    'comparte_terreno.required'     =>  'Campo obligatorio, por favor seleccione una opción',
                ];
        }
    }
}
