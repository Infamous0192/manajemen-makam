@props([
'id' => '',
'delete' => '',
'edit' => '',
'print' => '',
])

<div class="d-flex btn-grup" role="group">
    @if ($edit != "")
    <a href="{{ route($edit, $id) }}" class="btn btn-sm btn-warning mr-1">
        <i class="fa fa-edit"></i>Edit
    </a>
    @endif

    @if ($delete != "")
    <form action="{{ route($delete, $id) }}" method="post" class="form-inline">
        @method('DELETE')
        @csrf
        <button type="submit" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?')"
            class="btn btn-sm btn-danger mx-1">
            <i class="fa fa-trash"></i>Hapus
        </button>
    </form>
    @endif

    @if ($print != "")
    <a href="{{ route($print, $id) }}" class="btn btn-sm btn-info ml-1">
        <i class="fa fa-print"></i>Print
    </a>
    @endif
</div>