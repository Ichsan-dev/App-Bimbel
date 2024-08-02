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
@section('Content')
     <div class="content">
      <div class="container-fluid">
        <div class="card-header" style="display: flex; justify-content:space-between; align-items:center;">
            <h3 class="card-title" style="margin-bottom: 0;"><b>Tabel Pendaftaran</b></h3>
            <div class="card-tools mt-3" style="margin-left: 70%">
              <form action="{{route('KelolaPendaftaran')}}" method="GET">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{($request->get('search'))}}">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
        </div>
              <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                  <thead>
                    <tr style="text-align: center; background-color:rgb(165, 204, 57);">
                      <th>#</th>
                      <th>Nama</th>
                      <th>Kursus</th>
                      <th>Orang Tua</th>
                      <th>Telp</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datapendaftaran as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->kursus->nama_kursus}}</td>
                        <td>{{$item->orangtua}}</td>
                        <td>{{$item->no_telp}}</td>
                        <td style="Display: flex; justify-content: space-between; align-items:center; border: none;">
                                <a href="{{ route('EditPendaftaran', ['id' => $item->id]) }}" class="btn-sm btn-warning">
                                    <i class="fas fa-pen nav-icon"></i></span>
                                </a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $item->id }}" class="btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                <a data-toggle="modal" data-target="#modal-detail{{ $item->id }}" class="btn-sm btn-success"><i class="fas fa-eye"></i></i></a>
                                    <!-- Form untuk upload -->
                              <form action="{{ route('PendaftaranUpload', ['id' => $item->id]) }}" method="POST" style="display:inline;">
                                  @csrf
                                  <button type="submit" class="btn-sm btn-primary"><i class="fas fa-upload nav-icon"></i></button>
                              </form>
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
                                  <p>Apakah anda yakin ingin menghapus data Pendaftaran <b>{{ $item->nama}}</b> ?</p>
                                </div>
                                <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                  <form action="{{route('DeletePendaftaran', ['id' => $item->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-danger">Ya, Hapus Data</button>
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