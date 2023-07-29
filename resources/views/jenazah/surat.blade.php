<!DOCTYPE html>
<html>

<head>
  <title>Surat Keterangan Pemakaman</title>
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

      <h5 class="text-center font-weight-bold my-3">Surat Keterangan Pemakaman</h5>

      <p>yang bertanda tangan dibawah ini kepala dinas lingkungan hidup kota Banjarmasin dengan ini menerangkan :</p>

      <table>
        <tr>
          <td class="pr-4">Nama</td>
          <td class="px-2">:</td>
          <td></td>
        </tr>
        <tr>
          <td class="pr-4">Jabatan</td>
          <td class="px-2">:</td>
          <td></td>
        </tr>
        <tr>
          <td class="pr-4">Alamat</td>
          <td class="px-2">:</td>
          <td></td>
        </tr>
      </table>

      <p class="mt-3">Dengan ini menerangkan :</p>
      <table>
        <tr>
          <td class="pr-4">Nama</td>
          <td class="px-2">:</td>
          <td>{{ $jenazah->nama }}</td>
        </tr>
        <tr>
          <td class="pr-4">Tempat/Tanggal Lahir</td>
          <td class="px-2">:</td>
          <td>{{ $jenazah->tempat_lahir }}, {{ $jenazah->tanggal_lahir }}</td>
        </tr>
        <tr>
          <td class="pr-4">NIK</td>
          <td class="px-2">:</td>
          <td>{{ $jenazah->nik }}</td>
        </tr>
        <tr>
          <td class="pr-4">Jenis Kelamin</td>
          <td class="px-2">:</td>
          <td>{{ $jenazah->jenis_kelamin }}</td>
        </tr>
        <tr>
          <td class="pr-4">Pekerjaan</td>
          <td class="px-2">:</td>
          <td>{{ $jenazah->pekerjaan }}</td>
        </tr>
        <tr>
          <td class="pr-4">Agama</td>
          <td class="px-2">:</td>
          <td>{{ $jenazah->agama }}</td>
        </tr>
        <tr>
          <td class="pr-4">Alamat</td>
          <td class="px-2">:</td>
          <td>{{ $jenazah->alamat_sekarang }}</td>
        </tr>
      </table>

      <p class="mt-4">Adalah benar telah meninggal dunia :</p>

      <div class="">Tanggal Dikebumikan : {{ $jenazah->tanggal_dimakamkan }}</div>
      <div>Tempat : {{ $jenazah->tempat_dimakamkan }}</div>

      <div class="mt-2">Demikian Surat Keterangan Pemakaman ini diperbuat untuk dipergunakan seperlunya</div>

      <div style="float: right;">
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