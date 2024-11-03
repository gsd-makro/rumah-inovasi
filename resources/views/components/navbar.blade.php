<nav class="navbar fixed-top navbar-expand-lg bg-primary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">Rumah Inovasi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach ($menus as $menu)
                    <li class="nav-item {{ $menu->children->isNotEmpty() ? 'dropdown' : '' }}">
                        <a class="nav-link {{ $menu->children->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                            href="{{ $menu->url }}"
                            {{ $menu->children->isNotEmpty() ? 'role=button data-bs-toggle=dropdown' : '' }}>
                            {{ $menu->title }}
                        </a>
                        @if ($menu->children->isNotEmpty())
                            <ul class="dropdown-menu">
                                @foreach ($menu->children as $child)
                                    @include('partials.submenu', ['menu' => $child])
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>

            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>


<style>
    /* CSS untuk mengatur submenu dropdown */
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }

    /* Tampilkan submenu saat hover pada parent */
    .dropdown-submenu:hover>.dropdown-menu {
        display: block;
    }

    /* Rotasi icon dropdown untuk submenu */
    .dropdown-submenu .dropdown-toggle::after {
        transform: rotate(-90deg);
        position: absolute;
        right: 6px;
        top: 50%;
    }
</style>

<script>
    // JavaScript untuk mengatur behavior dropdown
    document.addEventListener('DOMContentLoaded', function() {
        // Mencegah menutup dropdown saat mengklik submenu
        document.querySelectorAll('.dropdown-menu').forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });

        // Toggle submenu saat mengklik dropdown-toggle
        document.querySelectorAll('.dropdown-submenu > .dropdown-toggle').forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                if (this.nextElementSibling.style.display === 'block') {
                    this.nextElementSibling.style.display = 'none';
                } else {
                    this.nextElementSibling.style.display = 'block';
                }
            });
        });
    });
</script>
