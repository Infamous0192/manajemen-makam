@extends('adminlte::page')

@section('title', 'Tambah Blok Makam')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Blok Makam</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah Blok Makam
            </div>
            <form action="{{ route('makam.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-text-input name="nama" label="Nama Blok" placeholder="Masukan Nama Blok" />
                    <x-text-input type="number" name="baris" label="Baris" placeholder="Masukan Baris" />
                    <x-text-input type="number" name="kolom" label="Kolom" placeholder="Masukan Kolom" />
                    <x-select name="id_tpu" label="TPU" placeholder="Pilih TPU" :data="$tpu" />
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('makam.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop