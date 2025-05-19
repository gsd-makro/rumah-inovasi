<?php $__env->startSection('title', 'Policy Brief > Tambah Data'); ?>
<?php $__env->startSection('subtitle', 'Policy Brief.'); ?>
<?php $__env->startSection('main'); ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Upload Policy Brief</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('policy_briefs.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control id="title" name="title"
                            placeholder="Masukkan judul Policy Brief" required>
                    </div>
                    <div class="form-group">
                        <label for="indikator">Pilih Indikator</label>
                        <select class="choices form-select multiple-remove" name="indicators[]" multiple="multiple">
                            <optgroup label="Pilih Indikator">
                                <?php $__currentLoopData = $indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/extensions/choices.js/public/assets/styles/choices.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('/extensions/choices.js/public/assets/scripts/choices.js')); ?>"></script>
    <script src="<?php echo e(asset('/static/js/pages/form-element-select.js')); ?>"></script>
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/policy_briefs/_add.blade.php ENDPATH**/ ?>