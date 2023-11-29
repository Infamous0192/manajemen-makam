@extends('adminlte::page')

@section('title', 'Tumpangan')

@section('content_header')
<h1 class="m-0 text-dark">Data Tumpangan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mr-4">Data Tumpangan</h3>
                <a href="{{ route('tumpangan.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
                <a href="{{ route('tumpangan.print') }}" class="btn btn-info btn-sm px-4 ml-2">Print</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pemohon</th>
                                <th>Alamat</th>
                                <th>Identitas Jenazah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tumpangan as $item)
                            <tr>
                                <td>{{ ($loop->index + 1) }}</td>
                                <td>{{ $item->nama_pemohon }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->jenazah->nama }}</td>
                                <td>
                                    <x-action-button :id="$item->id" edit="tumpangan.edit" print="tumpangan.show" delete="tumpangan.destroy" />
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