@extends('layouts.dashboard')
@section('title', 'Policy Brief > Edit Data')
@section('subtitle', 'Policy Brief.')
@section('main')
  <section class="section">
    <div class="card">
      <div class="row">
        <div class="col-12 col-md-6">
          <div class="card-header">
            <h4 class="card-title">Upload Policy Brief</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('policy_briefs.update', $policy_brief->id) }}" method="POST"
              enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" value="{{ $policy_brief->title }}" id="title"
                  name="title" placeholder="Masukkan judul Policy Brief" required>
              </div>
              <div class="form-group">
                <label for="indikator">Pilih Indikator</label>
                <select class="choices form-select multiple-remove" name="indicators[]" multiple="multiple">
                  <optgroup label="Pilih Indikator">
                    @foreach ($indicators as $item)
                      @php
                        $selected = in_array($item->id, $policy_brief->indicators->pluck('id')->toArray())
                            ? 'selected'
                            : '';
                      @endphp
                      <option value="{{ $item->id }}" {{ $selected }}>{{ $item->name }}
                      </option>
                    @endforeach
                  </optgroup>
                </select>
              </div>
              <div class="form-group">
                <label for="file">Gambar</label>
                <input type="file" name="file" class="form-control" accept=".pdf">
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ asset('/extensions/choices.js/public/assets/styles/choices.css') }}">
@endpush

@push('scripts')
  <script src="{{ asset('/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
  <script src="{{ asset('/static/js/pages/form-element-select.js') }}"></script>
  @if (session('error'))
    <script>
      Swal.fire({
        title: "Error!",
        text: "{{ session('error') }}",
        icon: "error",
        timer: 2000
      });
    </script>
  @endif
@endpush
