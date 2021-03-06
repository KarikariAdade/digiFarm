<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ auth()->user()->name}} | Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/account/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/account/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/account/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/account/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/main/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/account/bundles/bootstrap-social/bootstrap-social.css') }}">

    @stack('custom-css')
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            <div class="form-inline mr-auto">

            </div>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown dropdown-list-toggle">
{{--                    <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i--}}
{{--                            data-feather="mail"></i>--}}
{{--                        <span class="badge headerBadge1">--}}
{{--                        6 </span>--}}
{{--                    </a>--}}
                    <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                        <div class="dropdown-header">
                            Messages
                            <div class="float-right">
                                <a href="#">Mark All As Read</a>
                            </div>
                        </div>
                        <div class="dropdown-list-content dropdown-list-message">
                            <a href="#" class="dropdown-item">
                                <span class="dropdown-item-avatar text-white">
                                    <img alt="image" src="" class="rounded-circle">
                                </span>
                                <span class="dropdown-item-desc"> <span class="message-user">Sarah
                                Smith</span>
                                <span class="time messege-text">Client Requirements</span>
                                <span class="time">2 Days Ago</span>
                            </span>
                            </a>
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="dropdown dropdown-list-toggle">
{{--                    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i--}}
{{--                            data-feather="bell" class="bell"></i>--}}
{{--                    </a>--}}
                    <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                        <div class="dropdown-header">
                            Notifications
                            <div class="float-right">
                                <a href="#">Mark All As Read</a>
                            </div>
                        </div>
                        <div class="dropdown-list-content dropdown-list-icons">
                            <a href="#" class="dropdown-item">
                <span class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                                <span class="dropdown-item-desc"> Low disk space. Let's
                    clean it!
                    <span class="time">17 Hours Ago</span>
                </span>
                            </a>
                            <a href="#" class="dropdown-item">
                <span class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                </span>
                                <span class="dropdown-item-desc">
                   Welcome  <span class="time">Yesterday</span>
               </span>
                            </a>
                        </div>
                        <div class="dropdown-footer text-center">
                            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset(auth()->user()->avatar) }}" class="user-img-radious-style">
                        <span class="d-sm-none d-lg-inline-block"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">
                        <div class="dropdown-title">Hello {{ auth()->user()->name }}</div>
                        <a href="{{ route('farmer.dashboard.profile.index') }}" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <a href="{{ route('farmer.dashboard.proposal.index') }}" class="dropdown-item has-icon">
                            <i class="fas fa-briefcase"></i>
                            Proposals
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i
                                class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    @if(auth()->user()->name)
                    <a href="{{ route('business.dashboard') }}">
                        <img alt="{{ auth()->user()->name.' logo' }}" src="{{ asset(auth()->user()->avatar) }}" class="header-logo user-img-radious-style"/>
                    </a>
                    @endif
                    <p class="sidebar-brand-name">{{ auth()->user()->name }} <br>
                        <small>{{ auth()->user()->name }}</small>
                    </p>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    <li class="active">
                        <a href="{{ route('home') }}" class="nav-link"><i
                                data-feather="monitor"></i><span>Dashboard</span></a>
                    </li>
                    <li class="">
                        <a href="{{ route('farmer.dashboard.profile.index') }}" class="nav-link"><i
                                data-feather="user"></i><span>Profile</span></a>
                    </li>
                    <li class="">
                        <a href="{{ route('farmer.dashboard.farm.index') }}" class="nav-link">
                            <i data-feather="truck"></i><span>Farms</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('farmer.dashboard.client.index') }}" class="nav-link"><i
                                data-feather="user"></i><span>Clients</span></a>
                    </li>
                    <li class="">
                        <a href="{{ route('farmer.dashboard.proposal.index') }}" class="nav-link"><i
                                data-feather="user"></i><span>Proposals</span></a>
                    </li>
                    <li class="">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i data-feather="power"></i>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </aside>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                <a href="">&copy digiFarm {{ date('Y') }}</a>
            </div>
            <div class="footer-right">
            </div>
        </footer>
    </div>
</div>
<script src="{{ asset('assets/account/js/app.min.js') }}"></script>
<script src="{{ asset('assets/account/js/scripts.js') }}"></script>
<script src="{{ asset('assets/account/js/custom.js') }}"></script>
<script src="{{ asset('assets/main/js/select2.min.js') }}"></script>
<script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
@include('sweetalert::alert')
@stack('custom-js')
</body>
</html>
