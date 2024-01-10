<div class="modal fade" id="addPortfolioModal" tabindex="-1" aria-labelledby="addPortfolioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="addPortfolioModalHeader">Nice to see you again :)</h2>
                    <form method="POST" id="addPortfolioForm" action="/add-portfolio" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="portofolioTitle" class="form-label">Portfolio Title</label>
                            <input type="Text"
                                class="form-control form-login py-2 @error('title') is-invalid  @enderror"
                                id="portofolioTitle" placeholder="Portfolio Title" name="title"
                                value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="portfolioImage" class="form-label">Portfolio Image</label>
                            <input class="form-control" type="file" id="portfolioImage" name="image">
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
