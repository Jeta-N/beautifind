<div class="modal fade" id="editRoleModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="editRoleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="editRoleModalHeader" class="py-3">Edit Role</h2>
                    <form action="/edit-role/{{ $employee->emp_id }}" id="editRoleForm{{ $loop->iteration }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row row-cols-2 mx-0">
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="role"
                                    id="roleRadio{{ $loop->iteration }}1" value="Manager"
                                    {{ $employee->account->account_role == 'Manager' ? 'checked' : '' }}>
                                <label class="form-check-label" for="roleRadio{{ $loop->iteration }}1">
                                    Manager
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="role"
                                    id="roleRadio{{ $loop->iteration }}2" value="Staff"
                                    {{ $employee->account->account_role == 'Manager' ? '' : 'checked' }}>
                                <label class="form-check-label" for="roleRadio{{ $loop->iteration }}2">
                                    Staff
                                </label>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="profile-save-btn filter-btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
