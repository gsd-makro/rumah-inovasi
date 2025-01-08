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
                <form method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="basicInput">Nama</label>
                        <input type="title" id="editName" name="name" class="form-control" id="basicInput"
                            placeholder="Masukkan Nama">
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
            document.getElementById('editName').value = value.name; // Set the name field value
            document.querySelector('#update form').action = "{{ url('dashboard/subjects') }}/" + value.id;
        }
    </script>
@endpush
