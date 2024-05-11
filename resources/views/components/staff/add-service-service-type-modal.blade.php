<div class="modal fade" id="addServiceServiceTypeModal" tabindex="-1" aria-labelledby="addServiceServiceTypeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="addServiceServiceTypeModalHeader">Add Service Type</h2>
                    <form method="POST" id="addServiceServiceTypeForm" action="/create-service-service-type">
                        @csrf
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
                            <label for="service_type" class="form-label">Duration</label>
                            <input type="number" name="duration" id="duration"
                                class="form-control form-login @error('duration') is-invalid  @enderror"
                                placeholder="Input the Duration in minutes" min="1" required>
                            @error('duration')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="form-control btn-sign-in py-2">Add Service Type</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
