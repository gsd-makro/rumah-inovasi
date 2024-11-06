<div class="modal fade" id="deleteMain{{ $menu->id }}" tabindex="-1"
    aria-labelledby="deleteMainLabel{{ $menu->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMainLabel{{ $menu->id }}">Hapus Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus menu "<strong>{{ $menu->name }}</strong>, karena akan menghapus submenu lain"?</p>
            </div>
            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>
