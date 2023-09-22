@extends('adminlte::page')

@section('title', 'Edit Fasilitas')

@section('content_header')
<h1 class="m-0 text-dark">Edit Fasilitas</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit Fasilitas
            </div>
            <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-text-input name="nama" label="Nama" placeholder="Masukan Nama Fasilitas"
                        :value="$fasilitas->nama" />
                    <x-text-input type="number" name="jumlah" label="Jumlah" placeholder="Masukan Jumlah Fasilitas"
                        :value="$fasilitas->jumlah" />
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