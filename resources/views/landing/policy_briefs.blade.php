@extends('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'])

@push('styles')
  <style>
    .infographic {
      display: block;
      position: relative;
      aspect-ratio: 2/3;
      width: 100%;
      overflow: hidden;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      cursor: pointer;
    }

    .infographic__thumbnail {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: flex;
    }

    .infographic__thumbnail>i {
      margin: auto;
      font-size: 4rem;
      color: #F40F02aa;
    }

    .infographic__title {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 10px;
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      font-size: 1.2rem;
      font-weight: bold;
      text-align: center;
      opacity: 0;
      transition: opacity 0.3s;
      margin: 0;
    }

    .infographic:hover .infographic__title {
      opacity: 1;
    }

    .accordion {
      cursor: pointer;
      padding: 10px;
      border: none;
      text-align: left;
      outline: none;
      font-size: 1.2rem;
      transition: 0.4s;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .accordion .fa {
      transform: rotate(-90deg);
      transition: transform 0.1s;
    }

    .accordion.active .fa {
      transform: rotate(0deg);
    }

    .panel {
      padding: 0 10px;
      display: none;
      overflow: hidden;
      transition: max-height 0.2s ease-out;
      border: none;
      -webkit-box-shadow: none;
      box-shadow: none;
    }

    .accordion.active+.panel {
      display: block;
    }

    .panel a {
      display: block;
      color: #333;
      text-decoration: none;
      border: none !important;
    }
  </style>
@endpush

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var acc = document.getElementsByClassName('accordion');
      for (var i = 0; i < acc.length; i++) {
        acc[i].addEventListener('click', function() {
          this.classList.toggle('active');
        });
      }
    });
  </script>
@endpush

@section('main')
  <x-breadcrumb :breadcrumbs="[['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Policy Brief', 'url' => null]]" />

  <div id="content" class="container-wrapper">
    <div class="section-block-upper">
      <div id="secondary" class="sidebar-area sidebar-sticky-top" style="padding-left: 0; padding-right: 10px">
        <aside class="widget-area color-pad">
          <div id="block-2" class="widget chromenews-widget widget_block widget_search">
            <form role="search" method="get"
              class="wp-block-search__button-outside wp-block-search__icon-button wp-block-search">
              <label class="wp-block-search__label screen-reader-text" for="wp-block-search__input-1">Cari</label>
              <div class="wp-block-search__inside-wrapper ">
                <input class="wp-block-search__input" id="wp-block-search__input-1" placeholder="Cari policy brief"
                  value="" type="search" name="search" required />
                <button aria-label="Cari" class="wp-block-search__button has-icon wp-element-button" type="submit">
                  <svg class="search-icon" viewBox="0 0 24 24" width="24" height="24">
                    <path
                      d="M13 5c-3.3 0-6 2.7-6 6 0 1.4.5 2.7 1.3 3.7l-3.8 3.8 1.1 1.1 3.8-3.8c1 .8 2.3 1.3 3.7 1.3 3.3 0 6-2.7 6-6S16.3 5 13 5zm0 10.5c-2.5 0-4.5-2-4.5-4.5s2-4.5 4.5-4.5 4.5 2 4.5 4.5-2 4.5-4.5 4.5z">
                    </path>
                  </svg>
                </button>
              </div>
            </form>
          </div>

          <div id="block-6" class="widget chromenews-widget widget_block">
            <div class="wp-block-group">
              <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                <h2 class="wp-block-heading">Subjek</h2>

                <ul class="wp-block-categories-list wp-block-categories">
                  @foreach ($subjects as $subject)
                    <li class="cat-item cat-item-{{ $subject->id }}">
                      <details>
                        <summary class="accordion">
                          {{ $subject->name }}
                          <i class="fa fa-chevron-down"></i>
                        </summary>

                        <div class="panel">
                          <ul>
                            @foreach ($subject->indicators as $indicator)
                              <li>
                                <a href="{{ $currentMenu->url }}?indicator_id={{ $indicator->id }}">
                                  {{ $indicator->name }}
                                </a>
                              </li>
                            @endforeach
                          </ul>
                        </div>
                      </details>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </aside>
      </div>

      <div id="primary" class="content-area" style="padding-left: 10px; padding-right: 0;">
        <main id="main" class="site-main">
          <article id="post-853" class="post-853 page type-page status-publish hentry">
            <header class="entry-header">
              <h1 class="entry-title">Policy Brief</h1>
            </header>

            <div class="entry-content-wrap">
              <div class="entry-content">
                <div class="section-wrapper af-widget-body">
                  @foreach ($policyBriefs->chunk(4) as $row)
                    <div class="af-container-row clearfix" style="margin-bottom: 20px">
                      @foreach ($row as $policyBrief)
                        <div class="col-4 pad float-l trending-posts-item">
                          <a class="infographic" href="{{ asset('storage/' . $policyBrief->file_path) }}" target="_blank">
                            <div class="infographic__thumbnail" loading="lazy">
                              <i class="fa fa-file-pdf"></i>
                            </div>
                            <h3 class="infographic__title">{{ $policyBrief->title }}</h3>
                          </a>
                        </div>
                      @endforeach
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </article>
        </main>
      </div>
    </div>
  </div>
@endsection
