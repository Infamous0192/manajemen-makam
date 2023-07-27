@extends('adminlte::page')


@section('title', 'Pemakaman | mampu')

@section('content_header')
<h1 class="m-0 mb-2 text-dark">Data Jenazah</h1>
@stop

@php
// if ($errors->any()) {
// dd($errors->get('nik')[0]);
// }
@endphp

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Edit Data Jenazah
            </div>
            <form action="{{ route ('mampu.update', $mampu->id) }}" method="POST">
                <div class="card-body">
                    @method('PUT')
                    @csrf

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" name="nik" placeholder="Masukan NIK" class="form-control"
                                value="{{ old('nik', $mampu->nik) }}">
                            @if ($errors->get('nik'))
                            <span class="text-red text-sm">{{ $errors->get('nik')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_lengkap" placeholder="Masukan Nama"
                                class="form-control" value="{{ old('nama_lengkap', $mampu->nama_lengkap) }}">
                            @if ($errors->get('nama_lengkap'))
                            <span class="text-red text-sm">{{ $errors->get('nama_lengkap')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir"
                                class="form-control" value="{{ old('tempat_lahir', $mampu->tempat_lahir) }}">
                            @if ($errors->get('tempat_lahir'))
                            <span class="text-red text-sm">{{ $errors->get('tempat_lahir')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir"
                                class="form-control" value="{{ old('tanggal_lahir', $mampu->tanggal_lahir) }}">
                            @if ($errors->get('tanggal_lahir'))
                            <span class="text-red text-sm">{{ $errors->get('tanggal_lahir')[0] }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" name="jenis_kelamin" value="Laki">
                                <option value="" {{old('jenis_kelamin', $mampu->jenis_kelamin) == '' ? 'selected' : ''}}
                                    disabled>- pilih -</option>
                                <option value="Laki" {{old('jenis_kelamin', $mampu->jenis_kelamin) == 'Laki' ?
                                    'selected' : ''}}>Laki-laki</option>
                                <option value="Perempuan" {{old('jenis_kelamin', $mampu->jenis_kelamin) == 'Perempuan' ?
                                    'selected' : ''}}>Perempuan</option>
                            </select>
                            @if ($errors->get('jenis_kelamin'))
                            <span class="text-red text-sm">{{ $errors->get('jenis_kelamin')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <h4 class="mt-3">Data Alamat</h4>
                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Alamat KTP</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat_ktp" placeholder="Masukan Alamat KTP"
                                class="form-control" value="{{ old('alamat_ktp', $mampu->alamat_ktp) }}">
                            @if ($errors->get('alamat_ktp'))
                            <span class="text-red text-sm">{{ $errors->get('alamat_ktp')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Alamat Sekarang</label>
                        <div class="col-sm-10">
                            <input type="text" name="alamat_now" placeholder="Masukan Alamat Sekarang"
                                class="form-control" value="{{ old('alamat_now', $mampu->alamat_now) }}">
                            @if ($errors->get('alamat_now'))
                            <span class="text-red text-sm">{{ $errors->get('alamat_now')[0] }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Kelurahan</label>
                        <div class="col-sm-10">
                            <input type="text" name="desa" placeholder="Masukan Kelurahan" class="form-control"
                                value="{{ old('desa', $mampu->desa) }}">
                            @if ($errors->get('desa'))
                            <span class="text-red text-sm">{{ $errors->get('desa')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" name="kecamatan" placeholder="Masukan Kecamatan"
                                class="form-control" value="{{ old('kecamatan', $mampu->kecamatan) }}">
                            @if ($errors->get('kecamatan'))
                            <span class="text-red text-sm">{{ $errors->get('kecamatan')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" name="kota" placeholder="Masukan Kabupaten" class="form-control"
                                value="{{ old('kota', $mampu->kota) }}">
                            @if ($errors->get('kota'))
                            <span class="text-red text-sm">{{ $errors->get('kota')[0] }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Provinsi</label>
                        <div class="col-sm-10">
                            <input type="text" name="provinsi" placeholder="Masukan Provinsi"
                                class="form-control" value="{{ old('provinsi', $mampu->provinsi) }}">
                            @if ($errors->get('provinsi'))
                            <span class="text-red text-sm">{{ $errors->get('provinsi')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Kewarganegaraan</label>
                        <div class="col-sm-10">
                            <input type="text" name="negara" placeholder="Masukan Kewarganegaraan"
                                class="form-control" value="{{ old('negara', $mampu->negara) }}">
                            @if ($errors->get('negara'))
                            <span class="text-red text-sm">{{ $errors->get('negara')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">RT</label>
                        <div class="col-sm-10">
                            <input type="text" name="rt" placeholder="Masukan RT" class="form-control"
                                value="{{ old('rt', $mampu->rt) }}">
                            @if ($errors->get('rt'))
                            <span class="text-red text-sm">{{ $errors->get('nik')[0] }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">RW</label>
                        <div class="col-sm-10">
                            <input type="text" name="rw" placeholder="Masukan RW" class="form-control"
                                value="{{ old('rw', $mampu->rw) }}">
                            @if ($errors->get('rw'))
                            <span class="text-red text-sm">{{ $errors->get('rw')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <h4 class="mt-3">Data Lainnya</h4>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Agama</label>
                        <div class="col-sm-10">
                            <select class="form-control selectlive" name="agama">
                                <option value="" {{old('agama', $mampu->agama) == '' ? 'selected' : ''}}>- pilih -
                                </option>
                                <option value="Islam" {{old('agama', $mampu->agama) == 'Islam' ? 'selected' : ''}}>Islam
                                </option>
                                <option value="Kristen" {{old('agama', $mampu->agama) == 'Kristen' ? 'selected' :
                                    ''}}>Kristen</option>
                                <option value="Katolik" {{old('agama', $mampu->agama) == 'Katolik' ? 'selected' :
                                    ''}}>Katholik</option>
                                <option value="Hindu" {{old('agama', $mampu->agama) == 'Hindu' ? 'selected' : ''}}>Hindu
                                </option>
                                <option value="Buhda" {{old('agama', $mampu->agama) == 'Budha' ? 'selected' : ''}}>Budha
                                </option>
                                <option value="Konghucu" {{old('agama', $mampu->agama) == 'Konghucu' ? 'selected' :
                                    ''}}>Konghucu</option>
                            </select>
                            @if ($errors->get('agama'))
                            <span class="text-red text-sm">{{ $errors->get('agama')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Pendidikan</label>
                        <div class="col-sm-10">
                            <select class="form-control selectlive" name="pendidikan">
                                <option value="" {{old('pendidikan', $mampu->pendidikan) == '' ? 'selected' : ''}}>-
                                    pilih -</option>
                                <option value="Tidak Sekolah" {{old('pendidikan', $mampu->pendidikan) == 'Tidak Sekolah'
                                    ? 'selected' : ''}}>Tidak Sekolah</option>
                                <option value="Tidak lulus SD" {{old('pendidikan', $mampu->pendidikan) == 'Tidak lulus
                                    SD' ? 'selected' : ''}}>Tidak Tamat SD</option>
                                <option value="SD" {{old('pendidikan', $mampu->pendidikan) == 'SD' ? 'selected' :
                                    ''}}>SD</option>
                                <option value="SMP" {{old('pendidikan', $mampu->pendidikan) == 'SMP' ? 'selected' :
                                    ''}}>SMP</option>
                                <option value="SMA" {{old('pendidikan', $mampu->pendidikan) == 'SMA' ? 'selected' :
                                    ''}}>SMA</option>
                                <option value="D1" {{old('pendidikan', $mampu->pendidikan) == 'D1' ? 'selected' :
                                    ''}}>D1</option>
                                <option value="D2" {{old('pendidikan', $mampu->pendidikan) == 'D2' ? 'selected' :
                                    ''}}>D2</option>
                                <option value="D3" {{old('pendidikan', $mampu->pendidikan) == 'D3' ? 'selected' :
                                    ''}}>D3</option>
                                <option value="S1" {{old('pendidikan', $mampu->pendidikan) == 'S1' ? 'selected' :
                                    ''}}>S1</option>
                                <option value="S2" {{old('pendidikan', $mampu->pendidikan) == 'S2' ? 'selected' :
                                    ''}}>S2</option>
                                <option value="S3" {{old('pendidikan', $mampu->pendidikan) == 'S3' ? 'selected' :
                                    ''}}>S3</option>
                            </select>
                            @if ($errors->get('pendidikan'))
                            <span class="text-red text-sm">{{ $errors->get('pendidikan')[0] }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" name="pekerjaan" placeholder="Masukan Pekerjaan"
                                class="form-control" value="{{ old('pekerjaan', $mampu->pekerjaan) }}">
                            @if ($errors->get('pekerjaan'))
                            <span class="text-red text-sm">{{ $errors->get('pekerjaan')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Status Pernikahan</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" name="kawin">
                                <option value="" {{old('kawin', $mampu->kawin) == '' ? 'selected' : ''}}>- pilih -
                                </option>
                                <option value="Sudah menikah" {{old('kawin', $mampu->kawin) == 'Sudah menikah' ?
                                    'selected' : ''}}>Kawin</option>
                                <option value="Belum Menikah" {{old('kawin', $mampu->kawin) == 'Belum Menikah' ?
                                    'selected' : ''}}>Tidak Kawin</option>
                            </select>
                            @if ($errors->get('kawin'))
                            <span class="text-red text-sm">{{ $errors->get('kawin')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Status Tinggal</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" name="tinggal">
                                <option value="" {{old('tinggal', $mampu->tinggal) == '' ? 'selected' : ''}}>- pilih -
                                </option>
                                <option value="Tetap" {{old('tinggal', $mampu->tinggal) == 'Tetap' ? 'selected' :
                                    ''}}>Tetap</option>
                                <option value="Kontrak" {{old('tinggal', $mampu->tinggal) == 'Kontrak' ? 'selected' :
                                    ''}}>Kontrak</option>
                            </select>
                            @if ($errors->get('kontrak'))
                            <span class="text-red text-sm">{{ $errors->get('kontrak')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Tempat Dimakamkan</label>
                        <div class="col-sm-10">
                            <input type="text" name="tempat_dimakamkan" placeholder="Masukan Tempat Dimakamkan"
                                class="form-control" value="{{ old('tempat_dimakamkan', $mampu->tempat_dimakamkan) }}">
                            @if ($errors->get('tempat_dimakamkan'))
                            <span class="text-red text-sm">{{ $errors->get('tempat_dimakamkan')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Tanggal Meninggal</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_meninggal" placeholder="Masukan Tanggal meninggal"
                                class="form-control" value="{{ old('tanggal_meninggal', $mampu->tanggal_meninggal) }}">
                            @if ($errors->get('tanggal_meninggal'))
                            <span class="text-red text-sm">{{ $errors->get('tanggal_meninggal')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Tanggal Dimakamkan</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_dimakamkan" placeholder="Masukan Tanggal pemakaman"
                             class="form-control"
                                value="{{ old('tanggal_dimakamkan', $mampu->tanggal_dimakamkan) }}">
                            @if ($errors->get('tanggal_dimakamkan'))
                            <span class="text-red text-sm">{{ $errors->get('tanggal_dimakamkan')[0] }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-info mr-3">Simpan</button>
                    <a href="{{ route('mampu.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop