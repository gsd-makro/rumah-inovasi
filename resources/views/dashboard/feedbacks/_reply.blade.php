<div class="modal fade text-left" id="reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content border-0 shadow-sm rounded-3">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="myModalLabel1">Balas Feedback</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="">
                    @csrf
                    @method('PUT')

                    <!-- Feedback Sender Information Section -->
                    <div class="mb-3 border p-3 rounded">
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold text-muted">Nama Pengirim:</span>
                            <span id="name"></span>
                        </div>
                    </div>
                    <div class="mb-3 border p-3 rounded">
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold text-muted">Email:</span>
                            <span id="email"></span>
                        </div>
                    </div>

                    <!-- Job Type Section -->
                    <div class="mb-3 border p-3 rounded">
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold text-muted">Jenis Pekerjaan:</span>
                            <span id="jobType"></span>
                        </div>
                    </div>

                    <!-- Feedback Content Section -->
                    <div class="mb-3 border p-3 rounded">
                        <span class="fw-bold text-muted">Isi Feedback:</span>
                        <p class="mb-0" id="content"></p>
                    </div>

                    <div class="mb-3 border p-3 rounded">
                        <span class="fw-bold text-muted">Tag:</span>
                        <p class="mb-0" id="tag"></p>
                    </div>

                    <!-- Rating in Stars Section -->
                    <div class="mb-3 border p-3 rounded">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-muted">Rating:</span>
                            <div class="text-warning" id="rating">
                                <!-- Stars will be dynamically inserted here -->
                            </div>
                        </div>
                    </div>

                    <!-- Reply Display Section (for existing replies) -->
                    <div id="existingReply" class="mb-3 p-3 rounded text-end bg-light d-none">
                        <span class="fw-bold">Balasan Anda:</span>
                        <p class="mb-0" id="replyContent"></p>
                    </div>

                    <!-- Reply Textarea -->
                    <div class="mb-3 border p-3 rounded">
                        <label id="replyLabel" for="reply" class="fw-bold text-muted mb-3">Balas Feedback:</label>
                        <textarea id="reply" name="reply" class="form-control border-0" rows="4" placeholder="Tulis balasan Anda..."
                            style="resize: none;"></textarea>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send me-1"></i> Kirim Balasan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function openReplyModal(value) {
            console.log(value);
            document.getElementById('name').textContent = value.name;
            document.getElementById('email').textContent = value.email;
            document.getElementById('jobType').textContent = value.job_type;
            document.getElementById('content').textContent = value.feedback;
            document.getElementById('tag').textContent = value.tag;

            const ratingContainer = document.getElementById('rating');
            ratingContainer.innerHTML = ''; // Clear any existing stars
            const rating = Math.round(value.rating); // Round rating if needed

            // Add full stars
            for (let i = 0; i < rating; i++) {
                const star = document.createElement('i');
                star.className = 'bi bi-star-fill';
                ratingContainer.appendChild(star);
            }

            // Add empty stars for a 5-star system if rating is less than 5
            for (let i = rating; i < 5; i++) {
                const emptyStar = document.createElement('i');
                emptyStar.className = 'bi bi-star';
                ratingContainer.appendChild(emptyStar);
            }

            // Set form action URL
            document.querySelector('#reply form').action = `/dashboard/feedbacks/${value.id}/reply`;

            // Show existing reply if it exists
            const existingReplyContainer = document.getElementById('existingReply');
            const replyLabel = document.getElementById('replyLabel');
            if (value.admin_reply) {
                document.getElementById('replyContent').textContent = value.admin_reply;
                existingReplyContainer.classList.remove('d-none'); // Show existing reply
                replyLabel.textContent = 'Edit Pesan'; // Change label to "Edit Pesan"
                document.getElementById('reply').value = value.admin_reply; // Populate textarea with existing reply
            } else {
                existingReplyContainer.classList.add('d-none'); // Hide existing reply if none exists
                replyLabel.textContent = 'Balas Feedback'; // Set label to "Balas Feedback"
                document.getElementById('reply').value = ''; // Clear textarea if no reply
            }
        }
    </script>
@endpush
