@extends('layouts.dashboard')

@section('title', 'Manajemen Artikel')
@section('subtitle', 'Halaman untuk mengelola dan mengatur daftar artikel dalam sistem.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Artikel</h4>
                    <!-- Button trigger for basic modal -->
                    <a href="{{ route('articles.create') }}">
                        <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#tambah">
                            Tambah Data <i class="bi bi-plus-circle"></i>
                        </button>
                    </a>
                    {{-- @include('dashboard.documents._add') --}}
                    {{-- @include('dashboard.documents._edit') --}}
                    @include('dashboard.articles._delete')
                    @include('dashboard.articles._verify')
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
                        @foreach ($articles as $key => $article)
                            <tr>
                                <td class="text-bold-500">{{ $key + 1 }}</td>
                                <td class="text-bold-500">
                                    <div class="d-flex align-items-center gap-3">
                                        <div>
                                            <strong>{{ $article->title }}
                                            </strong><br>
                                            @if ($article->status == 'pending')
                                                <span class="badge bg-secondary">Menunggu</span>
                                            @elseif ($article->status == 'approved')
                                                <span class="badge bg-success">Disetujui</span>
                                            @elseif ($article->status == 'rejected')
                                                <span class="badge bg-danger">Ditolak</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <span class="text-muted small">
                                            Dibuat oleh: {{ $article->user->name }} pada
                                            {{ $article->created_at->translatedFormat('d F Y') }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-bold-500">{{ $article->subject->name }}</td>
                                {{-- <td class="text-bold-500">{!! $article->content !!} --}}
                                </td>
                                <td>
                                    @if (auth()->user()->role == 'superadmin')
                                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#verify" onclick="openVerifyModal({{ $article }})"><i
                                                class="bi bi-file-check"></i></button>
                                    @endif
                                    <a href="{{ route('articles.edit', $article->id) }}">
                                        <button class="btn btn-warning" type="button">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    </a>
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete" onclick="openDeleteModal({{ $article }})"><i
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
