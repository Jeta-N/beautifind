@extends('layouts.admin.default')

@section('content')
    <div class="container py-4">
        <h1>{{ $service->service_name }}</h1>
        <div class="pt-4">
            <div class="row">
                <div class="col-7">
                    <p><strong>Service Description: </strong><br>
                        {{ $service->service_description }}</p>
                    <p><strong>Service Address:</strong> {{ $service->service_address }}</p>
                    <p><strong>Service Phone Number:</strong> {{ $service->service_phone }}</p>
                    <p><strong>Service Instagram:</strong> {{ $service->service_instagram }} </p>
                    <p><strong>Service Opening Hours:</strong> {{ $service->service_opening_hours }}</p>
                    <p><strong>Service Type:</strong>
                        @foreach ($service->serviceServiceType as $serviceServiceType)
                            <span class="px-2">{{ $serviceServiceType->serviceType->st_name }}</span>
                            @if (!$loop->last)
                                &#8226; {{-- bullet --}}
                            @endif
                        @endforeach
                    </p>
                </div>
                <div class="col-5">
                    <p><strong>Service Logo:</strong></p>
                    <img src="{{ asset('storage/asset/images/services/logo/' . $service->logo_image_path) }}" alt=""
                        class="img-fluid">

                    <p><strong>Service Thumbnail:</strong></p>
                    <div class="w-100">
                        <img src="{{ asset('storage/asset/images/services/thumbnail/' . $service->service_image_path) }}"
                            alt="" class="img-fluid">
                    </div>
                </div>
            </div>

            {{-- Portofolio --}}
            @if ($service->portfolioImage->count() > 0)
                <div class="pt-4">
                    <h3>Portofolio</h3>
                    @if ($service->portfolioImage->count() > 3)
                        <div class="swiper swiper-staff-portfolio pt-2">
                            <div class="swiper-wrapper portfolio-img-container">
                                @foreach ($service->portfolioImage as $portfolio)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img src="{{ asset('storage/asset/images/services/portofolio/' . $portfolio->image_path) }}"
                                                alt="portfolio image" class="img-fluid">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $portfolio->portfolio_title }}</h5>
                                                <form action="/delete-portfolio/{{ $portfolio->pi_id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <strong>Delete Portfolio</strong>
                                                    </button>
                                                </form>
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
                            @foreach ($service->portfolioImage as $portfolio)
                                <div class="col-3 d-flex align-items-stretch flex-column">
                                    <div class="card h-100">
                                        <img src="{{ asset('storage/asset/images/services/portofolio/' . $portfolio->image_path) }}"
                                            alt="portfolio image" class="img-fluid">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $portfolio->portfolio_title }}</h5>
                                            <form action="/delete-portfolio/{{ $portfolio->pi_id }}" method="POST"
                                                class="mt-auto">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <strong>Delete Portfolio</strong>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            {{-- Promo --}}
            @if ($service->promotion->count() > 0)
                <div class="pt-4">
                    <h3>Promotion</h3>
                    @if ($service->promotion->count() > 3)
                        <div class="swiper swiper-staff-promotion pt-2">
                            <div class="swiper-wrapper portfolio-img-container">
                                @foreach ($service->promotion as $promotion)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img src="{{ asset('storage/asset/images/services/promotion/' . $promotion->image_path) }}"
                                                alt="promo image" class="img-fluid">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $promotion->promo_title }}</h5>
                                                <p class="card-text">{{ $promotion->promo_description }}</p>
                                                <form action="/delete-portfolio/{{ $promotion->promotion_id }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <strong>Delete Promotion</strong>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    @elseif($service->promotion->count() > 0)
                        <div class="row">
                            @foreach ($service->promotion as $promotion)
                                <div class="col-3 d-flex align-items-stretch flex-column">
                                    <div class="card h-100">
                                        <img src="{{ asset('storage/asset/images/services/promotion/' . $promotion->image_path) }}"
                                            alt="promo image" class="img-fluid">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $promotion->promo_title }}</h5>
                                            <p class="card-text">{{ $promotion->promo_description }}</p>
                                            <form action="/delete-promo/{{ $promotion->promotion_id }}" method="POST"
                                                class="mt-auto">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <strong>Delete Promotion</strong>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            {{-- FAQ --}}
            @if ($service->faq->count() > 0)
                <div class="pt-4">
                    <h3>Frequently Asked Question</h3>
                    <div class="d-flex flex-column w-100 pt-2">
                        @foreach ($service->faq as $faq)
                            <div class="d-flex flex-row w-100 py-2">
                                <div class="w-100 pe-2">
                                    <div class="accordion" id="faqAccordion{{ $loop->iteration }}">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="true"
                                                    aria-controls="collapse{{ $loop->iteration }}">
                                                    <p class="mb-0"><strong>Q: </strong> {{ $faq->faq_question }}
                                                    </p>
                                                </button>
                                            </h2>
                                            <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse"
                                                data-bs-parent="#faqAccordion{{ $loop->iteration }}">
                                                <div class="accordion-body">
                                                    <p class="mb-0 py-1"><strong>A: </strong>{{ $faq->faq_answer }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-content-end d-flex">
                                    <form action="/delete-faq/{{ $faq->faq_id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            <strong>Delete</strong>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            @endif
        </div>
    </div>
@endsection
