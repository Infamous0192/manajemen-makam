@extends('adminlte::page')

@section('title', 'Edit Pembayaran')

@section('content_header')
<h1 class="m-0 text-dark">Edit Pembayaran</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit Pembayaran
            </div>
            <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-select name="id_jenazah" :value="$pembayaran->id_jenazah" label="Mendiang"
                        placeholder="Pilih Nama Mendiang" :data="$jenazah" />
                    <x-text-input name="nama" :value="$pembayaran->nama" label="Nama Pembayar"
                        placeholder="Masukan Nama Pembayar" />
                    <x-select name="jenis" :value="$pembayaran->jenis" label="Jenis Pembayaran"
                        placeholder="Masukan Jenis Pembayaran" :data="[
                        ['label' => 'Baru', 'value' => 'baru'],
                        ['label' => 'Perpanjangan', 'value' => 'perpanjangan'],
                    ]" />
                    <x-select name="domisili" :value="$pembayaran->domisili" label="Domisili"
                        placeholder="Pilih Domisili" :data="[
                        ['label' => 'Banjarmasin', 'value' => '0'],
                        ['label' => 'Luar Banjarmasin', 'value' => '1'],
                    ]" />
                    <x-select name="jasa_gali" :value="$pembayaran->jasa_gali" label="Jasa Penggali"
                        placeholder="Pilih Jasa Penggali" :data="[
                        ['label' => 'Ya', 'value' => '1'],
                        ['label' => 'Tidak', 'value' => '0'],
                    ]" />
                    <x-select name="jasa_rawat" :value="$pembayaran->jasa_rawat" label="Jasa Perawatan"
                        placeholder="Pilih Jasa Perawatan" :data="[
                        ['label' => 'Ya', 'value' => '1'],
                        ['label' => 'Tidak', 'value' => '0'],
                    ]" />
                    <x-text-input type="number" readonly name="jumlah" :value="$pembayaran->jumlah" label="Jumlah"
                        placeholder="Masukan Jumlah" />
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
        $('#jenis').change(() => recalculate())
        $('#domisili').change(() => recalculate())
        $('#jasa_gali').change(() => recalculate())
        $('#jasa_rawat').change(() => recalculate())

        function recalculate() {
            let jumlah = 0
            
            const jenis = $("#jenis").val()
            const domisili = $("#domisili").val()
            const gali = $('#jasa_gali').val()
            const rawat = $('#jasa_rawat').val()

            if (jenis == 'baru') {
                if (domisili == '0') {
                    jumlah += 5000000
                }
                if (domisili == '1') {
                    jumlah += 7000000
                }
                $('#jasa_gali').removeAttr('disabled')

                if (gali == '1') {
                    jumlah += 1000000
                }
            }

            if (jenis == 'perpanjangan') {
                jumlah += 350000
                $('#jasa_gali').val('')
                $('#jasa_gali').attr('disabled', 'true')
            }

            if (rawat == '1') {
                jumlah += 250000
            }

            $('#jumlah').val(jumlah)
        }
    });
</script>
@endpush