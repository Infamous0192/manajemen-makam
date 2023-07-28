@extends('adminlte::page')

@section('title', 'Edit Pesanan')

@section('content_header')
<h1 class="m-0 text-dark">Edit Pesanan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit Pesanan
            </div>
            <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-text-input name="nama" :value="$pesanan->nama" label="Nama Pemesan"
                        placeholder="Masukan Nama Pemesan" />
                    <x-text-input type="date" name="tanggal_pemesanan" :value="$pesanan->tanggal_pemesanan"
                        label="Tanggal Pemesanan" placeholder="Masukan Tanggal Pemesanan" />
                    <x-text-input type="date" name="tanggal_konfirmasi" :value="$pesanan->tanggal_konfirmasi"
                        label="Tanggal Konfirmasi" placeholder="Masukan Tanggal Konfirmasi" />
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('pesanan.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop