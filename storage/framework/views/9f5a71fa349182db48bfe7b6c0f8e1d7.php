<?php $__env->startSection('title', 'Manajemen Artikel'); ?>
<?php $__env->startSection('subtitle', 'Halaman untuk mengelola dan mengatur daftar artikel dalam sistem.'); ?>

<?php $__env->startSection('main'); ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Artikel</h4>
                    <!-- Button trigger for basic modal -->
                    <a href="<?php echo e(route('articles.create')); ?>">
                        <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#tambah">
                            Tambah Data <i class="bi bi-plus-circle"></i>
                        </button>
                    </a>
                    
                    
                    <?php echo $__env->make('dashboard.articles._delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('dashboard.articles._verify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-bold-500"><?php echo e($key + 1); ?></td>
                                <td class="text-bold-500">
                                    <div class="d-flex align-items-center gap-3">
                                        <div>
                                            <strong><?php echo e($article->title); ?>

                                            </strong><br>
                                            <?php if($article->status == 'pending'): ?>
                                                <span class="badge bg-secondary">Menunggu</span>
                                            <?php elseif($article->status == 'approved'): ?>
                                                <span class="badge bg-success">Disetujui</span>
                                            <?php elseif($article->status == 'rejected'): ?>
                                                <span class="badge bg-danger">Ditolak</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-muted small">
                                            Dibuat oleh: <?php echo e($article->user->name); ?> pada
                                            <?php echo e($article->created_at->translatedFormat('d F Y')); ?>

                                        </span>
                                    </div>
                                </td>
                                <td class="text-bold-500"><?php echo e($article->subject->name); ?></td>
                                
                                </td>
                                <td>
                                    <?php if(auth()->user()->role == 'superadmin'): ?>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#verify" onclick="openVerifyModal(<?php echo e($article); ?>)"><i
                                                class="bi bi-file-check"></i></button>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('articles.edit', $article->id)); ?>">
                                        <button class="btn btn-warning" type="button">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete" onclick="openDeleteModal(<?php echo e($article); ?>)"><i
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/articles/index.blade.php ENDPATH**/ ?>