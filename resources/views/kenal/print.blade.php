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
  <title>Data Jenazah Tidak Dikenal</title>
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
    <h5>Data Jenazah Tidak Dikenal</h5>
    <strong>{{ $now }}</strong>
  </div>

  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Janazah</th>
        <th>Jenis Kelamin</th>
        <th>Alamat Temu</th>
        <th>Tanggal Temu</th>
        <th>Desa Temu</th>
        <th>Provinsi Temu</th>
        <th>Negara Temu</th>
      </tr>
    </thead>
    <tbody>
      @foreach($kenal as $row)
      <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ $row->nama_jenazah }}</td>
        <td>{{ $row->kelamin }}</td>
        <td>{{ $row->alamat_temu }}</td>
        <td>{{ $row->tanggal_temu }}</td>
        <td>{{ $row->desa_temu }}</td>
        <td>{{ $row->provinsi_temu }}</td>
        <td>{{ $row->negara_temu }}</td>
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