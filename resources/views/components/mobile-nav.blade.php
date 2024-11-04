<div class="mobile-side">
  <!--Back Mobile menu-->
  <div id="back-menu" class="back-menu back-menu-start">
    <span class="hamburger-icon open">
      <svg class="bi bi-x" width="2rem" height="2rem" viewBox="0 0 16 16" fill="currentColor"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z"
          clip-rule="evenodd"></path>
        <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z"
          clip-rule="evenodd"></path>
      </svg>
    </span>
  </div>
  <nav id="mobile-menu" class="menu-mobile d-flex flex-column push push-start shadow-r-sm bg-white">
    <!-- mobile menu content -->
    <div class="mobile-content mb-auto">
      <!--logo-->
      <div class="logo-sidenav p-2">
        <a href="https://demo.bootstrap.news/default/" class="navbar-brand custom-logo-link" rel="home"><img
            width="452" height="95" src="{{ asset('/img/logo-bootnews.png') }}" class="img-fluid"
            alt="logo-bootnews"
            srcset="
                    {{ asset('/img/logo-bootnews.png') }}        452w,
                    https://demo.bootstrap.news/default/wp-content/uploads/2021/02/logo-bootnews-300x63.png 300w
                  "
            sizes="(max-width: 452px) 100vw, 452px" /></a>
      </div>
      <!--navigation-->
      <div class="sidenav-menu">
        <nav class="navbar navbar-light navbar-inverse">
          <ul id="side-menu" class="nav navbar-nav list-group list-unstyled side-link">
            @foreach ($menus as $menu)
              {{-- TODO: figure out how to indicate active url --}}
              <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"
                id="menu-item-{{ $menu->id }}" @class([
                    'menu-item',
                    'menu-item-type-taxonomy',
                    'menu-item-object-category',
                    'nav-item',
                    'menu-item-{{ $menu->id }}',
                    'menu-item-home' => $loop->first,
                    'active current-menu-item current_page_item' => false,
                    'dropdown mega-dropdown' => $menu->children->isNotEmpty(),
                ])>
                <a title="Home" href="{{ $menu->children->isNotEmpty() ? '#' : $menu->url }}"
                  @class([
                      'nav-link',
                      'dropdown-toggle' => $menu->children->isNotEmpty(),
                  ])
                  @if ($menu->children->isNotEmpty()) id="menu-item-dropdown-{{ $menu->id }}"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false" @endif>
                  {{ $menu->title }}
                </a>

                @if ($menu->children->isNotEmpty())
                  <ul class="dropdown-menu" aria-labelledby="menu-item-dropdown-1342" role="menu">
                    @each('partials.submenu', $menu->children, 'menu')
                  </ul>
                @endif
              </li>
            @endforeach
          </ul>
        </nav>
      </div>
    </div>
    <!-- copyright mobile sidebar menu -->
    <div class="mobile-copyright mt-5 text-center">
      <p>Copyright Ringo - All rights reserved.</p>
    </div>
  </nav>
</div>
