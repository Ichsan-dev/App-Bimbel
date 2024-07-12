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
            <a href="{{route('CekKemajuanSiswa')}}" class="nav-link active">
             <i class="fas fa-users-cog nav-icon"></i>
              <p>
                Kemajuan Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('CekSpp')}}" class="nav-link">
            <i class="fas fa-wallet nav-icon"></i>
              <p>
                Pembayaran SPP
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ResetPassword')}}" class="nav-link">
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
        <a href="{{route('orangtua')}}" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('logout') }}" class="nav-link" data-toggle="modal" data-target="#modal-logout">Logout</a>
      </li>
    </ul>
@endsection
@section('Content')
  <!-- Main content -->
  <div class="content">
      <div class="container-fluid">
          <div class="card">
              <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                  <h3 class="card-title" style="margin-bottom: 0;"><b>Tabel Kemajuan Siswa</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table class="table table-bordered">
                      <thead>
                          <tr style="text-align: center; background-color: rgb(195, 196, 149); color: rgb(0, 0, 0);">
                              <th>#</th>
                              <th>Tanggal</th>
                              <th>Nama Siswa</th>
                              <th>Kursus</th>
                              <th>Nilai</th>
                              <th>Keterangan</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($CekKemajuanSiswa as $item)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->tanggal }}</td>
                              <td>{{ $item->siswa->nama }}</td>
                              <td>{{ $item->kursus }}</td>
                              <td>{{ $item->nilai }}</td>
                              <td>{{ $item->keterangan }}</td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
          </div>
      </div>
      <!-- /.container-fluid -->
      @if ($message = Session::get('success'))
      <script>
          Swal.fire({
              icon: "success",
              text: "{{ $message }}",
          });
      </script>
      @endif
  </div>
  <!-- /.content -->
@endsection