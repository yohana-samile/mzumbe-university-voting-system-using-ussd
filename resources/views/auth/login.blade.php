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
        <div class="mx-auto d-flex justify-content-center col-md-10 my-4">
            <div class="col-lg-5 col-md-5">
                <div class="col-md-10">
                    <div class="card bg-secondary shadow border-0 ">
                        <div class="card-header bg-white pb-2">
                            <div class="row justify-content-md-center mu_logo">

                                <div class="text-muted text-center mb-3 navbar-brand">
                                    <img src="{{ asset('mulogo.jpg') }}" style="width: 100px">
                                    <h5 class="text-center">MU-OVS</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-light">
                            <div class="text-center text-muted mb-4">
                                <p>Sign in with credentials</p>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        <strong>{{ session('success') }}</strong>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user fa-2x"></i></span>
                                        </div>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock ni-lock-circle-open fa-2x"></i></span>
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="form-control text-white custom-btn-primary my-4" id="btn"  maxlength="200">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
