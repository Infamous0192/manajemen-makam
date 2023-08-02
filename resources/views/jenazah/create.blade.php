@extends('adminlte::page')

@section('title', 'Tambah Jenazah')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Jenazah</h1>
@stop

@section('content')
<div class="row">
    {{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah Jenazah
            </div>
            <form action="{{ route('jenazah.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-select name="id_pesanan" label="Pemesan" placeholder="Pilih Pemesan" :data="$pesanan" />

                    <x-text-input name="nik" label="NIK" placeholder="Masukan Nik" />
                    <x-text-input name="tempat_lahir" label="Tempat Lahir" placeholder="Masukan Tempat Lahir" />
                    <x-text-input type="date" name="tanggal_lahir" label="Tanggal Lahir"
                        placeholder="Masukan Tanggal Lahir" />
                    <x-select name="status_kawin" label="Status Kawin" placeholder="Pilih Status Kawin" :data="[
                        ['label' => 'Belum Menikah', 'value' => '0'],
                        ['label' => 'Sudah Menikah', 'value' => '1']
                    ]" />
                    <x-select name="jenis_kelamin" label="Jenis Kelamin" placeholder="Pilih Jenis Kelamin" :data="[
                        ['label' => 'Laki-laki', 'value' => 'laki'],
                        ['label' => 'Perempuan', 'value' => 'perempuan']
                    ]" />
                    <x-text-input name="kewarganegaraan" label="Kewarganegaraan"
                        placeholder="Masukan Kewarganegaraan" />
                    <x-select name="agama" label="Agama" placeholder="Pilih Agama" :data="[
                            ['label' => 'Islam', 'value' => 'Islam'],
                            ['label' => 'Kristen', 'value' => 'Kristen'],
                            ['label' => 'Katolik', 'value' => 'Katolik'],
                            ['label' => 'Hindu', 'value' => 'Hindu'],
                            ['label' => 'Buddha', 'value' => 'Buddha'],
                            ['label' => 'Konghuchu', 'value' => 'Konghuchu'],
                            ['label' => 'Lainnya', 'value' => 'Lainnya'],
                        ]" />
                    <x-select name="pendidikan" label="Pendidikan Terakhir" placeholder="Pilih Pendidikan Terakhir"
                        :data="[
                            ['label' => 'SD', 'value' => 'SD'],
                            ['label' => 'SMP', 'value' => 'SMP'],
                            ['label' => 'SMA', 'value' => 'SMA'],
                            ['label' => 'S1', 'value' => 'S1'],
                            ['label' => 'S2', 'value' => 'S2'],
                            ['label' => 'S3', 'value' => 'S3'],
                        ]" />
                    <x-text-input name="pekerjaan" label="Pekerjaan" placeholder="Masukan Pekerjaan" />
                    <x-text-input name="provinsi" label="Provinsi" placeholder="Masukan Provinsi" />
                    <x-text-input name="kabupaten" label="Kabupaten" placeholder="Masukan Kabupaten" />
                    <x-text-input name="kecamatan" label="Kecamatan" placeholder="Masukan Kecamatan" />
                    <x-text-input name="kelurahan" label="Kelurahan" placeholder="Masukan Kelurahan" />
                    <x-text-input type="number" name="rt" label="RT" placeholder="Masukan RT" />
                    <x-text-input type="number" name="rw" label="RW" placeholder="Masukan RW" />
                    <x-text-input name="alamat_sekarang" label="Alamat Sekarang"
                        placeholder="Masukan Alamat Sekarang" />
                    <x-text-input name="alamat_ktp" label="Alamat KTP" placeholder="Masukan Alamat KTP" />
                    <x-select name="status_tinggal" label="Status Tinggal" placeholder="Pilih Status Tinggal" :data="[
                        ['label' => 'Tetap', 'value' => 'tetap'],
                        ['label' => 'Kontrak', 'value' => 'kontrak']
                    ]" />
                    <x-text-input type="date" name="tanggal_meninggal" label="Tanggal Meninggal"
                        placeholder="Masukan Tanggal Meninggal" />
                    <x-text-input type="date" name="tanggal_makam" label="Tanggal Dimakamkan"
                        placeholder="Masukan Tanggal Dimakamkan" />
                    <x-select name="id_makam" label="Makam" placeholder="Pilih Makam" :data="$makam" />
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('jenazah.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop