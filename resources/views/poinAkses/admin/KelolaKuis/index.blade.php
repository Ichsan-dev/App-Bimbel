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
                <a href="{{route('ReviewWebsite')}}" class="nav-link">
                  <i class="fas fa-user-clock nav-icon"></i>
                  <p>Reviewer</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('KelolaKuis')}}" class="nav-link active">
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
            <a href="{{route('KelolaPendaftaran')}}" class="nav-link">
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
      <div class="container-fluid">
            <div class="card">
            <div class="card-header" style="display: flex; justify-content: space-between; align-items:center;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">Tambah Data</button>
                <h3 class="card-title" style="margin-bottom: 0;"><b>Kuis Table</b></h3>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pertanyaan</th>
                            <th scope="col">Jawaban Benar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $question->question }}</td>
                                <td>{{ $question->answers[$question->correct_answer - 1] }}</td>
                                <td>
                                    <a data-toggle="modal" data-target="#modal-edit{{ $question->id }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a data-toggle="modal" data-target="#modal-hapus{{ $question->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>

                      <!-- Modal -->
                            <div class="modal fade" id="modal-hapus{{ $question->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Apakah anda yakin ingin menghapus pertanyaan kuis <b>{{ $question->question}} ?</b> </p>
                                </div>
                                <div class="modal-footer" style="display: flex; justify-content: flex-end;">
                                  <form action="{{route('questions.destroy', ['id' => $question->id])}}" method="POST">
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
                      <!-- Modal Edit -->
                        <div class="modal fade" id="modal-edit{{ $question->id }}">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Edit Data Kuis</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                    <form action="{{route('questions.update', ['question' => $question->id])}}" method="POST" enctype="multipart/form-data"> 
                                      @csrf
                                       @method('PUT')
                                          <div class="modal-body">
                                            <div class="form-group">
                                              <label for="question">Pertanyaan:</label>
                                                <textarea class="form-control" id="question" name="question" rows="3" required>{{ $question->question }}</textarea>
                                                  @error('question')
                                                    <small>{{ $message }}</small>
                                                  @enderror
                                            </div>
                                            <div class="form-group">
                                              <label for="answers">Jawaban:</label>
                                                  @foreach ($question->answers as $key => $answer)
                                                      <input type="text" class="form-control" id="answer{{ $key+1 }}" name="answers[]" placeholder="Jawaban {{ $key+1 }}" value="{{ $answer }}" required>
                                                  @endforeach
                                                  @error('answer')
                                                    <small>{{ $message }}</small>
                                                  @enderror
                                            </div>
                                            <div class="form-group">
                                              <label for="correct_answer">Jawaban Benar:</label>
                                                <select class="form-control" id="correct_answer" name="correct_answer" required>
                                                  @foreach ($question->answers as $key => $answer)
                                                      <option value="{{ $key+1 }}" {{ ($key+1) == $question->correct_answer ? 'selected' : '' }}>Jawaban {{ $key+1 }}</option>
                                                  @endforeach
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
                    <h4 class="modal-title">Tambah Data Kuis</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                    <form action="{{route('questions.store')}}" method="POST" enctype="multipart/form-data"> 
                      @csrf
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="question">Pertanyaan:</label>
                                <textarea class="form-control" id="question" name="question" rows="3" required></textarea>
                                  @error('question')
                                    <small>{{ $message }}</small>
                                  @enderror
                            </div>
                            <div class="form-group">
                              <label for="answers">Jawaban:</label>
                                <input type="text" class="form-control" id="answer1" name="answers[]" placeholder="Jawaban 1" required>
                                <input type="text" class="form-control mt-2" id="answer2" name="answers[]" placeholder="Jawaban 2" required>
                                <input type="text" class="form-control mt-2" id="answer3" name="answers[]" placeholder="Jawaban 3" required>
                                <input type="text" class="form-control mt-2" id="answer4" name="answers[]" placeholder="Jawaban 4" required>
                                  @error('answer')
                                    <small>{{ $message }}</small>
                                  @enderror
                            </div>
                            <div class="form-group">
                              <label for="correct_answer">Jawaban Benar:</label>
                                <select class="form-control" id="correct_answer" name="correct_answer" required>
                                  <option value="0">Pilih Jawaban Benar</option>
                                  <option value="1">Jawaban 1</option>
                                  <option value="2">Jawaban 2</option>
                                  <option value="3">Jawaban 3</option>
                                  <option value="4">Jawaban 4</option>
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