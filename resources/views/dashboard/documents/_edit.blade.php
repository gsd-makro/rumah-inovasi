<div class="modal fade text-left" id="update" tabindex="-1" role="dialog"
      aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Perbarui Data</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="basicInput">Judul</label>
                            <input type="text" name="title" class="form-control" id="editTitle" placeholder="Masukkan Judul Dokumen">
                          </div>
                          <div class="form-group">
                            {{-- <a href="{{ url('storage/' . $document->file_path) }}" class="btn btn-primary">
                                Download File
                               </a> --}}
                            <label for="basicInput">Berkas</label>
                            <input type="file" name="file_path" class="form-control" id="file_path" placeholder="Masukkan File Dokumen">
                          </div>
                          <div class="form-group">
                            <label for="basicInput">Menu</label>
                                <select name="menu_id" id="editMenu" class="form-control">
                                    <option value="#" selected disabled>Pilih Menu</option>
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                    @endforeach
                                </select>
                          </div>
                          <div class="form-group">
                            <label for="basicInput">Status</label>
                                <select name="status" id="editStatus" class="form-control">
                                    <option value="#" selected disabled>Pilih Status</option>                               
                                        <option value="pending">Pending</option>                                
                                        <option value="approved">Approved</option>                                
                                        <option value="rejected">Rejected</option>                                
                                </select>
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
        document.getElementById('editStatus').value = value.status; // Set the name field value        
        document.querySelector('#update form').action = "{{ url('dashboard/documents') }}/" + value.id;
    }
</script>
@endpush