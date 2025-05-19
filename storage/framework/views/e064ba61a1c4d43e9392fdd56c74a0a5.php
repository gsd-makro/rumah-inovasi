<?php $__env->startSection('title', 'Manajemen Subjek'); ?>
<?php $__env->startSection('subtitle', 'Halaman untuk mengelola dan mengatur daftar subjek dalam sistem.'); ?>

<?php $__env->startSection('main'); ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Subjek</h4>
                    <!-- Button trigger for basic modal -->
                    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Subjek <i class="bi bi-plus-circle"></i>
                    </button>
                    <?php echo $__env->make('dashboard.subjects._add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('dashboard.subjects._edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('dashboard.subjects._delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th width="auto">No</th>
                            <th width="50%">Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-bold-500"><?php echo e($key + 1); ?></td>
                                <td class="text-bold-500"><?php echo e($subject->name); ?></td>
                                <td>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                        data-bs-target="#update" onclick="openEditModal(<?php echo e($subject); ?>)">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete" onclick="openDeleteModal(<?php echo e($subject); ?>)"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        new DataTable('#table1');
    </script>
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/subjects/index.blade.php ENDPATH**/ ?>