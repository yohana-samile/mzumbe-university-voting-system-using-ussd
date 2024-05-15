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
        .bg, .primary{
            background-color: #f36140;
            color: white;
        }
    </style>
</head>
    @php
        use App\Models\Position;
        $postions = Position::all();
    @endphp
    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #002E3B">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
                    <div class="sidebar-brand-icon">
                        <h4><img src="{{ asset('/img/graduation-cap-svgrepo-com (1).svg') }}" alt="logo" style="width: 30px;"></h4>
                    </div>
                    <div class="sidebar-brand-text mx-3">
                        <h4>MU-OVS</h4>
                    </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('home') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>{{__('Dashboard')}}</span></a>
                </li>

                <div class="mb-2"></div>
                <!-- Position -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('position') }}">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>{{__('Position')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('voting_window') }}">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>{{__('Voting Window')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseResult"
                        aria-expanded="true" aria-controls="collapseResult">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>{{__('Voting Result')}}</span>
                    </a>
                    <div id="collapseResult" class="collapse" aria-labelledby="headingResult"
                        data-parent="#accordionSidebar">
                        <div class="collapse-inner rounded" style="background-color: #e9eff1;">
                            @foreach ($postions as $postion)
                                <a class="collapse-item text-dark" href="{{ url('result/voting_result_for', ['id' => $postion->id ]) }}">{{ $postion->name }}</a>
                            @endforeach
                                <a class="collapse-item text-dark" href="{{ url('result') }}">{{__('over all result')}}</a>
                        </div>
                    </div>
                </li>

                <div class="mb-4"></div>
                <!-- Heading -->
                <div class="sidebar-heading">
                    {{__('OTHER APPS')}}
                </div>

                <!-- USERS -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                        aria-expanded="true" aria-controls="collapseUsers">
                        <i class="fas fa-fw fa-user"></i>
                        <span>{{__('User Records')}}</span>
                    </a>
                    <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="collapse-inner rounded" style="background-color: #e9eff1;">
                            <a class="collapse-item text-dark" href="{{ url('voter') }}">{{__('Voter')}}</a>
                            <a class="collapse-item text-dark" href="{{ url('candidate') }}">{{__('Candidate')}}</a>
                            <a class="collapse-item text-dark" href="{{ url('election_manager') }}">{{__('Election Manager')}}</a>
                        </div>
                    </div>
                </li>
                <!-- Nav Item - Mu Units -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUnits"
                        aria-expanded="true" aria-controls="collapseUnits">
                        <i class="fas fa-fw fa-book-open"></i>
                        <span>{{__('MU Units')}}</span>
                    </a>
                    <div id="collapseUnits" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="collapse-inner rounded" style="background-color: #e9eff1;">
                            <a class="collapse-item text-dark" href="{{ url('unit/') }}">{{__('Unit')}}</a>
                            <a class="collapse-item text-dark" href="{{ url('programme/') }}">{{__('Programmes')}}</a>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn rounded-circle mr-3" id="sidebarToggle">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="col-md-4" hidden>
                                <button class="btn rounded-circle mr-3">
                                    <i class="fa fa-th-large" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="javaScript:void" id="alertsDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">0</span>
                                </a>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle btn btn-sm btn-light" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg')}}" alt="profile">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <div class="">
                                        <img src="{{ asset('img/undraw_profile.svg')}}" alt="Dashboard" class="dashboard-img">
                                    </div>
                                    <a class="dropdown-item" href="{% url 'profile' %}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{__('Profile')}}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->

                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
@include('includes.footer')
