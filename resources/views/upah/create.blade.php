@extends('adminlte::page')

@section('title', 'Tambah Upah')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Upah</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah Upah
            </div>
            <form action="{{ route('upah.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-select name="id_pekerja" label="Pekerja" placeholder="Pilih Nama Pekerja" :data="$pekerja"
                        :value="Request::get('id_pekerja')" />
                    <x-select name="jenis" label="Jenis Upah" placeholder="Pilih Jenis Upah" :data="[
                        ['label' => 'Gaji Karyawan', 'value' => 'Gaji Karyawan'],
                        ['label' => 'Upah Penggali', 'value' => 'Upah Penggali'],
                        ['label' => 'Upah Perawatan', 'value' => 'Upah Perawatan'],
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
        $('#jenis').change(() => recalculate())

        function recalculate() {
            let jumlah = 0
            
            const jenis = $("#jenis").val()

            if (jenis == 'Gaji Karyawan') {
                jumlah = 2800000
            } else if (jenis == 'Upah Penggali') {
                jumlah = 800000
            } else if (jenis == 'Upah Perawatan') {
                jumlah = 350000
            }

            $('#jumlah').val(jumlah)
        }
    });
</script>
@endpush