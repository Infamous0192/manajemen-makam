@extends('adminlte::page')

@section('title', 'Pembayaran')

@section('content_header')
<h1 class="m-0 text-dark">Data Pembayaran</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mr-4">Data Pembayaran</h3>
                <a href="{{ route('pembayaran.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pembayar</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jumlah</th>
                                <th>Jenis Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pembayaran as $item)
                            <tr>
                                <td>{{ ($loop->index + 1) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td style="text-transform: capitalize">{{ $item->jenis }}</td>
                                <td>
                                    <x-action-button :id="$item->id" edit="pembayaran.edit"
                                        delete="pembayaran.destroy" />
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