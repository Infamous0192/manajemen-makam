@extends('adminlte::page')

@section('title', 'Pemakaman | mampu')
@section('plugins.Datatables',true)

@section('content_header')
<h1 class="m-0 text-dark">Data Jenazah</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered table-hover dataTable dtr-inline" id="tablemampu">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>4123234</td>
                                <td>Ujang</td>
                                <td>Suaraef</td>
                                <td>afefefef</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<script type="text/javascript">
    $(document).ready(function(){
        var dataTable = $("#tablemampu").DataTable();
    });
</script>
@endpush