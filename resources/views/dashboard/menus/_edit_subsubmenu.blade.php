<div class="modal fade" id="updateSub{{ $subSubMenu->id }}" tabindex="-1"
    aria-labelledby="updateSubSubLabel{{ $subSubMenu->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSubSubLabel{{ $subSubMenu->id }}">Ubah Sub Submenu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('menus.update', $subSubMenu->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="updateSubSubMenuName{{ $subSubMenu->id }}" class="form-label">Nama Sub
                            Submenu</label>
                        <input type="text" class="form-control" id="updateSubSubMenuName{{ $subSubMenu->id }}"
                            name="name" value="{{ $subSubMenu->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateSubSubMenuTitle{{ $subSubMenu->id }}" class="form-label">Judul Sub
                            Submenu</label>
                        <input type="text" class="form-control" id="updateSubSubMenuTitle{{ $subSubMenu->id }}"
                            name="title" value="{{ $subSubMenu->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="menuContentType" class="form-label">Tipe Konten</label>
                        <select name="content_type" class="form-select" id="menuContentType">
                            @php $contentTypes = ['infographic', 'document', 'policy brief' ,'video', 'foto']; @endphp
                            <option value="" selected>Pilih tipe konten</option>
                            @foreach ($contentTypes as $contentType)
                                <option value="{{ $contentType }}"
                                    {{ $contentType == $subSubMenu->content_type ? 'selected' : '' }}>
                                    {{ ucfirst($contentType) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Active Status Toggle -->
                    <div class="mb-3">
                        <label class="form-label d-block">Status Menu</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox"
                                id="updateSubSubMenuActive{{ $subSubMenu->id }}" name="is_active"
                                {{ $subSubMenu->is_active ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="updateSubSubMenuActive{{ $subSubMenu->id }}">Aktif</label>
                        </div>
                    </div>
                    <!-- Order Dropdown -->
                    <div class="mb-3">
                        <label for="updateSubSubMenuOrder{{ $subSubMenu->id }}" class="form-label">Urutan Menu (Saat
                            Ini: {{ $subSubMenu->order }})</label>
                        <select class="form-select" id="updateSubSubMenuOrder{{ $subSubMenu->id }}" name="order">
                            @foreach ($subMenu->children as $menu)
                                <option value="{{ $menu->order }}"
                                    {{ $menu->order == $subSubMenu->order ? 'selected' : '' }}>
                                    Urutan {{ $menu->order }}
                                    {{ $menu->order == $subSubMenu->order ? '(Saat Ini)' : '' }}
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">
                            Memilih urutan ini akan menukar posisi menu ini dengan menu lain yang memiliki urutan
                            tersebut.
                        </small>
                    </div>

                    <input type="hidden" name="parent_id" value="{{ $subSubMenu->parent_id }}">
                    <div class="alert alert-info" role="alert">
                        <strong>Catatan:</strong> Nama Menu akan muncul di navbar, sedangkan Judul Menu akan muncul di
                        halaman.
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
