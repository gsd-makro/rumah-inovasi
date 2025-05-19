<?php $__env->startSection('title', 'Manajemen Policy Brief'); ?>
<?php $__env->startSection('subtitle', 'Halaman untuk mengelola dan mengatur daftar policy brief dalam sistem.'); ?>

<?php $__env->startSection('main'); ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Policy Brief</h4>
                    <a href="<?php echo e(route('policy_briefs.create')); ?>" class="btn btn-primary">
                        Tambah Data <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
            </div>
            <?php echo $__env->make('dashboard.policy_briefs._delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('dashboard.policy_briefs._verify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th width="60%">Judul</th>
                                <th width="30%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $policy_briefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $policy_brief): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-bold-500"><?php echo e($key + 1); ?></td>
                                    <td>
                                        <div class="d-flex align-items-start gap-3">
                                            <div class="">
                                                <img src="<?php echo e(asset('img/logo-pdf.png')); ?>" class="img-thumbnail"
                                                    alt="pdf" loading="lazy" style="width: 50px; height: auto;">
                                            </div>
                                            <div>
                                                <strong><?php echo e($policy_brief->title); ?></strong><br>
                                                <div>
                                                    <?php if($policy_brief->status == 'pending'): ?>
                                                        <span class="badge bg-secondary">Menunggu</span>
                                                    <?php elseif($policy_brief->status == 'approved'): ?>
                                                        <span class="badge bg-success">Disetujui</span>
                                                    <?php elseif($policy_brief->status == 'rejected'): ?>
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>
                                        <span class="text-muted small">
                                            Dibuat oleh: <?php echo e($policy_brief->user->name); ?> pada
                                            <?php echo e($policy_brief->created_at->translatedFormat('d F Y')); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <?php if(auth()->user()->role == 'superadmin'): ?>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#verify" onclick="openVerifyModal(<?php echo e($policy_brief); ?>)"><i
                                                    class="bi bi-file-check"></i></button>
                                        <?php endif; ?>
                                        <a target="#blank" href="<?php echo e(url('storage/' . $policy_brief->file_path)); ?>"
                                            class="btn btn-primary">
                                            <i class="bi bi-download"></i>
                                        </a>
                                        <a href="<?php echo e(route('policy_briefs.edit', $policy_brief->id)); ?>"
                                            class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete" onclick="openDeleteModal(<?php echo e($policy_brief); ?>)"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/policy_briefs/index.blade.php ENDPATH**/ ?>