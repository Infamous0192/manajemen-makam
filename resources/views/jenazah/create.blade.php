@extends('adminlte::page')

@section('title', 'Tambah Jenazah')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Jenazah</h1>
@stop

@section('content')
<div class="row">
    {{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Tambah Jenazah
            </div>
            <form action="{{ route('jenazah.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <x-select name="id_pesanan" label="Pemesan" placeholder="Pilih Pemesan" :data="$pesanan" />

                    <x-text-input name="nik" label="NIK" placeholder="Masukan Nik" />
                    <x-text-input name="tempat_lahir" label="Tempat Lahir" placeholder="Masukan Tempat Lahir" />
                    <x-text-input type="date" name="tanggal_lahir" label="Tanggal Lahir"
                        placeholder="Masukan Tanggal Lahir" />
                    <x-select name="status_kawin" label="Status Kawin" placeholder="Pilih Status Kawin" :data="[
                        ['label' => 'Belum Menikah', 'value' => '0'],
                        ['label' => 'Sudah Menikah', 'value' => '1']
                    ]" />
                    <x-select name="jenis_kelamin" label="Jenis Kelamin" placeholder="Pilih Jenis Kelamin" :data="[
                        ['label' => 'Laki-laki', 'value' => 'laki'],
                        ['label' => 'Perempuan', 'value' => 'perempuan']
                    ]" />
                    <x-text-input name="kewarganegaraan" label="Kewarganegaraan"
                        placeholder="Masukan Kewarganegaraan" />
                    <x-select name="agama" label="Agama" placeholder="Pilih Agama" :data="[
                            ['label' => 'Islam', 'value' => 'Islam'],
                            ['label' => 'Kristen', 'value' => 'Kristen'],
                            ['label' => 'Katolik', 'value' => 'Katolik'],
                            ['label' => 'Hindu', 'value' => 'Hindu'],
                            ['label' => 'Buddha', 'value' => 'Buddha'],
                            ['label' => 'Konghuchu', 'value' => 'Konghuchu'],
                            ['label' => 'Lainnya', 'value' => 'Lainnya'],
                        ]" />
                    <x-select name="pendidikan" label="Pendidikan Terakhir" placeholder="Pilih Pendidikan Terakhir"
                        :data="[
                            ['label' => 'SD', 'value' => 'SD'],
                            ['label' => 'SMP', 'value' => 'SMP'],
                            ['label' => 'SMA', 'value' => 'SMA'],
                            ['label' => 'S1', 'value' => 'S1'],
                            ['label' => 'S2', 'value' => 'S2'],
                            ['label' => 'S3', 'value' => 'S3'],
                        ]" />
                    <x-text-input name="pekerjaan" label="Pekerjaan" placeholder="Masukan Pekerjaan" />
                    <x-text-input name="provinsi" label="Provinsi" placeholder="Masukan Provinsi" />
                    <x-text-input name="kabupaten" label="Kabupaten" placeholder="Masukan Kabupaten" />
                    <x-text-input name="kecamatan" label="Kecamatan" placeholder="Masukan Kecamatan" />
                    <x-text-input name="kelurahan" label="Kelurahan" placeholder="Masukan Kelurahan" />
                    <x-text-input type="number" name="rt" label="RT" placeholder="Masukan RT" />
                    <x-text-input type="number" name="rw" label="RW" placeholder="Masukan RW" />
                    <x-text-input name="alamat_sekarang" label="Alamat Sekarang"
                        placeholder="Masukan Alamat Sekarang" />
                    <x-text-input name="alamat_ktp" label="Alamat KTP" placeholder="Masukan Alamat KTP" />
                    <x-select name="status_tinggal" label="Status Tinggal" placeholder="Pilih Status Tinggal" :data="[
                        ['label' => 'Tetap', 'value' => 'tetap'],
                        ['label' => 'Kontrak', 'value' => 'kontrak']
                    ]" />
                    <x-text-input type="date" name="tanggal_meninggal" label="Tanggal Meninggal"
                        placeholder="Masukan Tanggal Meninggal" />
                    <x-text-input type="date" name="tanggal_makam" label="Tanggal Dimakamkan"
                        placeholder="Masukan Tanggal Dimakamkan" />

                    <x-select name="id_tpu" label="TPU" placeholder="Pilih TPU" :data="$tpu" />

                    <input type="hidden" id="makam-value" name="id_makam" value="">

                    <div id="makam-form" class="form-grup row mb-2">
                        <label for="makam-input" class="form-label col-sm-2">Blok Makam</label>
                        <div class="col-sm-10">
                            <input readonly id="makam-input" type="text"
                                class="form-control @error('id_makam') is-invalid @enderror" name=""
                                value="{{ old('id_makam') }}" placeholder="Pilih Blok Makam">
                            <div class="invalid-feedback">
                                @error('id_makam')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-center">
                    <button class="btn btn-info">Simpan</button>
                    <a href="{{ route('jenazah.index') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .makam-container {
        display: grid;
        grid-template-columns: repeat(6, minmax(0, 1fr));
        justify-items: center;
        grid-gap: 24px;
    }

    .makam-blok {
        width: 24px;
        height: 24px;
        border: 1px solid #333;
        background: red;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .makam-available {
        background: green;
    }
</style>

<div class="modal fade" id="makam-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Blok Makam</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <select id="blok-input" class="form-control selectpicker mb-4" name="blok-input" value=""
                    placeholder="Pilih Blok">

                </select>
                <div class="makam-container" id="makam-container">

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="makam-button">Pilih</button>
            </div>
        </div>

    </div>
</div>
@stop

@push('js')

<script type="text/javascript">
    let id_tpu = @json(old('id_tpu', ''));
    let blok = @json(old('blok-input', ''));

    const rows = 6;
    const cols = 6;
    const block = Array(rows * cols).fill(1).map((_, index) => ({
        baris: Math.floor(index / cols) + 1,
        kolom: (index % cols) + 1,
        isAvailable: false
    }));
    const blokName = @json($blok);
    const availableBlok = @json($makam);

    function renderBlok() {
        resetBlok()
        const elements = Array(rows * cols).fill(1).map((_, index) => {
            const baris = Math.floor(index / cols) + 1
            const kolom = (index % cols) + 1
            const isAvailable = availableBlok.filter((v) => v.baris == baris && v.kolom == kolom && v.nama == blok && v.id_tpu == id_tpu)

            if (isAvailable.length > 0) console.log(isAvailable)

            return `
                <div>
                    <div ${isAvailable.length > 0 ? `data-id="${isAvailable[0].id}" nama="${blok}" baris="${baris}" kolom="${kolom}"` : ''} class="makam-blok ${isAvailable.length > 0 ? 'makam-available' : ''}"></div>
                    ${baris}x${kolom}
                </div>`
        })

        $('#makam-container').html(elements.join(''))
        

        $('.makam-blok').on('click', function() {
            const id = $(this).data('id');
            const nama = $(this).attr('nama');
            const baris = $(this).attr('baris');
            const kolom = $(this).attr('kolom');

            if (!id) return;

            alert(nama)
            
            $('#makam-input').val(`Blok ${blok}, Baris ${baris}, Kolom ${kolom}`)
            $('#makam-value').val(id)
            $('#makam-modal').modal('hide');
        });
        
    }

    function resetBlok() {
        $('.makam-blok').off('click');
        $('#makam-container').html('')
    }

    $(document).ready(function(){
        resetBlok()

        $("#makam-input").click((e) => {
            const value = $('#id_tpu').val()
            id_tpu = value

            const options = blokName
                .filter(({ id_tpu }) => id_tpu == value)
                .map(({ nama, id_tpu }) => `<option value="${nama}">${nama}</option>`)

            $('#blok-input').val('')
            $('#blok-input').html('<option value="">Pilih Blok</option>' + options.join(''))
            resetBlok()

            $('#makam-modal').modal('show');
        })

        $("#id_tpu").change((e) => {
            const value = e.target.value
            id_tpu = value

            const options = blokName
                .filter(({ id_tpu }) => id_tpu == value)
                .map(({ nama, id_tpu }) => `<option value="${nama}">${nama}</option>`)

            $('#blok-input').val('')
            $('#blok-input').html('<option value="">Pilih Blok</option>' + options.join(''))
            resetBlok()
        })

        $("#blok-input").change((e) => {
            const value = e.target.value
            blok = value

            if (value == '') return resetBlok()
            
            renderBlok()
        })

        $('.makam-blok').on('click', function() {
            // Get the id attribute of the clicked element
            const id = $(this).data('id');
            
            // Do whatever you want with the id, for example, alert it
            alert(`Clicked Makam Blok ${id}`);
            
            // You can also perform other actions or call functions here based on the clicked element
        });
        
    });
</script>

@endpush