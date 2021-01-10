<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- icon --}}
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <!-- Vendors Min CSS -->
    <link rel="stylesheet" href="{{ asset('css/vendors.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- default styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">

        {{-- sidebar --}}
        @auth
            {{-- @include('partials.'.\App\User::navigation().'.sidebar'); --}}
            @include('partials.admin.sidebar')
        @else
            @include('partials.admin.sidebar')
        @endauth

        {{-- Main content --}}

        <div class="main-content d-flex flex-column">
            {{-- top-navbar --}}
            @auth
                @include('partials.admin.navigation')
            @else
                @include('partials.admin.navigation')
            @endauth

            @if ( session('message') )
                <div class="row justify-content-center">
                    <div class="col-md-12 my-2">
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
            @include('partials.footer')
        </div>
        
    </div>

    {{-- scripts --}}
    @include('partials.scripts')
</body>
</html>
