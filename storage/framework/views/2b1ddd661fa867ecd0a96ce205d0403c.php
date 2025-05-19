<?php $__env->startSection('title', 'Manajemen Menu'); ?>
<?php $__env->startSection('subtitle', 'Halaman untuk mengelola dan mengatur daftar menu dalam sistem.'); ?>

<?php $__env->startSection('main'); ?>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Menu</h4>
                    <!-- Button trigger for basic modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Menu <i class="bi bi-plus-circle"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="accordion" id="menuAccordion">
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header d-flex justify-content-between align-items-center"
                                id="headingMain<?php echo e($menu->id); ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseMain<?php echo e($menu->id); ?>" aria-expanded="false"
                                    aria-controls="collapseMain<?php echo e($menu->id); ?>">
                                    <div class="d-flex gap-2 justify-content-center align-items-center">
                                        <?php echo e($menu->name); ?>

                                        <div class="badges">
                                            <span
                                                class="badge <?php echo e($menu->is_active === 1 ? 'bg-success' : 'bg-danger'); ?>"><?php echo e($menu->is_active === 1 ? 'Aktif' : 'Tidak Aktif'); ?></span>
                                        </div>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseMain<?php echo e($menu->id); ?>" class="accordion-collapse collapse"
                                aria-labelledby="headingMain<?php echo e($menu->id); ?>">
                                <div class="accordion-body">
                                    <?php if($menu->children->isEmpty()): ?>
                                        <div class="d-flex justify-content-center flex-column align-items-center">
                                            <p class="text-muted">Submenu tidak ada</p>
                                            <div class="d-flex gap-2">
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#tambahsubmenu<?php echo e($menu->id); ?>">Tambah
                                                    Submenu</button>
                                                <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#updateMain<?php echo e($menu->id); ?>">Edit Menu</button>
                                                <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteMain<?php echo e($menu->id); ?>">Hapus Menu</button>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="d-flex gap-2 mt-2 justify-content-end me-3">
                                            <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#tambahsubmenu<?php echo e($menu->id); ?>">Tambah Submenu</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#updateMain<?php echo e($menu->id); ?>">Ubah Menu</button>
                                            <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteMain<?php echo e($menu->id); ?>">Hapus Menu</button>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th width="50%">Sub Menu</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $menu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?php echo e($key + 1); ?></td>
                                                        <td class="text-bold-500">
                                                            <div class="accordion"
                                                                id="submenuAccordion<?php echo e($subMenu->id); ?>">
                                                                <div class="accordion-item">
                                                                    <h2 class="accordion-header"
                                                                        id="headingSub<?php echo e($subMenu->id); ?>">
                                                                        <button class="accordion-button" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseSub<?php echo e($subMenu->id); ?>"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapseSub<?php echo e($subMenu->id); ?>">
                                                                            <div
                                                                                class="d-flex gap-2 justify-content-center align-items-center">
                                                                                <?php echo e($subMenu->name); ?>

                                                                                <div class="badges">
                                                                                    <span
                                                                                        class="badge <?php echo e($subMenu->is_active === 1 ? 'bg-success' : 'bg-danger'); ?>"><?php echo e($subMenu->is_active === 1 ? 'Aktif' : 'Tidak Aktif'); ?></span>
                                                                                </div>
                                                                            </div>
                                                                        </button>
                                                                    </h2>
                                                                    <div id="collapseSub<?php echo e($subMenu->id); ?>"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="headingSub<?php echo e($subMenu->id); ?>">
                                                                        <div class="accordion-body">
                                                                            <?php if($subMenu->children->isEmpty()): ?>
                                                                                <p class="text-muted">Subsubmenu tidak ada
                                                                                </p>
                                                                                <button class="btn btn-primary"
                                                                                    type="button" data-bs-toggle="modal"
                                                                                    data-bs-target="#tambahSubSub<?php echo e($subMenu->id); ?>">Tambah
                                                                                    Sub Submenu</button>
                                                                            <?php else: ?>
                                                                                <table class="table table-striped">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No</th>
                                                                                            <th width="50%">Sub Sub Menu
                                                                                            </th>
                                                                                            <th>Aksi</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php $__currentLoopData = $subMenu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <tr>
                                                                                                <td class="text-bold-500">
                                                                                                    <?php echo e($loop->iteration); ?>

                                                                                                </td>
                                                                                                <td class="text-bold-500">
                                                                                                    <div
                                                                                                        class="d-flex gap-2 justify-content-center align-items-center">
                                                                                                        <?php echo e($subSubMenu->name); ?>

                                                                                                        <div class="badges">
                                                                                                            <span
                                                                                                                class="badge <?php echo e($subSubMenu->is_active === 1 ? 'bg-success' : 'bg-danger'); ?>"><?php echo e($subSubMenu->is_active === 1 ? 'Aktif' : 'Tidak Aktif'); ?></span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <button
                                                                                                        class="btn btn-warning btn-sm mb-1"
                                                                                                        type="button"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#updateSub<?php echo e($subSubMenu->id); ?>">Ubah
                                                                                                        Sub Submenu</button>
                                                                                                    <button
                                                                                                        class="btn btn-danger btn-sm mb-1"
                                                                                                        type="button"
                                                                                                        data-bs-toggle="modal"
                                                                                                        data-bs-target="#deleteSub<?php echo e($subSubMenu->id); ?>">Hapus
                                                                                                        Sub Submenu</button>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </tbody>
                                                                                </table>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm mb-1" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#tambahSubSub<?php echo e($subMenu->id); ?>">Tambah
                                                                Sub Submenu</button>
                                                            <button class="btn btn-warning btn-sm mb-1" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#update<?php echo e($subMenu->id); ?>">Ubah
                                                                Submenu</button>
                                                            <button class="btn btn-danger btn-sm mb-1" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete<?php echo e($subMenu->id); ?>">Hapus
                                                                Submenu</button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('dashboard.menus._add_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Menu Modal -->
        <?php echo $__env->make('dashboard.menus._add_submenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('dashboard.menus._edit_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('dashboard.menus._delete_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $menu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Modal Tambah Submenu -->
            <?php echo $__env->make('dashboard.menus._add_subsubmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('dashboard.menus._edit_submenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('dashboard.menus._delete_submenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php $__currentLoopData = $subMenu->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subSubMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Modal Hapus Sub Submenu -->
                <?php echo $__env->make('dashboard.menus._edit_subsubmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('dashboard.menus._delete_subsubmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <!-- Repeat similar modal structures for submenus and sub submenus -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/dashboard/menus/index.blade.php ENDPATH**/ ?>