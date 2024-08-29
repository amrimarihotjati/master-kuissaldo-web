<div class="modal" class="modal fade" id="createLandingPage" tabindex="-1" aria-labelledby="createLandingPageLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content rounded rounded-4">
            <form autocomplete="off" id="createLandingPageForm">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="labelModalLanding">New Landing Page</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-4 px-4">
                    <div class="mb-3">
                        <label for="name_landing_page" class="form-label">
                            <span class="text-primary fw-semibold">Nama Website</span>
                        </label>
                        <input name="name_landing_page" type="text" class="form-control input-lg fw-bold"
                            id="name_landing_page" required>
                    </div>

                    <div class="mb-3">
                        <label for="domain_landing_page" class="form-label">
                            <span class="text-primary fw-semibold">Domain Website</span>
                        </label>
                        <input name="domain_landing_page" type="url" class="form-control input-lg fw-bold" value="https://" id="domain_landing_page" required>
                    </div>

                </div>
                <div class="modal-footer shadow-none">
                    <button type="submit" id="create" class="btn btn-primary fw-bold">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="module">
    $('#createLandingPageForm').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "{{ route('createNewLandingPage') }}",
            type: "POST",
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: "success",
                    title: "BERHASIL!",
                    text: response.message
                });
                $('#createLandingPage').modal('hide');
                var dataTable = $('#dtLandingPage').DataTable();
                dataTable.ajax.reload();
            },
            error: function(xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: xhr.responseText
                });
                $('#createLandingPage').modal('hide');
            }
        });
    });
</script>
