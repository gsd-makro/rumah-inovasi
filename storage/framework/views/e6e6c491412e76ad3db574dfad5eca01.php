<?php $__env->startSection('title', 'Infografik > Edit Data'); ?>
<?php $__env->startSection('subtitle', 'Infografik.'); ?>
<?php $__env->startSection('main'); ?>
    <section class="section">
        <div class="card">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card-header">
                        <h4 class="card-title">Upload Infografik</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('infographics.update', $infographic->id)); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control" value="<?php echo e($infographic->title); ?>" id="title"
                                    name="title" placeholder="Masukkan judul infografik" required>
                            </div>
                            <div class="form-group">
                                <label for="indikator">Pilih Indikator</label>
                                <select class="choices form-select multiple-remove" name="indicators[]" multiple="multiple">
                                    <optgroup label="Pilih Indikator">
                                        <?php $__currentLoopData = $indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $selected = in_array(
                                                    $item->id,
                                                    $infographic->indicators->pluck('id')->toArray(),
                                                )
                                                    ? 'selected'
                                                    : '';
                                            ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($selected); ?>><?php echo e($item->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <input type="file" name="image" class="image-preview-filepond">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="text-center">
                        <img src="<?php echo e(asset('storage/' . $infographic->image)); ?>" alt="<?php echo e($infographic->title); ?>"
                            class="img-fluid">
                        <p class="mt-2">Gambar Saat Ini</p>
                    </div>
                </div>
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
    <script src="<?php echo e(asset('/static/js/components/dark.js')); ?>"></script>
    <script src="<?php echo e(asset('/extensions/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/static/js/pages/filepond.js')); ?>"></script>
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/infographics/_edit.blade.php ENDPATH**/ ?>