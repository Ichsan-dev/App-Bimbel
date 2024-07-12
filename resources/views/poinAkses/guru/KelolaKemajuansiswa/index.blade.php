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
            <a href="{{route('CekAbsen')}}" class="nav-link">
              <i class="fas fa-scroll nav-icon"></i>
              <p>
                Absensi Guru
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('CekGaji')}}" class="nav-link">
              <i class="fas fa-money-check-alt nav-icon"></i>
              <p>
                Gaji Guru
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('KelolaKemajuanSiswa')}}" class="nav-link active">
              <i class="fas fa-users-cog nav-icon"></i>
              <p>
                Kelola Kemajuan Siswa
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
        <a href="{{route('guru')}}" class="nav-link">Dashboard</a>
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
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-create">
                      <i class="fas fa-plus-square"></i>
                  </button>
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
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($datakemajuansiswa as $item)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->tanggal }}</td>
                              <td>{{ $item->siswa->nama }}</td>
                              <td>{{ $item->kursus }}</td>
                              <td>{{ $item->nilai }}</td>
                              <td>{{ $item->keterangan }}</td>
                              <td style="display: flex; justify-content: space-evenly; align-items: center; border: none;">
                                  <a data-toggle="modal" data-target="#modal-hapus{{ $item->id }}" class="btn-sm btn-danger">
                                      <i class="fas fa-trash-alt"></i>
                                  </a>
                                  <a data-toggle="modal" data-target="#modal-edit{{ $item->id }}" class="btn-sm btn-warning">
                                      <i class="fas fa-pencil-alt"></i>
                                  </a>
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
                                          <p>Apakah yakin ingin menghapus data gaji <b>{{ $item->siswa->nama }}</b>?</p>
                                      </div>
                                      <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                          <form action="{{ route('KemajuanSiswaDelete', ['id' => $item->id]) }}" method="POST">
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
                          <!-- Modal Edit -->
                          <div class="modal fade" id="modal-edit{{ $item->id }}">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title">Edit Data Kemajuan Siswa</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <form action="{{ route('KemajuanSiswaUpdate', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          @method('PUT')
                                          <div class="modal-body">
                                              <div class="form-group">
                                                  <label for="exampleInputSiswa">Nama Siswa</label>
                                                  <select name="nama_siswa" class="form-control" id="nama_siswa">
                                                      <option disabled value="">-- Pilih Siswa --</option>
                                                      @foreach($datasiswa as $s)
                                                      <option value="{{ $s->id }}" @if($s->id == $item->siswa_id) selected @endif>{{ $s->nama }}</option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputTanggal">Tanggal</label>
                                                  <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $item->tanggal }}">
                                                  @error('tanggal')
                                                  <small>{{ $message }}</small>
                                                  @enderror
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputNilai">Nilai</label>
                                                  <select id="nilai" class="form-control" name="nilai">
                                                      <option disabled value="">-- Pilih --</option>
                                                      <option value="kurang" @if($item->nilai == 'kurang') selected @endif>Kurang</option>
                                                      <option value="baik" @if($item->nilai == 'baik') selected @endif>Baik</option>
                                                      <option value="sempurna" @if($item->nilai == 'sempurna') selected @endif>Sempurna</option>
                                                  </select>
                                              </div>
                                              <div class="form-group">
                                                  <label for="exampleInputKeterangan">Keterangan</label>
                                                  <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $item->keterangan }}">
                                                  @error('keterangan')
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
                          <!-- /.modal Edit -->
                          @endforeach
                      </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
          </div>
      </div>
      <!-- /.container-fluid -->
      <!-- Modal Create -->
      <div class="modal fade" id="modal-create">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Tambah Data Kemajuan Siswa</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="{{ route('KemajuanSiswaStore') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="exampleInputSiswa">Nama Siswa</label>
                              <select name="nama_siswa" class="form-control" id="nama_siswa">
                                  <option disabled value="">-- Pilih Siswa --</option>
                                  @foreach($datasiswa as $s)
                                  <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputTanggal">Tanggal</label>
                              <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="dd-mm-yyyy" value="">
                              @error('tanggal')
                              <small>{{ $message }}</small>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="exampleInputNilai">Nilai</label>
                              <select id="nilai" class="form-control" name="nilai">
                                  <option disabled value="">-- Pilih --</option>
                                  <option value="kurang">Kurang</option>
                                  <option value="baik">Baik</option>
                                  <option value="sempurna">Sempurna</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputKeterangan">Keterangan</label>
                              <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="-" value="">
                              @error('keterangan')
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
