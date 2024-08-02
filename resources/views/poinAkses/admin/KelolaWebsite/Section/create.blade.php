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
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jumbotron</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('SectionWebsite')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('SettingWebsite')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ReviewWebsite')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
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
    <!-- Main content -->
    <div class="content">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Section Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('SectionStore')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title :</label>
                    <input type="Text" class="form-control" id="title" placeholder="Enter Title" name="vtitle">
                    @error('vtitle')
                         <small>{{$message}}</small>
                    @enderror
                  </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea name="vcontent" id="content" class="form-control"></textarea>
                      @error('vcontent')
                         <small>{{$message}}</small>
                    @enderror
                      </div>
                      <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="vthumbnail" id="image" class="form-control-file">
                        <img src="" alt="Current Image" style="max-width: 200px;">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
         </div>
    </div>
    <!-- /.content -->
@endsection
<script>
    function updateFileName(input) {
        var fileName = input.files[0].name;
        document.getElementById('thumbnailLabel').innerText = fileName;
    }
</script>
