<div class="rating" id="{{ $id ?? 'rating' }}">
  <input type="range" min="0" max="5" value="0" name="{{ $name ?? '' }}" />
  <div class="stars">
    <label class="" data-value="1">
      <i class="far fa-star"></i>
      <i class="fa fa-star"></i>
    </label>
    <label class="" data-value="2">
      <i class="far fa-star"></i>
      <i class="fa fa-star"></i>
    </label>
    <label class="" data-value="3">
      <i class="far fa-star"></i>
      <i class="fa fa-star"></i>
    </label>
    <label class="" data-value="4">
      <i class="far fa-star"></i>
      <i class="fa fa-star"></i>
    </label>
    <label class="" data-value="5">
      <i class="far fa-star"></i>
      <i class="fa fa-star"></i>
    </label>
  </div>
</div>

@pushOnce('styles')
  <style>
    .rating {
      display: flex;
      user-select: none;
    }

    .rating [type="range"] {
      display: none;
    }

    .rating .stars {
      color: var(--secondary);
    }

    .rating .stars>* {
      cursor: pointer;
    }

    .rating .stars .far {
      display: inline;
    }

    .rating .stars .fa {
      display: none;
    }

    .rating .stars .filled .far {
      display: none;
    }

    .rating .stars .filled .fa {
      display: inline;
    }
  </style>
@endPushOnce

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const rating = document.getElementById('{{ $id ?? 'rating' }}');
      const rangeInput = rating.querySelector('input[type="range"]');
      const stars = rating.querySelectorAll('.stars label');

      stars.forEach(star => {
        star.addEventListener('click', function() {
          const value = this.getAttribute('data-value');
          rangeInput.value = value;
          updateStars(value);
        });
      });

      function updateStars(value) {
        stars.forEach(star => {
          if (star.getAttribute('data-value') <= value) {
            star.classList.add('filled');
          } else {
            star.classList.remove('filled');
          }
        });
      }
    });
  </script>
@endPush
