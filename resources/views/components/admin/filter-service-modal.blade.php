<div class="modal fade" id="filterServiceModal" tabindex="-1" aria-labelledby="filterServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="filterServiceModalHeader" class="py-3">Filter Service</h2>
                    <form action="" id="filterServiceForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Service Name</label>
                            <select class="form-select form-login" aria-label="service" name="service" id="serviceList">
                                <option value="">Pick a Service Name</option>
                                @foreach ($servicesName as $serviceName)
                                    <option value="{{ $loop->iteration }}">
                                        {{ $serviceName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">Status</label>
                            <div class="row mx-0">
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="radio" name="status" id="statusRadio1"
                                        value="1">
                                    <label class="form-check-label" for="statusRadio1">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="radio" name="status" id="statusRadio0"
                                        value="0">
                                    <label class="form-check-label" for="statusRadio0">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-end mt-2">
                            <button class="profile-save-btn filter-btn bg-white text-dark border border-dark"
                                type="button" onclick="clearFilter('sort-by')">Clear</button>
                            <button class="profile-save-btn filter-btn" type="submit">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
