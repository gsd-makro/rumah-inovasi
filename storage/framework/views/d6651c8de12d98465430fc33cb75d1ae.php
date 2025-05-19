<div class="sidebar-menu">
    <ul class="menu">
        

        <li class="sidebar-item <?php echo e(Request::is('/') ? 'active' : ''); ?>">
            <a href="/" class="sidebar-link">
                <i class="bi bi-house-fill"></i>
                <span>Homepage</span>
            </a>
        </li>

        <li class="sidebar-item <?php echo e(Request::route()->named('dashboard.home') ? 'active' : ''); ?>">
            <a href="<?php echo e(route('dashboard.home')); ?>" class="sidebar-link">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <?php if(auth()->user()->role === 'superadmin'): ?>
            <li class="sidebar-item has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span>Master Data</span>
                </a>

                <ul class="submenu submenu-open" style="--submenu-height: 86px;">
                    <li class="submenu-item <?php echo e(Request::route()->named('menus.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('menus.index')); ?>" class="submenu-link">
                            <span>Menu</span>
                        </a>
                    </li>

                    <li class="submenu-item <?php echo e(Request::route()->named('subjects.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('subjects.index')); ?>" class="submenu-link">
                            <span>Subjek</span>
                        </a>
                    </li>

                    <li class="submenu-item <?php echo e(Request::route()->named('indicators.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('indicators.index')); ?>" class="submenu-link">
                            <span>Indikator</span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

        <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Konten</span>
            </a>

            <ul class="submenu submenu-open" style="--submenu-height: 86px;">
                <li class="submenu-item <?php echo e(Request::route()->named('infographics.*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('infographics.index')); ?>" class="submenu-link">
                        <span>Infografis</span>
                    </a>
                </li>

                <li class="submenu-item <?php echo e(Request::route()->named('photos.*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('photos.index')); ?>" class="submenu-link">
                        <span>Foto</span>
                    </a>
                </li>

                <li class="submenu-item <?php echo e(Request::route()->named('articles.*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('articles.index')); ?>" class="submenu-link">
                        <span>Artikel</span>
                    </a>
                </li>

                <li class="submenu-item <?php echo e(Request::route()->named('videos.*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('videos.index')); ?>" class="submenu-link">
                        <span>Video</span>
                    </a>
                </li>

                <li class="submenu-item <?php echo e(Request::route()->named('policy_briefs.*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('policy_briefs.index')); ?>" class="submenu-link">
                        <span>Policy Briefs</span>
                    </a>
                </li>

                <li class="submenu-item <?php echo e(Request::route()->named('documents.*') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('documents.index')); ?>" class="submenu-link">
                        <span>Document</span>
                    </a>
                </li>
            </ul>
        </li>

        <?php if(auth()->user()->role === 'superadmin'): ?>
            <li class="sidebar-item <?php echo e(Request::route()->named('feedbacks.*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('feedbacks.index')); ?>" class="sidebar-link">
                    <i class="bi bi-envelope"></i>
                    <span>Feedback
                        <?php if($totalFeedbacks > 0): ?>
                            <span class="badge bg-danger"><?php echo e($totalFeedbacks); ?></span>
                        <?php endif; ?>
                    </span>
                </a>
            </li>
            <li class="sidebar-item <?php echo e(Request::route()->named('users.*') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('users.index')); ?>" class="sidebar-link">
                    <i class="bi bi-people"></i>
                    <span>User</span>
                </a>
            </li>
        <?php endif; ?>

        <li class="sidebar-item">
            <a href="<?php echo e(route('logout')); ?>" class="sidebar-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        </li>
    </ul>
</div>
<?php /**PATH /Users/adi/Documents/project/rumah-inovasi/resources/views/partials/dashboard/sidebar.blade.php ENDPATH**/ ?>