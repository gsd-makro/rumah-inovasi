<div class="card card-full text-white overflow zoom">
  <div class="height-ratio image-wrapper">
    <a href="{{ $news->url }}">
      <img width="282" height="240" src="{{ asset('/img/lazy-empty.png') }}" class="img-fluid lazy wp-post-image"
        alt="{{ $news->title }}" loading="lazy" data-src="{{ $news->thumbnails[0]->url }}"
        srcset="{{ $news->thumbnails->map(fn($thumbnail) => $thumbnail->url . ' ' . $thumbnail->width . 'w')->join(', ') }}"
        sizes="(max-width: 282px) 100vw, 282px" />
    </a>
  </div>
  <div class="position-absolute px-3 pb-3 pt-0 b-0 w-100 bg-shadow">
    @foreach ($news->categories as $category)
      <a href="https://demo.bootstrap.news/default/category/lifestyle/{{ $category->slug }}/"
        class="p-1 badge bg-primary text-white">{{ $category->name }}</a>
    @endforeach
    <!-- post title -->
    <h3 class="h6 h4-sm h6-md h5-lg text-white my-1">
      <a class="text-white" href="{{ $news->url }}">
        {{ $news->title }}
      </a>
    </h3>
  </div>
</div>
