@extends('adminlte::page')

@section('title', 'Edit Upah')

@section('content_header')
<h1 class="m-0 text-dark">Edit Upah</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit Upah
            </div>
            <form action="{{ route('upah.update', $upah->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-select name="id_pekerja" label="Pekerja" placeholder="Pilih Nama Pekerja" :data="$pekerja"
                        :value="$upah->id_pekerja" />
                    <x-select name="jenis" label="Jenis Upah" :value="$upah->jenis" va placeholder="Pilih Jenis Upah" :data="[
                        ['label' => 'Gaji Karyawan', 'value' => 'Gaji Karyawan'],
                        ['label' => 'Upah Penggali', 'value' => 'Upah Penggali'],
                        ['label' => 'Upah Perawatan', 'value' => 'Upah Perawatan'],
                    ]" />
                    <x-text-input type="number" readonly name="jumlah" :value="$upah->jumlah" label="Jumlah" placeholder="Masukan Jumlah" />
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