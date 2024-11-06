<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">Tambah Menu Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('menus.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="menuName" class="form-label">Nama Menu</label>
                        <input type="text" name="name" class="form-control" id="menuName" required>
                    </div>
                    <div class="mb-3">
                        <label for="menuTitle" class="form-label">Judul Menu</label>
                        <input type="text" name="title" class="form-control" id="menuTitle">
                    </div>
                    <div class="mb-3">
                        <label for="menuUrl" class="form-label">Url</label>
                        <input type="text" name="url" class="form-control" id="menuUrl" required>
												<p class="text-bold text-sm">Kosongkan URL jika memilki Submenu</p>
											</div>
                    <input type="hidden" name="parent_id">
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
