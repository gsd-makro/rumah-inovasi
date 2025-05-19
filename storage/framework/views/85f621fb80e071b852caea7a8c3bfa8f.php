<?php $__env->startSection('main'); ?>
  <section
    class="aft-blocks aft-main-banner-section banner-carousel-1-wrap bg-fixed  chromenews-customizer aft-banner-layout-aligned aft-banner-background-default aft-banner-order-1"
    data-background="">
    <div class="banner-exclusive-posts-wrapper">
      <div class="container-wrapper">
        <div class="exclusive-posts">
          <div class="exclusive-now primary-color">
            <div class="aft-ripple"></div>
            <span>Breaking News</span>
          </div>
          <div class="exclusive-slides" dir="ltr">
            <div class='marquee aft-flash-slide left' data-speed='120000' data-gap='0' data-duplicated='true'
              data-direction="left">
              <?php $__currentLoopData = $breaking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal52316ac636f6062354b92b46867ea415 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal52316ac636f6062354b92b46867ea415 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breaking','data' => ['url' => $news->url,'title' => $news->title,'thumbnail' => $news->thumbnail]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breaking'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->url),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->title),'thumbnail' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->thumbnail)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal52316ac636f6062354b92b46867ea415)): ?>
<?php $attributes = $__attributesOriginal52316ac636f6062354b92b46867ea415; ?>
<?php unset($__attributesOriginal52316ac636f6062354b92b46867ea415); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal52316ac636f6062354b92b46867ea415)): ?>
<?php $component = $__componentOriginal52316ac636f6062354b92b46867ea415; ?>
<?php unset($__componentOriginal52316ac636f6062354b92b46867ea415); ?>
<?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-wrapper">
      <div class="aft-main-banner-wrapper">
        <div class="aft-main-banner-part aft-banner-aligned af-container-row-5 ">
          <div class="aft-slider-part col-1 pad">
            <div class="aft-main-banner-slider-part chromenews-customizer col-66 pad">
              <div class="af-widget-carousel aft-carousel">
                <div
                  class="slick-wrapper af-banner-carousel af-banner-carousel-1 common-carousel af-cat-widget-carousel af-carousel-default"
                  data-slick='{"slidesToShow":1,"slidesToScroll":1,"autoplay":true,"autoplaySpeed":8000,"centerMode":false,"centerPadding":"","responsive":[{"breakpoint":1025,"settings":{"slidesToShow":1,"slidesToScroll":1,"infinite":true,"centerPadding":""}},{"breakpoint":600,"settings":{"slidesToShow":1,"slidesToScroll":1,"infinite":true,"centerPadding":""}},{"breakpoint":480,"settings":{"slidesToShow":1,"slidesToScroll":1,"infinite":true,"centerPadding":""}}]}'>
                  <?php $__currentLoopData = $carousel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slick-item">
                      <?php if (isset($component)) { $__componentOriginal674edb642373dbe7e65d305f5852bdcc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal674edb642373dbe7e65d305f5852bdcc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news-card-1','data' => ['title' => $news->title,'url' => $news->url,'thumbnail' => $news->thumbnail,'author' => $news->author,'date' => $news->date,'categories' => $news->categories]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('news-card-1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->title),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->url),'thumbnail' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->thumbnail),'author' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->author),'date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->date),'categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->categories)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal674edb642373dbe7e65d305f5852bdcc)): ?>
<?php $attributes = $__attributesOriginal674edb642373dbe7e65d305f5852bdcc; ?>
<?php unset($__attributesOriginal674edb642373dbe7e65d305f5852bdcc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal674edb642373dbe7e65d305f5852bdcc)): ?>
<?php $component = $__componentOriginal674edb642373dbe7e65d305f5852bdcc; ?>
<?php unset($__componentOriginal674edb642373dbe7e65d305f5852bdcc); ?>
<?php endif; ?>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="af-main-navcontrols af-slick-navcontrols"></div>
              </div>
            </div>

            <div class="chromenews-customizer aft-3-trending-posts col-3 pad">
              <div class="af-title-subtitle-wrap">
                <h4 class="widget-title header-after1 ">
                  <span class="heading-line-before"></span>
                  <span class="sub-heading-line"></span>
                  <span class="heading-line">Populer</span>
                  <span class="heading-line-after"></span>
                </h4>
              </div>
              <div class="full-wid-resp">
                <div class="slick-wrapper banner-vertical-slider af-widget-carousel"
                  data-slick='{"autoplay":true,"autoplaySpeed":9000}'>
                  <?php $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slick-item">
                      <?php if (isset($component)) { $__componentOriginal142919acd941c83c536b4d834ba6d3cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal142919acd941c83c536b4d834ba6d3cb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news-card-2','data' => ['title' => $news->title,'url' => $news->url,'thumbnail' => $news->thumbnail,'date' => $news->date,'no' => $loop->iteration]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('news-card-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->title),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->url),'thumbnail' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->thumbnail),'date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->date),'no' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loop->iteration)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal142919acd941c83c536b4d834ba6d3cb)): ?>
