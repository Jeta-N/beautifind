@extends('layouts.home')

@section('content')
    <section class="bg-hero">
        <div class="overlay-hero">
            <div class="container d-flex flex-column justify-content-center align-items-center hero-content"
                id="hero-content">
                <div class="d-flex flex-column align-items-center mt-auto">
                    <h1>Be Yourself</h1>
                    <p>Book sessions with local beauty and wellness experts effortlessly.</p>
                    <div class="row g-0">
                        <div class="col">
                            <input type="text" class="form-control input-search rounded-0 rounded-start-2 border-end"
                                placeholder="Search for Services" aria-label="services">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control input-location rounded-0 rounded-end-2 "
                                placeholder="Where?" aria-label="location">
                        </div>
                    </div>
                </div>
                <div class="mt-auto align-items-start w-100 pb-3">
                    <div class="row text-center">
                        <div class="col">
                            Hair Salon
                        </div>
                        <div class="col">
                            Barbershop
                        </div>
                        <div class="col">
                            Nail Salon
                        </div>
                        <div class="col">
                            Skin Care
                        </div>
                        <div class="col">
                            Brow & Lashes
                        </div>
                        <div class="col">
                            Spa & Massage
                        </div>
                        <div class="col">
                            Makeup Service
                        </div>
                        <div class="col">
                            Other
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-color-secondary">
        <div class="container py-5">
            <h2>Recommended For You</h2>
            <div class="swiper swiper-home pt-2">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title 1</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <h2>Find Services That You Love Around Indonesia</h2>
            <div class="py-3">
                <div class="row">
                    <div class="col-6 col-md-4 my-2  position-relative">
                        <img src="{{ asset('storage/asset/images/dummy-location.png') }}" alt=""
                            class="w-100 rounded">
                        <div class="position-absolute top-0 text-white pt-1 ps-2">
                            <h3>Jakarta</h3>
                            <p>100 Beauty Services</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 my-2  position-relative">
                        <img src="{{ asset('storage/asset/images/dummy-location.png') }}" alt=""
                            class="w-100 rounded">
                        <div class="position-absolute top-0 text-white pt-1 ps-2">
                            <h3>Jakarta</h3>
                            <p>100 Beauty Services</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 my-2  position-relative">
                        <img src="{{ asset('storage/asset/images/dummy-location.png') }}" alt=""
                            class="w-100 rounded">
                        <div class="position-absolute top-0 text-white pt-1 ps-2">
                            <h3>Jakarta</h3>
                            <p>100 Beauty Services</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 my-2  position-relative">
                        <img src="{{ asset('storage/asset/images/dummy-location.png') }}" alt=""
                            class="w-100 rounded">
                        <div class="position-absolute top-0 text-white pt-1 ps-2">
                            <h3>Jakarta</h3>
                            <p>100 Beauty Services</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 my-2  position-relative">
                        <img src="{{ asset('storage/asset/images/dummy-location.png') }}" alt=""
                            class="w-100 rounded">
                        <div class="position-absolute top-0 text-white pt-1 ps-2">
                            <h3>Jakarta</h3>
                            <p>100 Beauty Services</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 my-2  position-relative">
                        <img src="{{ asset('storage/asset/images/dummy-location.png') }}" alt=""
                            class="w-100 rounded">
                        <div class="position-absolute top-0 text-white pt-1 ps-2">
                            <h3>Jakarta</h3>
                            <p>100 Beauty Services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-color-secondary">
        <div class="container py-5">
            <h2>Trending Service</h2>
            <div class="swiper swiper-home pt-2">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make
                                    up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-5">
            <h2>Why Book in Beautifind?</h2>
            <div class="row py-3">
                <div class="col-6 col-md-4">
                    <div class="row g-1 g-sm-1 p-2 align-items-center shadow-sm rounded">
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
                    <div class="row g-1 g-sm-1 p-2 align-items-center shadow-sm rounded">
                        <div class="col-3 text-center">
                            <img src="{{ asset('storage/asset/images/why-2.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-9">
                            <p>
                                <strong>Discover Local Talent</strong><br>Connects you with a diverse array of skilled
                                beauty and wellness professionals right in your neighborhood.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col pt-3 pt-md-0">
                    <div class="row g-1 g-sm-1 p-2 align-items-center shadow-sm rounded">
                        <div class="col-3 text-center">
                            <img src="{{ asset('storage/asset/images/why-3.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-9">
                            <p>
                                <strong>Discover Local Talent</strong><br>Connects you with a diverse array of skilled
                                beauty and wellness professionals right in your neighborhood.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-color-secondary">
        <div class="container py-5 text-center px-md-5 px-0">
            <h2>Our Clients Share the Love</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, vel?</p>
            <div class="d-flex justify-content-center testimony">
                <div class="swiper swiper-testimony pt-2">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center gap-3 mt-3">
                <div class="testimony-prev">
                    <i class="bi bi-arrow-left-circle fs-2"></i>
                </div>
                <div class="testimony-next">
                    <i class="bi bi-arrow-right-circle-fill fs-2"></i>
                </div>
            </div>
        </div>
    </section>
@endsection
