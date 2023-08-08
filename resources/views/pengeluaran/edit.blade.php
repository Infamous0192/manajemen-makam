@extends('adminlte::page')

@section('title', 'Edit Pengeluaran')

@section('content_header')
<h1 class="m-0 text-dark">Edit Pengeluaran</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit Pengeluaran
            </div>
            <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-text-input :value="$pengeluaran->jenis" name="jenis" label="Jenis Pengeluaran"
                        placeholder="Masukan Jenis Pengeluaran" />
                    <x-text-input :value="$pengeluaran->jumlah" type="number" name="jumlah" label="Nominal"
                        placeholder="Masukan Nominal" />
                    <x-text-input :value="$pengeluaran->tanggal" type="date" name="tanggal" label="Tanggal"
                        placeholder="Masukan Tanggal" />
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