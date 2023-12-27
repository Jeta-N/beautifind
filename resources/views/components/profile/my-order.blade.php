<div id="myOrderActive" class="tab-content p-4" style="display: none;">
    <div class="d-flex flex-row align-items-center">
        <span class="fs-5 me-2"><strong>Status</strong></span>
        <button id="allOrderBtn" class="btn rounded mx-2 status-btn active">All Order</button>
        <button id="progressBtn" class="btn rounded mx-2 status-btn">On
            Progress</button>
        <button id="successBtn" class="btn rounded mx-2 status-btn">Success</button>
        <button id="canceledBtn" class="btn rounded mx-2 status-btn">Canceled</button>
    </div>
    @if (session('successCancel'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('successCancel') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div id="orderContent">

    </div>
    @include('components.cancel-book-modal')
</div>
