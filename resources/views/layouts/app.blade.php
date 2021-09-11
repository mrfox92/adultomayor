<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- icon --}}
    <link rel="icon" type="image/png" href="{{ asset('img/municipalidad.jpg') }}">
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!-- Vendors Min CSS -->
    <link rel="stylesheet" href="{{ asset('css/vendors.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    {{-- Datatacles CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css"> --}}
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Animate CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- default styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">

        {{-- sidebar --}}
        @auth
            {{-- @include('partials.'.\App\User::navigation().'.sidebar'); --}}
            {{-- @include('partials.sidebars.'.\App\User::navigation()) --}}
            @include('partials.sidebars.'.\App\User::navigation())
        @else
            {{-- @include('partials.admin.sidebar') --}}
        @endauth

        {{-- Main content --}}
        {{-- <div class="main-content d-flex flex-column"> --}}
        {{-- top-navbar --}}
            @auth
                <div class="main-content d-flex flex-column">
                @include('partials.navigations.'.\App\User::navigation())
            @else
                <div class="">
            @endauth

            @if ( session('message') )
                <div class="row justify-content-center">
                    <div class="col-md-10 my-2">
                        <div class="alert-{{ session('message')['class'] }}" role="alert">
                            <h4 class="alert-heading">
                                {{ __("Mensaje informativo") }}
                            </h4>
                            <p>{{ session('message')['message'] }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')

            {{-- footer --}}

            @auth
                @include('partials.footer')
            @else
                {{-- @include('partials.footer') --}}
            @endauth
        </div>
        
    </div>

    {{-- scripts --}}
    @include('partials.scripts')
    
</body>
</html>
