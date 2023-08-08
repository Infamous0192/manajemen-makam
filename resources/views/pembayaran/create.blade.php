@extends('adminlte::page')

@section('title', 'Tambah Pembayaran')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Pembayaran</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah Pembayaran
            </div>
            <form action="{{ route('pembayaran.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-select name="id_jenazah" label="Mendiang" 
                        placeholder="Pilih Nama Mendiang" :data="$jenazah" :value="Request::get('id_jenazah')" />
                    <x-text-input name="nama" label="Nama Pembayar" placeholder="Masukan Nama Pembayar" />
                    <x-select name="jenis" label="Jenis Pembayaran" placeholder="Masukan Jenis Pembayaran" :data="[
                        ['label' => 'Baru', 'value' => 'baru'],
                        ['label' => 'Perpanjangan', 'value' => 'perpanjangan'],
                    ]" />
                    <x-text-input type="number" readonly name="jumlah" label="Jumlah" placeholder="Masukan Jumlah" />
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

@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        $("#jenis").change((e) => {
            if (e.target.value == 'baru') {
                return $('#jumlah').val('250000')
            }
            if (e.target.value == 'perpanjangan') {
                return $('#jumlah').val('100000')
            }

            return $('#jumlah').val('')
        })
    });
</script>
@endpush