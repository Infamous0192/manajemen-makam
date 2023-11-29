@extends('adminlte::page')

@section('title', 'Upah')

@section('content_header')
<h1 class="m-0 text-dark">Data Upah</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mr-4">Data Upah</h3>
                <a href="{{ route('upah.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
                <a href="{{ route('upah.print') }}" class="btn btn-info btn-sm px-4 ml-2">Print</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pekerja</th>
                                <th>Jenis</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($upah as $item)
                            <tr>
                                <td>{{ ($loop->index + 1) }}</td>
                                <td>{{ $item->pekerja->nama }}</td>
                                <td>{{ $item->jenis }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    <x-action-button :id="$item->id" edit="upah.edit" delete="upah.destroy" />
                                </td>
                            </tr>
                            @endforeach
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
        $("#table1").DataTable();
    });
</script>
@endpush