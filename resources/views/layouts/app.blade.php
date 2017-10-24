<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ASEMKA">
    <meta name="robots" content="all,follow">
    <title>{{ config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">

    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
</head>
<body>
    <div class="page home-page">
        @include('components.header')
        <div class="page-content d-flex align-items-stretch">
            @if (Auth::user()->isAdmin())
            @include('components.sidebar-admin')
            @else
            @include('components.sidebar-tenant')
            @endif

            <div class="content-inner">
                @include('components.page-header', ['page_header' => !isset($page_header) ? $page_header = null : $page_header ])
                <div class="container container-body">
                    @include('components.alert')
                    @yield('content')                    
                </div>
                {{-- @include('components.footer') --}}
            </div>
        </div>
    </div>

    
    <!-- Scripts -->
    <script src="{{ asset('vendor/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('vendor/js/Charts.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
</body>
</html>

