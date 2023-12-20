<div id="myOrderActive" class="tab-content p-4" style="display: none;">
    <div class="d-flex flex-row align-items-center">
        <span class="fs-5 me-2"><strong>Status</strong></span>
        <button id="allOrderBtn" class="btn rounded mx-2 status-btn active">All Order</button>
        <button id="progressBtn" class="btn rounded mx-2 status-btn">On Progress</button>
        <button id="successBtn" class="btn rounded mx-2 status-btn">Success</button>
        <button id="canceledBtn" class="btn rounded mx-2 status-btn">Canceled</button>
    </div>

    <div class="card-body position-relative d-flex flex-column border rounded p-4 mt-3">
        <div class="d-flex flex-row">
            <div class="logo-container-my-order me-3">
                <img src="{{ asset('storage/asset/images/dummy-salon-logo-my-order.png') }}" alt=""
                    class="rounded-circle logo-my-order">
            </div>
            <div class="d-flex flex-column justify-content-center me-3">
                <h5 class="card-title"> <strong>Beauty Salon</strong> </h5>
                <div class="card-text">
                    <p class="mb-0 text-secondary">Central Jakarta</p>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <span class="px-2 rounded-pill my-order-status-pill success">Success</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col border-end">
                <div class="card-text">
                    <p class="mb-1">Male Haircut By Nic</p>
                    <p class="mb-0">05 December 2023</p>
                    <p class="mb-0">03.00 PM - 04.00 PM</p>
                </div>
            </div>
            <div class="col d-flex align-items-center">
                <div class="card-text">
                    <p class="mb-1">Total Harga</p>
                    <span><strong>Rp. 190,000</strong></span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end align-items-center">
            <a href="" class="review-href me-3">Write a Review</a>
            <button class="profile-save-btn">Book Again</button>
        </div>
    </div>
    <div class="card-body position-relative d-flex flex-column border rounded p-4 mt-3">
        <div class="d-flex flex-row">
            <div class="logo-container-my-order me-3">
                <img src="{{ asset('storage/asset/images/dummy-salon-logo-my-order.png') }}" alt=""
                    class="rounded-circle logo-my-order">
            </div>
            <div class="d-flex flex-column justify-content-center me-3">
                <h5 class="card-title"> <strong>Beauty Salon</strong> </h5>
                <div class="card-text">
                    <p class="mb-0 text-secondary">Central Jakarta</p>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <span class="px-2 rounded-pill my-order-status-pill on-progress">On Progress</span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col border-end">
                <div class="card-text">
                    <p class="mb-1">Male Haircut By Nic</p>
                    <p class="mb-0">05 December 2023</p>
                    <p class="mb-0">03.00 PM - 04.00 PM</p>
                </div>
            </div>
            <div class="col d-flex align-items-center">
                <div class="card-text">
                    <p class="mb-1">Total Harga</p>
                    <span><strong>Rp. 190,000</strong></span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end align-items-center">
            <a href="" class="review-href me-3">Write a Review</a>
            <button class="profile-save-btn">Book Again</button>
        </div>
    </div>
</div>
