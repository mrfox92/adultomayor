@extends('layouts.app')

@section('content')
<div class="container">
    
    {{-- <img src="{{ asset('img/background/home-am.jpg') }}" class="img-fluid" alt="Responsive image"> --}}
    <div class="jumbotron jumbotron-home mt-3 font-weight-bold animate__animated animate__fadeIn">
        @if ( strcmp(auth()->user()->sexo, 'F')  === 0 )

            <span class="text-light text-uppercase">Bienvenida Usuaria</span>
        @else
            
            <span class="text-light text-uppercase">Bienvenido Usuario</span>
        @endif
        
        <h3 class="text-bold text-uppercase text-light">{{ auth()->user()->name }}</h3>
    </div>

    <div class="row mt-5 justify-content-center">
        
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header text-uppercase">{{ __('Administración') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
