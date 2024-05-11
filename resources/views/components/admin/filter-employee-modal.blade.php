<div class="modal fade" id="filterEmployeeModal" tabindex="-1" aria-labelledby="filterEmployeeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="filterEmployeeModalHeader" class="py-3">{{ $title }}</h2>
                    <form action="" id="filterEmployeeForm">
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
