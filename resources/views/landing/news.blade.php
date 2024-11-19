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
  <x-breadcrumb :breadcrumbs="[['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Berita', 'url' => null]]" />

  <div class="container-wrapper" style="margin-top: 10px">
    <div class="aft-main-banner-wrapper">
      <div class="aft-main-banner-part aft-banner-aligned af-container-row-5 pad">
        <div class="chromenews-customizer col-1" style="padding-inline: 0; padding-top: 0">
          <div class="exclusive-posts">
            <div class="exclusive-now primary-color">
              <div class="aft-ripple"></div>
              <span>Breaking News</span>
            </div>
            <div class="exclusive-slides" dir="ltr">
              <div class='marquee aft-flash-slide left' data-speed='120000' data-gap='0' data-duplicated='true'
                data-direction="left">
                @foreach ($breaking as $news)
                  <x-breaking url="?id={{ $news->id }}" :title="$news->title" :thumbnail="asset('storage/' . $news->image)" />
                @endforeach
              </div>
            </div>
          </div>

          @foreach ($subjects as $subject)
            @continue($subject->articles->isEmpty())
            <div class="aft-4-thumbs-horizontal aft-horizontal-grid-part col-1 pad" style="margin-top: 20px"
              id="{{ preg_replace('/\s+/', '-', $subject->name) }}">
              <div class="af-title-subtitle-wrap pad">
                <h4 class="widget-title header-after1">
                  <span class="heading-line-before"></span>
                  <span class="sub-heading-line"></span>
                  <span class="heading-line">{{ $subject->name }}</span>
                  <span class="heading-line-after"></span>
                </h4>
              </div>
              <div class="af-main-banner-thumb-posts">
                <div class="section-wrapper">
                  <div class="slick-wrapper banner-thumb-carousel small-grid-style af-widget-carousel clearfix"
                    data-slick='{"slidesToShow":4,"autoplay":true,"autoplaySpeed":12000}'>
                    @foreach ($subject->articles as $news)
                      <div class="slick-item">
                        <div class="af-sec-post">
                          <x-news-card-1 :title="$news->title" url="?id={{ $news->id }}" :thumbnail="asset('storage/' . $news->image)"
                            :author="$news->user->name" :date="$news->created_at->diffForHumans()" :categories="[]" />
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <div class="af-thumb-navcontrols af-slick-navcontrols" style="right: 20px"></div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
