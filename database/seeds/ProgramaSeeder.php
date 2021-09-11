<?php

use Illuminate\Database\Seeder;

class ProgramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Programa::class, 1)->create([
            'nombre'        =>  'Programa vínculos',
            'descripcion'   =>  'En acompañamiento continuo para las personas mayores de 65 años que ingresan al nuevo Subsistema de Seguridades y Oportunidades,  entregándoles herramientas psicosociales que permitan fortalecer  su identidad, autonomía y sentido de pertenencia. El apoyo psicosocial es individual y grupal;  el acompañamiento es directo y personalizado en el lugar donde habitan las personas mayores. El programa promueve  el proceso de vinculación de las  personas mayores al entorno  y  entrega bonos de protección y prestaciones monetarias.',
            'objetivo'      =>  'Entregar herramientas a personas mayores en situación de vulnerabilidad social para que logren vincularse con la red de apoyo social de su comuna y con sus pares.',
            'requisitos'    =>  'Personas mayores de 65 años o más, que vivan solos o acompañados de una persona de cualquier edad, y que ingresan al nuevo Subsistema de Seguridades y Oportunidades del Ingreso Ético Familiar.No se postula, pues las nóminas con los potenciales beneficiarios del programa emana desde el Ministerio de Desarrollo Social',
        ]);

        factory(App\Programa::class, 1)->create([
            'nombre'        =>  'PROGRAMA MASAMA',
            'descripcion'   =>  'corresponde a una intervención promocional y preventiva en salud, mediante la participación de adultos mayores en actividades grupales de educación para la salud y autocuidado, estimulación funcional y estimulación cognitiva, desarrollada junto al equipo del Centro de Salud, bajo un enfoque en salud integral y comunitaria.',
            'objetivo'      =>  'contribuir a mejorar la calidad de vida de las personas adultos mayores, prolongando su autovalencia, con una atención integral en base al modelo de Salud Familiar y Comunitaria.',
            'requisitos'    =>  'No especificados',
        ]);

        factory(App\Programa::class, 1)->create([
            'nombre'        =>  'PROGRAMA CENTRO DIURNO',
            'descripcion'   =>  'El Programa Centros Diurnos posee dos componentes; Subvención a Centros Diurnos Comunitarios y Centros Diurnos Referenciales, lo cuales se configuran a partir de una batería de talleres a los que la persona mayor accede acorde a su plan de intervención individual. Los talleres se agrupan en tres áreas: Personal, Social y Comunitaria. Existe trabajo con la comunidad en que está inserto el Centro Diurno a fin de integrar a la persona mayor. Ambos componentes cuentan con un Fondo Concursable para los proyectos presentados por municipios o instituciones sin fines de lucro con experiencia en el trabajo con personas mayores. La ejecución se realiza bajo los lineamientos de SENAMA a través de una Guía de Operaciones la que se supervisa periódicamente en terreno, así como la correcta utilización de los recursos. La supervisión da cuenta del cumplimiento de los objetivos planteados a través del cálculo de una batería de indicadores.',
            'objetivo'      =>  'Promover y fortalecer la autonomía e independencia en las personas mayores, que permita contribuir a retrasar su pérdida de funcionalidad, manteniéndolos en su entorno familiar y social, a través de una asistencia periódica a un Centro Diurno donde se entregarán temporalmente servicios sociosanitarios y de apoyo.',
            'requisitos'    =>  '1.- Edad del adulto mayor. Ingresan prioritariamente aquellos adultos mayores de mayor edad.

            2.- Situación socioeconómica según calificación socioeconómica del registro social de hogares.  Si los adultos mayores postulantes cuentan con la misma edad, tiene prioridad quien se encuentre en un tramo de calificación socioeconómica inferior.
            
            3.- Aquellos que residan lo más próximo a la ubicación del Centro Diurno.',
        ]);

        factory(App\Programa::class, 1)->create([
            'nombre'        =>  'PROGRAMA INTERVENCIÓN DOMICILIARIA RURAL',
            'descripcion'   =>  'No especificada',
            'objetivo'      =>  'No especificados',
            'requisitos'    =>  'No especificados',
        ]);
    }
}
