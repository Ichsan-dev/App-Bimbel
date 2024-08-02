<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa - Cetak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
        }
        h1 {
            text-align: center;
            color: #333;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .form-field {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ccc;
        }
        .form-field label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
            vertical-align: top;
        }
        .form-field span {
            padding: 5px;
            border-radius: 5px;
            display: inline-block;
            width: calc(100% - 170px);
            vertical-align: top;
            margin-left: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            word-wrap: break-word;
        }
        .photo {
            text-align: center;
            margin-top: 20px;
        }
        .photo img {
            max-width: 150px;
            border-radius: 5px;
        }
        .date {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="date">Tanggal: {{ date('d M Y') }}</div>
        <h1>Formulir Pendaftaran Siswa</h1>
        <div class="form-field">
            <label>ID Pendaftaran:</label><span>{{ $datapendaftaran->id_pendaftaran }}</span>
        </div>
        <div class="form-field">
            <label>Nama:</label><span>{{ $datapendaftaran->nama }}</span>
        </div>
        <div class="form-field">
            <label>Kursus:</label><span>{{ $datapendaftaran->kursus->nama_kursus ?? 'N/A' }}</span>
        </div>
        <div class="form-field">
            <label>Jenis Kelamin:</label><span>{{ $datapendaftaran->jk }}</span>
        </div>
        <div class="form-field">
            <label>No Telp:</label><span>{{ $datapendaftaran->no_telp }}</span>
        </div>
        <div class="form-field">
            <label>Email:</label><span>{{ $datapendaftaran->email }}</span>
        </div>
        <div class="form-field">
            <label>Nama Orangtua:</label><span>{{ $datapendaftaran->orangtua }}</span>
        </div>
        <div class="form-field">
            <label>Email Orangtua:</label><span>{{ $datapendaftaran->emailortu }}</span>
        </div>
        <div class="form-field">
            <label>Tanggal Lahir:</label><span>{{ $datapendaftaran->tgl_lahir }}</span>
        </div>
        <div class="form-field">
            <label>Alamat:</label><span>{{ $datapendaftaran->alamat }}</span>
        </div>
    </div>
</body>
</html>
