@extends('adminlte::page')

@section('title', 'Tambah TPU')

@section('content_header')
<h1 class="m-0 text-dark">Tambah TPU</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah TPU
            </div>
            <form action="{{ route('tpu.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-text-input name="nama" label="Nama TPU" placeholder="Masukan Nama TPU" />
                    <x-text-input name="provinsi" label="Provinsi" placeholder="Masukan Provinsi" />
                    <x-text-input name="kabupaten" label="Kabupaten" placeholder="Masukan Kabupaten" />
                    <x-text-input name="kecamatan" label="Kecamatan" placeholder="Masukan Kecamatan" />
                    <x-text-input name="kelurahan" label="Kelurahan" placeholder="Masukan Kelurahan" />
                    <x-text-input name="alamat" label="Alamat" placeholder="Masukan Alamat" />
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('tpu.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop