<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ auth()->user()->name}} | Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/account/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/account/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/account/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/account/css/custom.css') }}">
    @stack('custom-css')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                            <i data-feather="maximize"></i>
                        </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                        <span class="badge headerBadge1">
                        6 </span> </a>
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
                                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
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
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
             class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
         </a>
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
        <img alt="image" src="assets/img/user.png" class="user-img-radious-style">
        <span class="d-sm-none d-lg-inline-block"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right pullDown">
        <div class="dropdown-title">Hello Sarah Smith</div>
        <a href="profile.html" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
        </a>
        <a href="timeline.html" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i>
            Activities
        </a>
        <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
            Settings
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('business.auth.logout') }}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
            Logout
        </a>
    </div>
</li>
</ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('business.dashboard') }}"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Otika</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="active">
                <a href="{{ route('business.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="">
                <a href="{{ route('business.dashboard.profile.index') }}" class="nav-link"><i data-feather="user"></i><span>Profile</span></a>
            </li>
            <li class="">
                <a href="{{ route('business.dashboard.profile.index') }}" class="nav-link"><i data-feather="user"></i><span>Requests</span></a>
            </li>
            <li class="">
                <a href="{{ route('business.dashboard.profile.index') }}" class="nav-link"><i data-feather="user"></i><span>Clients</span></a>
            </li>
            <li class="">
                <a href="{{ route('business.dashboard.profile.index') }}" class="nav-link"><i data-feather="user"></i><span>Proposals</span></a>
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
@stack('custom-js')
</body>
</html>