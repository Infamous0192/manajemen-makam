@extends('adminlte::page')

@section('title', 'Tambah Pengeluaran')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Pengeluaran</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah Pengeluaran
            </div>
            <form action="{{ route('pengeluaran.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-text-input name="jenis" label="Jenis Pengeluaran" placeholder="Masukan Jenis Pengeluaran" />
                    <x-text-input type="number" name="jumlah" label="Nominal" placeholder="Masukan Nominal" />
                    <x-text-input type="date" name="tanggal" label="Tanggal" placeholder="Masukan Tanggal" />
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('keuangan.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop