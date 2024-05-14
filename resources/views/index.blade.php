<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ('MUOVS') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .btn, .bg{
            background-color: #fd876d;
        }
        #btn{
            background-color: #fd876d;
        }
    </style>
</head>
<body>
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
                        <li class="nav-item">
                            <u class="text-primary"><a class="nav-link" href="{{ route('login') }}">{{ __('President Result') }}</a></u>
                        </li>
                        <li class="nav-item">
                            <u class="text-primary"><a class="nav-link" href="{{ route('login') }}">{{ __('Senator Result') }}</a></u>
                        </li>
                        <li class="nav-item">
                            <u class="text-primary"><a class="nav-link" href="{{ route('login') }}">{{ __('FRs Result') }}</a></u>
                        </li>
                        <li class="nav-item">
                            <u class="text-primary"><a class="nav-link" href="{{ route('login') }}">{{ __('Voters') }}</a></u>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link btn btn-danger text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
