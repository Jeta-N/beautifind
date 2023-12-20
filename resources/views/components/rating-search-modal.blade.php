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
                                <input class="form-check-input" type="checkbox" name="rating[]" id="ratingCheckBox1" value="1">
                                <label class="form-check-label" for="ratingCheckBox1">
                                    4+ Superb
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="checkbox" name="rating[]" id="ratingCheckBox2" value="2">
                                <label class="form-check-label" for="ratingCheckBox2">
                                    3+ Very Good
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="checkbox" name="rating[]" id="ratingCheckBox3" value="3">
                                <label class="form-check-label" for="ratingCheckBox3">
                                    2+ Good
                                </label>
                            </div>
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="checkbox" name="rating[]" id="ratingCheckBox4" value="4">
                                <label class="form-check-label" for="ratingCheckBox4">
                                    1+ Pleasant
                                </label>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="profile-save-btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
