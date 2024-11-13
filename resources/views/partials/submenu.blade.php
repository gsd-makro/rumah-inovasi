{{-- <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-{{ $menu->id }}"
  @class([
      'menu-item',
      'menu-item-type-custom',
      'menu-item-object-custom',
      'menu-item-has-children',
      'menu-item-{{ $menu->id }}',
      'nav-item',
      'dropdown mega-dropdown' => $menu->children->isNotEmpty(),
  ])>
  <a title="Features" href="{{ $menu->url }}" @class([
      'nav-link',
      'dropdown-toggle' => $menu->children->isNotEmpty(),
  ])
    @if ($menu->children->isNotEmpty()) id="menu-item-dropdown-{{ $menu->id }}" @endif>
    {{ $menu->title }}
  </a>

  @if ($menu->children->isNotEmpty())
    <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-{{ $menu->id }}" role="menu">
      @each('partials.submenu', $menu->children, 'menu')
    </ul>
  @endif
</li> --}}

<li id="menu-item-{{ $menu->id }}" @class([
    "menu-item-{$menu->id}",
    'menu-item',
    'menu-item-type-custom',
    'menu-item-object-custom',
    'menu-item-has-children' => $menu->children->isNotEmpty(),
])>
  <a href="{{ $menu->url }}">{{ $menu->title }}</a>
  @if ($menu->children->isNotEmpty())
    <ul class="sub-menu">
      @each('partials.submenu', $menu->children, 'menu')
    </ul>
  @endif
</li>
