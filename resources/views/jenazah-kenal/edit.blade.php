@extends('adminlte::page')

@section('title', 'Edit Jenazah Tidak Dikenal')

@section('content_header')
<h1 class="m-0 text-dark">Edit Jenazah Tidak Dikenal</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                Edit Jenazah Tidak Dikenal
            </div>
            <form action="{{ route('jenazah-kenal.update', $jenazahKenal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <x-text-input name="nama" :value="$jenazahKenal->nama" label="Nama" placeholder="Masukan Nama" />
                    <x-select name="jenis_kelamin" :value="$jenazahKenal->jenis_kelamin" label="Jenis Kelamin"
                        placeholder="Pilih Jenis Kelamin" :data="[
                        ['label' => 'Laki-laki', 'value' => 'laki'],
                        ['label' => 'Perempuan', 'value' => 'perempuan']
                    ]" />
                    <x-text-input name="kewarganegaraan" :value="$jenazahKenal->kewarganegaraan" label="Kewarganegaraan"
                        placeholder="Masukan Kewarganegaraan" />
                    <x-text-input name="tempat_ditemukan" :value="$jenazahKenal->tempat_ditemukan"
                        label="Tempat Ditemukan" placeholder="Masukan Tempat Ditemukan" />
                    <x-text-input type="date" name="tanggal_ditemukan" :value="$jenazahKenal->tanggal_ditemukan"
                        label="Tanggal Ditemukan" placeholder="Masukan Tanggal Ditemukan" />
                    <x-text-input name="provinsi" label="Provinsi" :value="$jenazahKenal->provinsi"
                        placeholder="Masukan Provinsi" />
                    <x-text-input name="kabupaten" label="Kabupaten" :value="$jenazahKenal->kabupaten"
                        placeholder="Masukan Kabupaten" />
                    <x-text-input name="kecamatan" label="Kecamatan" :value="$jenazahKenal->kecamatan"
                        placeholder="Masukan Kecamatan" />
                    <x-text-input name="kelurahan" label="Kelurahan" :value="$jenazahKenal->kelurahan"
                        placeholder="Masukan Kelurahan" />
                    <x-text-input type="number" name="rt" label="RT" :value="$jenazahKenal->rt"
                        placeholder="Masukan RT" />
                    <x-text-input type="number" name="rw" label="RW" :value="$jenazahKenal->rw"
                        placeholder="Masukan RW" />
                    
                        
                        <x-select name="id_tpu" label="TPU" placeholder="Pilih TPU" :data="$tpu" />

                    <input type="hidden" id="makam-value" name="id_makam" value="{{ $jenazahKenal->id_makam }}">

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
                    <a href="{{ route('jenazah-kenal.index') }}" class="btn btn-danger">Batal</a>
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