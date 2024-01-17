@extends('layouts.staff.default')

@section('content')
    <div class="container py-4">
        <div class="d-flex w-100 flex-row align-items-center">
            <h1>{{ $service->service_name }}</h1>
            <form action="/deactivate-service" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-outline-danger ms-3 {{ $service->is_active ? '' : 'd-none' }}" type="submit">
                    <strong>Deactivate</strong>
                </button>
            </form>
            <form action="/activate-service" method="POST">
                @csrf
                @method('PUT')
                <button class="btn btn-outline-success ms-3 {{ $service->is_active ? 'd-none' : '' }}" type="submit">
                    <strong>Activate</strong>
                </button>
            </form>
            <div class="ms-auto">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editServiceModal">
                    <strong>Edit Profile</strong>
                </button>
            </div>
        </div>
        <div class="pt-4">
            <div class="row">
                <div class="col-7">
                    <p><strong>Service Description: </strong><br>
                        {{ $service->service_description }}</p>
                    <p><strong>Service Address:</strong> {{ $service->service_address }}</p>
                    <p><strong>Service Phone Number:</strong> {{ $service->service_phone }}</p>
                    <p><strong>Service Email:</strong> {{ $service->service_email ?? '-' }}</p>
                    <p><strong>Service Instagram:</strong> {{ $service->service_instagram ?? '-' }} </p>
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
                    <img src="{{ asset('storage/asset/images/dummy-salon-logo.png') }}" alt="">
                    {{-- <img src="{{ asset('storage/asset/images/dummy-salon-detail.png') }}" alt="" class="img-fluid"> --}}

                    <p><strong>Service Thumbnail:</strong></p>
                    <div class="w-100">
                        <img src="{{ asset('storage/asset/images/dummy-salon-detail.png') }}" alt=""
                            class="img-fluid">
                    </div>
                </div>
            </div>

            {{-- Portofolio --}}
            <div class="pt-4">
                <div class="d-flex flex-row align-items-center mb-2">
                    <h3>Portofolio</h3>
                    <form action="/deactivate-portfolio" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-outline-danger ms-3 {{ $service->has_portfolio ? '' : 'd-none' }}"
                            type="submit">
                            <strong>Deactivate</strong>
                        </button>
                    </form>
                    <form action="/activate-portfolio" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-outline-success ms-3 {{ $service->has_portfolio ? 'd-none' : '' }}"
                            type="submit">
                            <strong>Activate</strong>
                        </button>
                    </form>
                    <div class="ms-auto">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPortfolioModal">
                            <strong>Add Portofolio</strong>
                        </button>
                    </div>
                </div>

                @if ($service->portfolioImage->count() > 3)
                    <div class="swiper swiper-staff-portfolio pt-2">
                        <div class="swiper-wrapper portfolio-img-container">
                            @foreach ($service->portfolioImage as $portfolio)
                                <div class="swiper-slide">
                                    {{-- <img src="{{ asset($portfolio->image_path) }}" alt="portfolio image"
                                                class="img-fluid"> --}}
                                    <div class="card">
                                        <img src="{{ asset('storage/asset/images/dummy-salon-detail.png ') }}"
                                            class="card-img-top" alt="promo image">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $portfolio->portfolio_title }}</h5>
                                            <form action="/delete-portfolio/{{ $portfolio->pi_id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <strong>Delete Portofolio</strong>
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
                                    <img src="{{ asset('storage/asset/images/dummy-salon-detail.png ') }}"
                                        class="card-img-top" alt="promo image">
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ $portfolio->portfolio_title }}</h5>
                                        <form action="/delete-portfolio/{{ $portfolio->pi_id }}" method="POST"
                                            class="mt-auto">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">
                                                <strong>Delete Portofolio</strong>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Promo --}}
            <div class="pt-4">
                <div class="d-flex flex-row align-items-center mb-2">
                    <h3>Promotion</h3>
                    <form action="/deactivate-promo" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-outline-danger ms-3 {{ $service->has_promo ? '' : 'd-none' }}"
                            type="submit">
                            <strong>Deactivate</strong>
                        </button>
                    </form>
                    <form action="/activate-promo" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-outline-success ms-3 {{ $service->has_promo ? 'd-none' : '' }}"
                            type="submit">
                            <strong>Activate</strong>
                        </button>
                    </form>
                    <div class="ms-auto">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPromotionModal">
                            <strong>Add Promotion</strong>
                        </button>
                    </div>
                </div>

                @if ($service->promotion->count() > 3)
                    <div class="swiper swiper-staff-promotion pt-2">
                        <div class="swiper-wrapper portfolio-img-container">
                            @foreach ($service->promotion as $promotion)
                                <div class="swiper-slide">
                                    {{-- <img src="{{ asset($portfolio->image_path) }}" alt="portfolio image"
                                            class="img-fluid"> --}}
                                    <div class="card">
                                        <img src="{{ asset('storage/asset/images/dummy-salon-detail.png ') }}"
                                            class="card-img-top" alt="promo image">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $promotion->promo_title }}</h5>
                                            <p class="card-text">{{ $promotion->promo_description }}</p>
                                            <form action="/delete-portfolio/{{ $promotion->promotion_id }}" method="POST">
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
                @else
                    <div class="row">
                        @foreach ($service->promotion as $promotion)
                            <div class="col-3 d-flex align-items-stretch flex-column">
                                <div class="card h-100">
                                    <img src="{{ asset('storage/asset/images/dummy-salon-detail.png ') }}"
                                        class="card-img-top" alt="promo image">
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

            {{-- FAQ --}}
            <div class="pt-4">
                <div class="d-flex flex-row align-items-center">
                    <h3>Frequently Asked Question</h3>
                    <form action="/deactivate-faq" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-outline-danger ms-3 {{ $service->has_faq ? '' : 'd-none' }}"
                            type="submit">
                            <strong>Deactivate</strong>
                        </button>
                    </form>
                    <form action="/activate-faq" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-outline-success ms-3 {{ $service->has_faq ? 'd-none' : '' }}"
                            type="submit">
                            <strong>Activate</strong>
                        </button>
                    </form>
                    <div class="ms-auto">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFaqModal">
                            <strong>Add FAQ</strong>
                        </button>
                    </div>
                </div>
                <div class="d-flex flex-column w-100 pt-2">
                    @foreach ($service->faq as $faq)
                        <div class="d-flex flex-row w-100 py-2">
                            <div class="w-100 pe-2">
                                <div class="accordion" id="faqAccordion{{ $loop->iteration }}">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="true"
                                                aria-controls="collapse{{ $loop->iteration }}">
                                                <p class="mb-0"><strong>Q: </strong> {{ $faq->faq_question }} </p>
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
        </div>
    </div>

    @include('components.staff.edit-service-profile-modal')
    @include('components.staff.add-portfolio-modal')
    @include('components.staff.add-promotion-modal')
    @include('components.staff.add-faq-modal')
    @include('components.staff.info-toast')
