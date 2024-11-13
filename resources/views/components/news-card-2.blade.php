<div class="aft-trending-posts list-part af-sec-post">
  <div class="af-double-column list-style clearfix aft-list-show-image">
    <div class="read-single color-pad">
      <div class="col-3 float-l pos-rel read-img read-bg-img">
        <a class="aft-post-image-link" href="{{ $url }}">
          {{ $title }}
        </a>
        <img width="150" height="150" src="{{ $thumbnail }}" class="attachment-thumbnail size-thumbnail"
          alt="" />

        @if (isset($no))
          <span class="trending-no">{{ $no }}</span>
        @endif
      </div>

      <div class="col-66 float-l pad read-details color-tp-pad">
        <div class="read-title">
          <h4>
            <a href="{{ $url }}">
              {{ $title }}
            </a>
          </h4>
        </div>
        <div class="post-item-metadata entry-meta">
          <span class="author-links">
            <span class="item-metadata posts-date">
              <i class="far fa-clock" aria-hidden="true"></i>
              {{ $date }}
            </span>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
