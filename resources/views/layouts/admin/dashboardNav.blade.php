@section('admin-dashboardNav')
<ul class="sidebar-menu">
    <li class="menu-header">Admin</li>
    <li class=@yield('homeActive')><a class="nav-link" href="{{ route('admin.home') }}"><i class="fas fa-home"></i> <span>Beranda</span></a></li>
    <li class=@yield('workshopActive')><a class="nav-link" href="{{ route('admin.workshop') }}"><i class="far fa-square"></i> <span>Bengkel</span></a></li>
    <li class=@yield('usersActive')><a class="nav-link" href="{{ route('admin.user') }}"><i class="fas fa-user"></i> <span>Pengguna</span></a></li>
  </ul>

@endsection