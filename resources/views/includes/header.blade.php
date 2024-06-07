<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MUOVS') }}</title>
    <link rel="stylesheet" href="{{ asset('css/muovs.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> --}}
    <!-- Scripts -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .bg, .primary, #btn{
            background-color: #f36140;
            color: white;
        }
    </style>
</head>
<body id="page-top">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ ('MU-Online Voting System') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <u class="text-primary"><a class="nav-link" href="{{ url('/') }}">{{ __('Over All Result') }}</a></u>
                        </li>
                        <li class="nav-item" hidden>
                            <u class="text-primary"><a class="nav-link" href="{{ route('login') }}">{{ __('President Result') }}</a></u>
                        </li>
                        <li class="nav-item" hidden>
                            <u class="text-primary"><a class="nav-link" href="{{ route('login') }}">{{ __('Senator Result') }}</a></u>
                        </li>
                        <li class="nav-item" hidden>
                            <u class="text-primary"><a class="nav-link" href="{{ route('login') }}">{{ __('FRs Result') }}</a></u>
                        </li>
                        <li class="nav-item">
                            <u class="text-primary"><a class="nav-link" href="{{ route('voters') }}">{{ __('Voters') }}</a></u>
                        </li>
                        <li class="nav-item">
                            <u class="text-primary"><a class="nav-link" href="{{ route('vote_demo') }}">{{ __('Vote demo') }}</a></u>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link bg btn btn-danger text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
