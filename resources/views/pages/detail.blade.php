@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row pt-3">
            {{-- Left Part --}}
            <div class="col-8">
                <img src="{{ asset('storage/asset/images/services/thumbnail/' . $services->service_image_path) }}"
                    alt="" class="w-100 img-fluid">
                <h3 class="px-3 mt-2">{{ $services->service_name }}</h3>
                <p class="px-3 mb-0">{{ $services->service_description }}
                </p>

                {{-- Accordion --}}
                <div class="accordion accordion-flush px-3 pt-4" id="detailAccordion">
                    @if ($serviceTypesAvailable->isEmpty())
                        <h3>Services</h3>
                        <p class="lead mb-0">Currently no booking slots available</p>
                    @endif
                    @foreach ($serviceTypesAvailable as $serviceType)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#Accordion{{ $loop->iteration }}" aria-expanded="false"
                                    aria-controls="Accordion{{ $loop->iteration }}">
                                    <strong>{{ $serviceType->st_name }}</strong>
                                </button>
                            </h2>
                            <div id="Accordion{{ $loop->iteration }}" class="accordion-collapse collapse"
                                data-bs-parent="#detailAccordion">
                                <div class="accordion-body">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($serviceType->employeeServiceType as $employeeServiceType)
                                            <li class="list-group-item">
                                                <div class="d-flex flex-row align-items-center">
                                                    <span>{{ $employeeServiceType->employee->emp_name }}</span>
                                                    <div class="ms-auto">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div class="flex-col text-end">
                                                                <span>Rp.{{ number_format($employeeServiceType->price, 0, ',') }}</span><br>
                                                                <span class="text-secondary">
                                                                    @foreach ($services->serviceServiceType as $serviceDuration)
                                                                        @if ($serviceDuration->st_id == $serviceType->st_id)
                                                                            {{ $serviceDuration->duration }}
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                                Min
                                                            </span>
                                                        </div>
                                                        <div class="p-3">
                                                            <button type="submit" class=" btn btn-sign-in"
                                                                data-bs-toggle="modal"
                                                                @auth data-bs-target="#bookModal{{ $employeeServiceType->est_id }}"
                                                                @else
                                                                data-bs-target="#loginModal" @endauth>Book</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @include('components.book-modal')
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Portofolio --}}
            @if ($services->portfolioImage->isNotEmpty() && $services->has_portfolio)
                <div class="px-3 pt-4">
                    <h3>Portofolio</h3>
                    @if ($services->portfolioImage->count() > 3)
                        <div class="swiper swiper-portfolio pt-2">
                            <div class="swiper-wrapper portfolio-img-container">
                                @foreach ($services->portfolioImage as $portfolio)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/asset/images/services/portofolio/' . $portfolio->image_path) }}"
                                            alt="portfolio image" class="img-fluid">
                                        <div class="overlay-portfolio-title">
                                            {{ $portfolio->portfolio_title }}
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    @else
                        <div class="row">
                            @foreach ($services->portfolioImage as $portfolio)
                                <div class="col-4">
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/asset/images/services/portofolio/' . $portfolio->image_path) }}"
                                            alt="portfolio image" class="img-fluid">
                                        <div class="overlay-portfolio-title">
                                            {{ $portfolio->portfolio_title }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            {{-- Promo --}}
            @if ($services->promotion->isNotEmpty() && $services->has_promo)
                <div class="px-3 pt-4">
                    <h3>Promotion</h3>
                    @if ($services->promotion->count() > 3)
                        <div class="swiper swiper-portfolio pt-2">
                            <div class="swiper-wrapper portfolio-img-container">
                                @foreach ($services->promotion as $promotion)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img src="{{ asset('storage/asset/images/services/promotion/' . $promotion->image_path) }}"
                                                alt="promo image" class="img-fluid">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $promotion->promo_title }}</h5>
                                                <p class="card-text">{{ $promotion->promo_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    @else
                        <div class="row">
                            @foreach ($services->promotion as $promotion)
                                <div class="col-4">
                                    <div class="card h-100">
                                        <img src="{{ asset('storage/asset/images/services/promotion/' . $promotion->image_path) }}"
                                            alt="promo image" class="img-fluid">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $promotion->promo_title }}</h5>
                                            <p class="card-text">{{ $promotion->promo_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            {{-- FAQ --}}
            @if ($services->faq->isNotEmpty() && $services->has_faq)
                <div class="px-3 pt-4">
                    <h3>Frequently Asked Question</h3>
                    <div class="accordion" id="faqAccordion">
                        @foreach ($services->faq as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="true"
                                        aria-controls="collapse{{ $loop->iteration }}">
                                        <p class="mb-0"><strong>Q: </strong>{{ $faq->faq_question }}</p>
                                    </button>
                                </h2>
                                <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse"
                                    data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="mb-0 py-1"><strong>A: </strong>{{ $faq->faq_answer }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Reviews --}}
            <div class="px-3 pt-4">
                <h3>Review</h3>
                <div class="row pe-3">
                    <p class="col-9">At BeautiFind, we prioritize trust, verifying each review for authenticity.
                        Our
                        advanced
                        verification
                        process confirms users' genuine experiences, ensuring reliable insights into beauty
                        services.
                        Count
                        on us for a trustworthy community where informed decisions meet genuine experiences.</p>
                    <div class="col-3 border rounded align-items-center d-flex flex-column justify-content-center">
                        <p class="mb-0">
                            {{ $services->review_avg_rating == null ? '-' : $services->review_avg_rating }}/5</p>

                        @if ($services->review_avg_rating != null)
                            <p class="mb-0">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($services->review_avg_rating < $i)
                                        @if (is_float($services->review_avg_rating) && round($services->review_avg_rating) == $i)
                                            <i class="bi bi-star-half"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-star-fill"></i>
                                    @endif
                                @endfor
                            </p>
                        @endif
                        <p class="text-secondary mb-0">(Based on {{ $services->review_count }} reviews)</p>
                    </div>
                </div>

                @if ($reviews->isEmpty())
                    <p class="lead">Currently no review</p>
                @endif
                @foreach ($reviews as $review)
                    <div class="row pe-3 my-5 review-container">
                        <div class="col-7">
                            @if ($review->rating != null)
                                <span>
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($review->rating < $i)
                                            @if (is_float($review->rating) && round($review->rating) == $i)
                                                <i class="bi bi-star-half"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @else
                                            <i class="bi bi-star-fill"></i>
                                        @endif
                                    @endfor
                                    {{ $review->rating }}
                                </span>
                            @endif
                            <p class="mb-0 text-uppercase">{{ $review->booking->serviceType->st_name }}</p>
                            <p class="mb-0">by {{ $review->booking->bookingSlot->employee->emp_name }}</p>
                            <p>{{ $review->review_content }}</p>
                        </div>
                        <div class="col-5 text-end pe-0">
                            <p class="text-secondary">{{ $review->user->user_name }} &#x2022;
                                {{ \Carbon\Carbon::parse($review->created_at)->format('j F Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Right Part --}}
        <div class="col-4 sticky-top detail-info rounded">
            <div class="rounded border border-top-0">
                <div class="salon-logo">
                    <img src="{{ asset('storage/asset/images/services/logo/' . $services->logo_image_path) }}"
                        alt="" class="w-100">
                    {{-- <img src="{{ asset($services->logo_image_path) }}" alt="logo salon"> --}}
                </div>
                <div class="p-3 border-top border-bottom">
                    <h3>{{ $services->service_name }}</h3>
                    <hr>
                    <p><strong>Contact & Business Hours</strong></p>
                    <p><i class="bi bi-geo-alt me-1"></i>{{ $services->service_address }}</p>
                    <p><i class="bi bi-telephone me-1"></i>{{ $services->service_phone }}</p>
                    <p><i class="bi bi-instagram me-1"></i>{{ $services->service_instagram }}</p>
                    <p><i class="bi bi-envelope-at me-1"></i>{{ $services->service_email }}</p>
                    <p><i class="bi bi-clock me-1"></i>{{ $services->service_opening_hours }} WIB</p>
                </div>
                <div class="p-3">
                    @foreach ($services->serviceServiceType as $serviceType)
                        <span class="px-2">{{ $serviceType->serviceType->st_name }}</span>
                        @if (!$loop->last)
                            &#8226; {{-- bullet --}}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('successBook'))
    @include('components.success-book-modal')
@endif

@if (session('errorBook'))
    <div class="alert alert-danger alert-dismissible fade show alert-login top-50 position-fixed" role="alert">
        Failed to Book. Please check if you already have booking in same time.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@endsection

@section('scripts')
<script src="../js/detail.js"></script>
<script src="../js/book.js"></script>
@endsection
