@extends('layouts.dashboard')

@section('title', 'Infografik')
@section('subtitle', 'Infografik.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Kelola Infografik</h4>
                    <a href="{{ route('infographics.create') }}" class="btn btn-primary">
                        Tambah Data
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
                                            <span class="text-muted small">
                                                Dibuat oleh: John Doe di 10 Oktober 2024
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('infographics.edit', $infographic->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    </button>
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete"
                                        onclick="openDeleteModal({{ $infographic }})">Hapus</button>
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

@push('scripts')
    <script>
        new DataTable('#table1');
    </script>
@endpush
