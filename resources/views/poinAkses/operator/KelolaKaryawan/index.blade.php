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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kelola Karyawan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('KelolaKaryawan')}}" class="nav-link active">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>
                    Data Karyawan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaJabatan')}}" class="nav-link">
                  <i class="fas fa-briefcase nav-icon"></i>
                  <p>
                    Data Jabatan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('AbsensiKaryawan')}}" class="nav-link">
                 <i class="fas fa-paste nav-icon"></i>
                  <p>Absensi Karyawan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaGaji')}}" class="nav-link">
                  <i class="fas fa-money-check-alt nav-icon"></i>
                  <p>Gaji Karyawan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class=" nav-icon fas fa-users"></i>
              <p>
                Kelola Siswa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('KelolaSiswa')}}" class="nav-link">
                  <i class="fas fa-users-cog nav-icon"></i>
                  <p>
                    Data Siswa
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaSiswaKursus')}}" class="nav-link">
                  <i class="fas fa-code-branch nav-icon"></i>
                  <p>
                    Kursus Siswa
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaJadwal')}}" class="nav-link">
                <i class="fas fa-calendar-alt nav-icon"></i>
                  <p>
                    Jadwal Siswa
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaAbsensi')}}" class="nav-link">
                <i class="fas fa-book-reader nav-icon"></i>
                  <p>
                    Absensi Siswa
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaSPP')}}" class="nav-link">
                <i class="fas fa-wallet nav-icon"></i>
                  <p>
                    SPP Siswa
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-pied-piper-square"></i>
              <p>
                Kelola Kursus
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('KelolaKursus')}}" class="nav-link">
                  <i class="fas fa-scroll nav-icon"></i>
                  <p>
                    Data Kursus
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaInstruktur')}}" class="nav-link">
                  <i class="fas fa-user-friends nav-icon"></i>
                  <p>
                    Data Instruktur
                  </p>
                </a>
              </li>
            </ul>
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
        <a href="{{route('operator')}}" class="nav-link">Dashboard</a>
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
        {{-- <div class="card card-success"  style="width: 50%">
              <div class="card-header">
                    <h3 class="card-title">Add Position Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form action="{{ route('JabatanStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Jabatan</label>
                            <input type="text" class="form-control" id="title" placeholder="Cth: Owner" name="vjabatan">
                            @error('vjabatan')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Gaji</label>
                            <span class="left badge badge-danger">Rp</span>
                            <input type="text" class="form-control" id="content" placeholder="Cth: 1.000.0000 " name="vgaji">
                            @error('vgaji')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Textarea</label>
                            <textarea class="form-control" name="vdeskripsi" rows="3" placeholder="Enter ..."></textarea>
                            @error('vdeskripsi')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
            </form>
        </div> --}}
        <div class="card-header" style="display: flex; justify-content:space-between; align-items:center;">
            <a href="{{Route('KaryawanCreate')}}" class="btn btn-primary">Tambah Data</a>
            <h3 class="card-title" style="margin-bottom: 0;"><b>Tabel Karyawan</b></h3>
        </div>
              <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                  <thead>
                    <tr style="text-align: center; background-color:rgb(165, 204, 57);">
                      <th>#</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>No. Handphone</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datakaryawan as $item)                          
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->jabatan->nama_jabatan}}</td>
                        <td>{{$item->no_telp}}</td>
                        <td>{{$item->alamat}}</td>
                        <td style="Display: flex; justify-content:space-between; align-items:center; border: none;">
                                <a href="{{ route('KaryawanEdit', ['id' => $item->id]) }}" class="btn-sm btn-warning">
                                    <i class="fas fa-pen nav-icon"></i>
                                </a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $item->id }}" class="btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                <a data-toggle="modal" data-target="#modal-detail{{ $item->id }}" class="btn-sm btn-success"><i class="fas fa-eye"></i></i></a>
                        </td>
                      </tr>
                        <!-- Modal -->
                            <div class="modal fade" id="modal-hapus{{ $item->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Apakah anda yakin ingin menghapus data Karyawan <b>{{ $item->nama}}</b> ?</p>
                                </div>
                                <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                  <form action="{{route('KaryawanDelete', ['id' => $item->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-warning">Ya, Hapus Data</button>
                                  </form>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                        <!-- Modal -->
                        <!-- Modal -->
                            <div class="modal fade" id="modal-detail{{ $item->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Data Karyawan</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h3 class="profile-username text-center">{{$item->nama}}</h3>
                                  <p class="text-muted text-center">{{$item->jabatan->nama_jabatan}}</p>
                                  <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                      <b>Email</b> <a class="float-right">{{$item->email}}</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Nomer Handphone</b> <a class="float-right">{{$item->no_telp}}</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Jenis Kelamin</b> <a class="float-right">{{$item->jk}}</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Tanggal Lahir</b> <a class="float-right">{{$item->tanggal_lahir}}</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Alamat</b> <a class="float-right">{{$item->alamat}}</a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Pendidikan</b> <a class="float-right">{{$item->pend_akhir}}</a>
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
