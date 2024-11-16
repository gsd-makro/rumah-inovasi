@extends('layouts.landing', ['title' => 'Rumah Inovasi Gorontalo'])

@push('styles')
    <style>
        .infographic {
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
    </style>
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
                                        <li class="cat-item cat-item-{{ $subject->id }}">{{ $subject->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <div id="primary" class="content-area">
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
                                            @foreach ($row as $policybrief)
                                                <div class="col-4 pad float-l trending-posts-item">
                                                    <div class="policybrief">
                                                        {{-- <img class="policybrief__thumbnail" loading="lazy" decoding="async"
                                                            src="{{ asset('storage/' . $policybrief->file_path) }}"
                                                            alt="{{ $policybrief->title }}" /> --}}

                                                        <h3 class="policybrief__title">{{ $policybrief->title }}</h3>
                                                    </div>
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
