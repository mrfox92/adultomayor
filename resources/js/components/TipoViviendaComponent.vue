<template>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered" id="tipoVivienda">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(vivienda) in tipoviviendas" :key="vivienda.id">
                    <td>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Seleccione acción
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" v-bind:href="`tipoviviendas/show/${ vivienda.id }`">Ver <i class="bx bx-show-alt"></i></a>
                                <a class="dropdown-item" v-bind:href="`tipoviviendas/${vivienda.id}/edit`">Editar <i class="bx bx-edit"></i></a>
                                <a class="dropdown-item" type="button" @click="eliminar(vivienda)">Eliminar <i class="bx bx-trash"></i></a>
                            </div>
                        </div>
                    </td>
                    <td>{{ vivienda.id }}</td>
                    <td>{{ vivienda.nombre }}</td>
                    <td>{{ vivienda.descripcion }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>

export default {
    mounted() {
        this.getTipoViviendas();
    },
    data() {
        return {
            tipoviviendas: []
        }
    },
    methods:{
        getTipoViviendas() {
            axios.get('tipoviviendas/listar').then( res => {
                this.tipoviviendas = res.data;
                this.$tablaGlobal('#tipoVivienda');   //  funcion para mostrar datatables
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
                        axios.delete('tipoviviendas/'+datos.id+'/destroy').then( res => {
                            this.getTipoViviendas();
                            swal("Registro eliminado!", "Tipo vivienda ha sido eliminada correctamente!", "success");
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

