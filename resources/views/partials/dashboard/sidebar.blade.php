<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Request::route()->named('dashboard.home') ? 'active' : '' }}">
            <a href="{{ route('dashboard.home') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::route()->named('subjects.*') ? 'active' : '' }}">
            <a href="{{ route('subjects.index') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Subjek</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::route()->named('indicators.*') ? 'active' : '' }}">
            <a href="{{ route('indicators.index') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Indikator</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::route()->named('menus.*') ? 'active' : '' }}">
            <a href="{{ route('menus.index') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Menu</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::route()->named('documents.*') ? 'active' : '' }}">
            <a href="{{ route('documents.index') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Document</span>
            </a>
        </li>
        <li class="sidebar-item {{ Request::route()->named('infographics.*') ? 'active' : '' }}">
            <a href="{{ route('infographics.index') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Infographics</span>
            </a>
        </li>
    </ul>
</div>
