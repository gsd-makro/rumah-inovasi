@extends('layouts.dashboard')

@section('title', 'Indikator')
@section('subtitle', 'Indikator.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Kelola Indikator</h4>
                    <!-- Button trigger for basic modal -->
                    <button type="button" class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah Data
                    </button>
                    @include('dashboard.indicators._add')
                    @include('dashboard.indicators._edit')
                    @include('dashboard.indicators._delete')
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th width="auto">No</th>
                            <th width="50%">Nama</th>
                            <th>Subjek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indicators as $key => $indicator)
                            <tr>
                                <td class="text-bold-500">{{ $key + 1 }}</td>
                                <td class="text-bold-500">{{ $indicator->name }}</td>
                                <td class="text-bold-500">{{ $indicator->subject->name }}</td>
                                <td>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                        data-bs-target="#update" onclick="openEditModal({{ $indicator }})">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete"
                                        onclick="openDeleteModal({{ $indicator }})">Hapus</button>
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
