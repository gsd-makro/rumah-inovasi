@extends('layouts.dashboard')

@section('title', 'Manajemen Infografik')
@section('subtitle', 'Halaman untuk mengelola dan mengatur daftar infografik dalam sistem.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Infografik</h4>
                    <a href="{{ route('infographics.create') }}" class="btn btn-primary">
                        Tambah Data <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
            </div>
            @include('dashboard.infographics._delete')
            @include('dashboard.infographics._verify')

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th width="70%">Judul</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($infographics as $key => $infographic)
                                <tr>
                                    <td class="text-bold-500">{{ $key + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-start">
                                            <div class="image-thumbnail-container">
                                                <img src="{{ asset('storage/' . $infographic->image) }}"
                                                    alt="{{ $infographic->title }}"
                                                    class="img-thumbnail me-3 image-thumbnail" loading="lazy"
                                                    style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;"
                                                    onclick="openImageModal('{{ asset('storage/' . $infographic->image) }}')">
                                            </div>
                                            <div>
                                                <strong>{{ $infographic->title }}</strong><br>
                                                <div>
                                                    @if ($infographic->status == 'pending')
                                                        <span class="badge bg-secondary">Menunggu</span>
                                                    @elseif ($infographic->status == 'approved')
                                                        <span class="badge bg-success">Disetujui</span>
                                                    @elseif ($infographic->status == 'rejected')
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @endif
                                                </div>
                                                <span class="text-muted small">
                                                    Dibuat oleh: {{ $infographic->user->name }} pada
                                                    {{ $infographic->created_at->translatedFormat('d F Y') }}
                                                </span>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        @if (auth()->user()->role == 'superadmin')
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#verify" onclick="openVerifyModal({{ $infographic }})"><i
                                                    class="bi bi-file-check"></i></button>
                                        @endif
                                        <a href="{{ route('infographics.edit', $infographic->id) }}"
                                            class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete" onclick="openDeleteModal({{ $infographic }})"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img id="fullImage" src="" alt="Full Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .image-thumbnail-container {
            position: relative;
        }

        .image-thumbnail {
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 5px;
        }

        .image-thumbnail:hover {
            opacity: 0.7;
            transform: scale(1.05);
            filter: brightness(0.7);
        }

        .image-thumbnail-container::after {
            content: '🔍';
            /* Menambahkan icon mata untuk memberi tahu pengguna */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: white;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .image-thumbnail-container:hover::after {
            opacity: 1;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });

        function openImageModal(imageUrl) {
            $('#fullImage').attr('src', imageUrl);
            $('#imageModal').modal('show');
        }
    </script>

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
