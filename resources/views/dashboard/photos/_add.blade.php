@extends('layouts.dashboard')
@section('title', 'Foto > Tambah Data')
@section('subtitle', 'Foto.')
@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Upload Foto</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Masukkan judul infografik" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" class="image-preview-filepond">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/extensions/choices.js/public/assets/styles/choices.css') }}">
    <link rel="stylesheet" href="{{ asset('/extensions/filepond/filepond.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('/static/js/pages/form-element-select.js') }}"></script>
    <script src="{{ asset('/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script src="{{ asset('/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}">
    </script>
    <script src="{{ asset('/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
    <script
        src="{{ asset('/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}"></script>
    <script src="{{ asset('/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}"></script>
    <script src="{{ asset('/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('/static/js/pages/filepond.js') }}"></script>
    <script src="{{ asset('/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/static/js/pages/filepond.js') }}"></script>
@endpush
