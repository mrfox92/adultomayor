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
    <div class="container-fluid my-2">

        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="text-center">
                        Informe Adultos Mayores
                    </h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-hover table-stripped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Fecha Nacimiento</th>
                            <th>Edad</th>
                            <th>Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adultosmayores as $adultomayor)
                            <tr>
                                <td>{{ $adultomayor->id }}</td>
                                <td>{{ $adultomayor->rut }}</td>
                                <td>{{ $adultomayor->nombres }} {{ $adultomayor->apellidos }}</td>
                                <td>{{ $adultomayor->fecha_nacimiento }}</td>
                                <td>{{ $adultomayor->edad }}</td>
                                <td>{{ $adultomayor->direccion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
    
            </div>
        </div>
    </div>
</body>
</html>