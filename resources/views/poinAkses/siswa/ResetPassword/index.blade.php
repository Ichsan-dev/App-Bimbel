@extends('Layout-Dashboard.main')
@section('NavAccount')

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('Halaman-depan/assets/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name}}</a>
        </div>
      </div>

            <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('cekjadwal')}}" class="nav-link">
             <i class="fas fa-calendar-alt nav-icon"></i>
              <p>
                Jadwal Les
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('cekabsen')}}" class="nav-link">
             <i class="far fa-address-book nav-icon"></i>
              <p>
                Absensi Les
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('kuis')}}" class="nav-link">
             <i class="fas fa-puzzle-piece nav-icon"></i>
              <p>
                Kuis
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('resetpassword')}}" class="nav-link">
            <i class="fas fa-unlock-alt nav-icon"></i>
              <p>
                Reset Password
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@endsection
@section('navlink')
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('siswa')}}" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('logout') }}" class="nav-link" data-toggle="modal" data-target="#modal-logout">Logout</a>
      </li>
    </ul>
@endsection
@section('Content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card" style="margin: 5rem">
                  <div class="card-header">Reset Kata Sandi</div>

                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if (session('error'))
                          <div class="alert alert-danger" role="alert">
                              {{ session('error') }}
                          </div>
                      @endif

                      <form method="POST" action="{{ route('updatepassword') }}">
                          @csrf

                          <div class="form-group">
                              <label for="current_password">Kata Sandi Saat Ini</label>
                              <input id="current_password" type="password" class="form-control" name="current_password" value="" required>
                          </div>

                          <div class="form-group">
                              <label for="new_password">Kata Sandi Baru</label>
                              <input id="new_password" type="password" class="form-control" name="new_password" required>
                          </div>

                          <div class="form-group">
                              <label for="new_password_confirmation">Konfirmasi Kata Sandi Baru</label>
                              <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                          </div>

                          <div class="form-group mb-0">
                              <button type="submit" class="btn btn-primary">
                                  Reset Kata Sandi
                              </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection