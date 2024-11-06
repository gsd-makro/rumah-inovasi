<div class="modal fade" id="delete{{ $subMenu->id }}" tabindex="-1" aria-labelledby="deleteSubLabel{{ $subMenu->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSubLabel{{ $subMenu->id }}">Hapus Submenu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus submenu "<strong>{{ $subMenu->name }},, karena akan menghapus Sub submenu lain"?</strong>"?</p>
            </div>
            <form action="{{ route('menus.destroy', $subMenu->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus Submenu</button>
                </div>
            </form>
        </div>
    </div>
</div>
