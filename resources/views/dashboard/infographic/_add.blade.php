<div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
      aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Tambah Data</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                      <div class="form-group">
                        <label for="basicInput">Judul</label>
                        <input type="title" class="form-control" id="basicInput" placeholder="Masukkan Judul">
                      </div>
                      <div class="form-group">
                        <label for="basicInput">Foto</label>
                        <input class="form-control form-control-sm" id="formFileSm" type="file">
                      </div>
                      <div class="form-group">
                        <label for="basicInput">Status</label>
                        <select class="form-select">
                          <option>Pending</option>
                          <option>Approved</option>
                          <option>Rejected</option>
                        </select>
                      </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
      </div>
</div>

@section('scripts')
<script>
document.getElementById('addDataForm').addEventListener('submit', async function (event) {
    event.preventDefault();
    
    const formData = new FormData(this);

    try {
        const response = await fetch('/api/your-endpoint', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token
            }
        });

        if (response.ok) {
            // Optionally handle the response
            const result = await response.json();
            console.log(result.message); // Show success message
            $('#addDataModal').modal('hide'); // Hide modal
            document.getElementById('addDataForm').reset(); // Reset form
            // Optionally refresh data
        } else {
            // Handle errors
            const errors = await response.json();
            console.error(errors);
        }
    } catch (error) {
        console.error('Error:', error);
    }
});
</script>
@endsection