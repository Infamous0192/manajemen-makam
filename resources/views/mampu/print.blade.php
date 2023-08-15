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
  <title>Data Jenazah Tidak Mampu</title>
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

  <div class="text-center mb-3">
    <h5>Data Jenazah Tidak Mampu</h5>
    <strong>{{ $now }}</strong>
  </div>

  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>NIK</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Pekerjaan</th>
        <th>Agama</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      @foreach($mampu as $row)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $row->nama_lengkap }}</td>
        <td>{{ $row->nik }}</td>
        <td>{{ $row->tanggal_lahir }}</td>
        <td>{{ $row->jenis_kelamin }}</td>
        <td>{{ $row->pekerjaan }}</td>
        <td>{{ $row->agama }}</td>
        <td>{{ $row->alamat_now }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>