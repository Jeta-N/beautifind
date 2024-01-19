<div class="modal fade" id="addFaqModal" tabindex="-1" aria-labelledby="addFaqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="addFaqModalHeader">Create FAQ</h2>
                    <form method="POST" id="addFaqForm" action="/add-faq">
                        @csrf
                        <div class="mb-3">
                            <label for="faqQuestion" class="form-label">Question</label>
                            <input type="Text"
                                class="form-control form-login py-2 @error('question') is-invalid  @enderror"
                                id="faqQuestion" placeholder="Question" name="question" value="{{ old('question') }}"
                                required>
                            @error('question')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="faqAnswer" class="form-label">Answer</label>
                            <textarea class="form-control form-login py-2 @error('answer') is-invalid  @enderror" id="faqAnswer" name="answer"
                                placeholder="Answer" required>{{ old('answer') }}</textarea>
                            @error('answer')
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
