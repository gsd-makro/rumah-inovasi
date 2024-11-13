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
              <x-breaking url="https://google.com"
                title="Mendatangkan Tim Ahli: Bappeda Kab. Inhil Menghadiri Pembahasan RDTR Perkotaan Sungai Guntung" />
              <x-breaking url="https://google.com"
                title="Press release Berita Resmi Statistik 2024: Inhil alami inflasi 2,64%." />
              <x-breaking url="https://google.com"
                title="Targetkan Minimal 80 Persen ODF Tahun 2025, Pemkab Inhil Gelar Rapat Evaluasi bersama Forum KKS." />
              <x-breaking url="https://google.com"
                title="Kaji Potensi Risiko Bencana di Indragiri Hilir, Pemkab Inhil Hadirkan Tim PSBA dari UGM" />
              <x-breaking url="https://google.com"
                title="Fokus Menangani Kemiskinan Ekstrem, Bappeda Kab. Inhil Menggelar Rapat Bersama Pihak Terkait" />
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
                  <div class="slick-item">
                    <x-news-card-1
                      title="Mendatangkan Tim Ahli : Bappeda Kab. Inhil Menghadiri Pembahasan RDTR Perkotaan Sungai Guntung."
                      url="https://bappeda.inhilkab.go.id/2024/11/07/3016/"
                      thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/11/IMG-20241108-WA0002-1024x575.jpg"
                      author="admin" date="7 November 2024" :categories="[
                          (object) [
                              'url' => 'https://bappeda.inhilkab.go.id/category/berita-terkini/',
                              'name' => 'Berita Terkini',
                          ],
                          (object) [
                              'url' => 'https://bappeda.inhilkab.go.id/category/berita-terpopuler/',
                              'name' => 'Berita Terpopuler',
                          ],
                          (object) ['url' => 'https://bappeda.inhilkab.go.id/category/ilh/', 'name' => 'ILH'],
                      ]" />
                  </div>

                  <div class="slick-item">
                    <x-news-card-1 title="Press release Berita Resmi Statistik 2024 : Inhil alami inflasi 2,64%."
                      url="https://bappeda.inhilkab.go.id/2024/11/01/press-release-berita-resmi-statistik-2024-inhil-alami-inflasi-264/"
                      thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/11/IMG-20241101-WA0022-1024x575.jpg"
                      author="admin" date="1 November 2024" :categories="[
                          (object) [
                              'url' => 'https://bappeda.inhilkab.go.id/category/berita-sda/',
                              'name' => 'Berita SDA',
                          ],
                          (object) [
                              'url' => 'https://bappeda.inhilkab.go.id/category/berita-terkini/',
                              'name' => 'Berita Terkini',
                          ],
                          (object) [
                              'url' => 'https://bappeda.inhilkab.go.id/category/berita-terpopuler/',
                              'name' => 'Berita Terpopuler',
                          ],
                          (object) ['url' => 'https://bappeda.inhilkab.go.id/category/ekonomi/', 'name' => 'Ekonomi'],
                      ]" />
                  </div>

                  <div class="slick-item">
                    <x-news-card-1
                      title="Targetkan Minimal 80 Persen ODF Tahun 2025, Pemkab Inhil Gelar Rapat Evaluasi bersama Forum KKS."
                      url="https://bappeda.inhilkab.go.id/2024/10/23/2939/"
                      thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241023-WA0049-1024x575.jpg"
                      author="admin" date="23 Oktober 2024" :categories="[
                          (object) [
                              'url' => 'https://bappeda.inhilkab.go.id/category/berita-terkini/',
                              'name' => 'Berita Terkini',
                          ],
                          (object) [
                              'url' => 'https://bappeda.inhilkab.go.id/category/berita-terpopuler/',
                              'name' => 'Berita Terpopuler',
                          ],
                          (object) [
                              'url' => 'https://bappeda.inhilkab.go.id/category/kesehatan/',
                              'name' => 'KESEHATAN',
                          ],
                          (object) ['url' => 'https://bappeda.inhilkab.go.id/category/sosial/', 'name' => 'Sosial'],
                      ]" />
                  </div>
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
                  <div class="slick-item">
                    <x-news-card-2
                      title="Mendatangkan Tim Ahli : Bappeda Kab. Inhil Menghadiri Pembahasan RDTR Perkotaan Sungai Guntung."
                      url="https://bappeda.inhilkab.go.id/2024/11/07/3016/"
                      thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/11/IMG-20241108-WA0002-150x150.jpg"
                      date="7 November 2024" no="1" />
                  </div>

                  <div class="slick-item">
                    <x-news-card-2 title="Press release Berita Resmi Statistik 2024 : Inhil alami inflasi 2,64%."
                      url="https://bappeda.inhilkab.go.id/2024/11/01/press-release-berita-resmi-statistik-2024-inhil-alami-inflasi-264/"
                      thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/11/IMG-20241101-WA0022-150x150.jpg"
                      date="1 November 2024" no="2" />
                  </div>

                  <div class="slick-item">
                    <x-news-card-2
                      title="Targetkan Minimal 80 Persen ODF Tahun 2025, Pemkab Inhil Gelar Rapat Evaluasi bersama Forum KKS."
                      url="https://bappeda.inhilkab.go.id/2024/10/23/2939/"
                      thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241023-WA0049-150x150.jpg"
                      date="23 Oktober 2024" no="3" />
                  </div>

                  <div class="slick-item">
                    <x-news-card-2
                      title="Kaji Potensi Risiko Bencana di Indragiri Hilir, Pemkab Inhil Hadirkan Tim PSBA dari UGM"
                      url="https://bappeda.inhilkab.go.id/2024/10/18/kaji-potensi-risiko-bencana-di-indragiri-hilir-pemkab-inhil-hadirkan-tim-psba-dari-ugm/"
                      thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241017-WA0019-150x150.jpg"
                      date="18 Oktober 2024" no="4" />
                  </div>

                  <div class="slick-item">
                    <x-news-card-2
                      title="Fokus Menangani Kemiskinan Ekstrem, Bappeda Kab. Inhil Menggelar Rapat Bersama Pihak Terkait"
                      url="https://bappeda.inhilkab.go.id/2024/10/18/fokus-menangani-kemiskinan-ekstrem-bappeda-kab-inhil-menggelar-rapat-bersama-pihak-terkait/"
                      thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241021-WA0005-150x150.jpg"
                      date="18 Oktober 2024" no="5" />
                  </div>
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
                  <span class="heading-line">Pilihan Editor</span>
                  <span class="heading-line-after"></span>
                </h4>
              </div>
              <div class="af-main-banner-thumb-posts">
                <div class="section-wrapper">
                  <div class="slick-wrapper banner-thumb-carousel small-grid-style af-widget-carousel clearfix"
                    data-slick='{"autoplay":true,"autoplaySpeed":12000}'>
                    <div class="slick-item">
                      <div class="af-sec-post">
                        <x-news-card-1
                          title="Mendatangkan Tim Ahli : Bappeda Kab. Inhil Menghadiri Pembahasan RDTR Perkotaan Sungai Guntung."
                          url="https://bappeda.inhilkab.go.id/2024/11/07/3016/"
                          thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/11/IMG-20241108-WA0002-1024x575.jpg"
                          author="admin" date="7 November 2024" :categories="[
                              (object) [
                                  'url' => 'https://bappeda.inhilkab.go.id/category/berita-terkini/',
                                  'name' => 'Berita Terkini',
                              ],
                              (object) [
                                  'url' => 'https://bappeda.inhilkab.go.id/category/berita-terpopuler/',
                                  'name' => 'Berita Terpopuler',
                              ],
                              (object) ['url' => 'https://bappeda.inhilkab.go.id/category/ilh/', 'name' => 'ILH'],
                          ]" />
                      </div>
                    </div>

                    <div class="slick-item">
                      <div class="af-sec-post">
                        <x-news-card-1 title="Press release Berita Resmi Statistik 2024 : Inhil alami inflasi 2,64%."
                          url="https://bappeda.inhilkab.go.id/2024/11/01/press-release-berita-resmi-statistik-2024-inhil-alami-inflasi-264/"
                          thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/11/IMG-20241101-WA0022-1024x575.jpg"
                          author="admin" date="1 November 2024" :categories="[
                              (object) [
                                  'url' => 'https://bappeda.inhilkab.go.id/category/berita-sda/',
                                  'name' => 'Berita SDA',
                              ],
                              (object) [
                                  'url' => 'https://bappeda.inhilkab.go.id/category/berita-terkini/',
                                  'name' => 'Berita Terkini',
                              ],
                              (object) [
                                  'url' => 'https://bappeda.inhilkab.go.id/category/berita-terpopuler/',
                                  'name' => 'Berita Terpopuler',
                              ],
                              (object) [
                                  'url' => 'https://bappeda.inhilkab.go.id/category/ekonomi/',
                                  'name' => 'Ekonomi',
                              ],
                          ]" />
                      </div>
                    </div>

                    <div class="slick-item">
                      <div class="af-sec-post">
                        <x-news-card-1
                          title="Targetkan Minimal 80 Persen ODF Tahun 2025, Pemkab Inhil Gelar Rapat Evaluasi bersama Forum KKS."
                          url="https://bappeda.inhilkab.go.id/2024/10/23/2939/"
                          thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241023-WA0049-1024x575.jpg"
                          author="admin" date="23 Oktober 2024" :categories="[
                              (object) [
                                  'url' => 'https://bappeda.inhilkab.go.id/category/berita-terkini/',
                                  'name' => 'Berita Terkini',
                              ],
                              (object) [
                                  'url' => 'https://bappeda.inhilkab.go.id/category/berita-terpopuler/',
                                  'name' => 'Berita Terpopuler',
                              ],
                              (object) [
                                  'url' => 'https://bappeda.inhilkab.go.id/category/kesehatan/',
                                  'name' => 'KESEHATAN',
                              ],
                              (object) [
                                  'url' => 'https://bappeda.inhilkab.go.id/category/sosial/',
                                  'name' => 'Sosial',
                              ],
                          ]" />
                      </div>
                    </div>
                  </div>
                  <div class="af-thumb-navcontrols af-slick-navcontrols"></div>
                </div>
              </div>
              <!-- Editors Pick line END -->
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
              <span class="heading-line">Nasional</span>
              <span class="heading-line-after"></span>
            </h4>
          </div>

          <div class="section-wrapper af-widget-body">
            <div class="af-container-row clearfix">
              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2
                  title="Mendatangkan Tim Ahli : Bappeda Kab. Inhil Menghadiri Pembahasan RDTR Perkotaan Sungai Guntung."
                  url="https://bappeda.inhilkab.go.id/2024/11/07/3016/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/11/IMG-20241108-WA0002-150x150.jpg"
                  date="7 November 2024" />
              </div>

              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2 title="Press release Berita Resmi Statistik 2024 : Inhil alami inflasi 2,64%."
                  url="https://bappeda.inhilkab.go.id/2024/11/01/press-release-berita-resmi-statistik-2024-inhil-alami-inflasi-264/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/11/IMG-20241101-WA0022-150x150.jpg"
                  date="1 November 2024" />
              </div>

              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2
                  title="Targetkan Minimal 80 Persen ODF Tahun 2025, Pemkab Inhil Gelar Rapat Evaluasi bersama Forum KKS."
                  url="https://bappeda.inhilkab.go.id/2024/10/23/2939/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241023-WA0049-150x150.jpg"
                  date="23 Oktober 2024" />
              </div>

              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2
                  title="Kaji Potensi Risiko Bencana di Indragiri Hilir, Pemkab Inhil Hadirkan Tim PSBA dari UGM"
                  url="https://bappeda.inhilkab.go.id/2024/10/18/kaji-potensi-risiko-bencana-di-indragiri-hilir-pemkab-inhil-hadirkan-tim-psba-dari-ugm/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241017-WA0019-150x150.jpg"
                  date="18 Oktober 2024" />
              </div>

              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2
                  title="Fokus Menangani Kemiskinan Ekstrem, Bappeda Kab. Inhil Menggelar Rapat Bersama Pihak Terkait"
                  url="https://bappeda.inhilkab.go.id/2024/10/18/fokus-menangani-kemiskinan-ekstrem-bappeda-kab-inhil-menggelar-rapat-bersama-pihak-terkait/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241021-WA0005-150x150.jpg"
                  date="18 Oktober 2024" />
              </div>

              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2
                  title="Penerapan Sistem Merit dalam Manajemen ASN, Kepala Bappeda Kab. Inhil Menghadiri pertemuan bersama BKPSDM Kab. Inhil dan BKN."
                  url="https://bappeda.inhilkab.go.id/2024/10/16/penerapan-sistem-merit-dalam-manajemen-asn-kepala-bappeda-kab-inhil-menghadiri-pertemuan-bersama-bkpsdm-kab-inhil-dan-bkn/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241016-WA0020-edited-150x150.jpg"
                  date="16 Oktober 2024" />
              </div>
            </div>
          </div>
        </div>
        <!-- Trending line END -->
      </div>
    </section>
  </div>

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
              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2
                  title="Mendatangkan Tim Ahli : Bappeda Kab. Inhil Menghadiri Pembahasan RDTR Perkotaan Sungai Guntung."
                  url="https://bappeda.inhilkab.go.id/2024/11/07/3016/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/11/IMG-20241108-WA0002-150x150.jpg"
                  date="7 November 2024" />
              </div>

              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2 title="Press release Berita Resmi Statistik 2024 : Inhil alami inflasi 2,64%."
                  url="https://bappeda.inhilkab.go.id/2024/11/01/press-release-berita-resmi-statistik-2024-inhil-alami-inflasi-264/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/11/IMG-20241101-WA0022-150x150.jpg"
                  date="1 November 2024" />
              </div>

              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2
                  title="Targetkan Minimal 80 Persen ODF Tahun 2025, Pemkab Inhil Gelar Rapat Evaluasi bersama Forum KKS."
                  url="https://bappeda.inhilkab.go.id/2024/10/23/2939/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241023-WA0049-150x150.jpg"
                  date="23 Oktober 2024" />
              </div>

              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2
                  title="Kaji Potensi Risiko Bencana di Indragiri Hilir, Pemkab Inhil Hadirkan Tim PSBA dari UGM"
                  url="https://bappeda.inhilkab.go.id/2024/10/18/kaji-potensi-risiko-bencana-di-indragiri-hilir-pemkab-inhil-hadirkan-tim-psba-dari-ugm/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241017-WA0019-150x150.jpg"
                  date="18 Oktober 2024" />
              </div>

              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2
                  title="Fokus Menangani Kemiskinan Ekstrem, Bappeda Kab. Inhil Menggelar Rapat Bersama Pihak Terkait"
                  url="https://bappeda.inhilkab.go.id/2024/10/18/fokus-menangani-kemiskinan-ekstrem-bappeda-kab-inhil-menggelar-rapat-bersama-pihak-terkait/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241021-WA0005-150x150.jpg"
                  date="18 Oktober 2024" />
              </div>

              <div class="col-3 pad float-l trending-posts-item">
                <x-news-card-2
                  title="Penerapan Sistem Merit dalam Manajemen ASN, Kepala Bappeda Kab. Inhil Menghadiri pertemuan bersama BKPSDM Kab. Inhil dan BKN."
                  url="https://bappeda.inhilkab.go.id/2024/10/16/penerapan-sistem-merit-dalam-manajemen-asn-kepala-bappeda-kab-inhil-menghadiri-pertemuan-bersama-bkpsdm-kab-inhil-dan-bkn/"
                  thumbnail="https://bappeda.inhilkab.go.id/wp-content/uploads/2024/10/IMG-20241016-WA0020-edited-150x150.jpg"
                  date="16 Oktober 2024" />
              </div>
            </div>
          </div>
        </div>
        <!-- Trending line END -->
      </div>
    </section>
  </div>
@endsection
