@extends('layouts.dashboard')

@section('title', 'Subjek')
@section('subtitle', 'Subjek.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Kelola Subjek</h4>
                    <!-- Button trigger for basic modal -->
                    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Data
                    </button>
                    @include('dashboard.subjects._add')
                    @include('dashboard.subjects._edit')
                    @include('dashboard.subjects._delete')
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th width="auto">No</th>
                            <th width="50%">Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $key => $subject)
                            <tr>
                                <td class="text-bold-500">{{ $key + 1 }}</td>
                                <td class="text-bold-500">{{ $subject->name }}</td>
                                <td>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                        data-bs-target="#update" onclick="openEditModal({{ $subject }})">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete"
                                        onclick="openDeleteModal({{ $subject }})">Hapus</button>
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
