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
  <title>Data Tumpangan</title>
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

  <div class="text-center mb-3">
    <h5>Data Tumpangan</h5>
    <strong>{{ $now }}</strong>
  </div>

  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Pemohon</th>
        <th>Alamat</th>
        <th>Identitas Jenazah</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tumpangan as $item)
      <tr>
        <td>{{ ($loop->index + 1) }}</td>
        <td>{{ $item->nama_pemohon }}</td>
        <td>{{ $item->alamat }}</td>
        <td>{{ $item->jenazah->nama }}</td>
        <td>
          <x-action-button :id="$item->id" edit="tumpangan.edit" print="tumpangan.show" delete="tumpangan.destroy" />
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>