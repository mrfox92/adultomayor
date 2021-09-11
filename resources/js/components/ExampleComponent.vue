<template>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>ID</th>
                    <th>Rut</th>
                    <th>N° Documento</th>
                    <th>Nombre</th>
                    <th>F. Nacimiento</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Nacionalidad</th>
                    <th>% rsh</th>
                    <th>Club adulto mayor</th>
                    <th>Tipo de vivienda</th>
                    <th>Nucleo familiar</th>
                    <th>Institución Salud</th>
                    <th>¿Recibe medicamentos?</th>
                    <th>Observación medicamento</th>
                    <th>¿Tiene emprendimiento?</th>
                    <th>Observación emprendimiento</th>
                    <th>¿Necesita atención pañales?</th>
                    <th>Observación pañales</th>
                    <th>¿Está postrado?</th>
                    <th>Observación postrado</th>
                    <th>¿Habitabilidad Vivienda?</th>
                    <th>Observación Habitabilidad Vivienda</th>
                    <th>¿Postulación FOSIS?</th>
                    <th>Observación FOSIS</th>
                    <th>Fecha Postulación FOSIS</th>
                    <th>¿Ha sido vacunado contra el COVID-19?</th>
                    <th>Observación sobre Vacuna</th>
                    <th>¿Tiene sus controles al día en sistema salud primaria?</th>
                    <th>Observación controles</th>
                    <th>¿Se encuentra inscrito/a en CONADI?</th>
                    <th>¿Se encuentra a cargo del cuidado de niños/as y/o una persona enferma o que requiere cuidados permanentes?</th>
                    <th>¿Se encuentra a cargo del cuidado de alguna persona en situación de discapacidad?</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(adultomayor) in adultosmayores" :key="adultomayor.id">
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Seleccione acción
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" v-bind:href="`adultomayor/show/${ adultomayor.id }`">Ver fichas <i class="bx bx-show-alt"></i></a>
                                <a class="dropdown-item" v-bind:href="`adultomayor/${adultomayor.id}/edit`">Editar <i class="bx bx-edit"></i></a>
                                <a class="dropdown-item" type="button" @click="eliminar(adultomayor)">Eliminar <i class="bx bx-trash"></i></a>
                            </div>
                        </div>
                    </td>
                    <td>{{ adultomayor.id }}</td>
                    <td>{{ adultomayor.rut }}</td>
                    <td>{{ adultomayor.num_documento }}</td>
                    <td>{{ adultomayor.nombres }} {{ adultomayor.apellidos }}</td>
                    <td>{{ $formatDate(adultomayor.fecha_nacimiento) }}</td>
                    <td>{{ $getAge(adultomayor.fecha_nacimiento) }}</td>
                    <td>{{ ( adultomayor.sexo.localeCompare('F') === 0 ) ? 'Femenino': 'Masculino' }}</td>
                    <td>{{ adultomayor.direccion }}</td>
                    <td>{{ adultomayor.telefono }}</td>
                    <td>{{ adultomayor.nacionalidad.nombre }}</td>
                    <td>{{ adultomayor.porcentaje_rsh }}</td>
                    <td><span>{{ ( adultomayor.estado_club_am.localeCompare('Quiere participar') === 0 ) ? 'Quiere participar': 'No participa' }}</span></td>
                    <td><span>{{ adultomayor.tipo_vivienda.nombre }}</span></td>
                    <td><span>{{ adultomayor.nucleo_familiar.nombre }}</span></td>
                    <td><span>{{ adultomayor.institucion_salud.nombre }}</span></td>
                    <td><span>{{ ( adultomayor.recibe_medicamentos.localeCompare('SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ( adultomayor.obs_medicamentos) ? adultomayor.obs_medicamentos : 'No Especificada' }}</span></td>
                    <td><span>{{ ( adultomayor.emprendimiento.localeCompare('SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ( adultomayor.obs_emprendimiento) ? adultomayor.obs_emprendimiento : 'No Especificada' }}</span></td>
                    <td><span>{{ ( adultomayor.atencion_panales.localeCompare('SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ( adultomayor.obs_panales) ? adultomayor.obs_panales : 'No Especificada' }}</span></td>
                    <td><span>{{ ( adultomayor.postrado.localeCompare('SI') === 0) ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ( adultomayor.obs_postrado) ? adultomayor.obs_postrado : 'No Especificada' }}</span></td>
                    <td><span>{{ ( adultomayor.habitabilidad_casa.localeCompare('SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ( adultomayor.obs_hab_casa) ? adultomayor.obs_hab_casa : 'No Especificada' }}</span></td>
                    <td><span>{{ ( adultomayor.postulacion_fosis.localeCompare('SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ( adultomayor.obs_fosis) ? adultomayor.obs_fosis : 'No Especificada' }}</span></td>
                    <td><span>{{ ( adultomayor.fecha_postulacion_fosis ) ? $formatDate( adultomayor.fecha_postulacion_fosis ) : 'No Especificada' }}</span></td>
                    <td><span>{{ ( adultomayor.vacunado.localeCompare('SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ( adultomayor.obs_vacunado) ? adultomayor.obs_vacunado : 'No Especificada' }}</span></td>
                    <td><span>{{ ( adultomayor.controles_dia.localeCompare('SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                    <td><span>{{ ( adultomayor.obs_controles) ? adultomayor.obs_controles : 'No Especificada' }}</span></td>
                    
                    <td>
                        <span v-if="adultomayor.inscripcion_conadi.localeCompare('SI') === 0">SI</span>
                        <span v-else-if="adultomayor.inscripcion_conadi.localeCompare('NO') === 0">NO</span>
                        <span v-else-if="adultomayor.inscripcion_conadi.localeCompare('NO SABE') === 0">NO SABE</span>
                        <span v-else-if="adultomayor.inscripcion_conadi.localeCompare('NO APLICA') === 0">NO APLICA</span>
                    </td>
                    
                    <td>
                        <span v-if="adultomayor.cuidado_ninos.localeCompare('SI') === 0">Si, tiempo completo</span>
                        <span v-else-if="adultomayor.cuidado_ninos.localeCompare('A VECES') === 0">Si, algunas veces a la semana</span>
                        <span v-else-if="adultomayor.cuidado_ninos.localeCompare('RARA VEZ') === 0">Rara vez</span>
                        <span v-else-if="adultomayor.cuidado_ninos.localeCompare('NO') === 0">Nunca</span>
                    </td>

                    <td><span>{{ ( adultomayor.cuidado_psd.localeCompare('SI') === 0 ) ? 'Si' : 'No' }}</span></td>

                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        mounted() {
            this.getAdultosMayores();
        },
        data(){
            return {
                adultosmayores: []
            }
        },
        methods:{
            getAdultosMayores(){

                axios.get('adultomayor/listar').then( res => {

                    console.log( res.data );
                    this.adultosmayores = res.data.adultosmayores;
                    this.$tablaGlobal('#example');   //  funcion para mostrar datatables
                })
                .catch( error => console.log(error) );
            },
            eliminar(datos){
                swal({
                    
                    title: `¿Está seguro que desea eliminar el registro de ${datos.nombres} ${datos.apellidos}?`,
                    text: "El registro se eliminará de forma permanente",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.delete('adultomayor/'+datos.id+'/destroy').then( res => {
                            this.getAdultosMayores();
                            swal("Registro eliminado!", "Adulto Mayor eliminado correctamente!", "success");
                        }).catch( function (error) {
                            var array = Object.values(error.response.data.errors);
                            array.forEach(element => swal(String(element)));
                        });
                    }

                });
            }
        }
    }
</script>
