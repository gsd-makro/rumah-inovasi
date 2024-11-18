@extends('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'])

@push('styles')
  <style>
    .discussion,
    .discussion * {
      font-family: inherit;
    }

    .discussion {
      border: 1px solid #e0e0e0;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
    }

    .discussion__header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }

    .discussion__title {
      margin: 0;
      font-size: 1.5rem;
    }

    .discussion__title a {
      color: #333;
      text-decoration: none;
      border: none !important;
    }

    .discussion__title:hover a {
      border-bottom: 1px solid var(--secondary) !important;
    }

    .discussion__date {
      margin: 0;
      font-size: 0.8rem;
      color: #666;
    }

    .discussion__body {
      margin: 0;
    }

    .discussion__body p {
      margin: 0;
    }
  </style>

  <style>
    .button {
      font-family: inherit !important;
      display: block;
      padding: 10px 20px;
      background-color: var(--secondary) !important;
      color: white !important;
      text-decoration: none;
      border-radius: 5px;
      border: 1px solid var(--secondary);
      transition: background-color 0.3s;
      text-align: center;
      font-weight: normal;
      text-transform: none !important;
      height: auto !important;
      line-height: normal !important;
      width: 100% !important;
    }

    .button:hover,
    .button:focus {
      color: var(--secondary) !important;
      background-color: transparent !important;
    }
  </style>

  <style>
    .mb-3 {
      margin-bottom: 1rem;
    }

    .form-control {
      height: 38px;
      font-family: inherit;
    }

    textarea {
      resize: vertical;
    }

    .ml-1 {
      margin-left: .25rem;
    }
  </style>
@endpush

@section('main')
  <x-breadcrumb :breadcrumbs="[['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Hubungi Kami', 'url' => null]]" />

  <div id="content" class="container-wrapper">
    <div class="section-block-upper">
      <div id="secondary" class="sidebar-area sidebar-sticky-top" style="padding-left: 0; padding-right: 10px">
        <aside class="widget-area color-pad">
          <div id="block-6" class="widget chromenews-widget widget_block">
            <div class="wp-block-group">
              <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                <form>
                  <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap"
                      aria-describedby="nameHelp" />
                    <div id="nameHelp" class="form-text">Nama tidak akan ditampilkan di publik.</div>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                      aria-describedby="emailHelp" />
                    <div id="emailHelp" class="form-text">Email tidak akan ditampilkan di publik.</div>
                  </div>
                  <div class="mb-3">
                    <label for="job_type" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" id="job_type" name="job_type" placeholder="Pekerjaan"
                      aria-describedby="jobTypeHelp" list="job_types" />
                    <div id="jobTypeHelp" class="form-text">Pekerjaan tidak akan ditampilkan di publik.</div>
                    <datalist id="job_types">
                      <option value="Mahasiswa">
                      <option value="Pegawai Negeri">
                      <option value="Pegawai Swasta">
                      <option value="Wiraswasta">
                      <option value="Lainnya">
                    </datalist>
                  </div>
                  <div class="mb-3">
                    <label for="feedback" class="form-label">Feedback</label>
                    <textarea class="form-control" id="feedback" name="feedback" rows="4"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <x-rating id="rating-feedback" name="rating" />
                  </div>
                  <button type="button" class="button">
                    Kirim Feedback
                    <i class="ml-1 fas fa-paper-plane"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </aside>
      </div>

      <div id="primary" class="content-area" style="padding-left: 10px; padding-right: 0;">
        <main id="main" class="site-main">
          <article id="post-853" class="post-853 page type-page status-publish hentry">
            <header class="entry-header">
              <h1 class="entry-title">Diskusi</h1>
            </header>

            <div class="entry-content-wrap">
              <div class="entry-content">
                <div class="section-wrapper af-widget-body">
                  <div class="af-container-row clearfix" style="margin-bottom: 20px">
                    <div class="col-1 pad float-l trending-posts-item">
                      <div class="discussion">
                        <div class="discussion__header">
                          <h2 class="discussion__title">
                            <a href="#">
                              Bagaimana cara menambahkan indikator baru?
                            </a>
                          </h2>
                          <p class="discussion__date">12 Agustus 2021</p>
                        </div>

                        <div class="discussion__body">
                          <p>Bagaimana caranya agar saya bisa menambahkan indikator baru di aplikasi ini?
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-1 pad float-l trending-posts-item">
                      <div class="discussion">
                        <div class="discussion__header">
                          <h2 class="discussion__title">
                            <a href="#">
                              Bagaimana cara melihat data indikator?
                            </a>
                          </h2>
                          <p class="discussion__date">12 Agustus 2021</p>
                        </div>

                        <div class="discussion__body">
                          <p>Bagaimana caranya agar saya bisa melihat data indikator di aplikasi ini?</p>
                        </div>
                      </div>
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
