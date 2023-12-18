@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row pt-3">
            {{-- Left Part --}}
            <div class="col-8">
                <img src="{{ asset('storage/asset/images/dummy-salon-detail.png') }}" alt="" class="img-fluid">
                <h3 class="px-3">Johnny Andrean Salon</h3>
                <p class="px-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro nostrum natus minima impedit
                    at expedita!
                </p>

                {{-- Accordion --}}
                <div class="accordion accordion-flush px-3" id="detailAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#firstAccordion" aria-expanded="false" aria-controls="firstAccordion">
                                <strong>Hair Cut</strong>
                            </button>
                        </h2>
                        <div id="firstAccordion" class="accordion-collapse collapse" data-bs-parent="#detailAccordion">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal" data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal" data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal" data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal" data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#secondAccordion" aria-expanded="false" aria-controls="secondAccordion">
                                <strong>Hair Cut</strong>
                            </button>
                        </h2>
                        <div id="secondAccordion" class="accordion-collapse collapse" data-bs-parent="#detailAccordion">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal" data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#thirdAccordion" aria-expanded="false" aria-controls="thirdAccordion">
                                <strong>Hair Cut</strong>
                            </button>
                        </h2>
                        <div id="thirdAccordion" class="accordion-collapse collapse" data-bs-parent="#detailAccordion">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="d-flex flex-row align-items-center">
                                            <span>Ariana Grander</span>
                                            <div class="ms-auto">
                                                <div class="d-flex flex-row align-items-center">
                                                    <div class="flex-col text-end">
                                                        <span>Rp.120,000</span><br>
                                                        <span class="text-secondary">1h</span>
                                                    </div>
                                                    <div class="p-3">
                                                        <button type="submit" class=" btn btn-sign-in"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#bookModal">Book</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Reviews --}}
                <div class="px-3 pt-4">
                    <p class="fs-4">Review</p>
                    <div class="row pe-3">
                        <p class="col-9">At BeautiFind, we prioritize trust, verifying each review for authenticity. Our
                            advanced
                            verification
                            process confirms users' genuine experiences, ensuring reliable insights into beauty services.
                            Count
                            on us for a trustworthy community where informed decisions meet genuine experiences.</p>
                        <div class="col-3 border rounded align-items-center d-flex flex-column justify-content-center">
                            <p class="mb-0">4.9/5</p>
                            <p class="mb-0"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i></p>
                            <p class="text-secondary mb-0">(Based on 110 reviews)</p>
                        </div>
                    </div>

                    <div class="row pe-3 my-5 review-container">
                        <div class="col-8">
                            <span><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i></span>
                            <p class="mb-0 text-uppercase">Male Haircut</p>
                            <p class="mb-0">by Stylist 1</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, at?</p>
                        </div>
                        <div class="col-4 text-end pe-0">
                            <p class="text-secondary">John Appleseed &#x2022; Nov 10, 2023</p>
                        </div>
                    </div>
                    <div class="row pe-3 my-5 review-container">
                        <div class="col-8">
                            <span><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i></span>
                            <p class="mb-0 text-uppercase">Male Haircut</p>
                            <p class="mb-0">by Stylist 1</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, at?</p>
                        </div>
                        <div class="col-4 text-end pe-0">
                            <p class="text-secondary">John Appleseed &#x2022; Nov 10, 2023</p>
                        </div>
                    </div>
                    <div class="row pe-3 my-5 review-container">
                        <div class="col-8">
                            <span><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i></span>
                            <p class="mb-0 text-uppercase">Male Haircut</p>
                            <p class="mb-0">by Stylist 1</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, at?</p>
                        </div>
                        <div class="col-4 text-end pe-0">
                            <p class="text-secondary">John Appleseed &#x2022; Nov 10, 2023</p>
                        </div>
                    </div>

                </div>
            </div>
            {{-- Right Part --}}
            <div class="col-4 sticky-top detail-info rounded">
                <div class="rounded border border-top-0">
                    <div class="salon-logo">
                        <img src="{{ asset('storage/asset/images/dummy-salon-logo.png') }}" alt="">
                    </div>
                    <div class="p-3 border-top">
                        <p><strong>About Us</strong></p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt cum nihil, veniam repudiandae
                            voluptas, perferendis mollitia doloribus et aliquam unde, at laudantium illum. Iste, aspernatur.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, nulla, omnis repudiandae
                            temporibus optio dicta dignissimos, nihil officiis quos numquam minima. Vel est cum libero.
                        </p>
                        <p><strong>Contact & Business Hours</strong></p>
                        <p><i class="bi bi-telephone me-1"></i>+62 871-1234-1234</p>
                        <p><i class="bi bi-envelope-at me-1"></i>johnnyandrean@gmail.com</p>
                        <p><i class="bi bi-calendar4 me-1"></i>Monday - Sunday</p>
                        <p><i class="bi bi-clock me-1"></i>09:00 - 22:00</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.book-modal')
    @include('components.confirmation-book-modal')
    @include('components.success-book-modal')
@endsection

@section('scripts')
    <script src="./js/book.js"></script>
@endsection
