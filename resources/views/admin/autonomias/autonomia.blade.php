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
            <img class="img-fluid" width="60" height="60" src="{{ public_path('img/municipalidad.jpg') }}" alt="">
        </div>
        <p class="float-right text-muted">{{ date('d/m/Y H:i:s') }}</p><br>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron my-2 py-3">
                    <h3 class="text-center text-uppercase">
                        Reporte Autonomia Adulto Mayor {{ $autonomia->adultomayor->nombres }} {{ $autonomia->adultomayor->apellidos }}
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
                                Actividades de la vida diaria
                            </th>
                            <th>
                                Respuesta
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>¿Puede levantarse sin ayuda?</td>
                            <td><span>{{ ($autonomia->levantarse_sin_ayuda == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Puede hacer su cama y el aseo de su dormitorio?</td>
                            <td><span>{{ ($autonomia->cama_aseo_dormitorio == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Asearse y bañarse/ducharse?</td>
                            <td><span>{{ ( strcmp($autonomia->asearse_ducharse, 'SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Vestirse?</td>
                            <td><span>{{ ( strcmp($autonomia->vestirse, 'SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Peinarse?</td>
                            <td><span>{{ ( strcmp($autonomia->peinarse, 'SI') === 0 ) ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Lavarse los dientes?</td>
                            <td><span>{{ ($autonomia->lavarse_dientes == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Puede utilizar el WC o retrete?</td>
                            <td><span>{{ ($autonomia->utilizar_wc == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Puede moverse o desplazarse dentro de su casa?</td>
                            <td><span>{{ ($autonomia->desplazamiento_dentro_casa == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Puede comer solo?</td>
                            <td><span>{{ ($autonomia->comer_solo == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Puede tomarse los medicamentos en dosis y horarios sin que le recuerden o le supervisen?</td>
                            <td><span>{{ ($autonomia->tomarse_medicamentos == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Puede salir a la calle?</td>
                            <td><span>{{ ($autonomia->salir_calle == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Puede realizar compras?</td>
                            <td><span>{{ ($autonomia->realizar_compras == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Puede utilizar medios de transporte?</td>
                            <td><span>{{ ($autonomia->uso_medios_transporte == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Puede ir al médico o a sus controles de salud?</td>
                            <td><span>{{ ($autonomia->medico_controles_salud == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                        <tr>
                            <td>¿Puede realizar o colaborar en las tareas del hogar?</td>
                            <td><span>{{ ($autonomia->colaborar_tareas_hogar == 'SI') ? 'Si' : 'No' }}</span></td>
                        </tr>
                    </tbody>
                
                </table>

            </div>
        </div>
    </div>
</body>
</html>