<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulir Pendaftaran</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="icon" type="image/png" href="{{ asset('halaman_auth/images/icons/logopalsu.ico') }}" />
</head>
<body>

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
        <form action="{{ route('formulirstore') }}" method="POST" enctype="multipart/form-data" id="formSiswa">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ID Pendaftaran</label>
                        <input type="text" class="form-control" id="idpendaftaran" name="idpendaftaran" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" placeholder="Bada Budi" name="vnama" value="">
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
                        <input type="text" class="form-control" id="no_telp" placeholder="Cth: 0877xxx" name="vno_telp" value="">
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
                        <input type="text" class="form-control" id="email" placeholder="Cth: 123@abc.com" name="vemail" value="">
                        @error('vemail')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="orangtua">Wali/Orang Tua</label>
                        <input type="text" name="vorangtua" class="form-control" placeholder="Budi, S.kom" id="orangtua">
                        @error('vorangtua')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email orangtua</label>
                        <input type="text" class="form-control" id="emailortu" placeholder="Cth: 123@abc.com" name="emailortu" value="">
                        @error('emailortu')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir:</label>
                        <input type="date" name="vtgl" class="form-control" id="vtgl">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="exampleInputKomentar">Alamat</label>
                        <textarea name="valamat" id="alamat" class="form-control"></textarea>
                        @error('valamat')
                        <small>{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- /.col -->
            </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="button" class="btn btn-danger" onclick="clearForm()">Hapus</button>
    </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/pendaftaran/next-id')
            .then(response => response.json())
            .then(data => {
                document.getElementById('idpendaftaran').value = data.nextId;
            });
    });

    function clearForm() {
        // Get the form element
        var form = document.getElementById('formSiswa');
        // Reset the form (this clears all input fields)
        form.reset();
        fetch('/pendaftaran/next-id')
            .then(response => response.json())
            .then(data => {
                document.getElementById('idpendaftaran').value = data.nextId;
            });
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

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('master-quiz/index.js')}}"></script>
<script src="{{asset('jquery/index.js')}}"></script>
</body>
</html>
