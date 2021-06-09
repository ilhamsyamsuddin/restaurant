{{-- !-- Delete Warning Modal -->  --}}
<form action="{{route('category.destroy',[$category->id])}}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Yakin ingin menghapus Kategori? {{ $project->name }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Ya, Hapus kategori</button>
    </div>
</form>