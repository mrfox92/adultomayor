<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AgregarIdentificacionRequest extends FormRequest
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
                    'etnia_id'   => [ Rule::unique('am_etnia')->where(function ($query) {
                        return $query->where('etnia_id', \request()->etnia_id)->where('adulto_mayor_id', \request()->adulto_mayor_id);
                    }),
                        'required', Rule::exists('etnias', 'id')
                    ]
                ];
            case 'PUT':
                return [
                    
                    'etnia_id'   => [ Rule::unique('am_etnia')->where(function ($query) {
                        return $query->where('etnia_id', \request()->etnia_id)->where('adulto_mayor_id', \request()->adulto_mayor_id);
                    }),
                        'required', Rule::exists('etnias', 'id')
                    ]
                ];
        }
    }


    public function messages() {
        return [
            'etnia_id.required' =>  'Debe seleccionar una opción de la lista, por favor reintente',
            'etnia_id.unique'   =>  'Esta etnia ya ha sido seleccionada para este adulto mayor.'
        ];
    }
}
