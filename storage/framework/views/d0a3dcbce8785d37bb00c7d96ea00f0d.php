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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="basicInput">Judul</label>
                        <input type="text" name="title" class="form-control" id="editTitle"
                            placeholder="Masukkan Judul Dokumen">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Berkas</label>
                        <input type="file" name="file_path" class="form-control" id="file_path"
                            placeholder="Masukkan File Dokumen" accept=".pdf">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Menu</label>
                        <select name="menu_id" id="editMenu" class="form-control">
                            <option value="#" selected disabled>Pilih Menu</option>
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($menu->id); ?>"><?php echo e($menu->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->startPush('scripts'); ?>
    <script>
        function openEditModal(value) {
            // Set the values in the modal's form fields
            document.getElementById('editTitle').value = value.title; // Set the name field value
            document.getElementById('editMenu').value = value.menu_id; // Set the name field value
            document.querySelector('#update form').action = "<?php echo e(url('dashboard/documents')); ?>/" + value.id;
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/documents/_edit.blade.php ENDPATH**/ ?>