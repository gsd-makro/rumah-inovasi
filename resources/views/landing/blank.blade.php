@extends('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'])

@push('styles')
  <style></style>
@endpush

@section('main')
  <x-breadcrumb :breadcrumbs="[['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Blank Page', 'url' => null]]" />

  <div id="content" class="container-wrapper">
    <div class="section-block-upper">
      <div id="secondary" class="sidebar-area sidebar-sticky-top" style="padding-left: 0; padding-right: 10px">
        <aside class="widget-area color-pad">
          <div id="block-6" class="widget chromenews-widget widget_block">
            <div class="wp-block-group">
              <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                <h2>Sidebar</h2>
              </div>
            </div>
          </div>
        </aside>
      </div>

      <div id="primary" class="content-area" style="padding-left: 10px; padding-right: 0;">
        <main id="main" class="site-main">
          <article id="post-853" class="post-853 page type-page status-publish hentry">
            <header class="entry-header">
              <h1 class="entry-title">Main</h1>
            </header>

            <div class="entry-content-wrap">
              <div class="entry-content">
                <div class="section-wrapper af-widget-body">
                  <div class="af-container-row clearfix" style="margin-bottom: 20px">
                    <div class="col-1 pad float-l trending-posts-item">
                      {{-- <x-card /> --}}
                    </div>
                    <div class="col-1 pad float-l trending-posts-item">
                      {{-- <x-card /> --}}
                    </div>
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
