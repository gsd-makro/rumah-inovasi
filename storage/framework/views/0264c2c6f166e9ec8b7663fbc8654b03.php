<div class="modal fade" id="updateSub<?php echo e($subSubMenu->id); ?>" tabindex="-1"
    aria-labelledby="updateSubSubLabel<?php echo e($subSubMenu->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSubSubLabel<?php echo e($subSubMenu->id); ?>">Ubah Sub Submenu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('menus.update', $subSubMenu->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="updateSubSubMenuName<?php echo e($subSubMenu->id); ?>" class="form-label">Nama Sub
                            Submenu</label>
                        <input type="text" class="form-control" id="updateSubSubMenuName<?php echo e($subSubMenu->id); ?>"
                            name="name" value="<?php echo e($subSubMenu->name); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateSubSubMenuTitle<?php echo e($subSubMenu->id); ?>" class="form-label">Judul Sub
                            Submenu</label>
                        <input type="text" class="form-control" id="updateSubSubMenuTitle<?php echo e($subSubMenu->id); ?>"
                            name="title" value="<?php echo e($subSubMenu->title); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="menuContentType" class="form-label">Tipe Konten</label>
                        <select name="content_type" class="form-select" id="menuContentType">
                            <?php $contentTypes = ['khusus','infographic', 'document', 'policy brief' ,'video', 'foto']; ?>
                            <option value="" selected>Pilih tipe konten</option>
                            <?php $__currentLoopData = $contentTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contentType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($contentType); ?>"
                                    <?php echo e($contentType == $subSubMenu->content_type ? 'selected' : ''); ?>>
                                    <?php echo e(ucfirst($contentType)); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Active Status Toggle -->
                    <div class="mb-3">
                        <label class="form-label d-block">Status Menu</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox"
                                id="updateSubSubMenuActive<?php echo e($subSubMenu->id); ?>" name="is_active"
                                <?php echo e($subSubMenu->is_active ? 'checked' : ''); ?>>
                            <label class="form-check-label"
                                for="updateSubSubMenuActive<?php echo e($subSubMenu->id); ?>">Aktif</label>
                        </div>
                    </div>
                    <!-- Order Dropdown -->
                    <div class="mb-3">
                        <label for="updateSubSubMenuOrder<?php echo e($subSubMenu->id); ?>" class="form-label">Urutan Menu (Saat
                            Ini: <?php echo e($subSubMenu->order); ?>)</label>
                        <select class="form-select" id="updateSubSubMenuOrder<?php echo e($subSubMenu->id); ?>" name="order">
                            <?php $__currentLoopData = $subMenu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($menu->order); ?>"
                                    <?php echo e($menu->order == $subSubMenu->order ? 'selected' : ''); ?>>
                                    Urutan <?php echo e($menu->order); ?>

                                    <?php echo e($menu->order == $subSubMenu->order ? '(Saat Ini)' : ''); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <small class="form-text text-muted">
                            Memilih urutan ini akan menukar posisi menu ini dengan menu lain yang memiliki urutan
                            tersebut.
                        </small>
                    </div>

                    <input type="hidden" name="parent_id" value="<?php echo e($subSubMenu->parent_id); ?>">
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
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/menus/_edit_subsubmenu.blade.php ENDPATH**/ ?>