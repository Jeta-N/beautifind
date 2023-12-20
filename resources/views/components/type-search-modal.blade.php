<div class="modal fade" id="typeSearchModal" tabindex="-1" aria-labelledby="typeSearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="typeSearchModalHeader" class="py-3">Type</h2>
                    <form action="" id="typeFilter">
                        <div class="row row-cols-3 mx-0">
                            @foreach ($serviceTypes as $serviceType)
                            <div class="form-check col mb-3">
                                <input class="form-check-input" type="checkbox" name="type[]" id="typeCheckBox{{ $loop->iteration }}" value="{{ $loop->iteration }}">
                                <label class="form-check-label" for="typeCheckBox{{ $loop->iteration }}">
                                    {{ $serviceType->st_name }}
                                </label>
                            </div>
                            @endforeach
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