@endsection

@section('scripts')
    <script src="../js/staff/bookingSlot.js"></script>
    @if ($errors->has('validation_scenario') && $errors->first('validation_scenario') == 'profile')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = "Failed to update profile, please check the form again."
                toastBootstrap.show();
            });
        </script>
    @endif
    @if ($errors->has('validation_scenario'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                @if ($errors->first('validation_scenario') == 'portfolio')
                    toastBody.innerHTML = "Failed to add portfolio, please check the form again."
                @elseif ($errors->first('validation_scenario') == 'profile')
                    toastBody.innerHTML = "Failed to update profile, please check the form again."
                @elseif ($errors->first('validation_scenario') == 'promotion')
                    toastBody.innerHTML = "Failed to add promotion, please check the form again."
                @elseif ($errors->first('validation_scenario') == 'faq')
                    toastBody.innerHTML = "Failed to add FAQ, please check the form again."
                @endif
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('successUpdateService'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = "Service profile has been updated successfully!"
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('errorActivate'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = "Can't activate the service, please complete the profile first!"
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('errorActivatePortfolio'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = "Can't activate the portfolio, at least 1 portfolio and max 10 portfolio!"
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('errorActivatePromotion'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = "Can't activate the service, at least 1 promotion!"
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('errorActivateFaq'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = "Can't activate the service, at least 1 faq and max 10 faq!"
                toastBootstrap.show();
            });
        </script>
    @endif
@endsection
