@extends('adminlte::page')

@section('title', 'Pemakaman | waris')

@section('content_header')
<h1 class="m-0 text-dark">Data Ahli Waris</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah Ahli Waris
            </div>
            <form action="{{ route ('waris.store') }}" method="POST">
                <div class="card-body">
                    @csrf

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Nama Mendiang</label>
                        <div class="col-sm-10">
                            <select class="form-control selectlive" name="id_mendiang">
                                <option value="" {{old('id_mendiang')=='' ? 'selected' : '' }}>-
                                    pilih -</option>
                                @foreach ($mampu as $row)
                                <option value="{{$row->id}}" {{old('id_mendiang')==$row->id ?
                                    'selected' : ''
                                    }}>{{$row->nama_lengkap}} ({{$row->nik}})</option>
                                @endforeach
                            </select>
                            @if ($errors->get('id_mendiang'))
                            <span class="text-red text-sm">{{ $errors->get('id_mendiang')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Hubungan Dengan Mendiang</label>
                        <div class="col-sm-10">
                            <select class="form-control selectlive" name="status_waris">
                                <option value="" {{old('status_waris')=='' ? 'selected' : '' }}>-
                                    pilih -</option>
                                <option value="ayah" {{old('status_waris')=='ayah' ? 'selected' : '' }}>Ayah</option>
                                <option value="ibu" {{old('status_waris')=='ibu' ? 'selected' : '' }}>Ibu</option>
                                <option value="anak" {{old('status_waris')=='anak' ? 'selected' : '' }}>Anak</option>
                                <option value="paman" {{old('status_waris')=='paman' ? 'selected' : '' }}>Kerabat Ibu
                                </option>
                                <option value="bibi" {{old('status_waris')=='bibi' ? 'selected' : '' }}>Kerabat Ayahh
                                </option>
                            </select>
                            @if ($errors->get('status_waris'))
                            <span class="text-red text-sm">{{ $errors->get('status_waris')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">NIK Ahli Waris</label>
                        <div class="col-sm-10">
                            <input type="text" name="nik_waris" placeholder="Masukan NIK" class="form-control"
                                value="{{ old('nik_waris') }}">
                            @if ($errors->get('nik_waris'))
                            <span class="text-red text-sm">{{ $errors->get('nik_waris')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Nama Ahli Waris</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_waris" placeholder="Masukan Nama"
                                class="form-control" value="{{ old('nama_waris') }}">
                            @if ($errors->get('nama_waris'))
                            <span class="text-red text-sm">{{ $errors->get('nama_waris')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" name="tempat_waris" placeholder="Masukan Tempat Lahir"
                                class="form-control" value="{{ old('tempat_waris') }}">
                            @if ($errors->get('tempat_waris'))
                            <span class="text-red text-sm">{{ $errors->get('tempat_waris')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" name="tanggal_waris" placeholder="Masukan Tanggal Lahir"
                                class="form-control" value="{{ old('tanggal_waris') }}">
                            @if ($errors->get('tanggal_waris'))
                            <span class="text-red text-sm">{{ $errors->get('tanggal_waris')[0] }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control selectpicker" name="kelamin">
                                <option value="" {{ old('kelamin')=='' ? 'selected' : '' }}>- pilih -
                                </option>
                                <option value="Laki" {{ old('kelamin')=='Laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Wanita {{ old('kelamin') == 'Wanita' ? 'selected' : '' }}">
                                    Perempuan</option>
                            </select>
                            @if ($errors->get('kelamin'))
                            <span class="text-red text-sm">{{ $errors->get('kelamin')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Kecamantan</label>
                        <div class="col-sm-10">
                            <input type="text" name="kecamatan" placeholder="Masukan Kecamatan"
                                class="form-control" value="{{ old('kecamatan') }}">
                            @if ($errors->get('kecamatan'))
                            <span class="text-red text-sm">{{ $errors->get('kecamatan')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" name="kabupaten" placeholder="Masukan Kabupaten"
                                class="form-control" value="{{ old('kabupaten') }}">
                            @if ($errors->get('kabupaten'))
                            <span class="text-red text-sm">{{ $errors->get('kabupaten')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Provinsi</label>
                        <div class="col-sm-10">
                            <input type="text" name="provinsi" placeholder="Masukan Provinsi"
                                class="form-control" value="{{ old('provinsi') }}">
                            @if ($errors->get('provinsi'))
                            <span class="text-red text-sm">{{ $errors->get('provinsi')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Agama</label>
                        <div class="col-sm-10">
                            <select class="form-control selectlive" name="agama">
                                <option value="" {{old('agama')=='' ? 'selected' : '' }}>- pilih -
                                </option>
                                <option value="Islam" {{old('agama')=='Islam' ? 'selected' : '' }}>Islam
                                </option>
                                <option value="Kristen" {{old('agama')=='Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{old('agama')=='Katolik' ? 'selected' : '' }}>Katholik</option>
                                <option value="Hindu" {{old('agama')=='Hindu' ? 'selected' : '' }}>Hindu
                                </option>
                                <option value="Buhda" {{old('agama')=='Buhda' ? 'selected' : '' }}>Budha
                                </option>
                                <option value="Konghucu" {{old('agama')=='Konghucu' ? 'selected' : '' }}>Konghucu
                                </option>
                            </select>
                            @if ($errors->get('agama'))
                            <span class="text-red text-sm">{{ $errors->get('agama')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Kewarganegaraan</label>
                        <div class="col-sm-10">
                            <input type="text" name="negara" placeholder="Masukan Kewarganegaraan"
                                class="form-control" value="{{ old('negara') }}">
                            @if ($errors->get('negara'))
                            <span class="text-red text-sm">{{ $errors->get('negara')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">Pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" name="pekerjaan" placeholder="Masukan Pekerjaan"
                                class="form-control" value="{{ old('pekerjaan') }}">
                            @if ($errors->get('pekerjaan'))
                            <span class="text-red text-sm">{{ $errors->get('pekerjaan')[0] }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-grup row mb-2">
                        <label class="form-label col-sm-2">No Telpon</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_hp" placeholder="Masukan No Telp" class="form-control"
                                value="{{ old('no_hp') }}">
                            @if ($errors->get('no_hp'))
                            <span class="text-red text-sm">{{ $errors->get('no_hp')[0] }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('waris.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop