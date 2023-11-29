@extends('adminlte::page')

@section('title', 'Pesanan')

@section('content_header')
<h1 class="m-0 text-dark">Data Pesanan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mr-4">Data Pesanan</h3>
                <a href="{{ route('pesanan.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
                <a href="{{ route('pesanan.print') }}" class="btn btn-info btn-sm px-4 ml-2">Print</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Tanggal Konfirmasi</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanan as $item)
                            <tr>
                                <td>{{ ($loop->index + 1) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tanggal_pemesanan }}</td>
                                <td>{{ $item->tanggal_konfirmasi }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <x-action-button :id="$item->id" edit="pesanan.edit" delete="pesanan.destroy" />
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