@extends('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'])

@push('styles')
  <style></style>
@endpush

@push('scripts')
  @session('success')
    <script>
      setTimeout(() => {
        Swal.fire({
          title: "Good job!",
          text: "{{ $value }}",
          icon: "success"
        });
      }, 1000);
    </script>
  @endsession

  @session('error')
    <script>
      setTimeout(() => {
        Swal.fire({
          title: "Oops...",
          text: "{{ $value }}",
          icon: "error"
        });
      }, 1000);
    </script>
  @endsession
@endpush

@section('main')
  <x-breadcrumb :breadcrumbs="[['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Berita', 'url' => '/berita/berita']]" />

  <div id="content" class="container-wrapper">
    <div class="content-area">
      <main id="main" class="site-main">
        <article id="post-3030"
          class="af-single-article post-3030 post type-post status-publish format-standard hentry category-berita-terkini category-berita-terpopuler category-kesehatan category-ppm">
          <div class="entry-content-wrap read-single ">
            <div class="entry-content-title-featured-wrap">
              <header class="entry-header pos-rel social-after-title" style="padding: 20px 3.75rem">
                <div class="read-details">
                  <div class="entry-header-details af-cat-widget-carousel">
                    <div class="figure-categories read-categories figure-categories-bg ">
                      <ul class="cat-links">
                        <li class="meta-category">
                          <a class="chromenews-categories category-color-1"
                            href="/berita/berita#{{ preg_replace('/\s+/', '-', $news->subject->name) }}">
                            {{ $news->subject->name }}
                          </a>
                        </li>
                      </ul>
                    </div>
                    <h1 class="entry-title">
                      {{ $news->title }}
                    </h1>

                    <div class="aft-post-excerpt-and-meta color-pad">
                      <div class="entry-meta">
                        <span class="author-links">
                          <span class="item-metadata posts-author byline">
                            <i class="far fa-user-circle"></i>
                            {{ $news->user->name }}
                          </span>

                          <span class="item-metadata posts-date">
                            <i class="far fa-clock" aria-hidden="true"></i>
                            {{ $news->created_at->format('d F Y') }}
                          </span>
                        </span>

                        <span class="min-read">2 min read</span>
                        <div class="aft-comment-view-share"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </header>
              <div class="read-img pos-rel"></div>
            </div>

            <div class="color-pad">
              <div class="entry-content read-details" style="padding: 20px 3.75rem">
                <figure
                  class="wp-block-gallery has-nested-images columns-default is-cropped wp-block-gallery-9 is-layout-flex wp-block-gallery-is-layout-flex"
                  style="margin-bottom: 20px">
                  <figure class="wp-block-image size-large">
                    <img loading="lazy" decoding="async" width="1024" height="575" data-id="3040"
                      src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="wp-image-3040" />
                  </figure>
                </figure>

                {!! $news->content !!}
              </div>
            </div>
          </div>
        </article>
      </main>
    </div>
  </div>
@endsection
