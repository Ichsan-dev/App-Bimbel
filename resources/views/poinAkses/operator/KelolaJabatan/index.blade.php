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
                <a href="{{route('KelolaKaryawan')}}" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>
                    Data Karyawan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('KelolaJabatan')}}" class="nav-link active">
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
    <!-- Modal Create -->
    <div class="modal fade" id="modal-create">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Tambah Data Jabatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                    <form action="{{ route('JabatanStore') }}" method="POST" enctype="multipart/form-data"> 
                      @csrf
                      <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Jabatan</label>
                            <input type="text" class="form-control" id="title" placeholder="Cth: Owner" name="vjabatan">
                            @error('vjabatan')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleInputGaji">Gaji</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">RP</span>
                            </div>
                            <input type="text" class="form-control" id="content" placeholder="Cth: 1.000.0000 " name="vgaji">
                            @error('vgaji')
                                <small>{{ $message }}</small>
                            @enderror
                          </div>
                        </div>
                         <div class="form-group">
                            <label for="tunjangan_transport">Tunjangan Transport</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RP</span>
                                </div>
                                <input type="text" class="form-control" id="tunjangan_transport" placeholder="Cth: 500.000" name="tunjangantransport">
                                @error('tunjangan_transport')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tunjangan_makan">Tunjangan Makan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">RP</span>
                                </div>
                                <input type="text" class="form-control" id="tunjangan_makan" placeholder="Cth: 300.000" name="tunjanganmakan">
                                @error('tunjangan_makan')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="vdeskripsi" rows="3" placeholder="Enter ..."></textarea>
                            @error('vdeskripsi')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                      </div>
                      <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>                      
                      </div>
                    </form>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
    <!-- Modal Create-->
        <br>
        <div class="card-header" style="display: flex; justify-content:space-between;">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Tambah Data</button>
          <h3 class="card-title" style="margin-bottom: 0;"><b>Tabel Jabatan</b></h3>
        </div>
              <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                  <thead>
                    <tr style="text-align: center; background-color:rgb(5, 86, 92); color:rgb(251, 252, 245)">
                      <th>#</th>
                      <th>Jabatan</th>
                      <th>Gaji</th>
                      <th>Tj Makan</th>
                      <th>Tj Transport</th>
                      <th>Total Gaji</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataJabatan as $item)                          
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama_jabatan}}</td>
                        <td>{{$item->gaji}}</td>
                        <td>{{$item->tunjangan_makan}}</td>
                        <td>{{$item->tunjangan_transport}}</td>
                        <td>{{$item->total_gaji}}</td>
                        <td>{{$item->deskripsi}}</td>
                        <td style="Display: flex; justify-content: flex-end; align-items:center; gap: 10px; border: none;">
                                <a data-toggle="modal" data-target="#modal-edit{{ $item->id }}" class="btn-sm btn-warning"><i class="fas fa-pen nav-icon"></i><span class="ml-2">Edit</span></a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $item->id }}" class="btn-sm btn-danger"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>
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
                                  <p>Apakah anda yakin ingin menghapus data jabatan <b>{{ $item->nama_jabatan}}</b> ?</p>
                                </div>
                                <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                  <form action="{{route('JabatanDelete', ['id' => $item->id])}}" method="POST">
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
                        <!-- Modal Create -->
                        <div class="modal fade" id="modal-edit{{$item->id}}">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title">Edit Data Jabatan</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                      </div>
                                        <form action="{{ route('JabatanUpdate', $item->id) }}" method="POST" enctype="multipart/form-data"> 
                                          @csrf
                                          @method('PUT')
                                          <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Jabatan</label>
                                                <input type="text" class="form-control" id="title" placeholder="Cth: Owner" name="vjabatan" value="{{$item->nama_jabatan}}">
                                                @error('vjabatan')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputGaji">Gaji</label>
                                              <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">RP</span>
                                                </div>
                                                <input type="text" class="form-control" id="content" placeholder="Cth: 1.000.0000 " name="vgaji" value="{{$item->gaji}}">
                                                @error('vgaji')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tunjangan_transport">Tunjangan Transport</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">RP</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="tunjangan_transport" placeholder="Cth: 500.000" name="tunjangantransport" value="{{$item->tunjangan_transport}}">
                                                    @error('tunjangan_transport')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tunjangan_makan">Tunjangan Makan</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">RP</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="tunjangan_makan" placeholder="Cth: 300.000" name="tunjanganmakan" value="{{$item->tunjangan_makan}}">
                                                    @error('tunjangan_makan')
                                                        <small>{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" name="vdeskripsi" rows="3" placeholder="Enter ...">{{$item->deskripsi}}</textarea>
                                                @error('vdeskripsi')
                                                    <small>{{ $message }}</small>
                                                @enderror
                                            </div>
                                          </div>
                                          <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>                      
                                          </div>
                                        </form>
                                  </div>
                                  <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                        </div>
                        <!-- Modal Create-->
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
