@extends('adminlte::page')

@section('title', 'Tambah Pemeliharaan')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Pemeliharaan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

        <div class="card-header">
                Tambah Pemeliharaan
            </div>
            <form action="{{ route('pemeliharaan.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-select name="id_pekerja" label="Pekerja" placeholder="Pilih Pekerja" :data="$pekerja" />
                    <x-select name="hari" label="Hari" placeholder="Pilih Hari" :data="[
                            ['label' => 'Senin', 'value' => 'senin'],
                            ['label' => 'Selasa', 'value' => 'selasa'],
                            ['label' => 'Rabu', 'value' => 'rabu'],
                            ['label' => 'Kamis', 'value' => 'kamis'],
                            ['label' => 'Jumat', 'value' => 'jumat'],
                            ['label' => 'Sabtu', 'value' => 'sabtu'],
                            ['label' => 'Minggu', 'value' => 'minggu'],
                        ]" />
                    <x-text-input type="time" name="jam" label="Jam" placeholder="Masukan Jam" />
                    <x-text-input name="tindakan" label="Tindakan" placeholder="Masukan Tindakan" />
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('pemeliharaan.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop