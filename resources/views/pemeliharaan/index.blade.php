@extends('adminlte::page')

@section('title', 'Pemeliharaan')

@section('content_header')
<h1 class="m-0 text-dark">Data Pemeliharaan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mr-4">Data Pemeliharaan</h3>
                <a href="{{ route('pemeliharaan.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
                <a href="{{ route('pemeliharaan.print') }}" class="btn btn-info btn-sm px-4 ml-2">Print</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th>Pekerja</th>
                                <th>Tindakan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemeliharaan as $item)
                            <tr>
                                <td>{{ ($loop->index + 1) }}</td>
                                <td style="text-transform: capitalize">{{ $item->hari }}</td>
                                <td>{{ $item->jam }}</td>
                                <td>{{ $item->pekerja->nama }}</td>
                                <td>{{ $item->tindakan }}</td>
                                <td>
                                    <x-action-button :id="$item->id" edit="pemeliharaan.edit"
                                        delete="pemeliharaan.destroy" />
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
        $("#table1").DataTable({
                dom: "Bfrtip",
                buttons: [{
                        extend: "pdf",
                        orientation: 'landscape',
                        title: "Data Pemeliharaan",
                        download: "open",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4],
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
                        title: "Data Pemeliharaan",
                        orientation: "potrait",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4],
                            modifier: {
                                selected: null,
                            },
                        },
                        pageSize: "Legal",
                        className: "btn btn-primary",
                    },
                ]
            });
    });
</script>
@endpush