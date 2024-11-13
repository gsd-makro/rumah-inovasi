<!doctype html>
<html lang="id">

<head>
  @include('partials.landing.header', ['title' => $title])
</head>

<body
  class="home blog wp-embed-responsive hfeed aft-light-mode aft-header-layout-centered header-image-default widget-title-border-bottom default-content-layout align-content-left af-wide-layout aft-section-layout-background">

  <div id="af-preloader">
    <div id="loader-wrapper">
      <div id="loader"></div>
    </div>
  </div>

  <div id="page" class="site af-whole-wrapper">
    <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
    <header id="masthead" class="header-layout-centered chromenews-header">
      <div class="top-header">
        <div class="container-wrapper">
          <div class="top-bar-flex">
            <div class="top-bar-left col-2">
              <div class="date-bar-left">
                <span class="topbar-date">
                  {{ date('d F Y') }} <span id="topbar-time"></span>
                </span>
              </div>
            </div>
            <div class="top-bar-right col-2">
              <div class="aft-small-social-menu">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mid-header-wrapper " data-background="">
        <div class="mid-header">
          <div class="container-wrapper">
            <div class="mid-bar-flex">
              <div class="logo">
                <div class="site-branding uppercase-site-title">
                  <h1 class="site-title font-family-1">
                    <a href="https://bappeda.inhilkab.go.id/" class="site-title-anchor" rel="home"></a>
                  </h1>
                  <p class="site-description">Rumah Inovasi Gorontalo</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="below-mid-header">
          <div class="container-wrapper">
            <div class="header-promotion">
              <div class="banner-promotions-wrapper">
                <div class="promotion-section">
                  <a href="" target="_blank">
                    <img width="1280" height="426" src="https://dummyimage.com/1280x426.jpg?text=Banner"
                      class="attachment-full size-full" alt="" />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="main-navigation-bar" class="bottom-header">
        <div class="container-wrapper">
          <div class="bottom-nav">
            <div class="offcanvas-navigaiton">
              <div class="navigation-container">
                <nav class="main-navigation clearfix">
                  <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                    <a href="javascript:void(0)" class="aft-void-menu">
                      <span class="screen-reader-text">Menu Utama</span>
                      <i class="ham"></i>
                    </a>
                  </span>

                  <div class="menu main-menu menu-desktop show-menu-border">
                    <x-navbar />
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    @yield('main')

    <footer class="site-footer aft-footer-sidebar-col-0" data-background="" style="margin-top: 20px">
      <div class="site-info">
        <div class="container-wrapper">
          <div class="af-container-row">
            <div class="col-1 color-pad">
              Copyright &copy; All rights reserved. <span class="sep"> | </span>
              Bappeda Provinsi Gorontalo
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>


  <a id="scroll-up" class="secondary-color right">
  </a>
  @include('partials.landing.footer')

</body>

</html>
