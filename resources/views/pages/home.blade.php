@extends('layouts.home')

@section('content')
    <section class="bg-hero">
        <div class="overlay-hero">
            <div class="container d-flex flex-column justify-content-center align-items-center hero-content"
                id="hero-content">
                <div class="d-flex flex-column align-items-center mt-auto">
                    <h1>Be Yourself</h1>
                    <p>Book sessions with local beauty and wellness experts effortlessly.</p>
                    <form class="row g-0 w-100" action="/services">
                        <div class="col-6">
                            <input type="text" class="form-control input-search rounded-0 rounded-start-2 border-end"
                                placeholder="Search for Services Name" aria-label="services" name="service-name">
                        </div>
                        <div class="col-4">
                            <select class="form-select input-location border-end" aria-label="city" name="city[]">
                                <option value="" selected>Where?</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $loop->iteration }}">{{ $city->city_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="form-control home-search rounded-0 rounded-end-2">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
                <div class="mt-auto align-items-start w-100 pb-3">
                    <div class="row text-center">
                        @foreach ($serviceTypes as $serviceType)
                            @if ($loop->iteration < 9)
                                <div class="col">
                                    <a href="/services?type%5B%5D={{ $serviceType->st_id }}"
                                        class="text-decoration-none text-white">
                                        {{ $serviceType->st_name }}</a>
                                </div>
                            @endif
                        @endforeach
                        <div class="col">
                            <a href="/services" class="text-decoration-none text-white">
                                Other</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-color-secondary">
        <div class="container py-5">
            @auth
                <h2>Recommended For You</h2>
            @else
                <h2>Check Out These Picks</h2>
            @endauth
            @if (count($rec_services) > 4)
                <div class="swiper swiper-home pt-2">
                    <div class="swiper-wrapper">
                        @foreach ($rec_services as $service)
                            <div class="swiper-slide">
                                <div class="card h-100">
                                    <img src="{{ asset('storage/asset/images/services/thumbnail/' . $service->service_image_path) }}"
                                        class="card-img-top card-img-top-home" alt="service-thumbnail">
                                    <div class="card-body d-flex flex-column align-items-center">
                                        <h5 class="card-title mb-0">{{ $service->service_name }}</h5>
                                        <p class="text-secondary">{{ $service->city->city_name }}</p>
                                        <p class="card-text">{{ $service->service_description }}</p>
                                        <a href="/service/{{ $service->service_id }}"
                                            class="px-2 py-1 bg-btn-book text-white">View Service</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="row pt-2">
                    @foreach ($rec_services as $service)
                        <div class="col-3 d-flex align-items-stretch">
                            <div class="card h-100">
                                <img src="{{ asset('storage/asset/images/services/thumbnail/' . $service->service_image_path) }}"
                                    class="card-img-top card-img-top-home" alt="service-thumbnail">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h5 class="card-title">{{ $service->service_name }}</h5>
                                    <p class="card-text">{{ $service->service_description }}</p>
                                    <a href="/service/{{ $service->service_id }}"
                                        class="px-2 py-1 bg-btn-book text-white">See
                                        Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
    </section>

    <section>
        <div class="container py-5">
            <h2>Find Services That You Love Around Indonesia</h2>
            <div class="py-3">
                <div class="row">
                    <div class="col-6 col-md-3 my-2">
                        <a href="/services?city%5B%5D=1" class="card text-white">
                            <img src="{{ asset('storage/asset/images/dummy-location4.png') }}" alt=""
                                class="w-100 rounded">
                            <div class="card-img-overlay">
                                <h3>Jakarta</h3>

                                <p>{{ $serviceCounts[1] }} Beauty Services</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 my-2">
                        <a href="/services?city%5B%5D=2" class="card text-white">
                            <img src="{{ asset('storage/asset/images/dummy-location.png') }}" alt=""
                                class="w-100 rounded">
                            <div class="card-img-overlay">
                                <h3>Bandung</h3>
                                <p>{{ $serviceCounts[2] }} Beauty Services</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 my-2">
                        <a href="/services?city%5B%5D=3" class="card text-white">
                            <img src="{{ asset('storage/asset/images/dummy-location2.png') }}" alt=""
                                class="w-100 rounded">
                            <div class="card-img-overlay">
                                <h3>Surabaya</h3>
                                <p>{{ $serviceCounts[3] }} Beauty Services</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 my-2">
                        <a href="/services?city%5B%5D=4" class="card text-white">
                            <img src="{{ asset('storage/asset/images/dummy-location3.png') }}" alt=""
                                class="w-100 rounded">
                            <div class="card-img-overlay">
                                <h3>Denpasar</h3>
                                <p>{{ $serviceCounts[4] }} Beauty Services</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-color-secondary">
        <div class="container py-5">
            <h2>Why Book in Beautifind?</h2>
            <div class="row py-3">
                <div class="col-6 col-md-4">
                    <div class="row g-1 g-sm-1 p-2 align-items-center shadow-sm rounded bg-white h-100">
                        <div class="col-3 text-center">
                            <img src="{{ asset('storage/asset/images/why-1.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-9">
                            <p>
                                <strong>Discover Local Talent</strong><br>Connects you with a diverse array of skilled
                                beauty and wellness professionals right in your neighborhood.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row g-1 g-sm-1 p-2 align-items-center shadow-sm rounded bg-white h-100">
                        <div class="col-3 text-center">
                            <img src="{{ asset('storage/asset/images/why-2.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-9">
                            <p>
                                <strong>Effortless Booking</strong><br>Browse, choose, and book your preferred services
                                with just a few clicks, saving you time and hassle.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col pt-3 pt-md-0">
                    <div class="row g-1 g-sm-1 p-2 align-items-center shadow-sm rounded bg-white h-100">
                        <div class="col-3 text-center">
                            <img src="{{ asset('storage/asset/images/why-3.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-9">
                            <p>
                                <strong>Tailored Experiences</strong><br>we offer personalized services to suit your unique
                                preferences. From hair and makeup to spa treatments, find the perfect match for your needs.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5 text-center px-md-5 px-0">
            <h2>Our Clients Share the Love</h2>
            <p>Where Clients Share Their Delight.</p>
            <div class="d-flex justify-content-center testimony">
                @if (count($reviews) > 3)
                    <div class="swiper swiper-testimony pt-2">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            @foreach ($reviews as $review)
                                <div class="swiper-slide">
                                    <div class="card h-100">
                                        <div class="card-body d-flex flex-column align-items-center">
                                            <h5 class="card-title mb-0">{{ $review->service->service_name }}</h5>
                                            <p class="card-text text-secondary">
                                                {{ $review->service->city->city_name }}
                                            </p>
                                            <p class="mb-0">
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
                                            </p>
                                            <p class="card-text">{{ $review->review_content }}</p>
                                            <div class="mt-auto">
                                                @if ($review->user->user_gender == 'Female')
                                                    <img src="{{ asset('storage/asset/icon/female_icon.svg') }}"
                                                        style="width:50px" alt="male-icon">
                                                @else
                                                    <img src="{{ asset('storage/asset/icon/male_icon.svg') }}"
                                                        style="width:50px" alt="male-icon">
                                                @endif
                                                <h5 class="card-title">{{ $review->user->user_name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @elseif(count($reviews) > 0)
                    <div class="row">
                        @foreach ($reviews as $review)
                            <div class="col d-flex align-items-stretch flex-column">
                                <div class="card h-100">
                                    <div class="card-body d-flex flex-column align-items-center">
                                        <h5 class="card-title mb-0">{{ $review->service->service_name }}</h5>
                                        <p class="card-text text-secondary">
                                            {{ $review->service->city->city_name }}
                                        </p>
                                        <p class="mb-0">
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
                                        </p>
                                        <p class="card-text">{{ $review->review_content }}</p>
                                        <div class="mt-auto">
                                            @if ($review->user->user_gender == 'Female')
                                                <img src="{{ asset('storage/asset/icon/female_icon.svg') }}"
                                                    style="width:50px" alt="male-icon">
                                            @else
                                                <img src="{{ asset('storage/asset/icon/male_icon.svg') }}"
                                                    style="width:50px" alt="male-icon">
                                            @endif
                                            <h5 class="card-title">{{ $review->user->user_name }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-secondary lead">No review yet</p>
                @endif
            </div>
            @if (count($reviews) > 3)
                <div class="d-flex flex-row justify-content-center gap-3 mt-3">
                    <div class="testimony-prev">
                        <i class="bi bi-arrow-left-circle fs-2"></i>
                    </div>
                    <div class="testimony-next">
                        <i class="bi bi-arrow-right-circle-fill fs-2"></i>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
