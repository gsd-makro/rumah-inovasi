<div class="modal fade" id="tambahsubmenu{{ $menu->id }}" tabindex="-1"
    aria-labelledby="tambahSubLabel{{ $menu->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSubLabel{{ $menu->id }}">Tambah Submenu Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('menus.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="menuName" class="form-label">Nama Submenu</label>
                        <input type="text" name="name" class="form-control" id="menuName" required>
                    </div>
                    <div class="mb-3">
                        <label for="menuTitle" class="form-label">Judul Submenu</label>
                        <input type="text" name="title" class="form-control" id="menuTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="menuUrl" class="form-label">Url</label>
                        <input type="text" name="url" class="form-control" id="menuUrl">
                        <p class="text-bold text-sm">Kosongkan URL jika memilki Sub submenu</p>
                    </div>
                    <input type="hidden" name="parent_id" value="{{ $menu->id }}">
                    <div class="alert alert-info" role="alert">
                        <strong>Catatan:</strong> Nama Menu akan muncul di navbar, sedangkan Judul Menu akan muncul di
                        halaman.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>
