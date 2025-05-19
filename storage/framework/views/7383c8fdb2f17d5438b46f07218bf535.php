<?php $__env->startSection('title', 'Manajemen Artikel'); ?>
<?php $__env->startSection('subtitle', 'Halaman untuk mengelola dan mengatur daftar artikel dalam sistem.'); ?>

<?php $__env->startSection('main'); ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Artikel</h4>
                    <!-- Button trigger for basic modal -->
                    <a href="<?php echo e(route('articles.index')); ?>">
                        <button type="button" class="btn btn-secondary block">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('articles.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="basicInput">Judul</label>
                        <input type="text" name="title" class="form-control" id="basicInput"
                            placeholder="Masukkan Judul Dokumen">
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" class="image-preview-filepond">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Subjek</label>
                        <select name="subject_id" id="subject_id" class="form-control">
                            <option value="#" selected disabled>Pilih Subjek</option>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Konten</label>
                        <?php if (isset($component)) { $__componentOriginal8343eae0b6dfb096868ee4778f600a9e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8343eae0b6dfb096868ee4778f600a9e = $attributes; } ?>
<?php $component = App\View\Components\QuillEditor::resolve(['name' => 'content','value' => ''.e(old('content', $post->content ?? '')).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('quill-editor'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\QuillEditor::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8343eae0b6dfb096868ee4778f600a9e)): ?>
<?php $attributes = $__attributesOriginal8343eae0b6dfb096868ee4778f600a9e; ?>
<?php unset($__attributesOriginal8343eae0b6dfb096868ee4778f600a9e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8343eae0b6dfb096868ee4778f600a9e)): ?>
<?php $component = $__componentOriginal8343eae0b6dfb096868ee4778f600a9e; ?>
<?php unset($__componentOriginal8343eae0b6dfb096868ee4778f600a9e); ?>
<?php endif; ?>

                    </div>
                    <div class="divider"></div>
                    <div class="d-flex justify-content-end">
                        
                        <button type="submit" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/extensions/choices.js/public/assets/styles/choices.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/extensions/filepond/filepond.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('/extensions/choices.js/public/assets/scripts/choices.js')); ?>"></script>
    <script src="<?php echo e(asset('/static/js/pages/form-element-select.js')); ?>"></script>
    <script src="<?php echo e(asset('/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js')); ?>"></script>
    <script
        src="<?php echo e(asset('/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js')); ?>">
    </script>
    <script src="<?php echo e(asset('/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/extensions/filepond/filepond.js')); ?>"></script>
    <script src="<?php echo e(asset('/static/js/pages/filepond.js')); ?>"></script>
    <script src="<?php echo e(asset('/extensions/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/static/js/pages/filepond.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js" defer></script>
    <script src="https://unpkg.com/quill-paste-smart@latest/dist/quill-paste-smart.js" defer></script>
    <script>
        new DataTable('#table1');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js"></script>
    <?php if(session('success')): ?>
        <script>
            Swal.fire({
                title: "Success!",
                text: "<?php echo e(session('success')); ?>",
                icon: "success",
                timer: 2000
            });
        </script>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <script>
            Swal.fire({
                title: "Error!",
                text: "<?php echo e(session('error')); ?>",
                icon: "error",
                timer: 2000
            });
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/articles/create.blade.php ENDPATH**/ ?>