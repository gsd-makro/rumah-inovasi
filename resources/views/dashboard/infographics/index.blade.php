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
            <div class="card-body">
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
                                        <img src="{{ asset('storage/' . $infographic->image) }}"
                                            alt="{{ $infographic->title }}" class="img-thumbnail me-3" loading="lazy"
                                            style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">

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
                                    <a href="{{ route('infographics.edit', $infographic->id) }}" class="btn btn-warning"><i
                                            class="bi bi-pencil-square"></i></a>
                                    </button>
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
    </section>
@endsection

@include('dashboard.infographics._delete')
@include('dashboard.infographics._verify')

@push('scripts')
    <script>
        new DataTable('#table1');
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
