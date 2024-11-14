<div class="pos-rel read-single color-pad clearfix af-cat-widget-carousel grid-design-texts-over-image">
  <div class="read-img pos-rel read-bg-img">
    <a class="aft-post-image-link" href="{{ $url }}">
      {{ $title }}
    </a>
    <img width="640" height="359" src="{{ $thumbnail }}" class="attachment-large size-large" alt="" />
    <div class="post-format-and-min-read-wrap">
      <span class="min-read">2 min read</span>
    </div>
  </div>

  <div class="pad read-details color-tp-pad">
    <div class="read-categories">
      <ul class="cat-links">
        @foreach ($categories as $category)
          <li class="meta-category">
            <a class="chromenews-categories category-color-1" href="{{ $category->url }}">
              {{ $category->name }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>

    <div class="read-title">
      <h4>
        <a href="{{ $url }}">
          {{ $title }}
        </a>
      </h4>
    </div>

    <div class="post-item-metadata entry-meta">
      <span class="author-links">
        <span class="item-metadata posts-author byline">
          <i class="far fa-user-circle"></i>
          {{ $author }}
        </span>
        <span class="item-metadata posts-date">
          <i class="far fa-clock" aria-hidden="true"></i>
          {{ $date }}
        </span>
      </span>
      <span class="aft-comment-view-share"></span>
    </div>
  </div>
</div>
