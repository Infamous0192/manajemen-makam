@extends('adminlte::page')

@section('title', 'Pemakaman | kenal')
@section('plugins.Datatables',true)

@section('content_header')
<h1 class="m-0 mb-2 text-dark">Data Jenazah</h1>
@stop

@section('content')
<div class="row" style="overflow: scroll">
    <div class="col-20">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>Data Tidak Dikenal</strong></h3>
                <a href="{{ route('kenal.create') }}" class="btn btn-success btn-md float-right">Tambah Data</a>
            </div>
            <div class="card-body" style="overflow: scroll">
                <table class="table table-bordered" id="tablekenal">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Jenazah</th>
                            <th>Jenis Kelamin</th>
                            <th>Lokasi Ditemukan</th>
                            <th>Tanggal Ditemukan</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Provinsi</th>
                            <th>Kewarganegaraan</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th> Aksi</th>
                        </tr>
                    </thead>
                </table>


            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        var dataTable = $("#tablekenal").DataTable({
            processing:true,
            serverSide:true,
            autoWidth:true,
            stateSave:true,

            "order": [
                [0, 'desc']
            ],
            ajax: '{{route('get.kenal')}}',
            columns:[
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable:false,
                },
                {
                    data: 'nama_jenazah',
                    name: 'nama_jenazah',
                },
                {
                    data: 'kelamin',
                    name: 'kelamin',
                },
                {
                    data: 'alamat_temu',
                    name: 'alamat_temu',
                },
                {
                    data: 'tanggal_temu',
                    name: 'tanggal_temu',
                },
                {
                    data: 'desa_temu',
                    name: 'desa_temu',
                },
                {
                    data: 'kabupaten_temu',
                    name: 'kabupaten_temu',
                },
                {
                    data: 'provinsi_temu',
                    name: 'provinsi_temu',
                },
                {
                    data: 'negara_temu',
                    name: 'negara_temu',
                },
                {
                    data: 'rt_temu',
                    name: 'rt_temu',
                },
                {
                    data: 'rw_temu',
                    name: 'rw_temu'
                },
                {
                    data:'aksi',
                    name:'aksi',
                    orderable: false,
                    searchable:false,
                    'sClass': 'text-center'
                }

            ]
        });

    });
</script>
@endpush