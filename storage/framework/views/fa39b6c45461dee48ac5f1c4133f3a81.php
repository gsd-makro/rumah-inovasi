<?php $__env->startSection('title', 'Manajemen Infografik'); ?>
<?php $__env->startSection('subtitle', 'Halaman untuk mengelola dan mengatur daftar infografik dalam sistem.'); ?>

<?php $__env->startSection('main'); ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Infografik</h4>
                    <a href="<?php echo e(route('infographics.create')); ?>" class="btn btn-primary">
                        Tambah Data <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
            </div>
            <?php echo $__env->make('dashboard.infographics._delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('dashboard.infographics._verify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th width="70%">Judul</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $infographics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $infographic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-bold-500"><?php echo e($key + 1); ?></td>
                                    <td>
                                        <div class="d-flex align-items-start">
                                            <div class="image-thumbnail-container">
                                                <img src="<?php echo e(asset('storage/' . $infographic->image)); ?>"
                                                    alt="<?php echo e($infographic->title); ?>"
                                                    class="img-thumbnail me-3 image-thumbnail" loading="lazy"
                                                    style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;"
                                                    onclick="openImageModal('<?php echo e(asset('storage/' . $infographic->image)); ?>')">
                                            </div>
                                            <div>
                                                <strong><?php echo e($infographic->title); ?></strong><br>
                                                <div>
                                                    <?php if($infographic->status == 'pending'): ?>
                                                        <span class="badge bg-secondary">Menunggu</span>
                                                    <?php elseif($infographic->status == 'approved'): ?>
                                                        <span class="badge bg-success">Disetujui</span>
                                                    <?php elseif($infographic->status == 'rejected'): ?>
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    <?php endif; ?>
                                                </div>
                                                <span class="text-muted small">
                                                    Dibuat oleh: <?php echo e($infographic->user->name); ?> pada
                                                    <?php echo e($infographic->created_at->translatedFormat('d F Y')); ?>

                                                </span>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <?php if(auth()->user()->role == 'superadmin'): ?>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#verify" onclick="openVerifyModal(<?php echo e($infographic); ?>)"><i
                                                    class="bi bi-file-check"></i></button>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('infographics.edit', $infographic->id)); ?>"
                                            class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete" onclick="openDeleteModal(<?php echo e($infographic); ?>)"><i
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

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img id="fullImage" src="" alt="Full Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .image-thumbnail-container {
            position: relative;
        }

        .image-thumbnail {
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 5px;
        }

        .image-thumbnail:hover {
            opacity: 0.7;
            transform: scale(1.05);
            filter: brightness(0.7);
        }

        .image-thumbnail-container::after {
            content: '🔍';
            /* Menambahkan icon mata untuk memberi tahu pengguna */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: white;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .image-thumbnail-container:hover::after {
            opacity: 1;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });

        function openImageModal(imageUrl) {
            $('#fullImage').attr('src', imageUrl);
            $('#imageModal').modal('show');
        }
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/infographics/index.blade.php ENDPATH**/ ?>