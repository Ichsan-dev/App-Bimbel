@extends('Layout-Dashboard.main')
@section('Content')
   <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$totalSiswa}}</h3>

                <p>Siswa</p>
              </div>
              <div class="icon">
               <i class="fas fa-users"></i>
              </div>
              <a href="{{route('laporansiswa')}}" class="small-box-footer">Informasi lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$totalKaryawan}}
                  {{-- <sup style="font-size: 20px">%</sup> --}}
                </h3>

                <p>Karyawan</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-friends"></i>
              </div>
              <a href="{{route('laporankaryawan')}}" class="small-box-footer">Informasi Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$totalSiswaAktif}}</h3>

                <p>Siswa Aktif</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{route('siswaAktif')}}" class="small-box-footer">Informasi Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$totalSiswaNonAktif}}</h3>

                <p>Siswa Nonaktif</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-times"></i>
              </div>
              <a href="{{route('siswaNonAktif')}}" class="small-box-footer">Informasi Lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
   </div>
@endsection
@section('NavAccount')

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('Halaman-depan/assets/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div clInformasi Lanjut">
          <a href="#" class="d-block">{{ Auth::user()->name}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('laporansiswa')}}" class="nav-link">
             <i class="fas fa-users nav-icon"></i>
              <p>
                Laporan Data Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('laporankaryawan')}}" class="nav-link">
            <i class="fas fa-user-friends nav-icon"></i>
              <p>
                Laporan Data Karyawan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('laporanspp')}}" class="nav-link">
            <i class="fas fa-wallet nav-icon"></i>
              <p>
               Laporan Data SPP
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('laporangaji')}}" class="nav-link">
            <i class="fas fa-coins nav-icon"></i>
              <p>
               Laporan Data Gaji
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
        <a href="{{route('dashboardowner')}}" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('logout') }}" class="nav-link" data-toggle="modal" data-target="#modal-logout">Logout</a>
      </li>
    </ul>
@endsection