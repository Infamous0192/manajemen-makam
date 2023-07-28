@extends('adminlte::page')

@section('title', 'Tambah Pesanan')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Pesanan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah Pesanan
            </div>
            <form action="{{ route('pesanan.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-text-input name="nama" label="Nama Pemesan" placeholder="Masukan Nama Pemesan" />
                    <x-text-input type="date" name="tanggal_pemesanan" label="Tanggal Pemesanan"
                        placeholder="Masukan Tanggal Pemesanan" />
                    <x-text-input type="date" name="tanggal_konfirmasi" label="Tanggal Konfirmasi"
                        placeholder="Masukan Tanggal Konfirmasi" />
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