<div class="modal fade" id="update<?php echo e($subMenu->id); ?>" tabindex="-1" aria-labelledby="updateSubLabel<?php echo e($subMenu->id); ?>"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSubLabel<?php echo e($subMenu->id); ?>">Ubah Submenu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('menus.update', $subMenu->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="updateSubSubMenuName<?php echo e($subMenu->id); ?>" class="form-label">Nama Sub Submenu</label>
                        <input type="text" class="form-control" id="updateSubSubMenuName<?php echo e($subMenu->id); ?>"
                            name="name" value="<?php echo e($subMenu->name); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateSubSubMenuTitle<?php echo e($subMenu->id); ?>" class="form-label">Judul Sub
                            Submenu</label>
                        <input type="text" class="form-control" id="updateSubSubMenuTitle<?php echo e($subMenu->id); ?>"
                            name="title" value="<?php echo e($subMenu->title); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="menuContentType" class="form-label">Tipe Konten</label>
                        <select name="content_type" class="form-select" id="menuContentType">
                            <?php $contentTypes = ['khusus','infographic', 'document','policy brief', 'video', 'foto']; ?>
                            <option value="" selected>Pilih tipe konten</option>
                            <?php $__currentLoopData = $contentTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contentType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($contentType); ?>"
                                    <?php echo e($contentType == $subMenu->content_type ? 'selected' : ''); ?>>
                                    <?php echo e(ucfirst($contentType)); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p>Kosongkan Tipe Konten jika memilki submenu</p>
                    </div>

                    <!-- Active Status Toggle -->
                    <div class="mb-3">
                        <label class="form-label d-block">Status Menu</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox"
                                id="updateSubSubMenuActive<?php echo e($subMenu->id); ?>" name="is_active"
                                <?php echo e($subMenu->is_active ? 'checked' : ''); ?>>
                            <label class="form-check-label"
                                for="updateSubSubMenuActive<?php echo e($subMenu->id); ?>">Aktif</label>
                        </div>
                    </div>
                    <!-- Order Dropdown -->
                    <div class="mb-3">
                        <label for="updateSubSubMenuOrder<?php echo e($subMenu->id); ?>" class="form-label">Urutan Menu (Saat Ini:
                            <?php echo e($subMenu->order); ?>)</label>
                        <select class="form-select" id="updateSubSubMenuOrder<?php echo e($subMenu->id); ?>" name="order">
                            <?php $__currentLoopData = $menu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($menu->order); ?>"
                                    <?php echo e($menu->order == $subMenu->order ? 'selected' : ''); ?>>
                                    Urutan <?php echo e($menu->order); ?>

                                    <?php echo e($menu->order == $subMenu->order ? '(Saat Ini)' : ''); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <small class="form-text text-muted">
                            Memilih urutan ini akan menukar posisi menu ini dengan menu lain yang memiliki urutan
                            tersebut.
                        </small>
                    </div>

                    <input type="hidden" name="parent_id" value="<?php echo e($subMenu->parent_id); ?>">
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
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/menus/_edit_submenu.blade.php ENDPATH**/ ?>