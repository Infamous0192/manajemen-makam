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
                <h3 class="card-title"><strong>Edit Data Pengguna</strong></h3>

            </div>
            <div class="card-body">
                <form action="{{ route ('user.update',$user->id) }}" method="post">
                    @method('PUT')
                    @csrf

                    <div class="form-grup row">
                        <label class="form-label col-sm-2">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Masukan nama" required class="form-control"
                                value="{{ $user->name}}">
                        </div>
                    </div>

                    <div class="form-grup row">
                        <label class="form-label col-sm-2">Username</label>
                        <div class="col-sm-10">
                            <input type="username" name="username" placeholder="Masukan Username" required
                                class="form-control" value="{{ $user->username}}">
                        </div>
                    </div>

                    <div class="form-grup row">
                        <label class="form-label col-sm-2">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="paswword" placeholder="Masukan password" class="form-control">
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <a href="{{ route('user.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@stop