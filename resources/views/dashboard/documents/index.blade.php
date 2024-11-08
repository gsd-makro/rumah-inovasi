@extends('layouts.dashboard')

@section('title', 'Dokumen')
@section('subtitle', 'Dokumen.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Kelola Dokumen</h4>
                    <!-- Button trigger for basic modal -->
                    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Data
                    </button>
                    @include('dashboard.documents._add')
                    @include('dashboard.documents._edit')
                    @include('dashboard.documents._delete')
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th width="auto">No</th>
                            <th width="30%">Judul</th>
                            <th width="20%">Menu</th>
                            <th width="20%">Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $key => $document)
                            <tr>
                                <td class="text-bold-500">{{ $key + 1 }}</td>
                                <td class="text-bold-500">{{ $document->title }}</td>
                                <td class="text-bold-500">{{ $document->menu->name }}</td>
                                <td class="text-bold-500">
                                    <a target="#blank" href="{{ url('storage/' . $document->file_path) }}" class="btn btn-primary">
                                     Download File
                                    </a>
                                   
                                </td>
                                <td>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                        data-bs-target="#update" onclick="openEditModal({{ $document }})">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete"
                                        onclick="openDeleteModal({{ $document }})">Hapus</button>
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
@endpush
