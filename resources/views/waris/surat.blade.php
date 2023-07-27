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

      <h5 class="text-center font-weight-bold my-3">Surat Keterangan Ahli Waris</h5>

      <p>Yang bertanda tanda tangan di bawah ini Dinas lingkungan hidup kota Banjarmasin dengan ini menerangkan bahwa :
      </p>

      <table>
        <tr>
          <td class="pr-4">Nama</td>
          <td class="px-2">:</td>
          <td>{{ $waris->mampu->nama_lengkap }}</td>
        </tr>
        <tr>
          <td class="pr-4">Jenis Kelamin</td>
          <td class="px-2">:</td>
          <td>{{ $waris->mampu->jenis_kelamin }}</td>
        </tr>
        <tr>
          <td class="pr-4">Tempat/Tanggal Lahir</td>
          <td class="px-2">:</td>
          <td>{{ $waris->mampu->tempat_lahir }}, {{ $waris->mampu->tanggal_lahir }}</td>
        </tr>
        <tr>
          <td class="pr-4">Alamat</td>
          <td class="px-2">:</td>
          <td>{{ $waris->mampu->alamat_now }}</td>
        </tr>
        <tr>
          <td class="pr-4">Status Kawin</td>
          <td class="px-2">:</td>
          <td>{{ $waris->mampu->kawin }}</td>
        </tr>
      </table>

      <p class="mt-3">Bahwa nama diatas tersebut telah meninggal pada tanggal {{ $waris->mampu->tanggal_meninggal }} di
        kota Banjarmasin, dan meninggal ahli waris :</p>
      <table>
        <tr>
          <td class="pr-4">Nama</td>
          <td class="px-2">:</td>
          <td>{{ $waris->nama_waris }}</td>
        </tr>
        <tr>
          <td class="pr-4">Tempat/Tanggal Lahir</td>
          <td class="px-2">:</td>
          <td>{{ $waris->tempat_waris }}, {{ $waris->tanggal_waris }}</td>
        </tr>
        <tr>
          <td class="pr-4">Jenis Kelamin</td>
          <td class="px-2">:</td>
          <td>{{ $waris->kelamin }}</td>
        </tr>
        <tr>
          <td class="pr-4">Status Hubungan</td>
          <td class="px-2">:</td>
          <td>{{ $waris->status_waris }}</td>
        </tr>
        <tr>
          <td class="pr-4">Pekerjaan</td>
          <td class="px-2">:</td>
          <td>{{ $waris->pekerjaan }}</td>
        </tr>
        <tr>
          <td class="pr-4">Kecamatan</td>
          <td class="px-2">:</td>
          <td>{{ $waris->kecamatan }}</td>
        </tr>
        <tr>
          <td class="pr-4">Kabupaten</td>
          <td class="px-2">:</td>
          <td>{{ $waris->kabupaten }}</td>
        </tr>
        <tr>
          <td class="pr-4">Negara</td>
          <td class="px-2">:</td>
          <td>{{ $waris->negara }}</td>
        </tr>
        <tr>
          <td class="pr-4">Agama</td>
          <td class="px-2">:</td>
          <td>{{ $waris->agama }}</td>
        </tr>
      </table>

      <div class="mt-2">Demikianlah surat keterangan ahli waris ini dibuat untuk dapat di gunakan seperlunya.</div>

      <div class="mt-3" style="float: right;">
        <div>
          <div>Dikeluarkan di : Pemko Banjarmasin</div>
          <div>Pada Tanggal : </div>
          <div>Kepala Dinas Lingkungan Hidup</div>
          <br>
          <br>
          <br>
          <div>Alive Yoesfah love</div>
          <div>NIP. 196811071989031009</div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>