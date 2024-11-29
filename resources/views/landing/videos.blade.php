@extends('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'])

@push('styles')
  <style>
    .gallery-item {
      position: relative;
      width: 100%;
      aspect-ratio: 1/1;
      object-fit: cover;
      display: flex;
    }

    .gallery-item iframe {
      width: 100%;
      height: 100%;
      object-fit: cover;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: auto;
    }

    .gallery-item__caption {
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
      pointer-events: none;
    }

    .gallery-item:hover .gallery-item__caption {
      opacity: 1;
    }
  </style>
@endpush

@section('main')
  <x-breadcrumb :breadcrumbs="[['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Video', 'url' => null]]" />

  <div id="content" class="container-wrapper">
    <div class="section-block-upper">
      <div id="primary" class="content-area" style="padding-left: 0; padding-right: 0; width: 100%;">
        <main id="main" class="site-main">
          <article id="post-853" class="post-853 page type-page status-publish hentry">
            <header class="entry-header"
              style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 20px;">
              <h1 class="entry-title">Video</h1>
              <form role="search" method="get"
                class="wp-block-search__button-outside wp-block-search__icon-button wp-block-search"
                style="display: inline-block">
                <label class="wp-block-search__label screen-reader-text" for="wp-block-search__input-1">Cari</label>
                <div class="wp-block-search__inside-wrapper ">
                  <input class="wp-block-search__input" id="wp-block-search__input-1" placeholder="Cari video"
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
            </header>

            <div class="entry-content-wrap">
              <div class="entry-content">
                <div class="section-wrapper af-widget-body">
                  <div class="gallery"
                    style="margin-bottom: 20px; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                    @foreach ($videos as $video)
                      <div class="gallery-item">
                        {!! $video->embed_html !!}

                        <h3 class="gallery-item__caption">{{ $video->title }}</h3>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </article>
        </main>
      </div>
    </div>
  </div>
@endsection
