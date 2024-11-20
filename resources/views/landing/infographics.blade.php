@extends('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'])

@push('styles')
    <style>
        /* Existing styles */
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

        /* Accordion styles */
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

        /* New Lightbox styles */
        .lightbox {
            display: none;
            position: fixed;
            z-index: 999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .lightbox.active {
            opacity: 1;
            pointer-events: auto;
        }

        .lightbox__content {
            position: relative;
            max-width: 90%;
            max-height: 90vh;
        }

        .lightbox__image {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
        }

        .lightbox__close {
            position: absolute;
            top: -40px;
            right: 0;
            color: white;
            font-size: 30px;
            cursor: pointer;
            background: none;
            border: none;
            padding: 5px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Accordion functionality
            var acc = document.getElementsByClassName('accordion');
            for (var i = 0; i < acc.length; i++) {
                acc[i].addEventListener('click', function() {
                    this.classList.toggle('active');
                });
            }

            // Lightbox functionality
            const lightbox = document.createElement('div');
            lightbox.className = 'lightbox';
            lightbox.innerHTML = `
        <div class="lightbox__content">
          <button class="lightbox__close">&times;</button>
          <img class="lightbox__image" src="" alt="">
        </div>
      `;
            document.body.appendChild(lightbox);

            // Open lightbox
            document.querySelectorAll('.infographic').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const imgSrc = this.getAttribute('href');
                    const imgAlt = this.querySelector('img').getAttribute('alt');
                    lightbox.querySelector('.lightbox__image').src = imgSrc;
                    lightbox.querySelector('.lightbox__image').alt = imgAlt;
                    lightbox.classList.add('active');
                });
            });

            // Close lightbox
            lightbox.querySelector('.lightbox__close').addEventListener('click', () => {
                lightbox.classList.remove('active');
            });

            // Close on outside click
            lightbox.addEventListener('click', (e) => {
                if (e.target === lightbox) {
                    lightbox.classList.remove('active');
                }
            });

            // Close on escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && lightbox.classList.contains('active')) {
                    lightbox.classList.remove('active');
                }
            });
        });
    </script>
@endpush

@section('main')
    <x-breadcrumb :breadcrumbs="[['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Infografis', 'url' => null]]" />

    <div id="content" class="container-wrapper">
        <div class="section-block-upper">
            <div id="secondary" class="sidebar-area sidebar-sticky-top" style="padding-left: 0; padding-right: 10px">
                <aside class="widget-area color-pad">
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
                                                                <a
                                                                    href="{{ $currentMenu->url }}?indicator_id={{ $indicator->id }}">
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
                            <h1 class="entry-title">Infografis</h1>
                        </header>

                        <div class="entry-content-wrap">
                            <div class="entry-content">
                                <div class="section-wrapper af-widget-body">
                                    @foreach ($infographics->chunk(4) as $row)
                                        <div class="af-container-row clearfix" style="margin-bottom: 20px">
                                            @foreach ($row as $infographic)
                                                <div class="col-4 pad float-l trending-posts-item">
                                                    <a class="infographic"
                                                        href="{{ asset('storage/' . $infographic->image) }}">
                                                        <img class="infographic__thumbnail" loading="lazy" decoding="async"
                                                            src="{{ asset('storage/' . $infographic->image) }}"
                                                            alt="{{ $infographic->title }}" />
                                                        <h3 class="infographic__title">{{ $infographic->title }}</h3>
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
