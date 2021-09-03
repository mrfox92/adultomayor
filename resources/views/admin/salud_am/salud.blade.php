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
                        Reporte Salud Adulto Mayor {{ $salud->adultomayor->nombres }} {{ $salud->adultomayor->apellidos }}
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
                            <td>¿Cómo describiría su estado de salud en general?</td>
                            <td>
                                
                                @switch($salud->estado_salud)
                                    @case('EXCELENTE')
                                        {{ __("Muy bien") }}
                                        @break
                                    @case('BUENO')
                                        {{ __("Bueno") }}
                                        @break
                                    @case('REGULAR')
                                        {{ __("Regular (más o menos)") }}
                                        @break
                                    @case('MALO')
                                        {{ __("Malo") }}
                                        @break
                                    @case('PESIMO')
                                        {{ __("Muy malo") }}
                                        @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>¿Se encuentra inscrito en un Centro de Salud Primario? (Posta, CESFAM, CECOSF, SAPU o CES)</td>
                            <td>
                                
                                @switch($salud->inscrito_centro_salud)
                                    @case('SI')
                                        {{ __("Si") }}
                                        @break
                                    @case('OTRO')
                                        {{ __("No, porque utiliza otro sistema de salud") }}
                                        @break
                                    @case('NO')
                                        {{ __("No") }}
                                        @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>¿Tiene sus controles de salud al día?</td>
                            <td>
                                @switch($salud->controles_salud)
                                    @case('SI')
                                        {{ __("Si") }}
                                        @break
                                    @case('NO')
                                        {{ __("No") }}
                                        @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>¿Se encuentra participando del Programa de Atención Domiciliaria para Personas con Dependencia Severa?</td>
                            <td>
                                @switch($salud->dependencia_severa)
                                    @case('SI')
                                        {{ __("Si") }}
                                        @break
                                    @case('NO')
                                        {{ __("No") }}
                                        @break
                                    @case('NOSABE')
                                        {{ __("No sabe") }}
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