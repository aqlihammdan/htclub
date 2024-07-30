@section('dashboardNav')
<ul class="sidebar-menu">
    <li class="menu-header">User</li>
    <li class=@yield('homeActive')><a class="nav-link" href="{{ route('home')}}"><i class="fas fa-home"></i> <span>Beranda</span></a></li>
    <li class=@yield('workshopActive')><a class="nav-link" href="{{ route('workshop')}}"><i class="far fa-square"></i> <span>Bengkel Rekomendasi</span></a></li>
    <li class=@yield('aboutActive')><a class="nav-link" href="{{ route('about')}}"><i class="fas fa-user"></i> <span>Tentang Kami</span></a></li>
  </ul>

@endsection