<!-- Email Update Modal -->
<div class="modal fade" id="emailUpdateModal" tabindex="-1" aria-labelledby="emailUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailUpdateModalLabel">Update Email Address</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.update') }} " method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="newEmail" class="form-label">New Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Email</button>
                </form>
            </div>
        </div>
    </div>
</div>
