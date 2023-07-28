@extends('adminlte::page')

@section('title', 'Jenazah Tidak Dikenal')

@section('content_header')
<h1 class="m-0 text-dark">Data Jenazah Tidak Dikenal</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mr-4">Data Jenazah Tidak Dikenal</h3>
                <a href="{{ route('jenazah-kenal.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Ditemukan</th>
                                <th>Tanggal Ditemukan</th>
                                <th>Kewarganegaraan</th>
                                <th>Makam</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenazahKenal as $item)
                            <tr>
                                <td>{{ ($loop->index + 1) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_kelamin == 'laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $item->tempat_ditemukan }}</td>
                                <td>{{ $item->tanggal_ditemukan }}</td>
                                <td>{{ $item->kewarganegaraan }}</td>
                                <td>{{ $item->makam->nama }}</td>
                                <td>
                                    <x-action-button :id="$item->id" edit="jenazah-kenal.edit"
                                        delete="jenazah-kenal.destroy" />
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