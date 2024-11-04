<div id="showbacktop" class="showbacktop full-nav bg-white border-lg-1 border-bottom shadow-b-sm border-none py-0">
  <div class="container">
    <nav id="main-menu" class="main-menu navbar navbar-expand-lg navbar-light px-2 px-lg-0 py-0">
      <!--Navbar menu-->
      <div id="navbarTogglerDemo1" class="collapse navbar-collapse hover-mode">
        <!-- logo in navbar -->
        <div class="logo-showbacktop">
          <a href="https://demo.bootstrap.news/default/" class="navbar-brand custom-logo-link" rel="home"><img
              width="452" height="95" src="{{ asset('/img/logo-bootnews.png') }}" class="img-fluid"
              alt="logo-bootnews"
              srcset="
                      {{ asset('/img/logo-bootnews.png') }}        452w,
                      https://demo.bootstrap.news/default/wp-content/uploads/2021/02/logo-bootnews-300x63.png 300w
                    "
              sizes="(max-width: 452px) 100vw, 452px" /></a>
        </div>

        <!--start main menu start-->
        <x-navbar />
        <!--end start main menu-->

        <!--Search form-->
        <div class="navbar-nav ms-auto d-none d-lg-block">
          <div class="search-box">
            <!--hide search-->
            <div class="search-menu no-shadow border-0 py-0">
              <form class="form-src form-inline" method="get" action="https://demo.bootstrap.news/default/"
                role="search">
                <div class="input-group">
                  <input name="s" class="form-control end-0" type="text" placeholder="Search &hellip;"
                    value="" />
                  <span class="icones text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ms-n4" width="1.2rem" height="1.2rem"
                      fill="currentColor" viewBox="0 0 512 512">
                      <path d="M221.09,64A157.09,157.09,0,1,0,378.18,221.09,157.1,157.1,0,0,0,221.09,64Z"
                        style="
                                fill: none;
                                stroke: currentColor;
                                stroke-miterlimit: 10;
                                stroke-width: 32px;
                              " />
                      <line x1="338.29" y1="338.29" x2="448" y2="448"
                        style="
                                fill: none;
                                stroke: currentColor;
                                stroke-linecap: round;
                                stroke-miterlimit: 10;
                                stroke-width: 32px;
                              " />
                    </svg>
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>
