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
          <li class="nav-item menu-open">
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
                <a href="{{route('KelolaSPP')}}" class="nav-link active">
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
            <div class="card">
            <div class="card-header" style="display: flex; justify-content: space-between; align-items:center;">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create"><i class="fas fa-plus-square"></i></button>
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
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dataSPP as $item)                          
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{$item->siswa->nama}}</td>
                        <td>{{$item->tanggal_pembayaran}}</td>
                        <td>{{$item->bulan_pembayaran}}</td>
                        <td>{{$item->status_pembayaran}}</td>
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
                                  <p>Apakah yakin ingin menghapus data spp <b>{{$item->siswa->nama}}</b>?</p>
                                </div>
                                <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                  <form action="{{route('SppDelete', ['id' => $item->id])}}" method="POST">
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
                                        <h4 class="modal-title">Edit Data Spp Siswa</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('SppUpdate', ['id' => $item->id])}}" method="POST" enctype="multipart/form-data"> 
                                            @csrf
                                            @method('PUT')
                                        <div class="modal-body">
                                          <div class="form-group">
                                            <label for="exampleInputSiswa">Nama Siswa</label>
                                            <select name="nama_siswa" class="form-control" id="nama_siswa">
                                              <option disabled value="">-- Pilih Siswa --</option>
                                                <option value="{{$item->siswa_id}}">{{$item->siswa->nama}}</option>
                                                @foreach($datasiswa as $ds)
                                                  <option value="{{ $ds->id }}">{{ $ds->nama }}</option>
                                                @endforeach
                                              </select>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputTanggal">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" placeholder="dd-mm-yyyy" name="tanggal" value="{{$item->tanggal_pembayaran}}">
                                              @error('tanggal')
                                                <small>{{ $message }}</small>
                                              @enderror
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputBulan_Pembayaran">Bulan</label>
                                              <select id="bulan" class="form-control" name="bulan" >
                                                <option disabled value="">-- Pilih --</option>
                                                <option value="Januari" {{$item->bulan_pembayaran == 'Januari' ? 'selected' : ''}}>Januari</option>
                                                <option value="Februari" {{$item->bulan_pembayaran == 'Februari' ? 'selected' : ''}}>Februari</option>
                                                <option value="Maret"{{$item->bulan_pembayaran == 'Maret' ? 'selected' : ''}}>Maret</option>
                                                <option value="April" {{$item->bulan_pembayaran == 'April' ? 'selected' : ''}}>April</option>
                                                <option value="Mei" {{$item->bulan_pembayaran == 'Mei' ? 'selected' : ''}}>Mei</option>
                                                <option value="Juni" {{$item->bulan_pembayaran == 'Juni' ? 'selected' : ''}}>Juni</option>
                                                <option value="Juli" {{$item->bulan_pembayaran == 'Juli' ? 'selected' : ''}}>Juli</option>
                                                <option value="Agustus" {{ $item->bulan_pembayaran == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                                                <option value="September" {{ $item->bulan_pembayaran == 'September' ? 'selected' : '' }}>September</option>
                                                <option value="Oktober" {{ $item->bulan_pembayaran == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                                                <option value="November" {{ $item->bulan_pembayaran == 'November' ? 'selected' : '' }}>November</option>
                                                <option value="Desember" {{ $item->bulan_pembayaran == 'Desember' ? 'selected' : '' }}>Desember</option>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleinputstatus">Status Pembayaran</label>
                                            <select name="status" id="" class="form-control" >
                                              <option value="Lunas" {{ $item->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                              <option value="Belum-Lunas" {{ $item->status == 'belum-lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleInputKeterangan">Keterangan</label>
                                              <input type="text" class="form-control" id="Keterangan" placeholder="" name="keterangan" value="{{$item->keterangan}}">
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
                    <h4 class="modal-title">Tambah Data SPP Siswa</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
                  <form action="{{route('SppStore')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleInputSiswa">Nama Siswa</label>
                        <select name="nama_siswa" class="form-control" id="nama_siswa">
                          <option disabled value="">-- Pilih Siswa --</option>
                            @foreach($datasiswa as $siswa)
                              <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
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
                      <div class="form-group">
                        <label for="exampleInputBulan_Pembayaran">Bulan</label>
                          <select id="bulan" class="form-control" name="bulan" >
                            <option disabled value="">-- Pilih --</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleinputstatus">Status Pembayaran</label>
                        <select name="status" id="" class="form-control" >
                          <option value="Lunas">Lunas</option>
                          <option value="Belum-Lunas">Belum Lunas</option>
                        </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputKeterangan">Keterangan</label>
                          <input type="text" class="form-control" id="Keterangan" placeholder="" name="keterangan" value="">
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