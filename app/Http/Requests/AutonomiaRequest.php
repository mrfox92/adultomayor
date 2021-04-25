<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutonomiaRequest extends FormRequest
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
                    'levantarse_sin_ayuda'          =>  'required',
                    'cama_aseo_dormitorio'          =>  'required',
                    'asearse_ducharse'              =>  'required',
                    'vestirse'                      =>  'required',
                    'peinarse'                      =>  'required',
                    'lavarse_dientes'               =>  'required',
                    'utilizar_wc'                   =>  'required',
                    'desplazamiento_dentro_casa'    =>  'required',
                    'comer_solo'                    =>  'required',
                    'tomarse_medicamentos'          =>  'required',
                    'salir_calle'                   =>  'required',
                    'realizar_compras'              =>  'required',
                    'uso_medios_transporte'         =>  'required',
                    'medico_controles_salud'        =>  'required',
                    'colaborar_tareas_hogar'        =>  'required',
                ];
            case 'PUT':
                return [
                    'levantarse_sin_ayuda'          =>  'required',
                    'cama_aseo_dormitorio'          =>  'required',
                    'asearse_ducharse'              =>  'required',
                    'vestirse'                      =>  'required',
                    'peinarse'                      =>  'required',
                    'lavarse_dientes'               =>  'required',
                    'utilizar_wc'                   =>  'required',
                    'desplazamiento_dentro_casa'    =>  'required',
                    'comer_solo'                    =>  'required',
                    'tomarse_medicamentos'          =>  'required',
                    'salir_calle'                   =>  'required',
                    'realizar_compras'              =>  'required',
                    'uso_medios_transporte'         =>  'required',
                    'medico_controles_salud'        =>  'required',
                    'colaborar_tareas_hogar'        =>  'required',
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
                    'levantarse_sin_ayuda.required'         =>  'Campo obligatorio, por favor seleccione una opción',
                    'cama_aseo_dormitorio.required'         =>  'Campo obligatorio, por favor seleccione una opción',
                    'asearse_ducharse.required'             =>  'Campo obligatorio, por favor seleccione una opción',
                    'vestirse.required'                     =>  'Campo obligatorio, por favor seleccione una opción',
                    'peinarse.required'                     =>  'Campo obligatorio, por favor seleccione una opción',
                    'lavarse_dientes.required'              =>  'Campo obligatorio, por favor seleccione una opción',
                    'utilizar_wc.required'                  =>  'Campo obligatorio, por favor seleccione una opción',
                    'desplazamiento_dentro_casa.required'   =>  'Campo obligatorio, por favor seleccione una opción',
                    'comer_solo.required'                   =>  'Campo obligatorio, por favor seleccione una opción',
                    'tomarse_medicamentos.required'         =>  'Campo obligatorio, por favor seleccione una opción',
                    'salir_calle.required'                  =>  'Campo obligatorio, por favor seleccione una opción',
                    'realizar_compras.required'             =>  'Campo obligatorio, por favor seleccione una opción',
                    'uso_medios_transporte.required'        =>  'Campo obligatorio, por favor seleccione una opción',
                    'medico_controles_salud.required'       =>  'Campo obligatorio, por favor seleccione una opción',
                    'colaborar_tareas_hogar.required'       =>  'Campo obligatorio, por favor seleccione una opción',
                ];
            case 'PUT':
                return [
                    'levantarse_sin_ayuda.required'         =>  'Campo obligatorio, por favor seleccione una opción',
                    'cama_aseo_dormitorio.required'         =>  'Campo obligatorio, por favor seleccione una opción',
                    'asearse_ducharse.required'             =>  'Campo obligatorio, por favor seleccione una opción',
                    'vestirse.required'                     =>  'Campo obligatorio, por favor seleccione una opción',
                    'peinarse.required'                     =>  'Campo obligatorio, por favor seleccione una opción',
                    'lavarse_dientes.required'              =>  'Campo obligatorio, por favor seleccione una opción',
                    'utilizar_wc.required'                  =>  'Campo obligatorio, por favor seleccione una opción',
                    'desplazamiento_dentro_casa.required'   =>  'Campo obligatorio, por favor seleccione una opción',
                    'comer_solo.required'                   =>  'Campo obligatorio, por favor seleccione una opción',
                    'tomarse_medicamentos.required'         =>  'Campo obligatorio, por favor seleccione una opción',
                    'salir_calle.required'                  =>  'Campo obligatorio, por favor seleccione una opción',
                    'realizar_compras.required'             =>  'Campo obligatorio, por favor seleccione una opción',
                    'uso_medios_transporte.required'        =>  'Campo obligatorio, por favor seleccione una opción',
                    'medico_controles_salud.required'       =>  'Campo obligatorio, por favor seleccione una opción',
                    'colaborar_tareas_hogar.required'       =>  'Campo obligatorio, por favor seleccione una opción',
                ];
        }
    }
}
