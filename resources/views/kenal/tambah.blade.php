@extends('adminlte::page')

@section('title', 'Pemakaman | kenal')

@section('content_header')
<h1 class="m-0 text-dark">Data Jenazah</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="{{ route ('kenal.store') }}" method="POST">
                <div class="card-header">
                    Tambah Data Jenazah
                </div>
                <div class="card-body">
                    @csrf

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Nama Jenazah</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_jenazah" placeholder="Masukan Nama" class="form-control"
                                value="{{ old('nama_jenazah') }}">
                            @if ($errors->get('nama_jenazah'))
                            <span class="text-red text-sm">{{ $errors->get('nama_jenazah')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" name="kelamin">
                                <option value="" {{old('kelamin')=='' ? 'selected' : '' }}>- pilih -
                                </option>
                                <option value="Laki" {{old('kelamin')=='Laki' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="Perempuan" {{old('kelamin')=='Perempuan' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                            @if ($errors->get('kelamin'))
                            <span class="text-red text-sm">{{ $errors->get('kelamin')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Lokasi Ditemukan</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat_temu" placeholder="Masukan Lokasi" class="form-control"
                                value="{{ old('alamat_temu') }}">
                            @if ($errors->get('alamat_temu'))
                            <span class="text-red text-sm">{{ $errors->get('alamat_temu')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Tanggal Ditemukan</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_temu" placeholder="Masukan Tanggal Ditemukan"
                                class="form-control" value="{{ old('tanggal_temu') }}">
                            @if ($errors->get('tanggal_temu'))
                            <span class="text-red text-sm">{{ $errors->get('tanggal_temu')[0] }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" name="desa_temu" placeholder="Masukan Kecamatan" class="form-control"
                                value="{{ old('desa_temu') }}">
                            @if ($errors->get('desa_temu'))
                            <span class="text-red text-sm">{{ $errors->get('desa_temu')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" name="kabupaten_temu" placeholder="Masukan Kabupaten"
                                class="form-control" value="{{ old('kabupaten_temu') }}">
                            @if ($errors->get('kabupaten_temu'))
                            <span class="text-red text-sm">{{ $errors->get('kabupaten_temu')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Provinsi</label>
                        <div class="col-sm-10">
                            <input type="text" name="provinsi_temu" placeholder="Masukan Provinsi" class="form-control"
                                value="{{ old('provinsi_temu') }}">
                            @if ($errors->get('provinsi_temu'))
                            <span class="text-red text-sm">{{ $errors->get('provinsi_temu')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Kewarganegaraan</label>
                        <div class="col-sm-10">
                            <input type="text" name="negara_temu" placeholder="Masukan Kewarganegaraan"
                                class="form-control" value="{{ old('negara_temu') }}">
                            @if ($errors->get('negara_temu'))
                            <span class="text-red text-sm">{{ $errors->get('negara_temu')[0] }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">RT</label>
                        <div class="col-sm-10">
                            <input type="text" name="rt_temu" placeholder="Masukan RT" class="form-control"
                                value="{{ old('rt_temu') }}">
                            @if ($errors->get('rt_temu'))
                            <span class="text-red text-sm">{{ $errors->get('rt_temu')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">RW</label>
                        <div class="col-sm-10">
                            <input type="text" name="rw_temu" placeholder="Masukan RW" class="form-control"
                                value="{{ old('rw_temu') }}">
                            @if ($errors->get('rw_temu'))
                            <span class="text-red text-sm">{{ $errors->get('rw_temu')[0] }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-info mr-2">Simpan</button>
                    <a href="{{ route('kenal.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop