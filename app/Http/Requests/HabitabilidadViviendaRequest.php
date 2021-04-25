<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabitabilidadViviendaRequest extends FormRequest
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
                    'fuente_calefaccion'    =>  'required',
                    'estado_piso'           =>  'required',
                    'estado_muros'          =>  'required',
                    'estado_techos'         =>  'required',
                    'num_dormitorios'       =>  'required|numeric|min:0',
                    'camas_cada_integrante' =>  'required',
                    'seguridad_vivienda'    =>  'required',
                ];
            case 'PUT':
                return [
                    'fuente_calefaccion'    =>  'required',
                    'estado_piso'           =>  'required',
                    'estado_muros'          =>  'required',
                    'estado_techos'         =>  'required',
                    'num_dormitorios'       =>  'required|numeric|min:0',
                    'camas_cada_integrante' =>  'required',
                    'seguridad_vivienda'    =>  'required',
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
                    'fuente_calefaccion.required'       =>  'El campo fuente calefacción adulto mayor es obligatorio, por favor seleccione una opción',
                    'estado_piso.required'              =>  'El campo estado del piso adulto mayor es obligatorio, por favor seleccione una opción',
                    'estado_muros.required'             =>  'El campo estado de los muros adulto mayor es obligatorio, por favor seleccione una opción',
                    'estado_techos.required'            =>  'El campo estado del techo adulto mayor es obligatorio, por favor seleccione una opción',
                    'num_dormitorios.required'          =>  'El campo N° dormitorios es obligatorio, por favor ingrese un N° de dormmitorios',
                    'num_dormitorios.min'               =>  'Debe ingresar un N° dormitorio(s) válido, por favor ingrese N° dormitorio(s)',
                    'camas_cada_integrante.required'    =>  'El campo parentesco de acompañante del adulto mayor es obligatorio, por favor seleccione una opción',
                    'seguridad_vivienda.required'       =>  'Este campo es olbigatorio, por favor seleccione una opción',
                ];
            case 'PUT':
                return [
                    'fuente_calefaccion.required'       =>  'El campo fuente calefacción adulto mayor es obligatorio, por favor seleccione una opción',
                    'estado_piso.required'              =>  'El campo estado del piso adulto mayor es obligatorio, por favor seleccione una opción',
                    'estado_muros.required'             =>  'El campo estado de los muros adulto mayor es obligatorio, por favor seleccione una opción',
                    'estado_techos.required'            =>  'El campo estado del techo adulto mayor es obligatorio, por favor seleccione una opción',
                    'num_dormitorios.required'          =>  'El campo N° dormitorios es obligatorio, por favor ingrese un N° de dormmitorios',
                    'num_dormitorios.min'               =>  'Debe ingresar un N° dormitorio(s) válido, por favor ingrese N° dormitorio(s)',
                    'camas_cada_integrante.required'    =>  'El campo parentesco de acompañante del adulto mayor es obligatorio, por favor seleccione una opción',
                    'seguridad_vivienda.required'       =>  'Este campo es olbigatorio, por favor seleccione una opción',
                ];
        }
    }
}
