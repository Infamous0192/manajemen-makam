@extends('adminlte::page')

@section('title', 'Pemakaman | mampu')
@section('plugins.Datatables',true)

@section('content_header')
<h1 class="m-0 text-dark">Data Jenazah</h1>
@stop

@section('content')
<div style="overflow: scroll">
    <div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Data Kurang Mampu</h3>
                <a href="{{ route('mampu.create') }}" class="btn btn-success btn-md float-right">Tambah Data</a>
            </div>
            <div class="card-body" style="overflow: scroll">
                <table class="table table-bordered" id="tablemampu">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat KTP</th>
                            <th>Alamat Sekarang</th>
                            <th>Kelurahan</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Provinsi</th>
                            <th>Kewarganegaraan</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Agama</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Status Pernikahan</th>
                            <th>Status Tinggal</th>
                            <th>Tangal Meninggal Dunia</th>
                            <th>Tanggal Dimakamkan</th>
                            <th>Tempat Dimakamkan</th>
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
        var dataTable = $("#tablemampu").DataTable({
            processing:true,
            serverSide:true,
            autoWidth:true,
            stateSave:true,
            responsive: true,
            "order": [
                [0, 'desc']
            ],
            ajax: '{{route('get.mampu')}}',
            columns:[
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable:false,
                },
                {
                    data: 'nik',
                    name: 'nik',
                },
                {
                    data: 'nama_lengkap',
                    name: 'nama_lengkap',
                },
                {
                    data: 'tempat_lahir',
                    name: 'tempat_lahir',
                },
                {
                    data: 'tanggal_lahir',
                    name: 'tanggal_lahir',
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin',
                },
                {
                    data: 'alamat_ktp',
                    name: 'alamat_ktp',
                },
                {
                    data: 'alamat_now',
                    name: 'alamat_now',
                },
                {
                    data: 'desa',
                    name: 'desa',
                },
                {
                    data: 'kecamatan',
                    name: 'kecamatan',
                },
                {
                    data: 'kota',
                    name: 'kota',
                },
                {
                    data: 'provinsi',
                    name: 'provinsi',
                },
                {
                    data: 'negara',
                    name: 'negara',
                },
                {
                    data: 'rt',
                    name: 'rt',
                },
                {
                    data: 'rw',
                    name: 'rw',
                },
                {
                    data: 'agama',
                    name: 'agama',
                },
                {
                    data: 'pendidikan',
                    name: 'pendidikan',
                },
                {
                    data: 'pekerjaan',
                    name: 'pekerjaan',
                },
                {
                    data: 'kawin',
                    name: 'kawin',
                },
                {
                    data: 'tinggal',
                    name: 'tinggal'
                },
                {
                    data: 'tanggal_meninggal',
                    name: 'tanggal_meninggal',
                },
                {
                    data: 'tanggal_dimakamkan',
                    name: 'tanggal_dimakamkan'
                },
                {
                    data: 'tempat_dimakamkan',
                    name: 'tempat_dimakamkan'
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