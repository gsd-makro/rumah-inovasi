@extends('layouts.dashboard')

@section('title', 'Manajemen Dokumen')
@section('subtitle', 'Halaman untuk mengelola dan mengatur daftar dokumen dalam sistem.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Dokumen</h4>
                    <!-- Button trigger for basic modal -->
                    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Data <i class="bi bi-plus-circle"></i>
                    </button>
                    @include('dashboard.documents._add')
                    @include('dashboard.documents._edit')
                    @include('dashboard.documents._delete')
                    @include('dashboard.documents._verify')
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="40%">Judul</th>
                            <th width="20%">Menu</th>
                            <th width="40%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $key => $document)
                            <tr>
                                <td class="text-bold-500">{{ $key + 1 }}</td>
                                <td class="text-bold-500">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="">
                                            <img src="{{ asset('img/logo-pdf.png') }}" class="img-thumbnail" alt="pdf"
                                                loading="lazy" style="width: 50px; height: auto;">
                                        </div>
                                        <div>
                                            <strong>{{ $document->title }}</strong><br>
                                            @if ($document->status == 'pending')
                                                <span class="badge bg-secondary">Menunggu</span>
                                            @elseif ($document->status == 'approved')
                                                <span class="badge bg-success">Disetujui</span>
                                            @elseif ($document->status == 'rejected')
                                                <span class="badge bg-danger">Ditolak</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-muted small">
                                            Dibuat oleh: {{ $document->user->name }} pada
                                            {{ $document->created_at->translatedFormat('d F Y') }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-bold-500">{{ $document->menu->name }}</td>
                                <td>
                                    <a target="#blank" href="{{ url('storage/' . $document->file_path) }}"
                                        class="btn btn-primary">
                                        <i class="bi bi-download"></i>
                                    </a>
                                    @if (auth()->user()->role == 'superadmin')
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#verify" onclick="openVerifyModal({{ $document }})"><i
                                                class="bi bi-file-check"></i></button>
                                    @endif
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                        data-bs-target="#update" onclick="openEditModal({{ $document }})">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete" onclick="openDeleteModal({{ $document }})"><i
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

@push('scripts')
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
