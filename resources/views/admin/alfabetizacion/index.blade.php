@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <a href="{{ route('alfabetizacion.create') }}" class="btn btn-primary"><i class="bx bx-save"></i> Agregar nivel alfabetiazación</a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <alfabetizacion-component></alfabetizacion-component>
        </div>
    </div>
</div>
@endsection