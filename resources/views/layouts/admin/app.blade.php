<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Layout &rsaquo; HTClub &mdash; Admin</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    @stack('css')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
          <div class="navbar-bg"></div>
          <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto" action="/admin/workshop">
              <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
              </ul>
              <div class="search-element">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250" name="keyword">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                <div class="search-backdrop"></div>
              </div>
            </form>
            <ul class="navbar-nav navbar-right">
                @guest
                <li class="nav-item"><a href="/login" class="nav-link">Masuk</a></li>
                <li class="nav-item"><a href="/register" class="nav-link">Daftar</a></li>
                @endguest

                @auth
                <li class="dropdown"><a href="#" data-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ Auth::user()->photo_url ?? '../assets/img/avatar/avatar-1.png' }}"
                            class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        {{-- <div class="dropdown-title">Logged in 5 min ago</div>
                        <a href="features-profile.html" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                        </a>
                        <a href="features-activities.html" class="dropdown-item has-icon">
                            <i class="fas fa-bolt"></i> Activities
                        </a>
                        <a href="features-settings.html" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div> --}}
                        <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endauth
            </ul>
          </nav>
          <div class="main-sidebar">
            <aside id="sidebar-wrapper">
              <div class="sidebar-brand">
                <a href="index.html">HTClub</a>
              </div>
              <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">HTC</a>
              </div>
              @yield('admin-dashboardNav')
            </aside>
          </div>
    
          <!-- Main Content -->
          @yield('admin-content')
          <footer class="main-footer">
            <div class="footer-left">
              Copyright &copy; 2023 <div class="bullet"></div> By <a href="https://github.com/aqlihammdan">Aqli Hamdan</a>
            </div>
          </footer>
        </div>
      </div>

    <!-- General JS Scripts -->
    <script src="{{ url('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ url('assets/modules/popper.js') }}"></script>
    <script src="{{ url('assets/modules/tooltip.js') }}"></script>
    <script src="{{ url('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('assets/modules/moment.min.js') }}"></script>
    <script src="{{ url('assets/js/stisla.js') }}"></script>

    <script src="{{ url('assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ url('assets/js/page/modules-sweetalert.js') }}"></script>

    <!-- JS Libraies -->
    @stack('admin-js-lib')

    <!-- Page Specific JS File -->
    @stack('admin-js')

    <!-- Template JS File -->
    <script src="{{ url('assets/js/scripts.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>
</body>

</html>
