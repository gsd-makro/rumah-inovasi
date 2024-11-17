@extends('layouts.dashboard')

@section('title', 'Manajemen Policy Brief')
@section('subtitle', 'Halaman untuk mengelola dan mengatur daftar policy brief dalam sistem.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Policy Brief</h4>
                    <a href="{{ route('policy_briefs.create') }}" class="btn btn-primary">
                        Tambah Data <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
            </div>
            @include('dashboard.policy_briefs._delete')
            @include('dashboard.policy_briefs._verify')

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
                            @foreach ($policy_briefs as $key => $policy_brief)
                                <tr>
                                    <td class="text-bold-500">{{ $key + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-start">
                                            <div>
                                                <strong>{{ $policy_brief->title }}</strong><br>
                                                <div>
                                                    @if ($policy_brief->status == 'pending')
                                                        <span class="badge bg-secondary">Menunggu</span>
                                                    @elseif ($policy_brief->status == 'approved')
                                                        <span class="badge bg-success">Disetujui</span>
                                                    @elseif ($policy_brief->status == 'rejected')
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @endif
                                                </div>
                                                <span class="text-muted small">
                                                    Dibuat oleh: {{ $policy_brief->user->name }} pada
                                                    {{ $policy_brief->created_at->translatedFormat('d F Y') }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if (auth()->user()->role == 'superadmin')
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#verify" onclick="openVerifyModal({{ $policy_brief }})"><i
                                                    class="bi bi-file-check"></i></button>
                                        @endif
                                        <a href="{{ route('policy_briefs.edit', $policy_brief->id) }}"
                                            class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                            data-bs-target="#delete" onclick="openDeleteModal({{ $policy_brief }})"><i
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
