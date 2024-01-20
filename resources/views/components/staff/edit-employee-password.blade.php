<div class="modal fade" id="editEmployeePasswordModal{{ $employee->emp_id }}" tabindex="-1"
    aria-labelledby="editEmployeePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="editEmployeePasswordModalHeader">Edit Employee Password</h2>
                    <form method="POST" id="editEmployeePasswordForm{{ $employee->emp_id }}"
                        action="/edit-employee-password">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $employee->emp_id }}">
                        <div class="mb-3">
                            <label for="passwordNew{{ $employee->emp_id }}" class="form-label">New Password</label>
                            <input type="password"
                                class="form-control form-login py-2 @error('new_password') is-invalid  @enderror"
                                id="passwordNew{{ $employee->emp_id }}" placeholder="Min. 8 characters"
                                name="new_password" required>
                            @error('new_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="passwordReNew{{ $employee->emp_id }}" class="form-label">Confirm New
                                Password</label>
                            <input type="password"
                                class="form-control form-login py-2 @error('confirm_password') is-invalid  @enderror"
                                id="passwordReNew{{ $employee->emp_id }}" placeholder="Min. 8 characters"
                                name="confirm_password" required>
                            @error('confirm_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="form-control btn-sign-in py-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
