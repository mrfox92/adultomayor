<template>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="usuarios">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol usuario</th>
                    <th>Sexo</th>
                    <th>Estado usuario en sistema</th>
                    <th>Fecha registro</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(usuario) in usuarios" :key="usuario.id">
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Seleccione acción
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" v-bind:href="`usuarios/${usuario.id}/edit`">Editar <i class="bx bx-edit"></i></a>
                                <a v-if="!usuario.deleted_at" class="dropdown-item" type="button" @click="eliminar(usuario)">Eliminar <i class="bx bx-trash"></i></a>
                                <a v-if="usuario.deleted_at" class="dropdown-item" type="button" @click="restaurar(usuario)">Restaurar <i class="fas fa-sync-alt"></i></a>
                            </div>
                        </div>
                    </td>
                    <td>{{ usuario.id }}</td>
                    <td>{{ usuario.name }}</td>
                    <td>{{ usuario.email }}</td>
                    <td>
                        {{ usuario.role.nombre }}
                    </td>
                    <td>{{ ( usuario.sexo.localeCompare('F') === 0 ) ? 'Femenino': 'Masculino' }}</td>
                    <td v-if="usuario.deleted_at"> <span class="badge badge-danger">Eliminado</span> </td>
                    <td v-if="!usuario.deleted_at"> <span class="badge badge-success">Vigente</span> </td>
                    <td>{{ $formatDate(usuario.created_at) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        mounted() {
            this.getUsuarios();
        },
        data(){
            return {
                usuarios: []
            }
        },
        methods:{
            getUsuarios(){
                axios.get('usuarios/listar').then( res => {
                    this.usuarios = res.data;
                    this.$tablaGlobal('#usuarios');   //  funcion para mostrar datatables
                })
                .catch( error => console.log( error ) );
            },
            eliminar(datos){
                swal({
                    
                    title: `¿Está seguro que desea eliminar el registro de ${datos.name}?`,
                    text: "El registro se eliminará de forma permanente",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.delete('usuarios/'+datos.id+'/destroy').then( res => {

                            if ( res.data.status ) {
                                this.getUsuarios();
                                swal("Registro eliminado!", "Adulto Mayor eliminado correctamente!", "success");
                            }

                        }).catch( function (error) {
                            swal("Error al eliminar usuario!", "No puede eliminar a su propio usuario", "error");
                            var array = Object.values(error.response.data.errors);
                            array.forEach(element => swal(String(element)));
                        });
                    }

                });
            },
            restaurar(datos){
                swal({
                    
                    title: `¿Está seguro que desea restaurar este usuario ${datos.name}?`,
                    text: "El usuario seleccionado se restaurará",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.post('usuarios/restaurar', { id: datos.id }).then( res => {

                            if ( res.data.status ) {

                                this.getUsuarios();
                                swal("Usuario restablecido!", "usuario restablecido correctamente!", "success");
                                console.log( res.data );
                            }

                        }).catch( function (error) {
                            swal("Error al restablecer usuario!", "No se ha podido restablecer usuario", "error");
                            var array = Object.values(error.response.data.errors);
                            array.forEach(element => swal(String(element)));
                        });
                    }

                });
            }
        }
    }
</script>
