@extends('adminlte::page')

@section('title', 'Pemakaman | User')

@section('content_header')
    <h1 class="m-0 text-dark">Data User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

            <div class="card-header">
            <h3 class="card-title"><strong>Data Pengguna</strong></h3>
            <a href="{{ route('user.create') }}" class="btn btn-success btn-md float-right">Tambah User</a>
            </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                            $no = 1 ;
                        @endphp
                        @foreach ($user as $u )
                            <tr>
                                <td>{{  $no++ }}</td>
                                <td>{{ $u->name}}</td>
                                <td>{{ $u->email}}</td>
                                <td>

                                    <form action="{{ route('user.destroy', $u->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                    <a href="{{ route('user.edit', $u->id)}}" class ="btn btn-md btn-warning">Edit</a>
                                    <button type="submit" class ="btn btn-md btn-danger">Hapus</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>




                </div>
            </div>
        </div>
    </div>
@stop
