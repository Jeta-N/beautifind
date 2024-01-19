<div class="modal fade" id="addPromotionModal" tabindex="-1" aria-labelledby="addPromotionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="addPromotionModalHeader">Add Promotion</h2>
                    <form method="POST" id="addPromotionForm" action="/add-promotion" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="promotionTitle" class="form-label">Promotion Title</label>
                            <input type="Text"
                                class="form-control form-login py-2 @error('title') is-invalid  @enderror"
                                id="promotionTitle" placeholder="Portfolio Title" name="title"
                                value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="promotionDescription" class="form-label">Promotion Description</label>
                            <input type="Text"
                                class="form-control form-login py-2 @error('desc') is-invalid  @enderror"
                                id="promotionDescription" placeholder="Portfolio Description" name="desc"
                                value="{{ old('desc') }}" required>
                            @error('desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="promotionImage" class="form-label">Promotion Image</label>
                            <input class="form-control" type="file" id="promotionImage" name="image">
                            @error('image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="form-control btn-sign-in py-2">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
