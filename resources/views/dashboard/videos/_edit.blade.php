<div class="modal fade text-left" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Perbarui Data</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="basicInput">Judul</label>
                        <input type="text" name="title" class="form-control" id="editTitle"
                            placeholder="Masukkan Judul Dokumen">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Link Youtube</label>
                        <input type="text" name="link_path" class="form-control" id="link_path"
                            placeholder="Masukkan Link Embed Video">
                    </div>
                    <div class="divider"></div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button>
                        <button type="submit" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function openEditModal(value) {
            // Set the values in the modal's form fields
            document.getElementById('editTitle').value = value.title; // Set the name field value
            document.getElementById('editMenu').value = value.menu_id; // Set the name field value
            document.getElementById('link_path').value = value.link_path; // Set the name field value
            document.querySelector('#update form').action = "{{ url('dashboard/videos') }}/" + value.id;
        }
    </script>
@endpush
