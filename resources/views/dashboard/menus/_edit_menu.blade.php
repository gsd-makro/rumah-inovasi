<div class="modal fade" id="updateMain{{ $menu->id }}" tabindex="-1"
    aria-labelledby="updateMainLabel{{ $menu->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateMainLabel{{ $menu->id }}">Ubah Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('menus.update', $menu->id) }}" method="POST">
                <div class="modal-body">
                    <!-- Form to update menu -->
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="updateSubSubMenuName{{ $menu->id }}" class="form-label">Nama Sub
                            Submenu</label>
                        <input type="text" class="form-control" id="updateSubSubMenuName{{ $menu->id }}"
                            name="name" value="{{ $menu->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateSubSubMenuTitle{{ $menu->id }}" class="form-label">Judul Sub
                            Submenu</label>
                        <input type="text" class="form-control" id="updateSubSubMenuTitle{{ $menu->id }}"
                            name="title" value="{{ $menu->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="menuContentType" class="form-label">Tipe Konten</label>
                        <select name="content_type" class="form-select" id="menuContentType">
                            @php $contentTypes = ['infographic', 'document', 'policy brief' ,'video', 'foto']; @endphp
                            <option value="" selected>Pilih tipe konten</option>
                            @foreach ($contentTypes as $contentType)
                                <option value="{{ $contentType }}"
                                    {{ $contentType == $menu->content_type ? 'selected' : '' }}>
                                    {{ ucfirst($contentType) }}
                                </option>
                            @endforeach
                        </select>
                        <p>Kosongkan Tipe Konten jika memilki submenu</p>
                    </div>

                    <!-- Active Status Toggle -->
                    <div class="mb-3">
                        <label class="form-label d-block">Status Menu</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox"
                                id="updateSubSubMenuActive{{ $menu->id }}" name="is_active"
                                {{ $menu->is_active ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="updateSubSubMenuActive{{ $menu->id }}">Aktif</label>
                        </div>
                    </div>
                    <!-- Order Dropdown -->
                    <div class="mb-3">
                        <label for="updateSubSubMenuOrder{{ $menu->id }}" class="form-label">Urutan Menu (Saat
                            Ini: {{ $menu->order }})</label>
                        <select class="form-select" id="updateSubSubMenuOrder{{ $menu->id }}" name="order">
                            @foreach ($menus as $menuItem)
                                <option value="{{ $menuItem->order }}"
                                    {{ $menuItem->order == $menu->order ? 'selected' : '' }}>
                                    Urutan {{ $menuItem->order }}
                                    {{ $menuItem->order == $menu->order ? '(Saat Ini)' : '' }}
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">
                            Memilih urutan ini akan menukar posisi menu ini dengan menu lain yang memiliki urutan
                            tersebut.
                        </small>
                    </div>

                    <input type="hidden" name="parent_id" value="{{ $menu->parent_id }}">
                    <div class="alert alert-info" role="alert">
                        <strong>Catatan:</strong> Nama Menu akan muncul di navbar, sedangkan Judul Menu akan muncul
                        di halaman.
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

@push('scripts')
@endpush
