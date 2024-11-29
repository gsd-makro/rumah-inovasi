@extends('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'])

@section('main')
  <section
    class="aft-blocks aft-main-banner-section banner-carousel-1-wrap bg-fixed  chromenews-customizer aft-banner-layout-aligned aft-banner-background-default aft-banner-order-1"
    data-background="">
    <div class="banner-exclusive-posts-wrapper">
      <div class="container-wrapper">
        <div class="exclusive-posts">
          <div class="exclusive-now primary-color">
            <div class="aft-ripple"></div>
            <span>Breaking News</span>
          </div>
          <div class="exclusive-slides" dir="ltr">
            <div class='marquee aft-flash-slide left' data-speed='120000' data-gap='0' data-duplicated='true'
              data-direction="left">
              @foreach ($breaking as $news)
                <x-breaking :url="$news->url" :title="$news->title" :thumbnail="$news->thumbnail" />
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-wrapper">
      <div class="aft-main-banner-wrapper">
        <div class="aft-main-banner-part aft-banner-aligned af-container-row-5 ">
          <div class="aft-slider-part col-1 pad">
            <div class="aft-main-banner-slider-part chromenews-customizer col-66 pad">
              <div class="af-widget-carousel aft-carousel">
                <div
                  class="slick-wrapper af-banner-carousel af-banner-carousel-1 common-carousel af-cat-widget-carousel af-carousel-default"
                  data-slick='{"slidesToShow":1,"slidesToScroll":1,"autoplay":true,"autoplaySpeed":8000,"centerMode":false,"centerPadding":"","responsive":[{"breakpoint":1025,"settings":{"slidesToShow":1,"slidesToScroll":1,"infinite":true,"centerPadding":""}},{"breakpoint":600,"settings":{"slidesToShow":1,"slidesToScroll":1,"infinite":true,"centerPadding":""}},{"breakpoint":480,"settings":{"slidesToShow":1,"slidesToScroll":1,"infinite":true,"centerPadding":""}}]}'>
                  @foreach ($carousel as $news)
                    <div class="slick-item">
                      <x-news-card-1 :title="$news->title" :url="$news->url" :thumbnail="$news->thumbnail" :author="$news->author"
                        :date="$news->date" :categories="$news->categories" />
                    </div>
                  @endforeach
                </div>
                <div class="af-main-navcontrols af-slick-navcontrols"></div>
              </div>
            </div>

            <div class="chromenews-customizer aft-3-trending-posts col-3 pad">
              <div class="af-title-subtitle-wrap">
                <h4 class="widget-title header-after1 ">
                  <span class="heading-line-before"></span>
                  <span class="sub-heading-line"></span>
                  <span class="heading-line">Populer</span>
                  <span class="heading-line-after"></span>
                </h4>
              </div>
              <div class="full-wid-resp">
                <div class="slick-wrapper banner-vertical-slider af-widget-carousel"
                  data-slick='{"autoplay":true,"autoplaySpeed":9000}'>
                  @foreach ($popular as $news)
                    <div class="slick-item">
                      <x-news-card-2 :title="$news->title" :url="$news->url" :thumbnail="$news->thumbnail" :date="$news->date"
                        :no="$loop->iteration" />
                    </div>
                  @endforeach
                </div>

                <div class="af-trending-navcontrols af-slick-navcontrols"></div>
              </div>
            </div>
          </div>

          <div class="aft-trending-part col-1 pad">
            <div class="aft-4-thumbs-horizontal aft-horizontal-grid-part chromenews-customizer col-1 pad">
              <div class="af-title-subtitle-wrap">
                <h4 class="widget-title header-after1 ">
                  <span class="heading-line-before"></span>
                  <span class="sub-heading-line"></span>
                  <span class="heading-line">Nasional</span>
                  <span class="heading-line-after"></span>
                </h4>
              </div>
              <div class="af-main-banner-thumb-posts">
                <div class="section-wrapper">
                  <div class="slick-wrapper banner-thumb-carousel small-grid-style af-widget-carousel clearfix"
                    data-slick='{"autoplay":true,"autoplaySpeed":12000}'>
                    @foreach ($national as $news)
                      <div class="slick-item">
                        <div class="af-sec-post">
                          <x-news-card-1 :title="$news->title" :url="$news->url" :thumbnail="$news->thumbnail" :author="$news->author"
                            :date="$news->date" :categories="$news->categories" />
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <div class="af-thumb-navcontrols af-slick-navcontrols"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="aft-frontpage-feature-section-wrapper mb-5">
    <section class="aft-blocks af-main-banner-featured-posts">
      <div class="container-wrapper">
        <div class="af-main-banner-featured-posts featured-posts chromenews-customizer">
          <div class="af-title-subtitle-wrap">
            <h4 class="widget-title header-after1 ">
              <span class="heading-line-before"></span>
              <span class="sub-heading-line"></span>
              <span class="heading-line">Internasional</span>
              <span class="heading-line-after"></span>
            </h4>
          </div>

          <div class="section-wrapper af-widget-body">
            <div class="af-container-row clearfix">
              @foreach ($international as $news)
                <div class="col-3 pad float-l trending-posts-item">
                  <x-news-card-2 :title="$news->title" :url="$news->url" :thumbnail="$news->thumbnail" :date="$news->date" />
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
