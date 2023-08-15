@extends('adminlte::page')

@section('title', 'TPU')

@section('content_header')
<h1 class="m-0 text-dark">Data TPU</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mr-4">Data TPU</h3>
                <a href="{{ route('tpu.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
                <a href="{{ route('tpu.print') }}" class="btn btn-info btn-sm px-4 ml-2">Print</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Ditambahkan Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tpu as $item)
                            <tr>
                                <td>{{ ($loop->index + 1) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <x-action-button :id="$item->id" edit="tpu.edit" delete="tpu.destroy" />
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
        $("#table1").DataTable(
            {
                dom: "Bfrtip",
                buttons: [{
                        extend: "pdf",
                        orientation: 'landscape',
                        title: "Data TPU",
                        download: "open",
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                            modifier: {
                                selected: null,
                            },
                        },
                        className: "btn btn-primary",
                        customize: function(doc) {
                            doc.content[1].table.widths =
                                Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                        }
                    },
                    {
                        extend: "print",
                        title: "Data TPU",
                        orientation: "potrait",
                        exportOptions: {
                            columns: [0, 1, 2, 3],
                            modifier: {
                                selected: null,
                            },
                        },
                        pageSize: "Legal",
                        className: "btn btn-primary",
                    },
                ]
            }
        );
    });
</script>
@endpush