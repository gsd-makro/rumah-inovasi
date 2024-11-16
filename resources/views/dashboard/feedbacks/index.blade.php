@extends('layouts.dashboard')

@section('title', 'Manajemen Feedback')
@section('subtitle', 'Halaman untuk mengelola dan mengatur feedback video dalam sistem.')

@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 card-title">Daftar Feedback</h4>
                    <!-- Form untuk Tandai Sudah Baca -->
                    <form action="{{ route('feedbacks.markRead') }}" method="POST" id="markReadForm">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary block" id="markReadButton" disabled>
                            Tandai Sudah Baca <i class="bi bi-check-circle"></i>
                        </button>
                    </form>
                    @include('dashboard.feedbacks._verify')
                    @include('dashboard.feedbacks._reply')
                    @include('dashboard.feedbacks._delete')
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th width="5%"></th>
                            <th width="5%">No</th>
                            <th width="50%">Pesan</th>
                            <th width="10%">Tag</th>
                            <th width="10%">Status</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $key => $feedback)
                            <tr>
                                <!-- Checkbox untuk memilih feedback -->
                                <td><input type="checkbox" class="feedback-checkbox" value="{{ $feedback->id }}"
                                        name="feedback_ids[]"></td>
                                <td class="text-bold-500">{{ $key + 1 }}</td>
                                <td class="text-bold-500">
                                    <div class="d-flex flex-column {{ !$feedback->is_read ? 'fw-bold' : '' }}">
                                        <p>Dari: {{ $feedback->name }}</p>
                                        <p>{{ Str::limit($feedback->feedback, 90, '...') }}</p>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-primary">{{ $feedback->tag }}</span>
                                </td>
                                <td class="text-bold-500">
                                    @if ($feedback->is_approved)
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#verify" onclick="openVerifyModal({{ $feedback }})"><i
                                            class="bi bi-file-check"></i></button>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal"
                                        data-bs-target="#reply" onclick="openReplyModal({{ $feedback }})">
                                        <i class="bi bi-send"></i>
                                    </button>
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#delete" onclick="openDeleteModal({{ $feedback }})"><i
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
        // Script untuk menangani pemilihan checkbox dan pengaktifan tombol "Tandai Sudah Baca"
        document.querySelectorAll('.feedback-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectedCheckboxes = document.querySelectorAll('.feedback-checkbox:checked');
                const markReadButton = document.getElementById('markReadButton');

                // Aktifkan tombol jika ada feedback yang dipilih
                if (selectedCheckboxes.length > 0) {
                    markReadButton.disabled = false;
                } else {
                    markReadButton.disabled = true;
                }
            });
        });

        // Menyusun dan mengirimkan form saat tombol "Tandai Sudah Baca" diklik
        document.getElementById('markReadForm').addEventListener('submit', function(e) {
            const selectedFeedbackIds = Array.from(document.querySelectorAll('.feedback-checkbox:checked')).map(
                checkbox => checkbox.value);

            if (selectedFeedbackIds.length > 0) {
                // Menambahkan ID feedback yang dipilih ke dalam form yang akan dikirim
                selectedFeedbackIds.forEach(id => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'feedback_ids[]';
                    input.value = id;
                    this.appendChild(input);
                });
            } else {
                e.preventDefault(); // Cegah pengiriman form jika tidak ada feedback yang dipilih
            }
        });
    </script>
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
