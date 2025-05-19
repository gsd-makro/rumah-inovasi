<?php $__env->startSection('title', 'Manajemen Aritkel'); ?>
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
                <form action="<?php echo e(route('articles.update', $article->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="basicInput">Judul</label>
                        <input type="text" name="title" value="<?php echo e(old('title', $article->title ?? '')); ?>" class="form-control" id="basicInput"
                            placeholder="Masukkan Judul Dokumen">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Gambar Thumbnail</label>
                        <div>
                            <img src="<?php echo e(asset('storage/' . $article->image)); ?>"
                                                        alt="<?php echo e($article->title); ?>"
                                                        class="img-thumbnail me-3 image-thumbnail" loading="lazy"
                                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;"
                                                        onclick="openImageModal('<?php echo e(asset('storage/' . $article->image)); ?>')">
                        </div>
                        <input type="file" name="image" class="form-control" id="image"
                            placeholder="Masukkan Gambar Thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Subjek</label>
                        <select name="subject_id" id="subject_id" class="form-control">
                            <option value="#" selected disabled>Pilih Subjek</option>
                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($subject->id); ?>" <?php echo e($subject->id == $article->subject_id ? 'selected' : ''); ?>><?php echo e($subject->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Konten</label>                        
                        <?php if (isset($component)) { $__componentOriginal8343eae0b6dfb096868ee4778f600a9e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8343eae0b6dfb096868ee4778f600a9e = $attributes; } ?>
<?php $component = App\View\Components\QuillEditor::resolve(['name' => 'content','value' => ''.$article->content.''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/articles/edit.blade.php ENDPATH**/ ?>