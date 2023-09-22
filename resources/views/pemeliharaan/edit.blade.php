@extends('adminlte::page')

@section('title', 'Edit Pemeliharaan')

@section('content_header')
<h1 class="m-0 text-dark">Edit Pemeliharaan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit Pemeliharaan
            </div>
            <form action="{{ route('pemeliharaan.update', $pemeliharaan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-select name="id_pekerja" label="Pekerja" placeholder="Pilih Pekerja" :value="$pemeliharaan->id_pekerja" :data="$pekerja" />
                    <x-select name="hari" label="Hari" placeholder="Pilih Hari" :data="[
                            ['label' => 'Senin', 'value' => 'senin'],
                            ['label' => 'Selasa', 'value' => 'selasa'],
                            ['label' => 'Rabu', 'value' => 'rabu'],
                            ['label' => 'Kamis', 'value' => 'kamis'],
                            ['label' => 'Jumat', 'value' => 'jumat'],
                            ['label' => 'Sabtu', 'value' => 'sabtu'],
                            ['label' => 'Minggu', 'value' => 'minggu'],
                        ]" :value="$pemeliharaan->hari" />
                    <x-text-input type="time" name="jam" label="Jam" placeholder="Masukan Jam" :value="$pemeliharaan->jam" />
                    <x-text-input name="tindakan" label="Tindakan" placeholder="Masukan Tindakan" :value="$pemeliharaan->tindakan" />
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