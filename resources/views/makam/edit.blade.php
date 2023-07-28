@extends('adminlte::page')

@section('title', 'Edit Blok Makam')

@section('content_header')
<h1 class="m-0 text-dark">Edit Blok Makam</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit Blok Makam
            </div>
            <form action="{{ route('makam.update', $makam->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-text-input name="nama" label="Nama Blok" placeholder="Masukan Nama Blok" :value="$makam->nama" />
                    <x-text-input type="number" name="baris" label="Baris" placeholder="Masukan Baris" :value="$makam->baris" />
                    <x-text-input type="number" name="kolom" label="Kolom" placeholder="Masukan Kolom" :value="$makam->kolom" />
                    <x-select name="id_tpu" label="TPU" placeholder="Pilih TPU" :data="$tpu" :value="$makam->id_tpu" />
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