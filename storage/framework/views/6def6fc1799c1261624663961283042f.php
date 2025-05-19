<div class="pos-rel read-single color-pad clearfix af-cat-widget-carousel grid-design-texts-over-image">
  <div class="read-img pos-rel read-bg-img">
    <a class="aft-post-image-link" href="<?php echo e($url); ?>">
      <?php echo e($title); ?>

    </a>
    <img width="640" height="359" src="<?php echo e($thumbnail); ?>" class="attachment-large size-large" alt="" />
    <div class="post-format-and-min-read-wrap">
      <span class="min-read">2 min read</span>
    </div>
  </div>

  <div class="pad read-details color-tp-pad">
    <div class="read-categories">
      <ul class="cat-links">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="meta-category">
            <a class="chromenews-categories category-color-1" href="<?php echo e($category->url); ?>">
              <?php echo e($category->name); ?>

            </a>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>

    <div class="read-title">
      <h4>
        <a href="<?php echo e($url); ?>">
          <?php echo e($title); ?>

        </a>
      </h4>
    </div>

    <div class="post-item-metadata entry-meta">
      <span class="author-links">
        <span class="item-metadata posts-author byline">
          <i class="far fa-user-circle"></i>
          <?php echo e($author); ?>

        </span>
        <span class="item-metadata posts-date">
          <i class="far fa-clock" aria-hidden="true"></i>
          <?php echo e($date); ?>

        </span>
      </span>
      <span class="aft-comment-view-share"></span>
    </div>
  </div>
</div>
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/components/news-card-1.blade.php ENDPATH**/ ?>