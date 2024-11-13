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
        <li class="sidebar-item  has-sub">
            <a href="#" class="sidebar-link">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Master Data</span>
            </a>
            
            <ul class="submenu submenu-open" style="--submenu-height: 86px;">                
                
                <li class="submenu-item {{ Request::route()->named('menus.*') ? 'active' : '' }}">
                    <a href="{{ route('menus.index') }}" class="submenu-link">
                        {{-- <i class="bi bi-list-ul"></i> --}}
                        <span>Menu</span>
                    </a>
                </li>
    
                <li class="submenu-item {{ Request::route()->named('subjects.*') ? 'active' : '' }}">
                    <a href="{{ route('subjects.index') }}" class="submenu-link">
                        {{-- <i class="bi bi-journal-bookmark-fill"></i> --}}
                        <span>Subjek</span>
                    </a>
                </li>
    
                <li class="submenu-item {{ Request::route()->named('indicators.*') ? 'active' : '' }}">
                    <a href="{{ route('indicators.index') }}" class="submenu-link">
                        {{-- <i class="bi bi-bar-chart-line-fill"></i> --}}
                        <span>Indikator</span>
                    </a>
                </li>                
            </ul>            
        </li>
        <li class="sidebar-item  has-sub">
            <a href="#" class="sidebar-link">
                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                <span>Transaksi</span>
            </a>
            
            <ul class="submenu submenu-open" style="--submenu-height: 86px;">                
                
                <li class="submenu-item {{ Request::route()->named('infographics.*') ? 'active' : '' }}">
                    <a href="{{ route('infographics.index') }}" class="submenu-link">
                        
                        <span>Infographics</span>
                    </a>
                </li>
        
                <li class="submenu-item {{ Request::route()->named('videos.*') ? 'active' : '' }}">
                    <a href="{{ route('videos.index') }}" class="submenu-link">
                        <span>Video</span>
                    </a>
                </li>
    
                <li class="submenu-item {{ Request::route()->named('documents.*') ? 'active' : '' }}">
                    <a href="{{ route('documents.index') }}" class="submenu-link">
                        <span>Document</span>
                    </a>
                </li>
    
                <li class="submenu-item {{ Request::route()->named('indicators.*') ? 'active' : '' }}">
                    <a href="{{ route('indicators.index') }}" class="submenu-link">
                        {{-- <i class="bi bi-bar-chart-line-fill"></i> --}}
                        <span>Indikator</span>
                    </a>
                </li>                
            </ul>            
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
