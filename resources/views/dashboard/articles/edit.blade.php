@extends('layouts.dashboard')

@section('title', 'Manajemen Aritkel')
@section('subtitle', 'Halaman untuk mengelola dan mengatur daftar artikel dalam sistem.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Artikel</h4>
                    <!-- Button trigger for basic modal -->
                    <a href="{{ route('articles.index') }}">
                        <button type="button" class="btn btn-secondary block">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </button>
                    </a>                    
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="basicInput">Judul</label>
                        <input type="text" name="title" value="{{ old('title', $article->title ?? '') }}" class="form-control" id="basicInput"
                            placeholder="Masukkan Judul Dokumen">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Gambar Thumbnail</label>
                        <div>
                            <img src="{{ asset('storage/' . $article->image) }}"
                                                        alt="{{ $article->title }}"
                                                        class="img-thumbnail me-3 image-thumbnail" loading="lazy"
                                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;"
                                                        onclick="openImageModal('{{ asset('storage/' . $article->image) }}')">
                        </div>
                        <input type="file" name="image" class="form-control" id="image"
                            placeholder="Masukkan Gambar Thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Subjek</label>
                        <select name="subject_id" id="subject_id" class="form-control">
                            <option value="#" selected disabled>Pilih Subjek</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" {{ $subject->id == $article->subject_id ? 'selected' : '' }}>{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Konten</label>                        
                        <x-quill-editor name="content" value="{!! $article->content !!}" />

                    </div>
                    <div class="divider"></div>
                    <div class="d-flex justify-content-end">
                        {{-- <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Tutup</span>
                        </button> --}}
                        <button type="submit" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection


@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js" defer></script>
<script src="https://unpkg.com/quill-paste-smart@latest/dist/quill-paste-smart.js" defer></script>
    <script>
        new DataTable('#table1');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.7/pdfobject.min.js"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 2000
            });
        </script>
    @endif

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
