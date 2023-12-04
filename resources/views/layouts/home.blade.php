<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="pt-0">
    <header class="fixed-top">
        <nav class="navbar navbar-expand-md navbar-home">
            <div class="container d-flex justify-content-between w-100">
                <a class="navbar-brand navbar-home" href="#">
                    <img src="{{ asset('storage/asset/images/logo-white.png') }}" alt="" id="logo-white">
                    <img src="{{ asset('storage/asset/images/logo.png') }}" alt="" id="logo-black"
                        class="d-none">
                </a>



                {{-- Mobile View Login --}}
                <div class="ms-auto w-50 d-flex d-md-none justify-content-end">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                </div>

                <div class="d-flex dropdown ms-auto d-md-none w-50 justify-content-end">
                    <a class="nav-link navbar-home dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Jeta Nanda
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <form class="nav-input d-none" id="nav-search" action="/search">
                    <input type="text" class="form-control input-search border-end" placeholder="Search for Services"
                        aria-label="services">
                    <input type="text" class="form-control input-location border-end" placeholder="Where?"
                        aria-label="location">
                    <input type="text" class="form-control input-datetime" placeholder="When?" aria-label="location">
                    <button type="submit" class="nav-search form-control rounded-end-2">
                        Search
                    </button>
                </form>

                {{-- Tablet & Desktop View not yet login --}}
                <div class="ms-auto d-md-flex d-none">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                </div>
                <div class="d-md-flex dropdown ms-auto d-none">
                    <a class="nav-link navbar-home dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Jeta Nanda
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="navbar d-flex w-100 d-none" id="service-type">
            <div class="container d-flex flex-row">
                <div class="nav-service-type">
                    Hair Salon
                </div>
                <div class="nav-service-type">
                    Barbershop
                </div>
                <div class="nav-service-type">
                    Nail Salon
                </div>
                <div class="nav-service-type">
                    Skin Care
                </div>
                <div class="nav-service-type">
                    Skin Care
                </div>
                <div class="nav-service-type">
                    Skin Care
                </div>
                <div class="nav-service-type dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        More....
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Test</a></li>
                        <li><a class="dropdown-item" href="#">Test</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </header>

    <main>
        @yield('content')
        @include('components.login-modal')
    </main>

    <footer>
        @include('includes.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./js/app.js"></script>
    <script src="./js/home.js"></script>
</body>

</html>
