<?php $__env->startPush('styles'); ?>
    <style>
        .discussion,
        .discussion * {
            font-family: inherit;
        }

        .discussion {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .discussion__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .discussion__title {
            margin: 0;
            font-size: 1.5rem;
        }

        .discussion__title a {
            color: #333;
            text-decoration: none;
            border: none !important;
        }

        .discussion__title:hover a {
            border-bottom: 1px solid var(--secondary) !important;
        }

        .discussion__date {
            margin: 0;
            font-size: 0.8rem;
            color: #666;
        }

        .discussion__body {
            margin: 0;
        }

        .discussion__body p {
            margin: 0;
        }

        .discussion__footer {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-top: 10px;
        }

        .discussion__tag {
            padding: .1em .5em;
            opacity: 0.8;
            border-radius: 1em;
            font-size: 0.7rem;
        }

        .discussion__tag.infografis {
            background-color: #007bff;
            color: #ffffff;
        }

        .discussion__tag.policy-brief {
            background-color: #28a745;
            color: #ffffff;
        }

        .discussion__tag.video {
            background-color: #ffc107;
            color: #000000;
        }

        .discussion__tag.artikel {
            background-color: #17a2b8;
            color: #ffffff;
        }

        .discussion__tag.dokumen {
            background-color: #dc3545;
            color: #ffffff;
        }

        .discussion__tag.galeri {
            background-color: #6c757d;
            color: #ffffff;
        }

        .discussion__tag+.discussion__tag {
            margin-left: 5px;
        }
    </style>

    <style>
        .button {
            font-family: inherit !important;
            display: block;
            padding: 10px 20px;
            background-color: var(--secondary) !important;
            color: white !important;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid var(--secondary);
            transition: background-color 0.3s;
            text-align: center;
            font-weight: normal;
            text-transform: none !important;
            height: auto !important;
            line-height: normal !important;
            width: 100% !important;
        }

        .button:hover,
        .button:focus {
            color: var(--secondary) !important;
            background-color: transparent !important;
        }
    </style>

    <style>
        .mb-3 {
            margin-bottom: 1rem;
        }

        .form-control {
            height: 38px;
            font-family: inherit;
        }

        .form-text {
            font-size: 0.875rem;
            color: #6c757d;
        }

        textarea {
            resize: vertical;
        }

        .ml-1 {
            margin-left: .25rem;
        }

        .invalid-feedback {
            color: #dc3545;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php $__sessionArgs = ['success'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
        <script>
            setTimeout(() => {
                Swal.fire({
                    title: "Good job!",
                    text: "<?php echo e($value); ?>",
                    icon: "success"
                });
            }, 1000);
        </script>
    <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>

    <?php $__sessionArgs = ['error'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
        <script>
            setTimeout(() => {
                Swal.fire({
                    title: "Oops...",
                    text: "<?php echo e($value); ?>",
                    icon: "error"
                });
            }, 1000);
        </script>
    <?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main'); ?>
    <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['breadcrumbs' => [['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Hubungi Kami', 'url' => null]]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Hubungi Kami', 'url' => null]])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $attributes = $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $component = $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>

    <div id="content" class="container-wrapper">
        <div class="section-block-upper">
            <div id="secondary" class="sidebar-area sidebar-sticky-top" style="padding-left: 0; padding-right: 10px">
                <aside class="widget-area color-pad">
                    <div id="block-6" class="widget chromenews-widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                                <form action="<?php echo e(route('feedbacks.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" id="name" name="name" placeholder="Nama Lengkap"
                                            aria-describedby="nameHelp" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-control', 'is-invalid' => $errors->has('name')]); ?>"
                                            value="<?php echo e(old('name')); ?>" />
                                        <div id="nameHelp" class="form-text">Nama tidak akan ditampilkan di publik.</div>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Email"
                                            aria-describedby="emailHelp" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-control', 'is-invalid' => $errors->has('email')]); ?>"
                                            value="<?php echo e(old('email')); ?>" />
                                        <div id="emailHelp" class="form-text">Email tidak akan ditampilkan di publik.</div>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="job_type" class="form-label">Pekerjaan</label>
                                        <select aria-label="Pekerjaan" id="job_type" name="job_type"
                                            aria-describedby="jobTypeHelp" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                'form-select',
                                                'form-control',
                                                'is-invalid' => $errors->has('job_type'),
                                            ]); ?>">
                                            <option value="" disabled <?php if(!old('job_type')): echo 'selected'; endif; ?>>Pilih salah satu
                                            </option>
                                            <option value="Mahasiswa" <?php if(old('job_type' == 'Mahasiswa')): echo 'selected'; endif; ?>>Mahasiswa</option>
                                            <option value="ASN" <?php if(old('job_type' == 'ASN')): echo 'selected'; endif; ?>>ASN</option>
                                            <option value="Swasta" <?php if(old('job_type' == 'Swasta')): echo 'selected'; endif; ?>>Swasta</option>
                                            <option value="TNI/Polri" <?php if(old('job_type' == 'TNI/Polri')): echo 'selected'; endif; ?>>TNI/Polri</option>
                                            <option value="Masyarakat Umum" <?php if(old('job_type' == 'Masyarakat Umum')): echo 'selected'; endif; ?>>Masyarakat Umum
                                            </option>
                                        </select>
                                        <div id="jobTypeHelp" class="form-text">Pekerjaan tidak akan ditampilkan di publik.
                                        </div>
                                        <?php $__errorArgs = ['job_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tag" class="form-label">Tag</label>
                                        <select aria-label="Tag" id="tag" name="tag" aria-describedby="tagHelp"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                'form-select',
                                                'form-control',
                                                'is-invalid' => $errors->has('tag'),
                                            ]); ?>">
                                            <option value="" disabled <?php if(!old('tag')): echo 'selected'; endif; ?>>Pilih salah satu
                                            </option>
                                            <option value="infografis" <?php if(old('tag' == 'infografis')): echo 'selected'; endif; ?>>Infografis</option>
                                            <option value="policy brief" <?php if(old('tag' == 'policy brief')): echo 'selected'; endif; ?>>Policy Brief</option>
                                            <option value="video" <?php if(old('tag' == 'video')): echo 'selected'; endif; ?>>Video</option>
                                            <option value="artikel" <?php if(old('tag' == 'artikel')): echo 'selected'; endif; ?>>Artikel</option>
                                            <option value="dokumen" <?php if(old('tag' == 'dokumen')): echo 'selected'; endif; ?>>Dokumen</option>
                                            <option value="galeri" <?php if(old('tag' == 'galeri')): echo 'selected'; endif; ?>>Galeri</option>
                                        </select>
                                        <div id="tagHelp" class="form-text">Tag membantu untuk mempermudah pencarian</div>
                                        <?php $__errorArgs = ['tag'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="feedback" class="form-label">Feedback</label>
                                        <textarea id="feedback" name="feedback" rows="4" placeholder="Pertanyaan, kritik, saran dan lain sebagainya."
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-control', 'is-invalid' => $errors->has('feedback')]); ?>"><?php echo e(old('feedback')); ?></textarea>
                                        <?php $__errorArgs = ['feedback'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-3">
                                        <label for="rating" class="form-label">Rating</label>
                                        <?php if (isset($component)) { $__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.rating','data' => ['id' => 'rating-feedback','name' => 'rating']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('rating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'rating-feedback','name' => 'rating']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197)): ?>
<?php $attributes = $__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197; ?>
<?php unset($__attributesOriginaldaaa4f7e4868d5d2754fc46560cdd197); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197)): ?>
<?php $component = $__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197; ?>
<?php unset($__componentOriginaldaaa4f7e4868d5d2754fc46560cdd197); ?>
<?php endif; ?>
                                        <?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <button type="submit" class="button">
                                        Kirim Feedback
                                        <i class="ml-1 fas fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <div id="primary" class="content-area" style="padding-left: 10px; padding-right: 0;">
                <main id="main" class="site-main">
                    <article id="post-853" class="post-853 page type-page status-publish hentry">
                        <header class="entry-header">
                            <h1 class="entry-title">Diskusi</h1>
                        </header>

                        <div class="entry-content-wrap">
                            <div class="entry-content">
                                <div class="section-wrapper af-widget-body">
                                    <div class="af-container-row clearfix" style="margin-bottom: 20px">
                                        <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-1 pad float-l trending-posts-item">
                                                <div class="discussion">
                                                    <div class="discussion__header">
                                                        <h2 class="discussion__title">
                                                            <a href="#">
                                                                <?php echo e($feedback->feedback); ?>

                                                            </a>
                                                        </h2>
                                                        <p class="discussion__date">
                                                            <?php echo e($feedback->created_at->format('d F Y')); ?></p>
                                                    </div>

                                                    <div class="discussion__body">
                                                        <p class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                            'text-muted' => $feedback->admin_reply == null,
                                                        ]); ?>">
                                                            <?php echo e($feedback->admin_reply ?? 'Belum ada balasan'); ?></p>
                                                    </div>

                                                    <div class="discussion__footer">
                                                        <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                            'discussion__tag',
                                                            'infografis' => $feedback->tag == 'infografis',
                                                            'policy-brief' => $feedback->tag == 'policy brief',
                                                            'video' => $feedback->tag == 'video',
                                                            'artikel' => $feedback->tag == 'artikel',
                                                            'dokumen' => $feedback->tag == 'dokumen',
                                                            'galeri' => $feedback->tag == 'galeri',
                                                        ]); ?>"><?php echo e($feedback->tag); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </main>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/landing/contact.blade.php ENDPATH**/ ?>