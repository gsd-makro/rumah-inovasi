<div class="modal fade" id="deleteMain<?php echo e($menu->id); ?>" tabindex="-1"
    aria-labelledby="deleteMainLabel<?php echo e($menu->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMainLabel<?php echo e($menu->id); ?>">Hapus Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus menu "<strong><?php echo e($menu->name); ?></strong>, karena akan menghapus submenu lain"?</p>
            </div>
            <form action="<?php echo e(route('menus.destroy', $menu->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/menus/_delete_menu.blade.php ENDPATH**/ ?>