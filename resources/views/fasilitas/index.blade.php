@extends('adminlte::page')

@section('title', 'Fasilitas')

@section('content_header')
<h1 class="m-0 text-dark">Data Fasilitas</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mr-4">Data Fasilitas</h3>
                <a href="{{ route('fasilitas.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
                <a href="{{ route('fasilitas.print') }}" class="btn btn-info btn-sm px-4 ml-2">Print</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fasilitas as $item)
                            <tr>
                                <td>{{ ($loop->index + 1) }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    <x-action-button :id="$item->id" edit="fasilitas.edit" delete="fasilitas.destroy" />
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
                        title: "Data Fasilitas",
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
                        title: "Data Fasilitas",
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