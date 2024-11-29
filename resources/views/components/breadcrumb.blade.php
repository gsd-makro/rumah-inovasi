<div class="aft-main-breadcrumb-wrapper container-wrapper">
  <div class="af-breadcrumbs font-family-1 color-pad">
    <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
      <ul class="trail-items">
        <meta name="numberOfItems" content="{{ count($breadcrumbs) }}">
        <meta name="itemListOrder" content="Ascending">
        @foreach ($breadcrumbs as $breadcrumb)
          @if ($breadcrumb['url'])
            <li itemprop="itemListElement" class="trail-item trail-end">
              <a href="{{ $breadcrumb['url'] }}" itemprop="item">
                <span itemprop="name">
                  {{ $breadcrumb['label'] }}
                </span>
              </a>
              <meta itemprop="position" content="{{ $loop->index + 1 }}">
            </li>
          @else
            <li itemprop="itemListElement" class="trail-item trail-end">
              <span itemprop="name">
                {{ $breadcrumb['label'] }}
              </span>
              <meta itemprop="position" content="{{ $loop->index + 1 }}">
            </li>
          @endif
        @endforeach
      </ul>
    </div>
  </div>
</div>
