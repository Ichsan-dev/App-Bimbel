<style>
  .button-styled {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.button-styled:hover {
    background-color: #0056b3;
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2), 0 2px 5px rgba(0, 0, 0, 0.12);
    transform: translateY(-4px);
}

.button-styled:active {
    transform: translateY(3px);
}

</style>
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
            <a href="{{route('kuis')}}" class="nav-link active">
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
@section('Content')
  <!-- Main content -->
  <div class="content">
      <div class="container-fluid" style="display: flex; justify-content:center; align-items: center; height: 80vh;">
          <button type="button" class="button-styled"><a href="{{Route('Quiz')}}" style="color:aliceblue;">Mulai Kuis</a></button>
      </div><!-- /.container-fluid -->
  </div>

  <!-- /.content -->
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

