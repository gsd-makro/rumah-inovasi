<div class="aft-main-breadcrumb-wrapper container-wrapper">
  <div class="af-breadcrumbs font-family-1 color-pad">
    <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
      <ul class="trail-items">
        <meta name="numberOfItems" content="<?php echo e(count($breadcrumbs)); ?>">
        <meta name="itemListOrder" content="Ascending">
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($breadcrumb['url']): ?>
            <li itemprop="itemListElement" class="trail-item trail-end">
              <a href="<?php echo e($breadcrumb['url']); ?>" itemprop="item">
                <span itemprop="name">
                  <?php echo e($breadcrumb['label']); ?>

                </span>
              </a>
              <meta itemprop="position" content="<?php echo e($loop->index + 1); ?>">
            </li>
          <?php else: ?>
            <li itemprop="itemListElement" class="trail-item trail-end">
              <span itemprop="name">
                <?php echo e($breadcrumb['label']); ?>

              </span>
              <meta itemprop="position" content="<?php echo e($loop->index + 1); ?>">
            </li>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  </div>
</div>
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/components/breadcrumb.blade.php ENDPATH**/ ?>