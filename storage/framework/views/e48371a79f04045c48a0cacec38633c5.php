

<ul id="primary-menu" class="menu">
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php ($isActive = $loop->first); ?>
        <li id="menu-item-<?php echo e($menu->id); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            "menu-item-{$menu->id}",
            'menu-item',
            'menu-item-type-custom',
            'menu-item-object-custom',
            'menu-item-home' => $loop->first,
            'current-menu-item current_page_item active' => $isActive,
            'menu-item-has-children' => $menu->children->isNotEmpty(),
        ]); ?>">
            <a href="<?php echo e($menu->url); ?>"
                <?php if($isActive): ?> aria-current="page" <?php endif; ?>><?php echo e($menu->title); ?></a>
            <?php if($menu->children->isNotEmpty()): ?>
                <ul class="sub-menu">
                    <?php echo $__env->renderEach('partials.submenu', $menu->children, 'menu'); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/components/navbar.blade.php ENDPATH**/ ?>