<div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Tambah Data</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('documents.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="basicInput">Judul</label>
                        <input type="text" name="title" class="form-control" id="basicInput"
                            placeholder="Masukkan Judul Dokumen">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Berkas</label>
                        <input type="file" name="file_path" class="form-control" accept=".pdf" id="file_path"
                            placeholder="Masukkan File Dokumen">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control">
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
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/documents/_add.blade.php ENDPATH**/ ?>