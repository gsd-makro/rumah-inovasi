<div class="modal fade" id="deleteSub{{ $subSubMenu->id }}" tabindex="-1"
    aria-labelledby="deleteSubSubLabel{{ $subSubMenu->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSubSubLabel{{ $subSubMenu->id }}">Hapus Sub Submenu
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus sub submenu
                    "<strong>{{ $subSubMenu->name }}</strong>"?</p>
            </div>
            <form action="{{ route('menus.destroy', $subSubMenu->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus Sub Submenu</button>
                </div>
            </form>
        </div>
    </div>
</div>
