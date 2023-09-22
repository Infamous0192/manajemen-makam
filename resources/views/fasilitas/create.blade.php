@extends('adminlte::page')

@section('title', 'Tambah Fasilitas')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Fasilitas</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah Fasilitas
            </div>
            <form action="{{ route('fasilitas.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-text-input name="nama" label="Nama" placeholder="Masukan Nama Fasilitas" />
                    <x-text-input type="number" name="jumlah" label="Jumlah" placeholder="Masukan Jumlah Fasilitas" />
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('fasilitas.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop