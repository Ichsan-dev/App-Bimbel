@extends('Layout-Dashboard.main')
@section('Content')
<div class="card card-success" style="margin: 5rem">
    <div class="card-header">
        <h3 class="card-title">Formulir Pendaftaran Siswa</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{ route('FormulirUpdate', $datapendaftaran->id) }}" method="POST" enctype="multipart/form-data" id="formSiswa">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ID Pendaftaran</label>
                        <input type="text" class="form-control" id="idpendaftaran"  name="idpendaftaran" value="{{$datapendaftaran->id_pendaftaran}}">
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" placeholder="Bada Budi" name="vnama" value="{{$datapendaftaran->nama}}">
                        @error('vnama')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                    <label>Kursus :</label>
                        <select name="kursus_id" class="form-control" id="kursus_id">
                        <option disabled value="">-- Pilih Kursus --</option>
                        @foreach($datakursus as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kursus }}</option>
                        @endforeach
                        </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="exampleInputJenisKelamin">Jenis Kelamin :</label>
                        <div class="form-check" style="display: inline-block; margin-left: 10px; margin-right:10px">
                            <input class="form-check-input" type="radio" name="vjenis_kelamin" id="pria" value="Laki-laki">
                            <label for="pria">Laki-laki</label>
                        </div>
                        <div class="form-check" style="display: inline-block; margin-right: 30px;">
                            <input class="form-check-input" type="radio" name="vjenis_kelamin" id="wanita" value="Perempuan">
                            <label for="wanita">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNoHp">No. Handphone</label>
                        <input type="text" class="form-control" id="no_telp" placeholder="Cth: 0877xxx" name="vno_telp" value="{{$datapendaftaran->no_telp}}">
                        @error('vno_telp')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Cth: 123@abc.com" name="vemail" value="{{$datapendaftaran->email}}">
                        @error('vemail')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="orangtua">Wali/Orang Tua</label>
                        <input type="text" name="vorangtua" class="form-control" placeholder="Budi, S.kom" id="orangtua" value="{{$datapendaftaran->orangtua}}">
                        @error('vorangtua')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email orangtua</label>
                        <input type="text" class="form-control" id="email" placeholder="Cth: 123@abc.com" name="emailortu" value="{{$datapendaftaran->emailortu}}">
                        @error('vemail')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="date" name="vtgl" class="form-control" id="vtgl" value="{{$datapendaftaran->tgl_lahir}}">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="exampleInputKomentar">Alamat</label>
                        <textarea name="valamat" id="alamat" class="form-control">{{$datapendaftaran->alamat}}</textarea>
                        @error('valamat')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="image">Foto </label>
                        <input type="file" name="vfoto" id="image" class="form-control-file">
                        <img src="" alt="Current Image" style="max-width: 200px;">
                    </div> --}}
                </div>
                <!-- /.col -->
            </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
        {{-- <button type="button" class="btn btn-warning" onclick="previewPDF()">Pratinjau</button> --}}
        <button type="button" class="btn btn-danger" onclick="clearForm()">Hapus</button>
    </div>
    </form>
</div>

<script>
    function clearForm() {
        // Get the form element
        var form = document.getElementById('formSiswa');
        // Reset the form (this clears all input fields)
        form.reset();
        }
</script>
 @if ($message = Session::get('success'))
            <script>
                Swal.fire({
                    icon: "success",
                    text: "{{ $message }}",
                });
            </script>
        @endif
@endsection
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
                Kelola Website
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('JumbotronWebsite')}}" class="nav-link">
                  <i class="fas fa-chalkboard nav-icon"></i>
                  <p>Jumbotron</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('SectionWebsite')}}" class="nav-link">
                  <i class="fas fa-window-restore nav-icon"></i>
                  <p>Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('SettingWebsite')}}" class="nav-link">
                 <i class="fas fa-sliders-h nav-icon"></i>
                  <p>Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-user-clock nav-icon"></i>
                  <p>Reviewer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('KelolaKuis')}}" class="nav-link">
              <i class="fas fa-scroll nav-icon"></i>
              <p>
                Kelola Kuis
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('KelolaAkun')}}" class="nav-link">
              <i class="fas fa-users-cog nav-icon"></i>
              <p>
                Kelola Akun
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('KelolaPendaftaran')}}" class="nav-link active">
              <i class="fas fa-user-plus nav-icon"></i>
              <p>
                Kelola Pendaftaran
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
        <a href="{{route('admin')}}" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('logout') }}" class="nav-link" data-toggle="modal" data-target="#modal-logout">Logout</a>
      </li>
    </ul>
@endsection