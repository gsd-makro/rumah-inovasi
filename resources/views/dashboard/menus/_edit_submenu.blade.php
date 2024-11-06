<div class="modal fade" id="update{{ $subMenu->id }}" tabindex="-1"
    aria-labelledby="updateSubLabel{{ $subMenu->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSubLabel{{ $subMenu->id }}">Ubah Submenu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="{{ route('menus.update', $subMenu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="updateSubSubMenuName{{ $subMenu->id }}" class="form-label">Nama Sub Submenu</label>
                        <input type="text" class="form-control" id="updateSubSubMenuName{{ $subMenu->id }}"
                            name="name" value="{{ $subMenu->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateSubSubMenuTitle{{ $subMenu->id }}" class="form-label">Judul Sub Submenu</label>
                        <input type="text" class="form-control" id="updateSubSubMenuTitle{{ $subMenu->id }}"
                            name="title" value="{{ $subMenu->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateSubSubMenuUrl{{ $subMenu->id }}" class="form-label">Url</label>
                        <input type="text" class="form-control" id="updateSubSubMenuUrl{{ $subMenu->id }}"
                            name="url" value="{{ $subMenu->url }}">
                        <p class="text-bold text-sm">Kosongkan URL jika memilki Sub submenu</p>
                    </div>

                    <!-- Active Status Toggle -->
                    <div class="mb-3">
                        <label class="form-label d-block">Status Menu</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="updateSubSubMenuActive{{ $subMenu->id }}"
                                name="is_active" {{ $subMenu->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="updateSubSubMenuActive{{ $subMenu->id }}">Aktif</label>
                        </div>
                    </div>
                    <!-- Order Dropdown -->
                    <div class="mb-3">
                        <label for="updateSubSubMenuOrder{{ $subMenu->id }}" class="form-label">Urutan Menu (Saat Ini: {{ $subMenu->order }})</label>
                        <select class="form-select" id="updateSubSubMenuOrder{{ $subMenu->id }}" name="order">
                            @foreach ($menu->children as $menu)
                                <option value="{{ $menu->order }}" {{ $menu->order == $subMenu->order ? 'selected' : '' }}>
                                    Urutan {{ $menu->order }} {{ $menu->order == $subMenu->order ? '(Saat Ini)' : '' }}
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">
                            Memilih urutan ini akan menukar posisi menu ini dengan menu lain yang memiliki urutan tersebut.
                        </small>
                    </div>

                    <input type="hidden" name="parent_id" value="{{ $subMenu->parent_id }}">
                    <div class="alert alert-info" role="alert">
                        <strong>Catatan:</strong> Nama Menu akan muncul di navbar, sedangkan Judul Menu akan muncul di halaman.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>