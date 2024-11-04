@use(Illuminate\Support\Carbon)
@php($date = Carbon::createFromFormat('d-m-Y', $news->date))

<article class="card card-full text-light overflow zoom">
  <div class="height-ratio image-wrapper">
    <a href="{{ $news->url }}">
      <img width="568" height="484" src="{{ asset('/img/lazy-empty.png') }}" class="img-fluid lazy wp-post-image"
        alt="{{ $news->title }}" loading="lazy" data-src="{{ $news->thumbnails[0]->url }}"
        srcset="{{ $news->thumbnails->map(fn($thumbnail) => $thumbnail->url . ' ' . $thumbnail->width . 'w')->join(', ') }}"
        sizes="(max-width: 568px) 100vw, 568px" />
    </a>
  </div>
  <div class="position-absolute p-3 b-0 w-100 bg-lg-shadow">
    <!-- post title -->
    <h2 class="h1-sm h2-md display-4-lg fw-bold heading-letter-space text-white">
      <a class="text-white" href="{{ $news->url }}">{{ $news->title }}</a>
    </h2>
    <!-- author and date -->
    <div class="news-meta mb-2">
      <span class="news-author white">by
        <span class="fw-bold">
          <a href="https://demo.bootstrap.news/default/author/{{ $news->author->username }}/"
            title="Posts by {{ $news->author->name }}" rel="author">
            {{ $news->author->name }}
          </a>
        </span>
      </span>
      <time class="news-date" datetime="{{ $date->toIso8601String() }}">{{ $date->format('F j, Y') }}</time>
    </div>
  </div>
</article>
