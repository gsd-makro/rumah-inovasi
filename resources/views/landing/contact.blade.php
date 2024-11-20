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

        .discussion__footer {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-top: 10px;
        }

        .discussion__tag {
            padding: .1em .5em;
            opacity: 0.8;
            border-radius: 1em;
            font-size: 0.7rem;
        }

        .discussion__tag.infografis {
            background-color: #007bff;
            color: #ffffff;
        }

        .discussion__tag.policy-brief {
            background-color: #28a745;
            color: #ffffff;
        }

        .discussion__tag.video {
            background-color: #ffc107;
            color: #000000;
        }

        .discussion__tag.artikel {
            background-color: #17a2b8;
            color: #ffffff;
        }

        .discussion__tag.dokumen {
            background-color: #dc3545;
            color: #ffffff;
        }

        .discussion__tag.galeri {
            background-color: #6c757d;
            color: #ffffff;
        }

        .discussion__tag+.discussion__tag {
            margin-left: 5px;
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

        .form-text {
            font-size: 0.875rem;
            color: #6c757d;
        }

        textarea {
            resize: vertical;
        }

        .ml-1 {
            margin-left: .25rem;
        }

        .invalid-feedback {
            color: #dc3545;
        }
    </style>
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
    <x-breadcrumb :breadcrumbs="[['label' => 'Beranda', 'url' => route('landing.home')], ['label' => 'Hubungi Kami', 'url' => null]]" />

    <div id="content" class="container-wrapper">
        <div class="section-block-upper">
            <div id="secondary" class="sidebar-area sidebar-sticky-top" style="padding-left: 0; padding-right: 10px">
                <aside class="widget-area color-pad">
                    <div id="block-6" class="widget chromenews-widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                                <form action="{{ route('feedbacks.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" id="name" name="name" placeholder="Nama Lengkap"
                                            aria-describedby="nameHelp" @class(['form-control', 'is-invalid' => $errors->has('name')])
                                            value="{{ old('name') }}" />
                                        <div id="nameHelp" class="form-text">Nama tidak akan ditampilkan di publik.</div>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Email"
                                            aria-describedby="emailHelp" @class(['form-control', 'is-invalid' => $errors->has('email')])
                                            value="{{ old('email') }}" />
                                        <div id="emailHelp" class="form-text">Email tidak akan ditampilkan di publik.</div>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="job_type" class="form-label">Pekerjaan</label>
                                        <select aria-label="Pekerjaan" id="job_type" name="job_type"
                                            aria-describedby="jobTypeHelp" @class([
                                                'form-select',
                                                'form-control',
                                                'is-invalid' => $errors->has('job_type'),
                                            ])>
                                            <option value="" disabled @selected(!old('job_type'))>Pilih salah satu
                                            </option>
                                            <option value="Mahasiswa" @selected(old('job_type' == 'Mahasiswa'))>Mahasiswa</option>
                                            <option value="ASN" @selected(old('job_type' == 'ASN'))>ASN</option>
                                            <option value="Swasta" @selected(old('job_type' == 'Swasta'))>Swasta</option>
                                            <option value="TNI/Polri" @selected(old('job_type' == 'TNI/Polri'))>TNI/Polri</option>
                                            <option value="Masyarakat Umum" @selected(old('job_type' == 'Masyarakat Umum'))>Masyarakat Umum
                                            </option>
                                        </select>
                                        <div id="jobTypeHelp" class="form-text">Pekerjaan tidak akan ditampilkan di publik.
                                        </div>
                                        @error('job_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="tag" class="form-label">Tag</label>
                                        <select aria-label="Tag" id="tag" name="tag" aria-describedby="tagHelp"
                                            @class([
                                                'form-select',
                                                'form-control',
                                                'is-invalid' => $errors->has('tag'),
                                            ])>
                                            <option value="" disabled @selected(!old('tag'))>Pilih salah satu
                                            </option>
                                            <option value="infografis" @selected(old('tag' == 'infografis'))>Infografis</option>
                                            <option value="policy brief" @selected(old('tag' == 'policy brief'))>Policy Brief</option>
                                            <option value="video" @selected(old('tag' == 'video'))>Video</option>
                                            <option value="artikel" @selected(old('tag' == 'artikel'))>Artikel</option>
                                            <option value="dokumen" @selected(old('tag' == 'dokumen'))>Dokumen</option>
                                            <option value="galeri" @selected(old('tag' == 'galeri'))>Galeri</option>
                                        </select>
                                        <div id="tagHelp" class="form-text">Tag membantu untuk mempermudah pencarian</div>
                                        @error('tag')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="feedback" class="form-label">Feedback</label>
                                        <textarea id="feedback" name="feedback" rows="4" placeholder="Pertanyaan, kritik, saran dan lain sebagainya."
                                            @class(['form-control', 'is-invalid' => $errors->has('feedback')])>{{ old('feedback') }}</textarea>
                                        @error('feedback')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="rating" class="form-label">Rating</label>
                                        <x-rating id="rating-feedback" name="rating" />
                                        @error('rating')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="button">
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
                                        @foreach ($feedbacks as $feedback)
                                            <div class="col-1 pad float-l trending-posts-item">
                                                <div class="discussion">
                                                    <div class="discussion__header">
                                                        <h2 class="discussion__title">
                                                            <a href="#">
                                                                {{ $feedback->feedback }}
                                                            </a>
                                                        </h2>
                                                        <p class="discussion__date">
                                                            {{ $feedback->created_at->format('d F Y') }}</p>
                                                    </div>

                                                    <div class="discussion__body">
                                                        <p @class([
                                                            'text-muted' => $feedback->admin_reply == null,
                                                        ])>
                                                            {{ $feedback->admin_reply ?? 'Belum ada balasan' }}</p>
                                                    </div>

                                                    <div class="discussion__footer">
                                                        <span @class([
                                                            'discussion__tag',
                                                            'infografis' => $feedback->tag == 'infografis',
                                                            'policy-brief' => $feedback->tag == 'policy brief',
                                                            'video' => $feedback->tag == 'video',
                                                            'artikel' => $feedback->tag == 'artikel',
                                                            'dokumen' => $feedback->tag == 'dokumen',
                                                            'galeri' => $feedback->tag == 'galeri',
                                                        ])>{{ $feedback->tag }}</span>
                                                    </div>
                                                </div>
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
