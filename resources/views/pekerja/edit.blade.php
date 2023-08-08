@extends('adminlte::page')

@section('title', 'Edit Pekerja')

@section('content_header')
<h1 class="m-0 text-dark">Edit Pekerja</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit Pekerja
            </div>
            <form action="{{ route('pekerja.update', $pekerja->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <x-text-input :value="$pekerja->nama" name="nama" label="Nama Pekerja" placeholder="Masukan Nama Pekerja" />
                    <x-text-input :value="$pekerja->tempat_lahir" name="tempat_lahir" label="Tempat Lahir" placeholder="Masukan Tempat Lahir" />
                    <x-text-input :value="$pekerja->tanggal_lahir" type="date" name="tanggal_lahir" label="Tanggal Lahir"
                        placeholder="Masukan Tanggal Lahir" />
                    <x-select :value="$pekerja->jenis_kelamin" name="jenis_kelamin" label="Jenis Kelamin" placeholder="Pilih Jenis Kelamin" :data="[
                        ['label' => 'Laki-laki', 'value' => 'laki'],
                        ['label' => 'Perempuan', 'value' => 'perempuan']
                        ]" />
                    <x-text-input :value="$pekerja->bagian" name="bagian" label="Bagian" placeholder="Masukan Bagian" />
                    <x-text-input :value="$pekerja->alamat" name="alamat" label="Alamat" placeholder="Masukan Alamat" />
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