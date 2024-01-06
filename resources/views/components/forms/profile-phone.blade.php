<!-- Phone Update Modal -->
<div class="modal fade" id="phoneUpdateModal" tabindex="-1" aria-labelledby="phoneUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="phoneUpdateModalLabel">Update Phone Number</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('password.update') }} " method="post">
                    <div class="mb-3">
                        <label for="phone" class="form-label">New Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="verificationCode" class="form-label">Verification Code</label>
                        <div class="d-flex justify-content-between">
                            <input type="text" class="form-control" id="verificationCode1" name="verificationCode1"
                                maxlength="1" required>
                            <input type="text" class="form-control" id="verificationCode2" name="verificationCode2"
                                maxlength="1" required>
                            <input type="text" class="form-control" id="verificationCode3" name="verificationCode3"
                                maxlength="1" required>
                            <input type="text" class="form-control" id="verificationCode4" name="verificationCode4"
                                maxlength="1" required>
                            <input type="text" class="form-control" id="verificationCode5" name="verificationCode5"
                                maxlength="1" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Verify and Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
