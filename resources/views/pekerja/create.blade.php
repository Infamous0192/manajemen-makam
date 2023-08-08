@extends('adminlte::page')

@section('title', 'Tambah Pekerja')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Pekerja</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah Pekerja
            </div>
            <form action="{{ route('pekerja.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-text-input name="nama" label="Nama Pekerja" placeholder="Masukan Nama Pekerja" />
                    <x-text-input name="tempat_lahir" label="Tempat Lahir" placeholder="Masukan Tempat Lahir" />
                    <x-text-input type="date" name="tanggal_lahir" label="Tanggal Lahir"
                        placeholder="Masukan Tanggal Lahir" />
                    <x-select name="jenis_kelamin" label="Jenis Kelamin" placeholder="Pilih Jenis Kelamin" :data="[
                        ['label' => 'Laki-laki', 'value' => 'laki'],
                        ['label' => 'Perempuan', 'value' => 'perempuan']
                        ]" />
                    <x-text-input name="bagian" label="Bagian" placeholder="Masukan Bagian" />
                    <x-text-input name="alamat" label="Alamat" placeholder="Masukan Alamat" />
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('pekerja.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop