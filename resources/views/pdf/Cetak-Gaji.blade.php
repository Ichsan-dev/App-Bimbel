<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            border: 1px solid #000;
            padding: 20px;
        }
        .header, .footer {
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .header, .footer, .content {
            margin-bottom: 20px;
        }
        .karyawan{
            width: 70%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .karyawan th, .karyawan td{
            padding: 8px;
            text-align: left;
        }
        .details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .details th, .details td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .details th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
        .details .bulan  {
            text-align: center;
            font-weight: bold;
        }
        .sign {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>SLIP GAJI</h1>
            <p>BIMBEL RUMAH PINUS</p>
            <p>JL. PINUS 1 NO 252 BLOK IX</p>
            <p>TELP. +62 877-2691-6540</p>
        </div>

        <div class="content">
            <table class="karyawan">
                <tr>
                    <th>Nama</th>
                    <td>{{ $karyawan->nama }}</td>
                    <th>Alamat</th>
                    <td>{{ $karyawan->alamat }}</td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>{{ $karyawan->jabatan->nama_jabatan }}</td>
                    <th>Telepon</th>
                    <td>031-1234567</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ date('d M Y') }}</td>
                </tr>
            </table>

            <table class="details">
                <thead>
                    <tr>
                        <td colspan="3" class="bulan">{{ $cekgaji->bulan }}</td>
                    </tr>
                    <tr>
                        <th>NO</th>
                        <th>KETERANGAN</th>
                        <th>JUMLAH</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Gaji Pokok</td>
                        <td>{{ $cekgaji->gaji_pokok }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Tunjangan Transport</td>
                        <td>{{ $cekgaji->tunjangan_transport }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Tunjangan Makan</td>
                        <td>{{ $cekgaji->tunjangan_makan }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="total">TOTAL DITERIMA</td>
                        <td>{{ $cekgaji->total_gaji }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>{{ $terbilang_gaji }}</p>
            <p>Penerima,</p>
            <br><br>
            <p>{{ $karyawan->nama }}</p>
            <p>BIMBEL RUMAH PINUS</p>
        </div>
    </div>
</body>
</html>
