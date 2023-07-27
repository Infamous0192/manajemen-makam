<div class="btn-grup" role="group">
    <form action="{{$form_url }}" method="post" class="form-inline">
        @method('DELETE')
        @csrf
        <button type="submit" onclick=" return confirm('anda yakin ?')" class="btn btn-sm btn-danger"><i
                class="fa fa-trash"></i>HAPUS</button>
    </form>
    <a href="{{$edit_url }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>EDIT</a>&nbsp;
    @if (isset($print_url))
    <a href="{{$print_url }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i>Print</a>&nbsp;
    @endif
</div>