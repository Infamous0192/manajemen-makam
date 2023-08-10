@extends('adminlte::page')

@section('title', 'Keuangan')

@section('content_header')
<h1 class="m-0 text-dark">Data Keuangan</h1>
@stop

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center">
        <h3 class="card-title mr-4">Data Pendapatan</h3>
        <a href="{{ route('pembayaran.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="table1">
            <thead>
              <tr>
                <th>#</th>
                <th>Jenis</th>
                <th>Nominal</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pembayaran as $item)
              <tr>
                <td>{{ ($loop->index + 1) }}</td>
                <td style="text-transform: capitalize">{{ $item->jenis }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                  <x-action-button :id="$item->id" edit="pembayaran.edit" delete="pembayaran.destroy" />
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-header d-flex align-items-center">
        <h3 class="card-title mr-4">Data Pengeluaran</h3>
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="table2">
            <thead>
              <tr>
                <th>#</th>
                <th>Jenis</th>
                <th>Nominal</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pengeluaran as $item)
              <tr>
                <td>{{ ($loop->index + 1) }}</td>
                <td style="text-transform: capitalize">{{ $item->jenis }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>
                  <x-action-button :id="$item->id" edit="pengeluaran.edit" delete="pengeluaran.destroy" />
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
                        title: "Data Pendapatan",
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
                        title: "Data Pendapatan",
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
            });

        $("#table2").DataTable({
                dom: "Bfrtip",
                buttons: [{
                        extend: "pdf",
                        orientation: 'landscape',
                        title: "Data Pengeluaran",
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
                        title: "Data Pengeluaran",
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
            });
    });
</script>
@endpush