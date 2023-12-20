<div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="bookModalHeader" class="py-3">Let's Book Your Spot</h2>
                    <div>
                        @csrf
                        <div class="mb-3">
                            <label for="bookDate" class="form-label">Select Date</label>
                            <input type="date" class="form-control" id="bookDate" name="bookDate">
                        </div>
                        <hr>

                        <div class="mb-3">
                            <div class="form-label">Time</div>
                            <div class="padding-x-175rem position-relative">
                                <div class="swiper swiper-time position-static">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- Slides -->
                                        <div class="swiper-slide">
                                            <span class="py-1 px-3 btn btn-time-book active">11:15 AM</span>
                                        </div>
                                        <div class="swiper-slide">
                                            <span class="py-1 px-3 btn btn-time-book">11:45 AM</span>
                                        </div>
                                        <div class="swiper-slide">
                                            <span class="py-1 px-3 btn btn-time-book">12:15 AM</span>
                                        </div>
                                        <div class="swiper-slide">
                                            <span class="py-1 px-3 btn btn-time-book">12:45 AM</span>
                                        </div>
                                        <div class="swiper-slide">
                                            <span class="py-1 px-3 btn btn-time-book">13:45 AM</span>
                                        </div>
                                        <div class="swiper-slide">
                                            <span class="py-1 px-3 btn btn-time-book">13:45 AM</span>
                                        </div>
                                        <div class="swiper-slide">
                                            <span class="py-1 px-3 btn btn-time-book">13:45 AM</span>
                                        </div>
                                        <div class="swiper-slide">
                                            <span class="py-1 px-3 btn btn-time-book">13:45 AM</span>
                                        </div>
                                    </div>
                                    <div class="time-book-prev position-absolute top-0 start-0">
                                        <i class="bi bi-arrow-left-circle fs-3"></i>
                                    </div>
                                    <div class="time-book-next position-absolute top-0 end-0">
                                        <i class="bi bi-arrow-right-circle fs-3"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 bg-secondary-subtle rounded">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col">
                                        <p>Women's Haircut</p>
                                    </div>
                                    <div class="col text-end">
                                        Rp. 150,000 <br>
                                        Pick your date <br> and time
                                    </div>
                                </div>
                                <hr>
                                <span>Ariana Greender</span>
                            </div>
                        </div>

                        <div class="text-end">
                            <p class="mb-0">Total: Rp 150.000</p>
                            <p>60 Menit</p>
                        </div>

                        <button type="submit" class="form-control btn-sign-in py-2" data-bs-toggle="modal"
                            data-bs-target="#confirmationBookModal">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
