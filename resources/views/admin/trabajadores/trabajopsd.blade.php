<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha trabajador {{ $trabajador->psd->nombres }} {{ $trabajador->psd->apellidos }}</title>
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
                    <h4 class="text-center text-uppercase">
                        Ficha trabajador {{ $trabajador->psd->nombres }} {{ $trabajador->psd->apellidos }}
                    </h4>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Datos
                            </th>
                            <th>
                                Información
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nombre lugar de trabajo</td>
                            <td><span>{{ $trabajador->nombre }}</span></td>
                        </tr>
                        <tr>
                            <td>Dirección lugar de trabajo</td>
                            <td><span>{{ ( $trabajador->direccion ) ? $trabajador->direccion : 'No especificada' }}</span></td>
                        </tr>
                        <tr>
                            <td>Telefono lugar de trabajo</td>
                            <td><span>{{ ( $trabajador->telefono ) ? $trabajador->telefono : 'No especificado' }}</span></td>
                        </tr>
                        <tr>
                            <td>Correo electrónico lugar de trabajo</td>
                            <td><span>{{ ( $trabajador->email ) ? $trabajador->email : 'No especificado' }}</span></td>
                        </tr>

                        <tr>
                            <td>Cargo lugar de trabajo</td>
                            <td><span>{{ ( $trabajador->cargo ) ? $trabajador->cargo : 'No especificado' }}</span></td>
                        </tr>

                        <tr>
                            <td>Encargado lugar de trabajo</td>
                            <td><span>{{ ( $trabajador->encargado ) ? $trabajador->encargado : 'No especificado' }}</span></td>
                        </tr>

                        <tr>
                            <td>Fecha última actualización datos</td>
                            <td><span>{{ \Carbon\Carbon::parse($trabajador->updated_at)->format('d/m/Y') }}</span></td>
                        </tr>

                    </tbody>
                
                </table>

            </div>
        </div>
    </div>
</body>
</html>