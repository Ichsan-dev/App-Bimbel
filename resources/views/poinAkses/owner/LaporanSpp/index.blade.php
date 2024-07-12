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
            <a href="{{route('laporanspp')}}" class="nav-link active">
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
@section('Content')
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <div class="card">
            <div class="card-header" style="display: flex; justify-content: space-between; align-items:center;">
                {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus-square"></i></button> --}}
                <h3 class="card-title" style="margin-bottom: 0;"><b>Tabel Pembayaran SPP Siswa</b></h3>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr style="text-align: center; background-color:rgb(251, 255, 5);color:rgb(0, 0, 0)">
                      <th>#</th>
                      <th>Nama Siswa</th>
                      <th>Tanggal</th>
                      <th>Bulan</th>
                      <th>Status</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataspp as $item)                          
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{$item->siswa->nama}}</td>
                        <td>{{$item->tanggal_pembayaran}}</td>
                        <td>{{$item->bulan_pembayaran}}</td>
                        <td>{{$item->status_pembayaran}}</td>
                        <td>{{$item->keterangan}}</td>
                    </tr>
                         @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div><!-- /.container-fluid -->
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