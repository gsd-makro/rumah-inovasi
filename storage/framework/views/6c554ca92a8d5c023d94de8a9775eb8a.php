<?php $__env->startSection('main'); ?>
  <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['breadcrumbs' => [
      ['label' => 'Beranda', 'url' => route('landing.home')],
      ['label' => 'Produk Hukum', 'url' => null],
      ['label' => 'Undang-undang', 'url' => null],
  ]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
      ['label' => 'Beranda', 'url' => route('landing.home')],
      ['label' => 'Produk Hukum', 'url' => null],
      ['label' => 'Undang-undang', 'url' => null],
  ])]); ?>
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
    <div class="content-area">
      <main id="main" class="site-main">
        <article id="post-853" class="post-853 page type-page status-publish hentry">
          <header class="entry-header">
            <h1 class="entry-title"><?php echo e($currentMenu->name); ?></h1>
          </header>

          <div class="entry-content-wrap">
            <div class="entry-content">
              <table id="tablepress-1" class="tablepress tablepress-id-1">
                <thead>
                  <tr class="row-1 odd">
                    <th class="column-1">NO</th>
                    <th class="column-2">NAMA DOKUMEN</th>
                    <th class="column-3">DOWNLOAD</th>
                  </tr>
                </thead>
                <tbody class="row-hover">
                  <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="row-<?php echo e($loop->iteration); ?> <?php echo e($loop->even ? 'even' : 'odd'); ?>">
                      <td class="column-1"><?php echo e($loop->iteration); ?></td>
                      <td class="column-2"><?php echo e($document->title); ?></td>
                      <td class="column-3">
                        <a href="<?php echo e(asset('storage/' . $document->file_path)); ?>" download="<?php echo e($document->title); ?>">
                          Download <i class="fa fa-download"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
          </div>
        </article>
      </main>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script type="text/javascript" src="<?php echo e(asset('/vendor/js/chromenews.js')); ?>" id="chromenews-script-js"></script>
  <script type="text/javascript" src="<?php echo e(asset('/vendor/js/jquery.datatables.min.js')); ?>" id="tablepress-datatables-js">
  </script>
  <script type="text/javascript">
    jQuery(function($) {
      var DT_language = {
        "id_ID": {
          "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
          "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
          "infoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
          "infoPostFix": "",
          "lengthMenu": "Tampilkan _MENU_ entri",
          "processing": "Sedang memproses...",
          "search": "Cari:",
          "zeroRecords": "Tidak ditemukan data yang sesuai",
          "paginate": {
            "first": "Pertama",
            "previous": "Sebelumnya",
            "next": "Selanjutnya",
            "last": "Terakhir"
          },
          "decimal": ",",
          "thousands": "."
        }
      };
      $('#tablepress-1').DataTable({
        "language": DT_language["id_ID"],
        "order": [],
        "orderClasses": false,
        "stripeClasses": ["even", "odd"],
        "pagingType": "simple"
      });
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/landing/documents.blade.php ENDPATH**/ ?>