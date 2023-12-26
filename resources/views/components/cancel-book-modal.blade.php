<div class="modal fade" id="cancelBookModal" tabindex="-1" aria-labelledby="cancelBookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="cancelBookModalHeader" class="mb-4">Are You Sure You Want to Cancel the Book?</h2>
                    <p>Your booking will be cancelled</p>
                    <p>Please be aware that any cancellations must be made at least one day before your scheduled
                        appointment to allow us adjust our schedule.</p>
                    <form method="POST" class="row justify-content-around" id="cancelForm">
                        @csrf
                        <button class="col-5 confirmation-book-btn-book" type="submit">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