<?php $attributes = $__attributesOriginal142919acd941c83c536b4d834ba6d3cb; ?>
<?php unset($__attributesOriginal142919acd941c83c536b4d834ba6d3cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal142919acd941c83c536b4d834ba6d3cb)): ?>
<?php $component = $__componentOriginal142919acd941c83c536b4d834ba6d3cb; ?>
<?php unset($__componentOriginal142919acd941c83c536b4d834ba6d3cb); ?>
<?php endif; ?>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="af-trending-navcontrols af-slick-navcontrols"></div>
              </div>
            </div>
          </div>

          <div class="aft-trending-part col-1 pad">
            <div class="aft-4-thumbs-horizontal aft-horizontal-grid-part chromenews-customizer col-1 pad">
              <div class="af-title-subtitle-wrap">
                <h4 class="widget-title header-after1 ">
                  <span class="heading-line-before"></span>
                  <span class="sub-heading-line"></span>
                  <span class="heading-line">Nasional</span>
                  <span class="heading-line-after"></span>
                </h4>
              </div>
              <div class="af-main-banner-thumb-posts">
                <div class="section-wrapper">
                  <div class="slick-wrapper banner-thumb-carousel small-grid-style af-widget-carousel clearfix"
                    data-slick='{"autoplay":true,"autoplaySpeed":12000}'>
                    <?php $__currentLoopData = $national; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="slick-item">
                        <div class="af-sec-post">
                          <?php if (isset($component)) { $__componentOriginal674edb642373dbe7e65d305f5852bdcc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal674edb642373dbe7e65d305f5852bdcc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news-card-1','data' => ['title' => $news->title,'url' => $news->url,'thumbnail' => $news->thumbnail,'author' => $news->author,'date' => $news->date,'categories' => $news->categories]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('news-card-1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->title),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->url),'thumbnail' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->thumbnail),'author' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->author),'date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->date),'categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->categories)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal674edb642373dbe7e65d305f5852bdcc)): ?>
<?php $attributes = $__attributesOriginal674edb642373dbe7e65d305f5852bdcc; ?>
<?php unset($__attributesOriginal674edb642373dbe7e65d305f5852bdcc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal674edb642373dbe7e65d305f5852bdcc)): ?>
<?php $component = $__componentOriginal674edb642373dbe7e65d305f5852bdcc; ?>
<?php unset($__componentOriginal674edb642373dbe7e65d305f5852bdcc); ?>
<?php endif; ?>
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                  <div class="af-thumb-navcontrols af-slick-navcontrols"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="aft-frontpage-feature-section-wrapper mb-5">
    <section class="aft-blocks af-main-banner-featured-posts">
      <div class="container-wrapper">
        <div class="af-main-banner-featured-posts featured-posts chromenews-customizer">
          <div class="af-title-subtitle-wrap">
            <h4 class="widget-title header-after1 ">
              <span class="heading-line-before"></span>
              <span class="sub-heading-line"></span>
              <span class="heading-line">Internasional</span>
              <span class="heading-line-after"></span>
            </h4>
          </div>

          <div class="section-wrapper af-widget-body">
            <div class="af-container-row clearfix">
              <?php $__currentLoopData = $international; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-3 pad float-l trending-posts-item">
                  <?php if (isset($component)) { $__componentOriginal142919acd941c83c536b4d834ba6d3cb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal142919acd941c83c536b4d834ba6d3cb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.news-card-2','data' => ['title' => $news->title,'url' => $news->url,'thumbnail' => $news->thumbnail,'date' => $news->date]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('news-card-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->title),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->url),'thumbnail' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->thumbnail),'date' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news->date)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal142919acd941c83c536b4d834ba6d3cb)): ?>
<?php $attributes = $__attributesOriginal142919acd941c83c536b4d834ba6d3cb; ?>
<?php unset($__attributesOriginal142919acd941c83c536b4d834ba6d3cb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal142919acd941c83c536b4d834ba6d3cb)): ?>
<?php $component = $__componentOriginal142919acd941c83c536b4d834ba6d3cb; ?>
<?php unset($__componentOriginal142919acd941c83c536b4d834ba6d3cb); ?>
<?php endif; ?>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/landing/home.blade.php ENDPATH**/ ?>