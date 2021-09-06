<template>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="psd">
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
                    <th>Participa en organizacion(es) civil(es)</th>
                    <th>Observación organizacion(es) civil(es)</th>
                    <th>¿Recibe Pensión?</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(element) in psd" :key="element.id">
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Seleccione acción
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" v-bind:href="`psd/show/${ element.id }`">Ver Fichas <i class="bx bx-show-alt"></i></a>
                                <a class="dropdown-item" v-bind:href="`psd/${ element.id }/edit`">Editar <i class="bx bx-edit"></i></a>
                                <a class="dropdown-item" type="button" @click="eliminar(element)">Eliminar <i class="bx bx-trash"></i></a>
                            </div>
                        </div>
                    </td>
                    <td>{{ element.id }}</td>
                    <td>{{ element.rut }}</td>
                    <td>{{ element.num_documento }}</td>
                    <td>{{ element.nombres }} {{ element.apellidos }}</td>
                    <td>{{ $formatDate(element.fecha_nacimiento) }}</td>
                    <td>{{ $getAge(element.fecha_nacimiento) }}</td>
                    <td>{{ ( element.sexo.localeCompare('F') === 0 ) ? 'Femenino': 'Masculino' }}</td>
                    <td>{{ element.direccion }}</td>
                    <td>{{ element.telefono }}</td>
                    <td>{{ element.nacionalidad.nombre }}</td>
                    <td>{{ element.sociedad_civil }}</td>
                    <td>{{ element.obs_sociedad_civil }}</td>
                    <td>{{ element.recibe_pension }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    
    export default {
        mounted() {
            this.getPsd();
        },
        data(){
            return {
                psd: []
            }
        },
        methods:{
            getPsd(){
                axios.get('psd/listar').then( res => {

                    this.psd = res.data.usuarios;
                    this.$tablaGlobal('#psd');   //  funcion para mostrar datatables
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
                        axios.delete('psd/'+datos.id+'/destroy').then( res => {
                            this.getPsd();
                            swal("Registro eliminado!", "PSD eliminado correctamente!", "success");
                        }).catch( function (error) {
                            var array = Object.values(error.response.data.errors);
                            array.forEach(element => swal(String(element)));
                        });
                    }

                });
            },
        }
    }
</script>
