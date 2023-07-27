@extends('adminlte::page')

@section('title', 'Pemakaman | waris')
@section('plugins.Datatables',true)

@section('content_header')
<h1 class="m-0 text-dark">Data Ahli Wahis</h1>
@stop

@section('content')
<div class="row" style="overflow: scroll">
    <div class="col-20">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>Data Ahli Waris</strong></h3>
                <a href="{{ route('waris.create') }}" class="btn btn-success btn-md float-right">Tambah Data</a>
            </div>
            <div class="card-body" style="overflow: scroll">
                <table class="table table-bordered" id="tablewaris">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Mendiang</th>
                            <th>Hubungan Dengan Mending</th>
                            <th>Nik</th>
                            <th>Nama Ahli Waris</th>
                            <th>Tempat Lahir </th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Provinsi</th>
                            <th>Agama</th>
                            <th>Kewarganegaraan</th>
                            <th>Pekerjaan</th>
                            <th>No Telpon</th>
                            <th>Aksi</th>
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
        var dataTable = $("#tablewaris").DataTable({
            processing:true,
            serverSide:true,
            autoWidth:true,
            stateSave:true,

            "order": [
                [0, 'desc']
            ],
            ajax: '{{route('get.waris')}}',
            columns:[
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable:false,
                },
                {
                    data: 'mampu.nama_lengkap',
                    name: 'mampu.nama_lengkap',
                },
                {
                    data: 'status_waris',
                    name: 'status_waris',
                },
                {
                    data: 'nik_waris',
                    name: 'nik_waris',
                },
                {
                    data: 'nama_waris',
                    name: 'nama_waris',
                },
                {
                    data: 'tempat_waris',
                    name: 'tempat_waris',
                },
                {
                    data: 'tanggal_waris',
                    name: 'tanggal_waris',
                },
                {
                    data: 'kelamin',
                    name: 'kelamin',
                },
                {
                    data: 'kecamatan',
                    name: 'kecamatan',
                },
                {
                    data: 'kabupaten',
                    name: 'kabupaten',
                },
                {
                    data: 'provinsi',
                    name: 'provinsi',
                },
                {
                    data: 'agama',
                    name: 'agama',
                },
                {
                    data: 'negara',
                    name: 'negara',
                },
                {
                    data: 'pekerjaan',
                    name: 'pekerjaan',
                },
                {
                    data: 'no_hp',
                    name: 'no_hp',
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