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
          <li class="nav-item menu-close">
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fab fa-pied-piper-square"></i>
              <p>
                Kelola Kursus
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('KelolaKursus')}}" class="nav-link active">
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
            <div class="card">
            <div class="card-header" style="display: flex; justify-content: space-between; align-items:center;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Tambah Data</button>
                <h3 class="card-title" style="margin-bottom: 0;"><b>Kursus Table</b></h3>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr style="text-align: center; background-color:rgb(16, 145, 145); color: rgb(250, 250, 250);">
                      <th>#</th>
                      <th>Nama Kursus</th>
                      <th>Harga</th>
                      <th>Deskripsi</th>
                      <th>instruktur</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datakursus as $item)                          
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama_kursus}}</td>
                        <td>{{$item->harga}}</td>
                        <td>{{$item->deskripsi}}</td>
                        <td>{{$item->instruktur->nama_instruktur}}</td>
                        <td style="Display: flex; justify-content: center; align-items:center; border: none;">
                                <a data-toggle="modal" data-target="#modal-edit{{$item->id}}" class="btn-sm btn-warning mr-2"><i class="fas fa-pen mr-1"></i></a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $item->id }}" class="btn-sm btn-danger"><i class="fas fa-trash-alt mr-1"></i></a>
                        </td>
                    </tr>
                <!-- Modal Hapus-->
                      <div class="modal fade" id="modal-hapus{{ $item->id }}">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <p>Apakah anda yakin ingin menghapus data <b>{{ $item->nama_kursus }}</b></p>
                                  </div>
                                  <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                      <form action="{{ route('KursusDelete', ['id' => $item->id]) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                          <button type="submit" class="btn btn-warning">Ya, Hapus Data</button>
                                      </form>
                                  </div>
                              </div>
                              <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                      </div>
                  <!-- Modal Hapus-->
                  <!-- Modal Edit-->
                      <div class="modal fade" id="modal-edit{{$item->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Data Kursus</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('UpdateKursus', ['id' => $item->id])}}" method="POST" enctype="multipart/form-data"> 
                                            @csrf
                                            @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Kursus</label>
                                                <input type="text" class="form-control" id="title" placeholder="Ichsan Moch F, S.T" name="vnama" value="{{ $item->nama_kursus }}">
                                                    @error('vnama')
                                                    <small>{{ $message }}</small>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Instruktur :</label>
                                                <select name="instruktur_id" class="form-control" id="instruktur_id">
                                                    <option disabled value="">-- Pilih Instruktur --</option>
                                                    @foreach($dataInstruktur as $instruktur)
                                                        <option value="{{ $instruktur->id }}">{{ $instruktur->nama_instruktur }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Harga</label>
                                                <input type="text" class="form-control" id="email" placeholder="" name="vharga" value="{{ $item->harga }}">
                                                    @error('vharga')
                                                    <small>{{ $message }}</small>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Deskripsi</label>
                                                <input type="text" class="form-control" id="no_telp" placeholder="" name="vdeskripsi" value="{{ $item->deskripsi }}">
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
                  <!-- Modal Edit-->
                      @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
      </div><!-- /.container-fluid -->
      <!-- Modal Create -->
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Kursus</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                  <form action="{{route('KursusStore')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleInputNama">Nama Kusus</label>
                          <input type="text" class="form-control" id="nama" placeholder="Cth: Calistung" name="vnama" value="">
                            @error('vnama')
                              <small>{{ $message }}</small>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label>Instruktur :</label>
                          <select name="instruktur_id" class="form-control" id="instruktur_id">
                            <option disabled value="">-- Pilih Instruktur --</option>
                            @foreach($dataInstruktur as $item)
                              <option value="{{ $item->id }}">{{ $item->nama_instruktur }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputHarga">Harga</label>
                          <input type="text" class="form-control" id="email" placeholder="100000.00" name="vharga" value="">
                            @error('vharga')
                              <small>{{ $message }}</small>
                            @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputNomerTelp">Deskripsi</label>
                          <textarea type="text" class="form-control" id="nama" placeholder="+628xxx" name="vdeskripsi"></textarea>
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