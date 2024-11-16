@extends('layouts.dashboard')

@section('title', 'Manajemen Foto')
@section('subtitle', 'Halaman untuk mengelola dan mengatur daftar Foto dalam sistem.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Foto</h4>
                    <a href="{{ route('photos.create') }}" class="btn btn-primary">
                        Tambah Data <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
            </div>
            @include('dashboard.photos._delete')
            @include('dashboard.photos._verify')

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
                            @foreach ($photos as $key => $photo)
                                <tr>
                                    <td class="text-bold-500">{{ $key + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-start">
                                            <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->title }}"
                                                class="img-thumbnail me-3" loading="lazy"
                                                style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">

                                            <div>
                                                <strong>{{ $photo->title }}</strong><br>
                                                <div>
                                                    @if ($photo->status == 'pending')
                                                        <span class="badge bg-secondary">Menunggu</span>
                                                    @elseif ($photo->status == 'approved')
                                                        <span class="badge bg-success">Disetujui</span>
                                                    @elseif ($photo->status == 'rejected')
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @endif
                                                </div>
                                                <span class="text-muted small">
                                                    Dibuat oleh: {{ $photo->user->name }} pada
                                                    {{ $photo->created_at->translatedFormat('d F Y') }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if (auth()->user()->role == 'superadmin')
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#verify" onclick="openVerifyModal({{ $photo }})"><i
                                                    class="bi bi-file-check"></i></button>
                                        @endif
                                        <a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-warning"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete" onclick="openDeleteModal({{ $photo }})"><i
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
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table1').DataTable();
        });
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
