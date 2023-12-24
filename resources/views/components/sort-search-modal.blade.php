<div class="modal fade" id="sortSearchModal" tabindex="-1" aria-labelledby="sortSearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="sortSearchModalHeader" class="py-3">Sort</h2>
                    <form action="" id="sortService">
                        <div class="row row-cols-2 mx-0">
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="sort-by" id="sortRadio1"
                                    value="1">
                                <label class="form-check-label" for="sortRadio1">
                                    Name Ascending
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="sort-by" id="sortRadio2"
                                    value="2">
                                <label class="form-check-label" for="sortRadio2">
                                    Name Descending
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="sort-by" id="sortRadio3"
                                    value="3">
                                <label class="form-check-label" for="sortRadio3">
                                    Price Ascending
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="sort-by" id="sortRadio4"
                                    value="4">
                                <label class="form-check-label" for="sortRadio4">
                                    Price Descending
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="sort-by" id="sortRadio5"
                                    value="5">
                                <label class="form-check-label" for="sortRadio5">
                                    Rating Ascending
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="sort-by" id="sortRadio6"
                                    value="6">
                                <label class="form-check-label" for="sortRadio6">
                                    Rating Descending
                                </label>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="profile-save-btn filter-btn bg-white text-dark border border-dark"
                                type="button" onclick="clearFilter('sort-by')">Clear</button>
                            <button class="profile-save-btn filter-btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
