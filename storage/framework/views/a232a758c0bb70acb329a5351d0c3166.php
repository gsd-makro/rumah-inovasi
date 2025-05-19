<div class="modal fade" id="deleteSub<?php echo e($subSubMenu->id); ?>" tabindex="-1"
    aria-labelledby="deleteSubSubLabel<?php echo e($subSubMenu->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSubSubLabel<?php echo e($subSubMenu->id); ?>">Hapus Sub Submenu
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus sub submenu
                    "<strong><?php echo e($subSubMenu->name); ?></strong>"?</p>
            </div>
            <form action="<?php echo e(route('menus.destroy', $subSubMenu->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus Sub Submenu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/menus/_delete_subsubmenu.blade.php ENDPATH**/ ?>