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
                        Reporte Vivienda Adulto Mayor {{ $vivienda->adultomayor->nombres }} {{ $vivienda->adultomayor->apellidos }}
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
                            <td>Tipo de vivienda</td>
                            <td>{{ $vivienda->tipoVivienda->nombre }}</td>
                        </tr>
                        <tr>
                            <td>¿Bajo qué situación ocupa su vivienda?</td>
                            <td>
                                @switch($vivienda->ocupacion_vivienda)
                                    @case('PAGADA')
                                        {{ __("Propia Pagada") }}
                                        @break
                                    @case('PAGANDOSE')
                                        {{ __("Propia Pagandose") }}
                                        @break
                                    @case('ARRENDADA')
                                        {{ __("Arrendada") }}
                                        @break
                                    @case('CEDIDA')
                                        {{ __("Cedida / Uso gratuito") }}
                                        @break
                                    @case('USUFRUCTO')
                                        {{ __("Usufructo (sólo uso y goce)") }}
                                        @break
                                    @case('IRREGULAR')
                                        {{ __("Ocupación irregular") }}
                                        @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>¿Bajo qué situación ocupa el sitio en el que se encuentra la vivienda?</td>
                            <td>
                                
                                @switch($vivienda->ocupacion_sitio)
                                    @case('PAGADO')
                                        {{ __("Propio Pagado") }}
                                        @break
                                    @case('PAGANDOSE')
                                        {{ __("Propio Pagandose") }}
                                        @break
                                    @case('ARRENDADO')
                                        {{ __("Arrendado") }}
                                        @break
                                    @case('CEDIDO')
                                        {{ __("Cedido / Uso gratuito") }}
                                        @break
                                    @case('USUFRUCTO')
                                        {{ __("Usufructo (sólo uso y goce)") }}
                                        @break
                                    @case('OCUPACION')
                                        {{ __("Ocupación irregular") }}
                                        @break
                                    @case('POSEEDOR')
                                        {{ __("Poseedor irregular") }}
                                        @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>¿Comparte el terreno con otra familia o con otra vivienda?</td>
                            <td>
                                @switch($vivienda->comparte_terreno)
                                    @case('VIVIENDA')
                                        {{ __("Con otra familia en la misma vivienda") }}
                                        @break
                                    @case('TERRENO')
                                        {{ __("Con otra vivienda en el mismo terreno") }}
                                        @break
                                    @case('AMBAS')
                                        {{ __("Con otra familia en la misma vivienda y con otra familia en el mismo terreno (3 o más familias)") }}
                                        @break
                                    @case('NO')
                                        {{ __("No comparte ni vivienda ni terreno") }}
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