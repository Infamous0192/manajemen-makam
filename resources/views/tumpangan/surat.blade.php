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
  <title>Surat Keterangan Ahli Waris</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
    p {
      font-size: 14px;
    }

    div {
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="row mx-auto">
    <div class="mx-auto">
      <table>
        <tr>
          <td><img src="{{ public_path('logo.jpg') }}" alt="" width="100"></td>
          <td>
            <h3 class="font-weight-bold text-center">Pemerintah Kota Banjarmasin Dinas Lingkungan Hidup</h3>
          </td>
        </tr>
      </table>

      <h5 class="text-center font-weight-bold my-3">Surat Pengajuan Makam Tumpangan</h5>

      <p class="my-4">Hal: Permohonan Izin Penggunaan Tanah Makam/Makam Tumpangan</p>

      <p style="text-indent: 2rem" class="mb-2">Dengan ini perkenangkanlah kami mengajukan permohonan untuk mendapatkan izin
        penggunaan tanah makam / makam
        tumpangan, sebagaimana diatur dalam peraturan daerah kota Banjarmasin nomor 7 Tahun 2014 tentang izin penggunaan
        tempat pemakaman umum, dengan data sebagai berikut</p>

      <table>
        <tr>
          <td class="pr-4">Nama Pemohon</td>
          <td class="px-2">:</td>
          <td>{{ $tumpangan->nama_pemohon }}</td>
        </tr>
        <tr>
          <td class="pr-4">Tempat/Tanggal Lahir</td>
          <td class="px-2">:</td>
          <td>{{ $tumpangan->tempat_lahir }}, {{ $tumpangan->tanggal_lahir }}</td>
        </tr>
        <tr>
          <td class="pr-4">Kewarganegaraan</td>
          <td class="px-2">:</td>
          <td>{{ $tumpangan->kewarganegaraan }}</td>
        </tr>
        <tr>
          <td class="pr-4">Agama</td>
          <td class="px-2">:</td>
          <td>{{ $tumpangan->agama }}</td>
        </tr>
        <tr>
          <td class="pr-4">Alamat</td>
          <td class="px-2">:</td>
          <td>{{ $tumpangan->alamat }}</td>
        </tr>
        <tr>
          <td class="pr-4">Nama & Tanggal Meninggal</td>
          <td class="px-2">:</td>
          <td>{{ $tumpangan->jenazah->nama }} - {{ $tumpangan->jenazah->tanggal_meninggal }}</td>
        </tr>
      </table>

      <div class="mt-2">Demikian permohonan yang kami ajukan, dan kami bersedia memenuhi semua ketentuan peraturan
        undang-undang yang berlaku.</div>

      <div class="mt-5" style="float: left;">
        <div>
          <div>Pemohon</div>
          <br>
          <br>
          <br>
        </div>
      </div>
    </div>
  </div>
</body>

</html>