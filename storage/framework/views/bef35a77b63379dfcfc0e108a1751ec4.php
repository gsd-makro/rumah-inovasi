<!doctype html>
<html lang="id">

<head>
  <?php echo $__env->make('partials.landing.header', ['title' => $title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body
  class="home blog wp-embed-responsive hfeed aft-light-mode aft-header-layout-centered header-image-default widget-title-border-bottom default-content-layout align-content-left af-wide-layout aft-section-layout-background">

  <div id="af-preloader">
    <div id="loader-wrapper">
      <div id="loader"></div>
    </div>
  </div>

  <div id="page" class="site af-whole-wrapper">
    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
    <header id="masthead" class="header-layout-centered chromenews-header">
      <div class="top-header">
        <div class="container-wrapper">
          <div class="top-bar-flex">
            <div class="top-bar-left col-2">
              <div class="date-bar-left">
                <span class="topbar-date">
                  <?php echo e(date('d F Y')); ?> <span id="topbar-time"></span>
                </span>
              </div>
            </div>
            <div class="top-bar-right col-2">
              <div class="aft-small-social-menu"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="mid-header-wrapper " data-background="">
        <div class="mid-header">
          <div class="container-wrapper">
            <div class="mid-bar-flex">
              <div class="logo">
                <div class="site-branding uppercase-site-title">
                  <h1 class="site-title font-family-1">
                    <a href="<?php echo e(env('APP_URL', 'https://bapppeda.gorontaloprov.go.id')); ?>" class="site-title-anchor"
                      rel="home"></a>
                  </h1>
                  <p class="site-description">Rumah Inovasi Gorontalo</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="below-mid-header">
          <div class="container-wrapper">
            <div class="header-promotion">
              <div class="banner-promotions-wrapper">
                <div class="promotion-section">
                  <a href="" target="_blank">
                    <img width="1280" height="426" src="<?php echo e(asset('/static/images/banner-new.png')); ?>"
                      class="attachment-full size-full" alt="" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="main-navigation-bar" class="bottom-header">
        <div class="container-wrapper">
          <div class="bottom-nav">
            <div class="offcanvas-navigaiton">
              <div class="navigation-container">
                <nav class="main-navigation clearfix">
                  <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                    <a href="javascript:void(0)" class="aft-void-menu">
                      <span class="screen-reader-text">Menu Utama</span>
                      <i class="ham"></i>
                    </a>
                  </span>

                  <div class="menu main-menu menu-desktop show-menu-border">
                    <?php if (isset($component)) { $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e = $attributes; } ?>
<?php $component = App\View\Components\Navbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Navbar::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $attributes = $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $component = $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <?php echo $__env->yieldContent('main'); ?>

    <footer class="site-footer aft-footer-sidebar-col-0" data-background="" style="margin-top: 20px">
      <div class="site-info">
        <div class="container-wrapper">
          <div class="af-container-row">
            <div class="col-1 color-pad">
              Copyright &copy; All rights reserved. <span class="sep"> | </span>
              Bappeda Provinsi Gorontalo
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>


  <a id="scroll-up" class="secondary-color right">
  </a>
  <?php echo $__env->make('partials.landing.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/layouts/landing.blade.php ENDPATH**/ ?>