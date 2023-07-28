@extends('adminlte::page')

@section('title', 'Edit Jenazah Tidak Dikenal')

@section('content_header')
<h1 class="m-0 text-dark">Edit Jenazah Tidak Dikenal</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit Jenazah Tidak Dikenal
            </div>
            <form action="{{ route('jenazah-kenal.update', $jenazahKenal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-text-input name="nama" :value="$jenazahKenal->nama" label="Nama" placeholder="Masukan Nama" />
                    <x-select name="jenis_kelamin" :value="$jenazahKenal->jenis_kelamin" label="Jenis Kelamin" placeholder="Pilih Jenis Kelamin" :data="[
                        ['label' => 'Laki-laki', 'value' => 'laki'],
                        ['label' => 'Perempuan', 'value' => 'perempuan']
                    ]" />
                    <x-text-input name="kewarganegaraan" :value="$jenazahKenal->kewarganegaraan" label="Kewarganegaraan"
                        placeholder="Masukan Kewarganegaraan" />
                    <x-text-input name="tempat_ditemukan" :value="$jenazahKenal->tempat_ditemukan" label="Tempat Ditemukan"
                        placeholder="Masukan Tempat Ditemukan" />
                    <x-text-input type="date" name="tanggal_ditemukan" :value="$jenazahKenal->tanggal_ditemukan" label="Tanggal Ditemukan"
                        placeholder="Masukan Tanggal Ditemukan" />
                    <x-text-input name="provinsi" label="Provinsi" :value="$jenazahKenal->provinsi" placeholder="Masukan Provinsi" />
                    <x-text-input name="kabupaten" label="Kabupaten" :value="$jenazahKenal->kabupaten" placeholder="Masukan Kabupaten" />
                    <x-text-input name="kecamatan" label="Kecamatan" :value="$jenazahKenal->kecamatan" placeholder="Masukan Kecamatan" />
                    <x-text-input name="kelurahan" label="Kelurahan" :value="$jenazahKenal->kelurahan" placeholder="Masukan Kelurahan" />
                    <x-text-input type="number" name="rt" label="RT" :value="$jenazahKenal->rt" placeholder="Masukan RT" />
                    <x-text-input type="number" name="rw" label="RW" :value="$jenazahKenal->rw" placeholder="Masukan RW" />
                    <x-select name="id_makam" label="Makam" placeholder="Pilih Makam" :value="$jenazahKenal->id_makam" :data="$makam" />
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('jenazah-kenal.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop