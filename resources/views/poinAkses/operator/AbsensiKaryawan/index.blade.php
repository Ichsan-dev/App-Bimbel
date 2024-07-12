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
                <a href="{{route('KelolaJabatan')}}" class="nav-link">
                  <i class="fas fa-briefcase nav-icon"></i>
                  <p>
                    Data Jabatan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('AbsensiKaryawan')}}" class="nav-link active">
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
@section('Content')
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <div class="card">
            <div class="card-header" style="display: flex; justify-content: space-between; align-items:center;">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus-square"></i></button>
                <h3 class="card-title" style="margin-bottom: 0;"><b>Tabel Absensi Karyawan</b></h3>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr style="text-align: center; background-color:rgb(251, 255, 5);color:rgb(0, 0, 0)">
                      <th>#</th>
                      <th>Nama Karyawan</th>
                      <th>Tanggal</th>
                      <th>Jam Masuk</th>
                      <th>Jam Keluar</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($absensikaryawan as $item)                          
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->karyawan->nama}}</td>
                        <td>{{$item->tanggal}}</td>
                        <td>{{$item->jam_masuk}}</td>
                        <td>{{$item->jam_keluar}}</td>
                        <td>{{$item->keterangan}}</td>
                        <td style="Display: flex; justify-content: center; align-items:center; border: none;">
                                <a data-toggle="modal" data-target="#modal-edit{{$item->id}}" class="btn-sm btn-warning mr-2"><i class="fas fa-pen mr-1"></i></a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $item->id }}" class="btn-sm btn-danger"><i class="fas fa-trash-alt mr-1"></i></a>
                        </td>
                    </tr>
                <!-- Modal Hapus-->
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
                                  <p>Apakah yakin ingin menghapus data absensi karyawan <b>{{$item->karyawan->nama}}</b>?</p>
                                </div>
                                <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                  <form action="{{route('AbsensiKaryawanDelete', ['id' => $item->id])}}" method="POST">
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
                                        <h4 class="modal-title">Edit Data Absensi Karyawan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('AbsensiKaryawanUpdate', ['id' => $item->id])}}" method="POST" enctype="multipart/form-data"> 
                                            @csrf
                                            @method('PUT')
                                        <div class="modal-body">
                                          <div class="form-group">
                                            <label for="exampleInputSiswa">Nama Karyawan</label>
                                            <select name="nama_karyawan" class="form-control" id="nama_karyawan">
                                              <option disabled value="">-- Pilih Karyawan --</option>
                                                <option value="{{$item->karyawan_id}}">{{$item->karyawan->nama}}</option>
                                                @foreach($datakaryawan as $karyawan)
                                                  <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                                                @endforeach
                                              </select>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputTanggal">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" placeholder="dd-mm-yyyy" name="tanggal" value="{{$item->tanggal}}">
                                              @error('tanggal')
                                                <small>{{ $message }}</small>
                                              @enderror
                                          </div>
                                          <div class="form-group" style="display: flex; justify-content:flex-start;">
                                            <div>
                                                <label for="jam_masuk">Jam Masuk</label>
                                                <input type="time" name="jam_masuk" class="form-control" id="jam_masuk" value="{{ $item->jam_masuk}}">
                                            </div>
                                            <div style="margin-left: 5%">
                                                <label for="jam_keluar">Jam Keluar</label>
                                                <input type="time" name="jam_keluar" class="form-control" id="jam_keluar" value="{{ $item->jam_keluar}}">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputBulan_Pembayaran">Keterangan</label>
                                              <select id="keterangan" class="form-control" name="keterangan" >
                                                <option value="">-- Pilih Keterangan --</option>
                                                <option value="izin" {{$item->keterangan == 'izin' ? 'selected' : ''}}>Izin</option>
                                                <option value="sakit" {{$item->keterangan == 'sakit' ? 'selected' : ''}}>Sakit</option>
                                                <option value="alpha"{{$item->keterangan == 'alpha' ? 'selected' : ''}}>alpha</option>
                                              </select>
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
                         @endforeach
                <!-- Modal Edit-->
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
                    <h4 class="modal-title">Tambah Data Absensi Karyawan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                  <form action="{{route('AbsensiKaryawanStore')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleInputSiswa">Nama Karyawan</label>
                        <select name="nama_karyawan" class="form-control" id="nama_karyawan">
                          <option disabled value="">-- Pilih Karyawan --</option>
                            @foreach($datakaryawan as $karyawan)
                              <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputTanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" placeholder="dd-mm-yyyy" name="tanggal" value="">
                          @error('tanggal')
                            <small>{{ $message }}</small>
                          @enderror
                      </div>
                      <div class="form-group" style="display: flex; justify-content:flex-start;">
                        <div>
                            <label for="jam_masuk">Jam Masuk</label>
                            <input type="time" name="jam_masuk" class="form-control" id="jam_masuk" value="">
                        </div>
                        <div style="margin-left: 5%">
                            <label for="jam_keluar">Jam Keluar</label>
                            <input type="time" name="jam_keluar" class="form-control" id="jam_keluar" value="">
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="exampleinputKeterangan">Keterangan</label>
                        <select name="keterangan" id="" class="form-control" >
                          <option value="">-- Pilih Keterangan --</option>
                          <option value="izin">Izin</option>
                          <option value="sakit">Sakit</option>
                          <option value="alpha">Alpha</option>
                        </select>
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