<div class="sidebar-menu">
    <ul class="menu">
        {{-- <li class="sidebar-title">Menu</li> --}}

        <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="/" class="sidebar-link">
                <i class="bi bi-house-fill"></i>
                <span>Homepage</span>
            </a>
        </li>

        <li class="sidebar-item {{ Request::route()->named('dashboard.home') ? 'active' : '' }}">
            <a href="{{ route('dashboard.home') }}" class="sidebar-link">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if (auth()->user()->role === 'superadmin')
            <li class="sidebar-item has-sub">
                <a href="#" class="sidebar-link">
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                    <span>Master Data</span>
                </a>

                <ul class="submenu submenu-open" style="--submenu-height: 86px;">
                    <li class="submenu-item {{ Request::route()->named('menus.*') ? 'active' : '' }}">
                        <a href="{{ route('menus.index') }}" class="submenu-link">
                            <span>Menu</span>
                        </a>
                    </li>

                    <li class="submenu-item {{ Request::route()->named('subjects.*') ? 'active' : '' }}">
                        <a href="{{ route('subjects.index') }}" class="submenu-link">
                            <span>Subjek</span>
                        </a>
                    </li>

                    <li class="submenu-item {{ Request::route()->named('indicators.*') ? 'active' : '' }}">
                        <a href="{{ route('indicators.index') }}" class="submenu-link">
                            <span>Indikator</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Konten</span>
            </a>

            <ul class="submenu submenu-open" style="--submenu-height: 86px;">
                <li class="submenu-item {{ Request::route()->named('infographics.*') ? 'active' : '' }}">
                    <a href="{{ route('infographics.index') }}" class="submenu-link">
                        <span>Infografis</span>
                    </a>
                </li>

                <li class="submenu-item {{ Request::route()->named('photos.*') ? 'active' : '' }}">
                    <a href="{{ route('photos.index') }}" class="submenu-link">
                        <span>Foto</span>
                    </a>
                </li>

                <li class="submenu-item {{ Request::route()->named('videos.*') ? 'active' : '' }}">
                    <a href="{{ route('videos.index') }}" class="submenu-link">
                        <span>Video</span>
                    </a>
                </li>

                <li class="submenu-item {{ Request::route()->named('policy_briefs.*') ? 'active' : '' }}">
                    <a href="{{ route('policy_briefs.index') }}" class="submenu-link">
                        <span>Policy Briefs</span>
                    </a>
                </li>

                <li class="submenu-item {{ Request::route()->named('documents.*') ? 'active' : '' }}">
                    <a href="{{ route('documents.index') }}" class="submenu-link">
                        <span>Document</span>
                    </a>
                </li>
            </ul>
        </li>

        @if (auth()->user()->role === 'superadmin')
            <li class="sidebar-item {{ Request::route()->named('feedbacks.*') ? 'active' : '' }}">
                <a href="{{ route('feedbacks.index') }}" class="sidebar-link">
                    <i class="bi bi-envelope"></i>
                    <span>Feedback <span class="badge bg-danger">{{ $totalFeedbacks }}</span></span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::route()->named('users.*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="sidebar-link">
                    <i class="bi bi-people"></i>
                    <span>User</span>
                </a>
            </li>
        @endif

        <li class="sidebar-item">
            <a href="{{ route('logout') }}" class="sidebar-link"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
