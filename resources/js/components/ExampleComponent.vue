<template>
    <div class="table-responsive">
        <table class="table table-hover table-stripped table-bordered" id="sampleTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rut</th>
                    <th>N° Documento</th>
                    <th>Nombre</th>
                    <th>F. Nacimiento</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>% rsh</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(adultomayor) in adultosmayores" :key="adultomayor.id">
                    <td>{{ adultomayor.id }}</td>
                    <td>{{ adultomayor.rut }}</td>
                    <td>{{ adultomayor.num_documento }}</td>
                    <td>{{ adultomayor.nombres }} {{ adultomayor.apellidos }}</td>
                    <td>{{ adultomayor.fecha_nacimiento }}</td>
                    <td>{{ adultomayor.direccion }}</td>
                    <td>{{ adultomayor.telefono }}</td>
                    <td>{{ adultomayor.porcentaje_rsh }}</td>
                    <td colspan="3">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Seleccione acción
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" v-bind:href="`adultomayor/show/${ adultomayor.id }`">Ver <i class="bx bx-show-alt"></i></a>
                                <a class="dropdown-item" v-bind:href="`adultomayor/${adultomayor.id}/edit`">Editar <i class="bx bx-edit"></i></a>
                                <a class="dropdown-item" type="button" @click="eliminar(adultomayor)">Eliminar <i class="bx bx-trash"></i></a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import datatable from 'datatables.net-bs4'
    require( 'datatables.net-buttons/js/dataTables.buttons' )
    require( 'datatables.net-buttons/js/buttons.html5' )
    require( 'datatables.net-buttons/js/buttons.colVis' )
    import print from 'datatables.net-buttons/js/buttons.print'
    import jszip from 'jszip/dist/jszip';
    import pdfMake from 'pdfmake/build/pdfmake'
    import pdfFonts from 'pdfmake/build/vfs_fonts'
    import swal from 'sweetalert';  //  sweet alert
    
    pdfMake.vfs = pdfFonts.pdfMake.vfs;
    window.JSZip = jszip;

    export default {
        mounted() {
            // console.log('Component mounted.')
            // this.getAm();
            this.getAdultosMayores();
        },
        data(){
            return {
                adultosmayores: []
            }
        },
        methods:{
            tabla(){
                this.$nextTick( () => {
                    $('#sampleTable').DataTable({
                        language: {
                            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                        },
                        //  lBfrtip
                        dom: "<'row mb-2 text-center'<'col-sm-12 col-md-12'B>>" + 
                             "<'row'<'col-sm-12 col-md-10'f><'col-sm-12 col-md-2'l>>" +
                             "<'row'<'col-sm-12 col-md-12 my-2'i>>" +
                             "<'row'<'col-sm-12'tr>>" +
                             "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-7 my-2'p>>",
                        buttons: [
                            {
                                "extend": "colvis",
                                "text": "<i class='far fa-copy'></i> Columnas visibles",
                                "titleAttr": "Columnas visibles",
                                "className": "btn btn-primary"
                            },
                            // {
                            //     "extend": "copyHtml5",
                            //     "text": "<i class='far fa-copy'></i> Copiar",
                            //     "titleAttr": "Copiar",
                            //     "className": "btn btn-secondary",
                            //     "exportOptions": {
                            //         columns: ':visible'
                            //     }
                            // },
                            {
                                "extend": "excelHtml5",
                                "text": "<i class='fas fa-file-excel'></i> Excel",
                                "titleAttr": "Exportar a Excel",
                                "className": "btn btn-success",
                                "exportOptions": {
                                    columns: ':visible'
                                }
                            },
                            {
                                "extend": "pdfHtml5",
                                "text": "<i class='fas fa-file-pdf'></i> PDF",
                                "titleAttr": "Exportar a PDF",
                                "className": "btn btn-danger",
                                "exportOptions": {
                                    columns: ':visible'
                                }
                                // "exportOptions": {
                                //     columns: [0,1,2, 3, 4]
                                // }
                            },
                            // {
                            //     "extend": "csvHtml5",
                            //     "text": "<i class='fas fa-file-csv'></i> CSV",
                            //     "titleAttr": "Exportar a CSV",
                            //     "className": "btn btn-info",
                            //     "exportOptions": {
                            //         columns: ':visible'
                            //     }
                            // },
                            {
                                "extend": "print",
                                "text": "<i class='fas fa-print'></i> Imprimir",
                                "titleAttr": "Imprimir archivo",
                                "className": "btn btn-secondary",
                                "exportOptions": {
                                    columns: ':visible'
                                }
                            }
                        ]
                    });
                });
            },
            getAdultosMayores(){
                axios.get('adultomayor/listar').then( res => {
                    this.adultosmayores = res.data;
                    $('#sampleTable').DataTable().destroy();    //  destruir datatable
                    this.tabla();   //  funcion para mostrar datatables
                });
            },
            eliminar(datos){
                swal({
                    // title: "¿Está seguro que desea eliminar el registro de "+datos.nombres+" ?",
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
            // getAm(){
            //     axios.get('adultomayor/listar').then(res => {
            //         $('#sampleTable').DataTable({
            //             data: res.data,
            //             columns: [
            //                 { data: 'id' },
            //                 { data: 'rut' },
            //                 { data: 'nombres' }
            //             ]
            //         });
            //     });
            // }
        }
    }
</script>
