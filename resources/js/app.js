/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: axios } = require('axios');

require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue';

/* Dependencias globales para todos los componentes Librerias */
import datatable from 'datatables.net-bs4'
// require( 'datatables.net-buttons/js/dataTables.buttons')
require( 'datatables.net-bs4/js/dataTables.bootstrap4');
require( 'datatables.net-buttons/js/dataTables.buttons');
require( 'datatables.net-bs4/js/dataTables.bootstrap4');
require( 'datatables.net-buttons-bs4/js/buttons.bootstrap4')
require( 'datatables.net-buttons/js/buttons.html5' )
require( 'datatables.net-buttons/js/buttons.colVis' )
import print from 'datatables.net-buttons/js/buttons.print'
import jszip from 'jszip/dist/jszip';
import pdfMake from 'pdfmake/build/pdfmake'
import pdfFonts from 'pdfmake/build/vfs_fonts'
import swal from 'sweetalert';  //  sweet alert
import moment from 'moment' //  librería fechas

pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.JSZip = jszip;

Vue.prototype.$formatDate = function( date ) {
    return moment( date ).format('DD/MM/YYYY');
}
Vue.prototype.$getAge = function( date ) {
    return moment().diff(date, 'years');
}

Vue.prototype.$tablaGlobal = function( nombreTabla ) {
    
    $(nombreTabla).DataTable().destroy();    //  destruir si existe tabla

    this.$nextTick( () => {

        $(nombreTabla).DataTable({
            language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            //  lBfrtip
            dom: "<'row mb-2'<'col-sm-12 col-md-12'B>>" + 
                 "<'row'<'col-sm-12 col-md-12'f>>" +
                 "<'row'<'col-sm-12 col-md-12'l>>" +
                 "<'row'<'col-sm-12 col-md-12 my-2'i>>" +
                 "<'row'<'col-sm-12'tr>>" +
                 "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-7 my-2'p>>",
            buttons: [
                {
                    "extend": "colvis",
                    "text": "<i class='fas fa-table'></i> Columnas visibles",
                    "titleAttr": "Columnas visibles",
                    "className": "btn btn-primary"
                },
                {
                    "extend": "copyHtml5",
                    "text": "<i class='far fa-copy'></i> Copiar",
                    "titleAttr": "Copiar",
                    "className": "btn btn-danger",
                    "exportOptions": {
                        columns: ':visible'
                    }
                },
                // {
                //     "extend": "pdfHtml5",
                //     "title": "Datos PSD",
                //     "text": "<i class='fas fa-file-pdf'></i> PDF",
                //     "titleAttr": "Exportar a PDF",
                //     "className": "btn btn-danger",
                //     "exportOptions": {
                //         columns: ':visible'
                //     }
                // },
                {
                    "extend": "excelHtml5",
                    "title": "Datos PSD",
                    "text": "<i class='fas fa-file-excel'></i> Excel",
                    "titleAttr": "Exportar a Excel",
                    "className": "btn btn-success",
                    "exportOptions": {
                        columns: ':visible(:not(.not-export-col))'
                    }
                },
                {
                    "extend": "print",
                    "title": "Datos PSD",
                    "text": "<i class='fas fa-print'></i> Imprimir",
                    "titleAttr": "Imprimir archivo",
                    "className": "btn btn-secondary",
                    "exportOptions": {
                        columns: ':visible(:not(.not-export-col))'
                    }
                }
            ]
        });

    });
}


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('vivienda-component', require('./components/TipoViviendaComponent.vue').default);
Vue.component('alfabetizacion-component', require('./components/AlfabetizacionComponent.vue').default);
Vue.component('psd-component', require('./components/PsdComponent.vue').default);
Vue.component('user-component', require('./components/UsuarioComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        selected_tipo_taller: '',
        selected_taller: '',
        talleres: [],
    },
    mounted() {

        document.getElementById('taller_id').disabled=true;
        this.selected_tipo_taller = this.getOldData('tipo_taller_id');

        if ( this.selected_tipo_taller != '' ) {
            this.getTalleres();
        }

        this.selected_taller = this.getOldData('taller_id');
 
    },
    methods: {
        getTalleres() {

            this.selected_taller = '';
            document.getElementById('taller_id').disabled=true;

            if ( this.selected_tipo_taller != '' ) {

                axios.get('/talleres/listar', { params: { tipo_taller_id: this.selected_tipo_taller } }).then( ( resp ) => {
                    this.talleres = resp.data;
                    document.getElementById('taller_id').disabled=false;
                });
            }
        },
        getOldData(type) {
            return document.getElementById(type).getAttribute('data-old');
        }
    }
});
