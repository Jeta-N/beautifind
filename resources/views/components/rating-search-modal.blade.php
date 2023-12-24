<div class="modal fade" id="ratingSearchModal" tabindex="-1" aria-labelledby="ratingSearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="ratingSearchModalHeader" class="py-3">Rating</h2>
                    <form action="" id="ratingFilter">
                        <div class="row row-cols-2 mx-0">
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="rating" id="ratingRadio1"
                                    value="4">
                                <label class="form-check-label" for="ratingRadio1">
                                    4+ Superb
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="rating" id="ratingRadio2"
                                    value="3">
                                <label class="form-check-label" for="ratingRadio2">
                                    3+ Very Good
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="rating" id="ratingRadio3"
                                    value="2">
                                <label class="form-check-label" for="ratingRadio3">
                                    2+ Good
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="radio" name="rating" id="ratingRadio4"
                                    value="1">
                                <label class="form-check-label" for="ratingRadio4">
                                    1+ Pleasant
                                </label>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="profile-save-btn" type="button"
                                onclick="clearFilter('rating')">Clear</button>
                            <button class="profile-save-btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
