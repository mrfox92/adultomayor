<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaludRequest extends FormRequest
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
                    'estado_salud'          =>  'required',
                    'inscrito_centro_salud' =>  'required',
                    'controles_salud'       =>  'required',
                    'dependencia_severa'    =>  'required'
                ];

            case 'PUT':
                return [
                    'estado_salud'          =>  'required',
                    'inscrito_centro_salud' =>  'required',
                    'controles_salud'       =>  'required',
                    'dependencia_severa'    =>  'required'
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
                    'estado_salud.required'             =>  'El campo estado salud adulto mayor es obligatorio, por favor seleccione una opción',
                    'inscrito_centro_salud.required'    =>  'El campo inscripción centro de salud adulto mayor es obligatorio, por favor seleccione una opción',
                    'controles_salud.required'          =>  'El campo Controles salud adulto mayor es obligatorio, por favor seleccione una opción',
                    'dependencia_severa.required'       =>  'El campo Dependencia severa adulto mayor es obligatorio, por favor seleccione una opción'
                ];
            case 'PUT':
                return [
                    'estado_salud.required'             =>  'El campo estado salud adulto mayor es obligatorio, por favor seleccione una opción',
                    'inscrito_centro_salud.required'    =>  'El campo inscripción centro de salud adulto mayor es obligatorio, por favor seleccione una opción',
                    'controles_salud.required'          =>  'El campo Controles salud adulto mayor es obligatorio, por favor seleccione una opción',
                    'dependencia_severa.required'       =>  'El campo Dependencia severa adulto mayor es obligatorio, por favor seleccione una opción'
                ];
        }
    }
}
