<li class="{{ $menu->children->isNotEmpty() ? 'dropdown-submenu' : '' }}">
    <a class="dropdown-item {{ $menu->children->isNotEmpty() ? 'dropdown-toggle' : '' }}" href="{{ $menu->url }}"
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

<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }
</style>
