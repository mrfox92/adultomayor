<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class AmTrabajoBanoRequest extends FormRequest
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
                    'trabajo_bano_id'   => [ 
                        'required',
                        Rule::unique('am_trabajo_bano')->where(function ($query) {
                            return $query->where('trabajo_bano_id', \request()->trabajo_bano_id)->where('am_id', \request()->am_id);
                        })
                    ],
                    'obs_trabajo_bano'      =>  'nullable|max:500',
                    'fecha_trabajo_bano'    =>  'date|nullable',
                ];

            case 'PUT':
                return [
                    'trabajo_bano_id'           => 'required',
                    'obs_trabajo_bano'          =>  'nullable|max:500',
                    'fecha_trabajo_bano'        =>  'date|nullable',
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
                    'trabajo_bano_id.required'      =>  'La Atencion Trabajo Baño es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'trabajo_bano_id.unique'        =>  'El adulto mayor ya está inscrito en la atención seleccionada. pruebe con otra atencion de la lista',
                    'obs_trabajo_bano.max'          =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'fecha_trabajo_bano.date'       =>  'Debe ingresar una fecha válida, por favor reintente',
                ];
            case 'PUT':
                return [
                    'trabajo_bano_id.required'      =>  'La Atencion Trabajo Baño es un campo obligatorio. Por favor seleccione una opción de la lista',
                    'obs_trabajo_bano.max'          =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'fecha_trabajo_bano.date'       =>  'Debe ingresar una fecha válida, por favor reintente',
                ];
        }
    }
}
