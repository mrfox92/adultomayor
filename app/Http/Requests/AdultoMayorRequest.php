<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdultoMayorRequest extends FormRequest
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
                    'rut'                           =>  'required|unique:adultos_mayores,rut',
                    'num_documento'                 =>  'required|unique:adultos_mayores,num_documento',
                    'nombres'                       =>  'required',
                    'apellidos'                     =>  'required',
                    'fecha_nacimiento'              =>  'nullable|date',
                    'sexo'                          =>  'required',
                    'direccion'                     =>  'required',
                    'telefono'                      =>  'nullable',
                    'nacionalidad_id'               =>  ['required', Rule::exists('nacionalidad', 'id')],
                    'alfabetizacion_id'             =>  ['required', Rule::exists('alfabetizacion', 'id')],
                    'porcentaje_rsh'                =>  'nullable',
                    'estado_club_am'                =>  'required',
                    'tipo_vivienda_id'              =>  ['required', Rule::exists('tipo_vivienda', 'id')],
                    'nucleo_familiar_id'            =>  ['required', Rule::exists('nucleo_familiar', 'id')],
                    'institucion_salud_id'          =>  ['required', Rule::exists('institucion_salud', 'id')],
                    'recibe_medicamentos'           =>  'required',
                    'obs_medicamentos'              =>  'nullable|max:500',
                    'emprendimiento'                =>  'required',
                    'obs_emprendimiento'            =>  'nullable|max:500',
                    'atencion_panales'              =>  'required',
                    'obs_atencion_panales'          =>  'nullable|max:500',
                    'postrado'                      =>  'required',
                    'obs_postrado'                  =>  'nullable|max:500',
                    'habitabilidad_casa'            =>  'required',
                    'obs_hab_casa'                  =>  'nullable|max:500',
                    'postulacion_fosis'             =>  'required',
                    'obs_fosis'                     =>  'nullable|max:500',
                    'fecha_postulacion_fosis'       =>  'nullable|date',
                    'cuidado_ninos'                 =>  'required',
                    'cuidado_psd'                   =>  'required',
                    'inscripcion_conadi'            =>  'required',
                    'vacunado'                      =>  'required',
                    'obs_vacunado'                  =>  'nullable|max:500',
                    'controles_dia'                 =>  'required',
                    'obs_controles'                 =>  'nullable|max:500',
                    'picture'                       =>  'sometimes|image|mimes:jpg,jpeg,png',
                ];
            case 'PUT':
                return [
                    'rut'                           =>  [
                        'required',
                        Rule::unique('adultos_mayores', 'rut')->ignore($this->id, 'id')
                    ],
                    'num_documento'                 =>  [
                        'required',
                        Rule::unique('adultos_mayores', 'num_documento')->ignore($this->id, 'id')
                    ],
                    'nombres'                       =>  'required',
                    'apellidos'                     =>  'required',
                    'fecha_nacimiento'              =>  'nullable|date',
                    'sexo'                          =>  'required',
                    'direccion'                     =>  'required',
                    'telefono'                      =>  'nullable',
                    'nacionalidad_id'               =>  ['required', Rule::exists('nacionalidad', 'id')],
                    'alfabetizacion_id'             =>  ['required', Rule::exists('alfabetizacion', 'id')],
                    'porcentaje_rsh'                =>  'nullable',
                    'estado_club_am'                =>  'required',
                    'tipo_vivienda_id'              =>  ['required', Rule::exists('tipo_vivienda', 'id')],
                    'nucleo_familiar_id'            =>  ['required', Rule::exists('nucleo_familiar', 'id')],
                    'institucion_salud_id'          =>  ['required', Rule::exists('institucion_salud', 'id')],
                    'recibe_medicamentos'           =>  'required',
                    'obs_medicamentos'              =>  'nullable|max:500',
                    'emprendimiento'                =>  'required',
                    'obs_emprendimiento'            =>  'nullable|max:500',
                    'atencion_panales'              =>  'required',
                    'obs_atencion_panales'          =>  'nullable|max:500',
                    'postrado'                      =>  'required',
                    'obs_postrado'                  =>  'nullable|max:500',
                    'habitabilidad_casa'            =>  'required',
                    'obs_hab_casa'                  =>  'nullable|max:500',
                    'postulacion_fosis'             =>  'required',
                    'obs_fosis'                     =>  'nullable|max:500',
                    'fecha_postulacion_fosis'       =>  'nullable|date',
                    'cuidado_ninos'                 =>  'required',
                    'cuidado_psd'                   =>  'required',
                    'inscripcion_conadi'            =>  'required',
                    'vacunado'                      =>  'required',
                    'obs_vacunado'                  =>  'nullable|max:500',
                    'controles_dia'                 =>  'required',
                    'obs_controles'                 =>  'nullable|max:500',
                    'picture'                       =>  'sometimes|image|mimes:jpg,jpeg,png',
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
                    'rut.required'                          =>  'El RUT de adulto mayor es un campo obligatorio. Por favor ingrese RUT adulto mayor',
                    'rut.unique'                            =>  'El RUT ingresado pertenece a un adulto mayor registrado, por favor reintente',
                    'num_documento.required'                =>  'El N° documento es un campo obligatorio. Por favor ingrese °N documento adulto mayor',
                    'num_documento.unique'                  =>  'El N° documento ingresado pertenece a un adulto mayor registrado, por favor reintente',
                    'nombres.required'                      =>  'Nombres de adulto mayor es un campo obligatorio. Por favor ingrese nombres adulto mayor',
                    'apellidos.required'                    =>  'Apellidos de adulto mayor es un campo obligatorio. Por favor ingrese apellidos adulto mayor',
                    'fecha_nacimiento.date'                 =>  'Fecha nacimiento es un campo obligatorio, por favor ingrese una fecha de nacimiento',
                    'sexo.required'                         =>  'Campo obligatorio, por favor seleccione una opción sexo Adulto mayor',
                    'direccion.required'                    =>  'La dirección es un campo obligatorio, por favor ingrese dirección domicilio adulto mayor',
                    'nacionalidad_id.required'              =>  'Este campo es obligatorio, por favor seleccione una nacionalidad para el adulto mayor',
                    'alfabetizacion_id.required'            =>  'Este campo es obligatorio, por favor seleccione un nivel de alfabetización adulto mayor',
                    'estado_club_am.required'               =>  'El clud de adulto mayor es un campo obligatorio. Por favor seleccione una opción',
                    'tipo_vivienda_id.required'             =>  'El tipo vivienda es un campo obligatorio. Por favor seleccione un tipo de vivienda',
                    'nucleo_familiar_id.required'           =>  'El nucleo familiar es un campo obligatorio. Por favor seleccione una opción de nucleo familiar',
                    'institucion_salud_id.required'         =>  'La institución Salud es un campo obligatorio. Por favor seleccione una opción de institución salud',
                    'recibe_medicamentos.required'          =>  'Campo obligatorio, por favor seleccione una opción recibir medicamentos',
                    'obs_medicamentos.max'                  =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'emprendimiento.required'               =>  'Campo obligatorio, por favor seleccione una opción tiene emprendimiento',
                    'obs_emprendimiento.max'                =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'atencion_panales.required'             =>  'Campo obligatorio, por favor seleccione una opción atención pañales',
                    'obs_atencion_panales.max'              =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'postrado.required'                     =>  'Campo obligatorio, por favor seleccione una opción postrado',
                    'obs_postrado.max'                      =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'habitabilidad_casa.required'           =>  'Campo obligatorio, por favor seleccione una opción habitabilidad casa',
                    'obs_hab_casa.max'                      =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'postulacion_fosis.required'            =>  'Campo obligatorio, por favor seleccione una opción postulación fosis',
                    'obs_fosis.max'                         =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'cuidado_ninos.required'                =>  'Campo obligatorio, por favor seleccione una opción',
                    'cuidado_psd.required'                  =>  'Campo obligatorio, por favor seleccione una opción',
                    'inscripcion_conadi.required'           =>  'Campo obligatorio, por favor seleccione una opción',
                    'vacunado.required'                     =>  'Campo obligatorio, por favor seleccione una opción vacunado covid-19',
                    'obs_vacunado.max'                      =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'controles_dia.required'                =>  'Campo obligatorio, por favor seleccione una opción controles al día',
                    'obs_controles.max'                     =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'picture.image'                         =>  'El archivo a subir debe tener un formato de imagen válido, pruebe subir una imagen con extension jpg, jpeg o png'
                ];
            case 'PUT':
                return [
                    'rut.required'                          =>  'El RUT de adulto mayor es un campo obligatorio. Por favor ingrese RUT adulto mayor',
                    'rut.unique'                            =>  'El RUT ingresado pertenece a un adulto mayor registrado, por favor reintente',
                    'num_documento.required'                =>  'El N° documento es un campo obligatorio. Por favor ingrese °N documento adulto mayor',
                    'num_documento.unique'                  =>  'El N° documento ingresado pertenece a un adulto mayor registrado, por favor reintente',
                    'nombres.required'                      =>  'Nombres de adulto mayor es un campo obligatorio. Por favor ingrese nombres adulto mayor',
                    'apellidos.required'                    =>  'Apellidos de adulto mayor es un campo obligatorio. Por favor ingrese apellidos adulto mayor',
                    'fecha_nacimiento.date'                 =>  'Fecha nacimiento es un campo obligatorio, por favor ingrese una fecha de nacimiento',
                    'sexo.required'                         =>  'Campo obligatorio, por favor seleccione una opción sexo Adulto mayor',
                    'direccion.required'                    =>  'La dirección es un campo obligatorio, por favor ingrese dirección domicilio adulto mayor',
                    'nacionalidad_id.required'              =>  'Este campo es obligatorio, por favor seleccione una nacionalidad para el adulto mayor',
                    'alfabetizacion_id.required'            =>  'Este campo es obligatorio, por favor seleccione un nivel de alfabetización adulto mayor',
                    'estado_club_am.required'               =>  'El clud de adulto mayor es un campo obligatorio. Por favor seleccione una opción',
                    'tipo_vivienda_id.required'             =>  'El tipo vivienda es un campo obligatorio. Por favor seleccione un tipo de vivienda',
                    'nucleo_familiar_id.required'           =>  'El nucleo familiar es un campo obligatorio. Por favor seleccione una opción de nucleo familiar',
                    'institucion_salud_id.required'         =>  'La institución Salud es un campo obligatorio. Por favor seleccione una opción de institución salud',
                    'recibe_medicamentos.required'          =>  'Campo obligatorio, por favor seleccione una opción recibir medicamentos',
                    'obs_medicamentos.max'                  =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'emprendimiento.required'               =>  'Campo obligatorio, por favor seleccione una opción tiene emprendimiento',
                    'obs_emprendimiento.max'                =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'atencion_panales.required'             =>  'Campo obligatorio, por favor seleccione una opción atención pañales',
                    'obs_atencion_panales.max'              =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'postrado.required'                     =>  'Campo obligatorio, por favor seleccione una opción postrado',
                    'obs_postrado.max'                      =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'habitabilidad_casa.required'           =>  'Campo obligatorio, por favor seleccione una opción habitabilidad casa',
                    'obs_hab_casa.max'                      =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'postulacion_fosis.required'            =>  'Campo obligatorio, por favor seleccione una opción postulación fosis',
                    'obs_fosis.max'                         =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'cuidado_ninos.required'                =>  'Campo obligatorio, por favor seleccione una opción',
                    'cuidado_psd.required'                  =>  'Campo obligatorio, por favor seleccione una opción',
                    'inscripcion_conadi.required'           =>  'Campo obligatorio, por favor seleccione una opción',
                    'vacunado.required'                     =>  'Campo obligatorio, por favor seleccione una opción vacunado covid-19',
                    'obs_vacunado.max'                      =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'controles_dia.required'                =>  'Campo obligatorio, por favor seleccione una opción controles al día',
                    'obs_controles.max'                     =>  'El texto es demasiado largo, debe tener un máximo de 500 caracteres',
                    'picture.image'                         =>  'El archivo a subir debe tener un formato de imagen válido, pruebe subir una imagen con extension jpg, jpeg o png'
                ];
        }
    }
}
