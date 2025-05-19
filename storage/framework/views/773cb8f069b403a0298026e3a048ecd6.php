<?php $__env->startPush('styles'); ?>
  <style>
    .infographic {
      display: block;
      position: relative;
      aspect-ratio: 2/3;
      width: 100%;
      overflow: hidden;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      cursor: pointer;
    }

    .infographic__thumbnail {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: flex;
    }

    .infographic__thumbnail>i {
      margin: auto;
      font-size: 4rem;
      color: #F40F02aa;
    }

    .infographic__title {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 10px;
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      font-size: 1.2rem;
      font-weight: bold;
      text-align: center;
      opacity: 0;
      transition: opacity 0.3s;
      margin: 0;
    }

    .infographic:hover .infographic__title {
      opacity: 1;
    }

    .accordion {
      cursor: pointer;
      padding: 10px;
      border: none;
      text-align: left;
      outline: none;
      font-size: 1.2rem;
      transition: 0.4s;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .accordion .fa {
      transform: rotate(-90deg);
      transition: transform 0.1s;
    }

    .accordion.active .fa {
      transform: rotate(0deg);
    }

    .panel {
      padding: 0 10px;
      display: none;
      overflow: hidden;
      transition: max-height 0.2s ease-out;
      border: none;
      -webkit-box-shadow: none;
      box-shadow: none;
    }

    .accordion.active+.panel {
      display: block;
    }

    .panel a {
      display: block;
      color: #333;
      text-decoration: none;
      border: none !important;
    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var acc = document.getElementsByClassName('accordion');
      for (var i = 0; i < acc.length; i++) {
        acc[i].addEventListener('click', function() {
          this.classList.toggle('active');
        });
      }
    });
  </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main'); ?>
  <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['breadcrumbs' => [['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Policy Brief', 'url' => null]]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Policy Brief', 'url' => null]])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $attributes = $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $component = $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>

  <div id="content" class="container-wrapper">
    <div class="section-block-upper">
      <div id="secondary" class="sidebar-area sidebar-sticky-top" style="padding-left: 0; padding-right: 10px">
        <aside class="widget-area color-pad">
          <div id="block-6" class="widget chromenews-widget widget_block">
            <div class="wp-block-group">
              <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                <h2 class="wp-block-heading">Subjek</h2>

                <ul class="wp-block-categories-list wp-block-categories">
                  <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="cat-item cat-item-<?php echo e($subject->id); ?>">
                      <details>
                        <summary class="accordion">
                          <?php echo e($subject->name); ?>

                          <i class="fa fa-chevron-down"></i>
                        </summary>

                        <div class="panel">
                          <ul>
                            <?php $__currentLoopData = $subject->indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li>
                                <a href="<?php echo e($currentMenu->url); ?>?indicator_id=<?php echo e($indicator->id); ?>">
                                  <?php echo e($indicator->name); ?>

                                </a>
                              </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                        </div>
                      </details>
                    </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            </div>
          </div>
        </aside>
      </div>

      <div id="primary" class="content-area" style="padding-left: 10px; padding-right: 0;">
        <main id="main" class="site-main">
          <article id="post-853" class="post-853 page type-page status-publish hentry">
            <header class="entry-header">
              <h1 class="entry-title">Policy Brief</h1>
            </header>

            <div class="entry-content-wrap">
              <div class="entry-content">
                <div class="section-wrapper af-widget-body">
                  <?php $__currentLoopData = $policyBriefs->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="af-container-row clearfix" style="margin-bottom: 20px">
                      <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policyBrief): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-4 pad float-l trending-posts-item">
                          <a class="infographic" href="<?php echo e(asset('storage/' . $policyBrief->file_path)); ?>" target="_blank">
                            <div class="infographic__thumbnail" loading="lazy">
                              <i class="fa fa-file-pdf"></i>
                            </div>
                            <h3 class="infographic__title"><?php echo e($policyBrief->title); ?></h3>
                          </a>
                        </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
          </article>
        </main>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/landing/policy_briefs.blade.php ENDPATH**/ ?>