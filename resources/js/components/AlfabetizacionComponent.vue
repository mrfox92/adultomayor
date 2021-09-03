<template>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="alfabetizacion">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(nivel) in nivelAlfabetizacion" :key="nivel.id">
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Seleccione acción
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" v-bind:href="`alfabetizacion/${nivel.id}/edit`">Editar <i class="bx bx-edit"></i></a>
                                <a class="dropdown-item" type="button" @click="eliminar(nivel)">Eliminar <i class="bx bx-trash"></i></a>
                            </div>
                        </div>
                    </td>
                    <td>{{ nivel.id }}</td>
                    <td>{{ nivel.nombre }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>

export default {
    mounted() {
        this.getNivelAlfabetizacion();
    },
    data() {
        return {
            nivelAlfabetizacion: []
        }
    },
    methods:{
        getNivelAlfabetizacion() {
            axios.get('alfabetizacion/listar').then( res => {
                this.nivelAlfabetizacion = res.data;
                this.$tablaGlobal('#alfabetizacion');   //  funcion para mostrar datatables

            });
        },
        eliminar(datos) {
            swal({

                title: `¿Está seguro que desea eliminar el registro de ${datos.nombre} ?`,
                text: "El registro se eliminará de forma permanente",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then( (willDelete) => {

                if (willDelete) {
                        axios.delete('alfabetizacion/'+datos.id+'/destroy').then( res => {
                            this.getNivelAlfabetizacion();
                            swal("Registro eliminado!", "Nivel alfabetización ha sido eliminado correctamente!", "success");
                        }).catch( function (error) {
                            var array = Object.values(error.response.data.errors);
                            array.forEach(element => swal(String(element)));
                        });
                    }
            });
        }
    },
}
</script>

