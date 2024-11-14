{{-- <ul id="start-main" class="navbar-nav main-nav navbar-uppercase first-start-lg-0">
  @foreach ($menus as $menu)
    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-{{ $menu->id }}"
      @class([
          'menu-item',
          'menu-item-type-taxonomy',
          'menu-item-object-category',
          'nav-item',
          'menu-item-{{ $menu->id }}',
          'menu-item-home' => $loop->first,
          'active current-menu-item current_page_item' => false,
          'dropdown mega-dropdown' => $menu->children->isNotEmpty(),
      ])>
      <a title="Home" href="{{ $menu->url }}" @class([
          'nav-link',
          'dropdown-toggle' => $menu->children->isNotEmpty(),
      ])
        @if ($menu->children->isNotEmpty()) id="menu-item-dropdown-{{ $menu->id }}" @endif>
        {{ $menu->title }}
      </a>

      @if ($menu->children->isNotEmpty())
        <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-1342" role="menu">
          @each('partials.submenu', $menu->children, 'menu')
        </ul>
      @endif
    </li>
  @endforeach
</ul> --}}

<ul id="primary-menu" class="menu">
  @foreach ($menus as $menu)
    @php($isActive = $loop->first)
    <li id="menu-item-{{ $menu->id }}" @class([
        "menu-item-{$menu->id}",
        'menu-item',
        'menu-item-type-custom',
        'menu-item-object-custom',
        'menu-item-home' => $loop->first,
        'current-menu-item current_page_item active' => $isActive,
        'menu-item-has-children' => $menu->children->isNotEmpty(),
    ])>
      <a href="{{ $menu->url }}" @if ($isActive) aria-current="page" @endif>{{ $menu->title }}</a>
      @if ($menu->children->isNotEmpty())
        <ul class="sub-menu">
          @each('partials.submenu', $menu->children, 'menu')
        </ul>
      @endif
    </li>
  @endforeach
</ul>
