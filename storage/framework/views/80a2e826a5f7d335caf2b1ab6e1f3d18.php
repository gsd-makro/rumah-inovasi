<?php $__env->startSection('title', 'Manajemen Dokumen'); ?>
<?php $__env->startSection('subtitle', 'Halaman untuk mengelola dan mengatur daftar dokumen dalam sistem.'); ?>

<?php $__env->startSection('main'); ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Dokumen</h4>
                    <!-- Button trigger for basic modal -->
                    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Data <i class="bi bi-plus-circle"></i>
                    </button>
                    <?php echo $__env->make('dashboard.documents._add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('dashboard.documents._edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('dashboard.documents._delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('dashboard.documents._verify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="40%">Judul</th>
                            <th width="20%">Menu</th>
                            <th width="40%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-bold-500"><?php echo e($key + 1); ?></td>
                                <td class="text-bold-500">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="<?php echo e(asset('img/logo-pdf.png')); ?>" class="img-thumbnail" alt="pdf"
                                                loading="lazy" style="width: 50px; height: auto;">
                                        </div>
                                        <div>
                                            <strong><?php echo e($document->title); ?></strong><br>
                                            <?php if($document->status == 'pending'): ?>
                                                <span class="badge bg-secondary">Menunggu</span>
                                            <?php elseif($document->status == 'approved'): ?>
                                                <span class="badge bg-success">Disetujui</span>
                                            <?php elseif($document->status == 'rejected'): ?>
                                                <span class="badge bg-danger">Ditolak</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-muted small">
                                            Dibuat oleh: <?php echo e($document->user->name); ?> pada
                                            <?php echo e($document->created_at->translatedFormat('d F Y')); ?>

                                        </span>
                                    </div>
                                </td>
                                <td class="text-bold-500"><?php echo e($document->menu->name); ?></td>
                                <td>
                                    <a target="#blank" href="<?php echo e(url('storage/' . $document->file_path)); ?>"
                                        class="btn btn-primary">
                                        <i class="bi bi-download"></i>
                                    </a>
                                    <?php if(auth()->user()->role == 'superadmin'): ?>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#verify" onclick="openVerifyModal(<?php echo e($document); ?>)"><i
                                                class="bi bi-file-check"></i></button>
                                    <?php endif; ?>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                        data-bs-target="#update" onclick="openEditModal(<?php echo e($document); ?>)">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete" onclick="openDeleteModal(<?php echo e($document); ?>)"><i
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/documents/index.blade.php ENDPATH**/ ?>