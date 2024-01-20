<div class="modal fade" id="filterBookingModal" tabindex="-1" aria-labelledby="filterBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="filterBookingModalHeader" class="py-3">Filter Booking Slot</h2>
                    <form action="" id="filterBookingForm">
                        @csrf
                        <div class="row row-cols-2 mx-0">
                            <div class="col-md-6">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="startDate" name="startDate">
                            </div>
                            <div class="col-md-6">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="endDate" name="endDate">
                            </div>
                            <div class="col-12 mt-2">
                                <label for="endDate" class="form-label">Status</label>
                                <div class="row mx-0">
                                    <div class="form-check col mb-3">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="statusRadioAvailable" value="Available">
                                        <label class="form-check-label" for="statusRadioAvailable">
                                            Available
                                        </label>
                                    </div>
                                    <div class="form-check col mb-3">
                                        <input class="form-check-input" type="radio" name="status"
                                            id="statusRadioBooked" value="Booked">
                                        <label class="form-check-label" for="statusRadioBooked">
                                            Booked
                                        </label>
                                    </div>
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
