<?php $__env->startSection('title', 'Manajemen Video'); ?>
<?php $__env->startSection('subtitle', 'Halaman untuk mengelola dan mengatur daftar video dalam sistem.'); ?>

<?php $__env->startSection('main'); ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Video</h4>
                    <!-- Button trigger for basic modal -->
                    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Data <i class="bi bi-plus-circle"></i>
                    </button>
                    <?php echo $__env->make('dashboard.videos._add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('dashboard.videos._edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('dashboard.videos._delete', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('dashboard.videos._verify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-bold-500"><?php echo e($key + 1); ?></td>
                                <td class="text-bold-500">
                                    <div class="d-flex align-items-start">
                                        <div>
                                            <strong><?php echo e($video->title); ?></strong><br>
                                            <div>
                                                <?php if($video->status == 'pending'): ?>
                                                    <span class="badge bg-secondary">Menunggu</span>
                                                <?php elseif($video->status == 'approved'): ?>
                                                    <span class="badge bg-success">Disetujui</span>
                                                <?php elseif($video->status == 'rejected'): ?>
                                                    <span class="badge bg-danger">Ditolak</span>
                                                <?php endif; ?>
                                            </div>
                                            <span class="text-muted small">
                                                Dibuat oleh: <?php echo e($video->user->name); ?> pada
                                                <?php echo e($video->created_at->translatedFormat('d F Y')); ?>

                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-bold-500"><?php echo e($video->menu->name); ?></td>
                                <td>
                                    <?php if(auth()->user()->role == 'superadmin'): ?>
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#verify" onclick="openVerifyModal(<?php echo e($video); ?>)"><i
                                                class="bi bi-file-check"></i></button>
                                    <?php endif; ?>
                                    <button class="btn btn-danger logo-youtube" type="button"
                                        data-embed="<?php echo e($video->embed_html); ?>">
                                        <i class="bi bi-youtube"></i>
                                    </button>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                        data-bs-target="#update" onclick="openEditModal(<?php echo e($video); ?>)">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete" onclick="openDeleteModal(<?php echo e($video); ?>)"><i
                                            class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <div class="modal fade" id="videoPreviewModal" tabindex="-1" aria-labelledby="videoPreviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoPreviewModalLabel">Preview Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tempatkan konten embed HTML video di sini -->
                    <div id="videoEmbedContainer"></div>
                </div>
            </div>
        </div>
    </div>
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

    <script>
        document.querySelectorAll('.logo-youtube').forEach(function(logo) {
            logo.addEventListener('click', function() {
                // Ambil embed HTML video dari data atribut
                var embedHtml = this.getAttribute('data-embed');

                // Masukkan konten embed ke dalam modal
                document.getElementById('videoEmbedContainer').innerHTML = embedHtml;

                // Tampilkan modal
                var myModal = new bootstrap.Modal(document.getElementById('videoPreviewModal'));
                myModal.show();
            });
        });

        // Hapus konten embed saat modal ditutup untuk membersihkan video yang diputar
        document.getElementById('videoPreviewModal').addEventListener('hidden.bs.modal', function() {
            document.getElementById('videoEmbedContainer').innerHTML = '';
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/videos/index.blade.php ENDPATH**/ ?>