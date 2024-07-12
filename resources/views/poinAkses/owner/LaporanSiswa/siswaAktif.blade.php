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
            <a href="{{route('laporansiswa')}}" class="nav-link active">
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
@section('Content')
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="card-header" style="display: flex; justify-content:space-between; align-items:center;">
            <h3 class="card-title" style="margin-bottom: 0;"><b>Tabel Siswa Aktif</b></h3>
        </div>
              <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                  <thead>
                    <tr style="text-align: center; background-color:rgb(165, 204, 57);">
                      <th>#</th>
                      <th>Nama</th>
                      <th>Kursus</th>
                      <th>status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($siswaaktif as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->kursus->nama_kursus}}</td>
                        <td>{{$item->status}}</td>
                        <td style="Display: flex; justify-content: space-between; align-items:center; border: none;">
                                <a data-toggle="modal" data-target="#modal-detail{{ $item->id }}" class="btn-sm btn-success"><i class="fas fa-eye"></i></i></a>
                        </td>
                      </tr>
                        <!-- Modal -->
                            <div class="modal fade" id="modal-detail{{ $item->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Data Siswa</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                      <img class="profile-user-img img-fluid img-circle"
                                          src="{{ asset('storage/fotosiswa/'.$item->foto)}}"
                                          alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center">{{$item->nama}}</h3>

                                    <p class="text-muted text-center">{{$item->kursus->nama_kursus}}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                      <li class="list-group-item">
                                        <b>Tanggal Lahir</b> <a class="float-right">{{$item->tgl_lahir}}</a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Jenis Kelamin</b> <a class="float-right">{{$item->jk}}</a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{$item->email}}</a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Nomer Handphone</b> <a class="float-right">{{$item->no_telp}}</a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Orang Tua</b> <a class="float-right">{{$item->orangtua}}</a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Alamat</b> <a class="float-right">{{$item->alamat}}</a>
                                      </li>
                                      <li class="list-group-item">
                                        <b>Status</b> <a class="float-right">{{$item->status}}</a>
                                      </li>
                                    </ul>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                        <!-- Modal -->
                      @endforeach
                  </tbody>
            </table>
        </div>
              <!-- /.card-body -->
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