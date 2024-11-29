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
                        <div class="mb-3">
                            <label for="basicInput">Nama</label>
                            <input type="title" name="name" class="form-control" id="editName"
                                placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-3">
                            <label for="basicInput">Email</label>
                            <input type="email" name="email" class="form-control" id="editEmail"
                                placeholder="Masukkan Email">
                        </div>
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
            document.getElementById('editName').value = value.name; // Set the name field value
            document.getElementById('editEmail').value = value.email; // Set the name field value


            // Update the form's action attribute with the appropriate URL
            document.querySelector('#update form').action = "{{ url('dashboard/users') }}/" + value.id;
        }
    </script>
@endpush
