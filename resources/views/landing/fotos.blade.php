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

    .gallery-item a {
      width: 100%;
      height: 100%;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .gallery-item a img {
      width: 100%;
      height: 100%;
      object-fit: cover;
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
  <x-breadcrumb :breadcrumbs="[['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Galeri', 'url' => null]]" />

  <div id="content" class="container-wrapper">
    <div class="section-block-upper">
      <div id="primary" class="content-area" style="padding-left: 0; padding-right: 0; width: 100%;">
        <main id="main" class="site-main">
          <article id="post-853" class="post-853 page type-page status-publish hentry">
            <header class="entry-header">
              <h1 class="entry-title">Galeri</h1>
            </header>

            <div class="entry-content-wrap">
              <div class="entry-content">
                <div class="section-wrapper af-widget-body">
                  <div class="gallery"
                    style="margin-bottom: 20px; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
                    @foreach ($photos as $photo)
                      <div class="gallery-item">
                        <a href="{{ asset('storage/' . $photo->file_path) }}" data-lightbox="gallery"
                          data-title="{{ $photo->title }}"><img src="{{ asset('storage/' . $photo->file_path) }}"
                            alt="{{ $photo->title }}"></a>

                        <h3 class="gallery-item__caption">{{ $photo->title }}</h3>
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
