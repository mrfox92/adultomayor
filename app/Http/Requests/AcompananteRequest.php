<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcompananteRequest extends FormRequest
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
                    'acompanante_am'    =>  'required',
                    'sexo_acompanante'  =>  'required',
                    'edad'              =>  'required|numeric|min:1',
                    'parentesco_am'     =>  'required',
                    'estado_trabajo'    =>  'required',
                ];
            case 'PUT':
                return [
                    'acompanante_am'    =>  'required',
                    'sexo_acompanante'  =>  'required',
                    'edad'              =>  'required|numeric|min:1',
                    'parentesco_am'     =>  'required',
                    'estado_trabajo'    =>  'required',
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
                    'acompanante_am.required'   =>  'El campo acompañante adulto mayor es obligatorio, por favor seleccione una opción',
                    'sexo_acompanante.required' =>  'El campo sexo acompañante adulto mayor es obligatorio, por favor seleccione una opción',
                    'edad.required'             =>  'El campo edad es obligatorio, por favor ingrese edad acompañante adulto mayor',
                    'edad.min'                  =>  'Debe ingresar una edad válida, por favor ingrese edad acompañante adulto mayor',
                    'parentesco_am.required'    =>  'El campo parentesco de acompañante del adulto mayor es obligatorio, por favor seleccione una opción',
                    'estado_trabajo.required'   =>  'Este campo es olbigatorio, por favor seleccione una opción',
                ];
            case 'PUT':
                return [
                    'acompanante_am.required'   =>  'El campo acompañante adulto mayor es obligatorio, por favor seleccione una opción',
                    'sexo_acompanante.required' =>  'El campo sexo acompañante adulto mayor es obligatorio, por favor seleccione una opción',
                    'edad.required'             =>  'El campo edad es obligatorio, por favor ingrese edad acompañante adulto mayor',
                    'edad.min'                  =>  'Debe ingresar una edad válida, por favor ingrese edad acompañante adulto mayor',
                    'parentesco_am.required'    =>  'El campo parentesco de acompañante del adulto mayor es obligatorio, por favor seleccione una opción',
                    'estado_trabajo.required'   =>  'Este campo es olbigatorio, por favor seleccione una opción',
                ];
        }
    }

}
