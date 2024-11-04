<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <script src="{{ asset('/js/amp-switcher.js') }}"></script>
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />

  <title>@yield('title')</title>
  <meta name="description" content="Bootstrap theme for news magazine Template" />
  <link rel="canonical" href="https://demo.bootstrap.news/default/" />
  @yield('prev')
  @yield('next')
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Bootstrap News Template" />
  <meta property="og:description" content="Bootstrap theme for news magazine Template" />
  <meta property="og:url" content="https://demo.bootstrap.news/default/" />
  <meta property="og:site_name" content="Bootstrap News Template" />
  <meta name="twitter:card" content="summary_large_image" />
  <script type="application/ld+json" class="yoast-schema-graph">
      {
        "@context": "https://schema.org",
        "@graph": [
          {
            "@type": "CollectionPage",
            "@id": "https://demo.bootstrap.news/default/",
            "url": "https://demo.bootstrap.news/default/",
            "name": "Bootstrap News Template - Bootstrap theme for news magazine Template",
            "isPartOf": {
              "@id": "https://demo.bootstrap.news/default/#website"
            },
            "about": {
              "@id": "https://demo.bootstrap.news/default/#organization"
            },
            "description": "Bootstrap theme for news magazine Template",
            "breadcrumb": {
              "@id": "https://demo.bootstrap.news/default/#breadcrumb"
            },
            "inLanguage": "en-US"
          },
          {
            "@type": "BreadcrumbList",
            "@id": "https://demo.bootstrap.news/default/#breadcrumb",
            "itemListElement": [
              { "@type": "ListItem", "position": 1, "name": "Home" }
            ]
          },
          {
            "@type": "WebSite",
            "@id": "https://demo.bootstrap.news/default/#website",
            "url": "https://demo.bootstrap.news/default/",
            "name": "Bootstrap News Template",
            "description": "Bootstrap theme for news magazine Template",
            "publisher": {
              "@id": "https://demo.bootstrap.news/default/#organization"
            },
            "potentialAction": [
              {
                "@type": "SearchAction",
                "target": {
                  "@type": "EntryPoint",
                  "urlTemplate": "https://demo.bootstrap.news/default/?s={search_term_string}"
                },
                "query-input": "required name=search_term_string"
              }
            ],
            "inLanguage": "en-US"
          },
          {
            "@type": "Organization",
            "@id": "https://demo.bootstrap.news/default/#organization",
            "name": "Bootnews",
            "url": "https://demo.bootstrap.news/default/",
            "logo": {
              "@type": "ImageObject",
              "inLanguage": "en-US",
              "@id": "https://demo.bootstrap.news/default/#/schema/logo/image/",
              "url": "{{ asset('/img/logo-bootnews.png') }}",
              "contentUrl": "{{ asset('/img/logo-bootnews.png') }}",
              "width": 452,
              "height": 95,
              "caption": "Bootnews"
            },
            "image": {
              "@id": "https://demo.bootstrap.news/default/#/schema/logo/image/"
            }
          }
        ]
      }
    </script>
  <!-- / Yoast SEO plugin. -->

  <link rel="dns-prefetch" href="//fonts.googleapis.com" />
  <link rel="dns-prefetch" href="//s.w.org" />
  <link rel="alternate" type="application/rss+xml" title="Bootstrap News Template &raquo; Feed"
    href="https://demo.bootstrap.news/default/feed/" />
  <link rel="alternate" type="application/rss+xml" title="Bootstrap News Template &raquo; Comments Feed"
    href="https://demo.bootstrap.news/default/comments/feed/" />
  <link rel="stylesheet" id="wp-block-library-css" href="{{ asset('/css/style.min.css') }}" media="all" />
  <link rel="stylesheet" href="{{ asset('/css/global-style.css') }}">
  <link crossorigin="anonymous" rel="stylesheet" id="bn_fonts-css"
    href="//fonts.googleapis.com/css?family=Roboto%3Aregular%2Citalic%2C500%2C700%26subset%3Dlatin%2C" media="screen" />
  <link rel="stylesheet" id="bootnews-styles-css" href="{{ asset('/css/bundle.min.css') }}" media="all" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD"
    href="https://demo.bootstrap.news/default/xmlrpc.php?rsd" />
  <link rel="wlwmanifest" type="application/wlwmanifest+xml"
    href="https://demo.bootstrap.news/default/wp-includes/wlwmanifest.xml" />
  <meta name="generator" content="WordPress 6.0.9" />
  <link rel="alternate" type="text/html" media="only screen and (max-width: 640px)"
    href="https://demo.bootstrap.news/default/amp/" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-title"
    content="Bootstrap News Template - Bootstrap theme for news magazine Template" />
  <style>
    .recentcomments a {
      display: inline !important;
      padding: 0 !important;
      margin: 0 !important;
    }
  </style>
  <link rel="stylesheet" href="{{ asset('/css/amp-switcher.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/custom-style.css') }}">
  <link rel="icon"
    href="https://demo.bootstrap.news/default/wp-content/uploads/2021/02/android-icon-96x96-1-96x92.png"
    sizes="32x32" />
  <link rel="icon" href="https://demo.bootstrap.news/default/wp-content/uploads/2021/02/android-icon-96x96-1.png"
    sizes="192x192" />
  <link rel="apple-touch-icon"
    href="https://demo.bootstrap.news/default/wp-content/uploads/2021/02/android-icon-96x96-1.png" />
  <meta name="msapplication-TileImage"
    content="https://demo.bootstrap.news/default/wp-content/uploads/2021/02/android-icon-96x96-1.png" />

  @stack('style')
</head>

<body class="home blog wp-custom-logo full-width font-family hfeed">
  <!--Skippy-->
  <a id="skippy" class="visually-hidden-focusable" href="#content">
    <div class="container">
      <span class="skiplink-text">Skip to content</span>
    </div>
  </a>

  <div class="bg-image"></div>
  <!-- ========== WRAPPER ========== -->
  <div class="wrapper">
    <x-header />
    <x-main-menu />
    <x-mobile-nav />

    <main id="content">
      <div class="container">
        @yield('main')
      </div>
    </main>

    <x-footer />
  </div>
  <!-- ========== END WRAPPER ========== -->

  <!--Back to top-->
  <a class="back-top btn btn-light border position-fixed r-1 b-1" href="javascript:void(0)">
    <svg class="bi bi-arrow-up" width="1rem" height="1rem" viewBox="0 0 16 16" fill="currentColor"
      xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V4a.5.5 0 01.5-.5z" clip-rule="evenodd">
      </path>
      <path fill-rule="evenodd"
        d="M7.646 2.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L8 3.707 5.354 6.354a.5.5 0 11-.708-.708l3-3z"
        clip-rule="evenodd"></path>
    </svg>
  </a>

  <div id="amp-mobile-version-switcher" hidden>
    <a rel="" href="https://demo.bootstrap.news/default/amp/">
      Go to mobile version
    </a>
  </div>

  <script src="{{ asset('/js/bundle.min.js') }}" id="bootnews-scripts-js"></script>
</body>

</html>
