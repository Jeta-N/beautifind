<div class="modal fade" id="citySearchModal" tabindex="-1" aria-labelledby="citySearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="citySearchModalHeader" class="py-3">City</h2>
                    <form action="" id="cityFilter">
                        <div class="row row-cols-3 mx-0">
                            @foreach ($cities as $city)
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="checkbox" name="city[]"
                                        id="cityCheckBox{{ $loop->iteration }}" value="{{ $loop->iteration }}">
                                    <label class="form-check-label" for="cityCheckBox{{ $loop->iteration }}">
                                        {{ $city->city_name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-end">
                            <button class="profile-save-btn filter-btn bg-white text-dark border border-dark"
                                type="button" onclick="clearFilter('city')">Clear</button>
                            <button class="profile-save-btn filter-btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
