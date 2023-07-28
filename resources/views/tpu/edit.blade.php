@extends('adminlte::page')

@section('title', 'Edit TPU')

@section('content_header')
<h1 class="m-0 text-dark">Edit TPU</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit TPU
            </div>
            <form action="{{ route('tpu.update', $tpu->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <x-text-input name="nama" label="Nama TPU" placeholder="Masukan Nama TPU" :value="$tpu->nama" />
                    <x-text-input name="provinsi" label="Provinsi" placeholder="Masukan Provinsi" :value="$tpu->provinsi" />
                    <x-text-input name="kabupaten" label="Kabupaten" placeholder="Masukan Kabupaten" :value="$tpu->kabupaten" />
                    <x-text-input name="kecamatan" label="Kecamatan" placeholder="Masukan Kecamatan" :value="$tpu->kecamatan" />
                    <x-text-input name="kelurahan" label="Kelurahan" placeholder="Masukan Kelurahan" :value="$tpu->kelurahan" />
                    <x-text-input name="alamat" label="Alamat" placeholder="Masukan Alamat" :value="$tpu->alamat" />
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