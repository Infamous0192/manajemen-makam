@extends('adminlte::page')

@section('title', 'Jenazah')

@section('content_header')
<h1 class="m-0 text-dark">Data Jenazah</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mr-4">Data Jenazah</h3>
                <a href="{{ route('jenazah.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
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
                                <th>Makam</th>
                                <th>Berkas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenazah as $item)
                            <tr>
                                <td>{{ ($loop->index + 1) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->jenis_kelamin == 'laki' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $item->tempat_lahir }}</td>
                                <td>{{ $item->tanggal_lahir }}</td>
                                <td>{{ $item->kewarganegaraan }}</td>
                                <td>{{ $item->makam->nama }}-{{ $item->makam->baris }}{{ $item->makam->kolom }}</td>
                                <td>
                                    <ul style="padding-left: 1rem">
                                        @if ($item->file_ktp)
                                        <li>
                                            <a target="_blank" href="{{ url($item->file_ktp) }}">KTP</a>
                                        </li>
                                        @endif
                                        @if ($item->file_akta)
                                        <li>
                                            <a target="_blank" href="{{ url($item->file_akta) }}">Akta Kematian</a>
                                        </li>
                                        @endif
                                        @if ($item->file_kk)
                                        <li>
                                            <a target="_blank" href="{{ url($item->file_kk) }}">KK</a>
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    <x-action-button :id="$item->id" edit="jenazah.edit" print="jenazah.show"
                                        delete="jenazah.destroy">
                                        <a href="{{ route('pembayaran.create', ['id_jenazah' => $item->id]) }}"
                                            class="btn btn-sm btn-secondary ml-2">Bayar</a>
                                    </x-action-button>
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