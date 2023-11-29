@extends('adminlte::page')

@section('title', 'Pekerja')

@section('content_header')
<h1 class="m-0 text-dark">Data Pekerja</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mr-4">Data Pekerja</h3>
                <a href="{{ route('pekerja.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
                <a href="{{ route('pekerja.print') }}" class="btn btn-info btn-sm px-4 ml-2">Print</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>Bagian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pekerja as $item)
                            <tr>
                                <td>{{ ($loop->index + 1) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <span>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</span>
                                </td>
                                <td>{{ $item->jenis_kelamin == 'laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $item->bagian }}</td>
                                <td>
                                    <x-action-button :id="$item->id" edit="pekerja.edit" delete="pekerja.destroy" />
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