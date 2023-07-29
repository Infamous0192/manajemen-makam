@extends('adminlte::page')

@section('title', 'Tambah Pewaris')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Pewaris</h1>
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
                Tambah Pewaris
            </div>
            <form action="{{ route('pewaris.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-text-input name="nama" label="Nama" placeholder="Masukan Nama" />
                    <x-text-input name="nik" label="NIK" placeholder="Masukan NIK" />
                    <x-text-input name="tempat_lahir" label="Tempat Lahir" placeholder="Masukan Tempat Lahir" />
                    <x-text-input type="date" name="tanggal_lahir" label="Tanggal Lahir"
                        placeholder="Masukan Tanggal Lahir" />
                    <x-select name="jenis_kelamin" label="Jenis Kelamin" placeholder="Pilih Jenis Kelamin" :data="[
                        ['label' => 'Laki-laki', 'value' => 'laki'],
                        ['label' => 'Perempuan', 'value' => 'perempuan']
                    ]" />
                    <x-text-input name="no_hp" label="No HP" placeholder="Masukan No HP" />
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
                    <x-text-input name="alamat" label="Alamat" placeholder="Masukan Alamat" />

                    <x-select name="id_mendiang" label="Mendiang" placeholder="Pilih Mendiang" :data="$mendiang" />
                    <x-select name="status_waris" label="Hubungan Dengan Mendiang"
                        placeholder="Pilih Hubungan Dengan Mendiang" :data="[
                        ['label' => 'Ayah', 'value' => 'ayah'],
                        ['label' => 'Ibu', 'value' => 'ibu'],
                        ['label' => 'Anak', 'value' => 'anak'],
                        ['label' => 'Kerabat Ayah', 'value' => 'paman'],
                        ['label' => 'Kerabat Ibu', 'value' => 'bibi'],
                    ]" />
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('pewaris.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop