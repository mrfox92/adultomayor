<?php

use Illuminate\Database\Seeder;

class BeneficioEstatalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Aporte Previsional Solidario de Invalidez (APSI)',
            'descripcion'   =>  'Destinado para personas de 18 a 65 años, consiste en un aporte mensual de $467.894 para quienes reciben una pensión previsional de invalidez (que sea inferior a $141.374) por su discapacidad física o mental. Entre los requisitos se encuentra el pertenecer al 60% más vulnerable de la población, según el Registro Social de Hogares.'
        ]);

        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Aporte Previsional Solidario de Vejez (APSV)',
            'descripcion'   =>  'Aquellos beneficiarios del APSI que cumplan 65 años o hayan superado esa edad pueden acceder a este aporte mensual que incrementa las pensiones percibidas en el sistema contributivo, siempre y cuando cumplan con las condiciones. Dependiendo de la edad, el dinero a entregar va desde los $467.894 hasta $501.316.'
        ]);

        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Pensión Básica Solidaria de Invalidez (PBSI)',
            'descripcion'   =>  'Orientado para personas discapacitadas de 18 a 65 años, pero entrega $158.339 a las que no tienen derecho a pensión en algún régimen previsional. El monto se reajusta el 1 de julio de cada año y una de las condiciones para recibirlo es pertenecer al 60% más vulnerable de la población.'
        ]);

        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Pensión Básica Solidaria de Vejez (PBSV)',
            'descripcion'   =>  'Los beneficiarios de la PBSI podrán acceder a esta ayuda social cuando hayan cumplido o superado los 65 años, si es que cumplen las condiciones. La cantidad del monto depende de la edad del solicitante y va desde los $158.339 hasta los $169.649.'
        ]);

        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Subsidio para menores de edad con discapacidad mental',
            'descripcion'   =>  'No solo entrega un aporte monetario mensual de $73.282 para personas menores de 18 años, sino que también les garantiza la atención médica gratuita en consultorios y hospitales del Servicio Nacional de Salud. Para obtener el beneficio se exige que el menor de edad no posea previsión social ni debe estar recibiendo ningún otro tipo de subsidio, entre otros requisitos.'
        ]);

        factory(App\BeneficioEstatal::class, 1)->create([
            'nombre'        =>  'Pensión de Invalidez del sistema de pensiones (AFP)',
            'descripcion'   =>  'Para afiliados de Administradoras de Fondos de Pensiones (AFP) menores a 65 años que sean total o parcialmente discapacitados de manera física o mental, se les entrega un monto por un periodo de tres años. Eso sí, tal invalidez no debe haber sido provocada por accidente de trabajo o por una denominada "enfermedad profesional".'
        ]);
    }
}
