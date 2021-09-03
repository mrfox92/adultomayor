<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe Adultos Mayores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid mb-2">
        <div class="text-center">
            <img class="img-fluid" width="60" height="60" src="{{ public_path('img\municipalidad.jpg') }}" alt="">
        </div>
        <p class="float-right text-muted">{{ date('d/m/Y H:i:s') }}</p><br>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron my-2 py-3">
                    <h3 class="text-center text-uppercase">
                        Reporte Habitabilidad Vivienda Adulto Mayor {{ $habitabilidad->adultomayor->nombres }} {{ $habitabilidad->adultomayor->apellidos }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Elementos evaluados
                            </th>
                            <th>
                                Resultados
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Principal fuente de calefacción</td>
                            <td>
                                @switch($habitabilidad->fuente_calefaccion)
                                    @case('GAS')
                                        {{ __("Gas") }}
                                        @break
                                    @case('PARAFINA')
                                        {{ __("Parafina") }}
                                        @break
                                    @case('ELECTRICIDAD')
                                        {{ __("Electricidad") }}
                                        @break
                                    @case('LENA')
                                        {{ __("Leña") }}
                                        @break
                                    @case('CARBON')
                                        {{ __("Carbón") }}
                                        @break
                                    @case('SOLAR')
                                        {{ __("Energía Solar") }}
                                        @break
                                    @case('OTRA')
                                        {{ __("Otra fuente") }}
                                        @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>Estado del piso de la vivienda</td>
                            <td>
                                @switch($habitabilidad->estado_piso)
                                    @case('BUENO')
                                        {{ __("Bueno") }}
                                        @break
                                    @case('ACEPTABLE')
                                        {{ __("Aceptable") }}
                                        @break
                                    @case('MALO')
                                        {{ __("Malo") }}
                                        @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>Estado de los muros de la vivienda</td>
                            <td>
                                @switch($habitabilidad->estado_muros)
                                    @case('BUENO')
                                        {{ __("Bueno") }}
                                        @break
                                    @case('ACEPTABLE')
                                        {{ __("Aceptable") }}
                                        @break
                                    @case('MALO')
                                        {{ __("Malo") }}
                                        @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>Estado de los muros de la vivienda</td>
                            <td>
                                @switch($habitabilidad->estado_techos)
                                    @case('BUENO')
                                        {{ __("Bueno") }}
                                        @break
                                    @case('ACEPTABLE')
                                        {{ __("Aceptable") }}
                                        @break
                                    @case('MALO')
                                        {{ __("Malo") }}
                                        @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>N° de habitaciones que se usan exclusivamente como dormitorio</td>
                            <td>{{ $habitabilidad->num_dormitorios }} Habitacion(es)</td>
                        </tr>
                        <tr>
                            <td>¿Cuenta con camas para cada uno/a de sus integrantes?</td>
                            <td>
                                {{ ( strcmp($habitabilidad->camas_cada_integrante, 'SI') === 0 ) ? 'Si' : 'No' }}
                            </td>
                        </tr>
                        <tr>
                            <td>¿El acceso y desplazamiento por la vivienda es seguro para usted (y su acompañante en caso de que corresponda)?</td>
                            <td>
                                @switch($habitabilidad->seguridad_vivienda)
                                    @case('SI')
                                        {{ __("Si") }}
                                        @break
                                    @case('MEDIANAMENTE')
                                        {{ __("Medianamente") }}
                                        @break
                                    @case('NO')
                                        {{ __("No") }}
                                        @break
                                @endswitch
                            </td>
                        </tr>
                    </tbody>
                
                </table>

            </div>
        </div>
    </div>
</body>
</html>