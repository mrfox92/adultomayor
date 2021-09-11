<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PSDRequest extends FormRequest
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
                    'rut'                           =>  'required|unique:personas_discapacitadas,rut',
                    'num_documento'                 =>  'required|unique:personas_discapacitadas,num_documento',
                    'nombres'                       =>  'required',
                    'apellidos'                     =>  'required',
                    'fecha_nacimiento'              =>  'nullable|date',
                    'direccion'                     =>  'required',
                    'telefono'                      =>  'nullable',
                    'nacionalidad_id'               =>  ['required', Rule::exists('nacionalidad', 'id')],
                    'sexo'                          =>  'required',
                    'sociedad_civil'                =>  'required',
                    'obs_sociedad_civil'            =>  'nullable|max:500',
                    'recibe_pension'                =>  'required',
                    'picture'                       =>  'sometimes|image|mimes:jpg,jpeg,png|max:2048',
                ];
            case 'PUT':
                return [
                    'rut'                           =>  [
                        'required',
                        Rule::unique('personas_discapacitadas', 'rut')->ignore($this->id, 'id')    
                    ],
                    'num_documento'                 =>  [
                        'required',
                        Rule::unique('personas_discapacitadas', 'num_documento')->ignore($this->id, 'id')
                    ],
                    'nombres'                       =>  'required',
                    'apellidos'                     =>  'required',
                    'fecha_nacimiento'              =>  'nullable|date',
                    'direccion'                     =>  'required',
                    'telefono'                      =>  'nullable',
                    'nacionalidad_id'               =>  ['required', Rule::exists('nacionalidad', 'id')],
                    'sexo'                          =>  'required',
                    'sociedad_civil'                =>  'required',
                    'obs_sociedad_civil'            =>  'nullable|max:500',
                    'recibe_pension'                =>  'required',
                    'picture'                       =>  'sometimes|image|mimes:jpg,jpeg,png|max:2048',
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
                    'rut.required'                          =>  'El RUT de PSD es un campo obligatorio. Por favor ingrese RUT adulto mayor',
                    'rut.unique'                            =>  'El RUT ingresado pertenece a una PSD registrada, por favor reintente',
                    'num_documento.required'                =>  'El N° documento es un campo obligatorio. Por favor ingrese °N documento PSD',
                    'num_documento.unique'                  =>  'El N° documento ingresado pertenece a una PSD registrada, por favor reintente',
                    'nombres.required'                      =>  'Nombres de PDS es un campo obligatorio. Por favor ingrese nombres PSD',
                    'apellidos.required'                    =>  'Apellidos de PSD es un campo obligatorio. Por favor ingrese apellidos PSD',
                    'fecha_nacimiento.date'                 =>  'Fecha nacimiento es un campo obligatorio, por favor ingrese una fecha de nacimiento',
                    'direccion.required'                    =>  'La dirección es un campo obligatorio, por favor ingrese dirección domicilio PSD',
                    'nacionalidad_id.required'              =>  'Este campo es obligatorio, por favor seleccione una nacionalidad para el PSD',
                    'sexo.required'                         =>  'Campo obligatorio, por favor seleccione una opción sexo PSD',
                    'sociedad_civil.required'               =>  'Campo obligatorio, por favor seleccione una opción organizacion(es) civil(es)',
                    'obs_sociedad_civil.max'                =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'recibe_pension.required'               =>  'Campo obligatorio, por favor seleccione una opción recibe pension',
                    'picture.image'                         =>  'El archivo a subir debe tener un formato de imagen válido, pruebe subir una imagen con extension jpg, jpeg o png',
                    'picture.max'                           =>  'Debe subir una imagen con un peso no superior a los 2 MB, por favor reintente con una imagen más liviana',
                ];
            case 'PUT':
                return [
                    'rut.required'                          =>  'El RUT de PSD es un campo obligatorio. Por favor ingrese RUT adulto mayor',
                    'rut.unique'                            =>  'El RUT ingresado pertenece a una PSD registrada, por favor reintente',
                    'num_documento.required'                =>  'El N° documento es un campo obligatorio. Por favor ingrese °N documento PSD',
                    'num_documento.unique'                  =>  'El N° documento ingresado pertenece a una PSD registrada, por favor reintente',
                    'nombres.required'                      =>  'Nombres de PDS es un campo obligatorio. Por favor ingrese nombres PSD',
                    'apellidos.required'                    =>  'Apellidos de PSD es un campo obligatorio. Por favor ingrese apellidos PSD',
                    'fecha_nacimiento.date'                 =>  'Fecha nacimiento es un campo obligatorio, por favor ingrese una fecha de nacimiento',
                    'direccion.required'                    =>  'La dirección es un campo obligatorio, por favor ingrese dirección domicilio PSD',
                    'nacionalidad_id.required'              =>  'Este campo es obligatorio, por favor seleccione una nacionalidad para el adulto mayor',
                    'sexo.required'                         =>  'Campo obligatorio, por favor seleccione una opción sexo psd',
                    'sociedad_civil.required'               =>  'Campo obligatorio, por favor seleccione una opción organizacion(es) civil(es)',
                    'obs_sociedad_civil.max'                =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'recibe_pension.required'               =>  'Campo obligatorio, por favor seleccione una opción recibe pension',
                    'picture.image'                         =>  'El archivo a subir debe tener un formato de imagen válido, pruebe subir una imagen con extension jpg, jpeg o png',
                    'picture.max'                           =>  'Debe subir una imagen con un peso no superior a los 2 MB, por favor reintente con una imagen más liviana',
                ];
        }
    }
}
