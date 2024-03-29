@php
$bulan = array (
1 => 'Januari',
'Februari',
'Maret',
'April',
'Mei',
'Juni',
'Juli',
'Agustus',
'September',
'Oktober',
'November',
'Desember'
);

$arr = explode('-', date('Y-m-d'));

$now = $arr[2] . ' ' . $bulan[(int) $arr[1]] . ' ' . $arr[0];
@endphp

<!DOCTYPE html>
<html>

<head>
  <title>Data Waris</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style type="text/css">
    table tr td,
    table tr th {
      font-size: 9pt;
    }
  </style>
</head>

<body>
  <table>
    <tr>
      <td><img src="{{ public_path('logo.jpg') }}" alt="" width="100"></td>
      <td>
        <h3 class="font-weight-bold text-center">Pemerintah Kota Banjarmasin Dinas Lingkungan Hidup</h3>
      </td>
    </tr>
  </table>

  <div class="text-center">
    <h5>Data Waris</h5>
    <strong>{{ $now }}</strong>
  </div>

  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Mendiang</th>
        <th>Hubungan Mendiang</th>
        <th>Nama Waris</th>
        <th>NIK Waris</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Pekerjaan</th>
        <th>Agama</th>
      </tr>
    </thead>
    <tbody>

      @foreach($pewaris as $row)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $row->mendiang->nama }}</td>
        <td>{{ $row->status_waris }}</td>
        <td>{{ $row->nama }}</td>
        <td>{{ $row->nik }}</td>
        <td>{{ $row->tanggal_lahir }}</td>
        <td>{{ $row->jenis_kelamin }}</td>
        <td>{{ $row->pekerjaan }}</td>
        <td>{{ $row->agama }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="float-right">
    <div>Kepala Dinas Lingkungan Hidup</div>
    <br>
    <br>
    <br>
    <div>Alive Yoesfah love</div>
    <div>NIP. 196811071989031009</div>
  </div>
</body>

</html>