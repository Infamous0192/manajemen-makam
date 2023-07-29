@extends('adminlte::page')

@section('title', 'Edit Tumpangan')

@section('content_header')
<h1 class="m-0 text-dark">Edit Tumpangan</h1>
@stop

@section('content')
<div class="row">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit Tumpangan
            </div>
            <form action="{{ route('tumpangan.update', $tumpangan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-text-input name="nama_pemohon" :value="$tumpangan->nama_pemohon" label="Nama" placeholder="Masukan Nama" />
                    <x-text-input name="tempat_lahir" :value="$tumpangan->tempat_lahir" label="Tempat Lahir" placeholder="Masukan Tempat Lahir" />
                    <x-text-input type="date" name="tanggal_lahir" :value="$tumpangan->tanggal_lahir" label="Tanggal Lahir"
                        placeholder="Masukan Tanggal Lahir" />
                    <x-text-input name="kewarganegaraan" :value="$tumpangan->kewarganegaraan" label="Kewarganegaraan"
                        placeholder="Masukan Kewarganegaraan" />
                    <x-select name="agama" :value="$tumpangan->agama" label="Agama" placeholder="Pilih Agama" :data="[
                            ['label' => 'Islam', 'value' => 'Islam'],
                            ['label' => 'Kristen', 'value' => 'Kristen'],
                            ['label' => 'Katolik', 'value' => 'Katolik'],
                            ['label' => 'Hindu', 'value' => 'Hindu'],
                            ['label' => 'Buddha', 'value' => 'Buddha'],
                            ['label' => 'Konghuchu', 'value' => 'Konghuchu'],
                            ['label' => 'Lainnya', 'value' => 'Lainnya'],
                        ]" />
                    <x-text-input name="alamat" :value="$tumpangan->alamat" label="Alamat" placeholder="Masukan Alamat" />

                    <x-select name="id_jenazah" :value="$tumpangan->id_jenazah" label="Jenazah" placeholder="Pilih Jenazah" :data="$jenazah" />
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('tumpangan.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop