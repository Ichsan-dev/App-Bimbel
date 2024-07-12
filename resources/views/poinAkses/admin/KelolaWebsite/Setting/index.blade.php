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
            <a href="#" class="nav-link active">
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
                <a href="{{route('SettingWebsite')}}" class="nav-link active">
                  <i class="fas fa-sliders-h nav-icon"></i>
                  <p>Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ReviewWebsite')}}" class="nav-link">
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
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
            <div class="card">
            <div class="card-header" style="display: flex; justify-content: space-between; align-items:center;">
                <h3 class="card-title" style="margin-bottom: 0;"><b>Setting Table</b></h3>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr style="text-align: center; background-color:rgb(244, 248, 24);">
                      <th>#</th>
                      <th>Label</th>
                      <th>Value</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datasetting as $item)                          
                      <tr>
                        <td style="text-align: center">{{$loop->iteration}}</td>
                        <td>{{$item->label}}</td>
                        <td>{{Str::limit($item->value, 50)}}</td> <!-- Menggunakan Str::limit() untuk membatasi panjang string -->
                        <td style="">
                                <a data-toggle="modal" data-target="#modal-edit{{$item->id}}" class="btn-sm btn-warning"><i class="fas fa-pen mr-2"></i>Edit</a> 
                        </td>
                      </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modal-edit{{$item->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Data Setting</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('SettingUpdate', ['id' => $item->id])}}" method="POST"> 
                                            @csrf
                                            @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">{{ $item->label }}</label>
                                                <input type="text" class="form-control" id="title" placeholder="" name="vdata" value="{{ $item->value }}">
                                                    @error('data')
                                                    <small>{{ $message }}</small>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                            
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            
                                        </div>
                                    </form>
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
