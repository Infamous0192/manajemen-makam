@extends('adminlte::page')

@section('title', 'Pewaris')

@section('content_header')
<h1 class="m-0 text-dark">Data Pewaris</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mr-4">Data Pewaris</h3>
                <a href="{{ route('pewaris.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Kewarganegaraan</th>
                                <th>Nama Mendiang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pewaris as $item)
                            <tr>
                                <td>{{ ($loop->index + 1) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->jenis_kelamin == 'laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $item->tempat_lahir }}</td>
                                <td>{{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->kewarganegaraan }}</td>
                                <td>{{ $item->mendiang->nama }}</td>
                                <td>
                                    <x-action-button :id="$item->id" edit="pewaris.edit" print="pewaris.show" delete="pewaris.destroy"></x-action-button>
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