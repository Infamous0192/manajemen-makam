@extends('adminlte::page')

@section('title', 'Keuangan')

@section('content_header')
<h1 class="m-0 text-dark">Data Keuangan</h1>
@stop

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-5">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $total['pendapatan'] }}</h3>
                <p>Total Pendapatan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $total['pengeluaran'] }}</h3>
                <p>Total Pengeluaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-header d-flex align-items-center">
        <h3 class="card-title mr-4">Data Pendapatan</h3>
        <a href="{{ route('pembayaran.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
        <a href="{{ route('pembayaran.print') }}" class="btn btn-info btn-sm px-4 ml-2">Print</a>
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

    <div class="p-4 mt-5">
      <div id="chartPendapatan"></div>
    </div>

    <div class="card mb-4">
      <div class="card-header d-flex align-items-center">
        <h3 class="card-title mr-4">Data Pengeluaran</h3>
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-success btn-sm px-4">Tambah</a>
        <a href="{{ route('pengeluaran.print') }}" class="btn btn-info btn-sm px-4 ml-2">Print</a>
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

    <div class="p-4 mt-5">
      <div id="chartPengeluaran"></div>
    </div>
  </div>
</div>
@stop

@push('js')
<script type="text/javascript">
  $(document).ready(function(){
        $("#table1").DataTable();
        $("#table2").DataTable();
    });

    $(document).ready(function() {
        const summary = <?= json_encode($rekap) ?>;
        const { pendapatan, pengeluaran } = summary;

        var options = {
            series: [{
                name: "Total",
                data: pendapatan.map(({ total }) => total)
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Pendapatan per Bulan',
                align: 'left'
            },
            xaxis: {
                categories: pendapatan.map(({
                    bulan
                }) => bulan),
            }
        };

        var chartPendapatan = new ApexCharts(document.querySelector("#chartPendapatan"), options);
        chartPendapatan.render();

        var options = {
            series: [{
                name: "Total",
                data: pengeluaran.map(({ total }) => total)
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            title: {
                text: 'Pengeluaran per Bulan',
                align: 'left'
            },
            xaxis: {
                categories: pengeluaran.map(({
                    bulan
                }) => bulan),
            }
        };

        var chartPengeluaran = new ApexCharts(document.querySelector("#chartPengeluaran"), options);
        chartPengeluaran.render();
    })
</script>
@endpush