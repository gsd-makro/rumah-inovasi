

<li id="menu-item-<?php echo e($menu->id); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
    "menu-item-{$menu->id}",
    'menu-item',
    'menu-item-type-custom',
    'menu-item-object-custom',
    'menu-item-has-children' => $menu->children->isNotEmpty(),
]); ?>">
  <a href="<?php echo e($menu->url); ?>"><?php echo e($menu->title); ?></a>
  <?php if($menu->children->isNotEmpty()): ?>
    <ul class="sub-menu">
      <?php echo $__env->renderEach('partials.submenu', $menu->children, 'menu'); ?>
    </ul>
  <?php endif; ?>
</li>
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/partials/submenu.blade.php ENDPATH**/ ?>