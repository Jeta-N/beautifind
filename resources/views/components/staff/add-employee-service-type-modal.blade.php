<div class="modal fade" id="addEmployeeServiceTypeModal" tabindex="-1" aria-labelledby="addEmployeeServiceTypeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="addEmployeeServiceTypeModalHeader">Add Employee Service Type</h2>
                    <form method="POST" id="addEmployeeServiceTypeForm" action="/create-employee-service-type">
                        @csrf
                        <div class="mb-3">
                            <label for="emp_name" class="form-label">Employee Name</label>
                            <select class="form-select form-login @error('emp_id') is-invalid  @enderror"
                                aria-label="emp_id" name="emp_id" required>
                                <option value="">Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->emp_id }}">
                                        {{ $employee->emp_name }}</option>
                                @endforeach
                            </select>
                            @error('emp_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="service_type" class="form-label">Service Type</label>
                            <select class="form-select form-login @error('st_id') is-invalid  @enderror"
                                aria-label="st_id" name="st_id" required>
                                <option value="">Select Service Type</option>
                                @foreach ($serviceTypes as $serviceType)
                                    <option value="{{ $loop->iteration }}">
                                        {{ $serviceType->st_name }}</option>
                                @endforeach
                            </select>
                            @error('st_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="service_type" class="form-label">Price</label>
                            <input type="number" name="price" id="price"
                                class="form-control form-login @error('price') is-invalid  @enderror"
                                placeholder="Input the Price. ex: 30000" min="10000" step="1000" required>
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="form-control btn-sign-in py-2">Add Employee Service Type</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
