@extends('layouts.dashboard')
@section('title', 'Infografik > Edit Data')
@section('subtitle', 'Infografik.')
@section('main')
    <section class="section">
        <div class="card">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card-header">
                        <h4 class="card-title">Upload Infografik</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" value="{{ $photo->title }}" class="form-control" id="title"
                                    name="title" placeholder="Masukkan judul infografik" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <input type="file" name="image" class="image-preview-filepond">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->title }}" class="img-fluid">
                        <p class="mt-2">Gambar Saat Ini</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function openEditModal(value) {
            document.getElementById('title').value = value.title;

            document.querySelector('#update form').action = "{{ url('dashboard/photos') }}/" + value.id;
        }
    </script>
@endpush

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
