<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="pt-0">
    <header class="fixed-top">
        <nav class="navbar navbar-expand-md navbar-home">
            <div class="container d-flex justify-content-between w-100">
                <a class="navbar-brand navbar-home" href="/">
                    <img src="{{ asset('storage/asset/images/logo-white.png') }}" alt="" id="logo-white">
                    <img src="{{ asset('storage/asset/images/logo.png') }}" alt="" id="logo-black"
                        class="d-none">
                </a>


                @auth
                    <div class="d-flex dropdown ms-auto d-md-none w-50 justify-content-end">
                        <a class="nav-link navbar-home dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user() }}
                        </a>
                        <ul class="dropdown-menu p-3">
                            <li><a class="dropdown-item py-2" href="/profile?activeTab=personalData">My Profile</a></li>
                            <li><a class="dropdown-item py-2" href="/profile?activeTab=myOrder">View My Orders</a></li>
                            <li><a class="dropdown-item py-2" href="/profile?activeTab=editPreferences">Edit My
                                    Preferences</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                        </ul>
                    </div>
                @else
                    {{-- Mobile View Login --}}
                    <div class="ms-auto w-50 d-flex d-md-none justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                        </button>
                    </div>
                @endauth

                <form class="nav-input d-none" id="nav-search" action="/services">
                    <input type="text" class="form-control input-search border-end"
                        placeholder="Search for Services Name" aria-label="services" name="service-name">
                    <select class="form-select input-location border-end" aria-label="city" name="city[]">
                        <option value="" selected>Where?</option>
                        @foreach ($cities as $city)
                            <option value="{{ $loop->iteration }}">{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="nav-search form-control rounded-end-2">
                        Search
                    </button>
                </form>

                @auth
                    <div class="d-md-flex dropdown ms-auto d-none">
                        <a class="nav-link navbar-home dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->user->user_name }}
                        </a>
                        <ul class="dropdown-menu p-3">
                            <li><a class="dropdown-item py-2" href="/profile?activeTab=personalData">My Profile</a></li>
                            <li><a class="dropdown-item py-2" href="/profile?activeTab=myOrder">View My Orders</a></li>
                            <li><a class="dropdown-item py-2" href="/profile?activeTab=editPreferences">Edit My
                                    Preferences</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                        </ul>
                    </div>
                @else
                    {{-- Tablet & Desktop View not yet login --}}
                    <div class="ms-auto d-md-flex d-none">
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                        </button>
                    </div>
                @endauth

            </div>
        </nav>
        <div class="navbar d-flex w-100 d-none" id="service-type">
            <div class="container d-flex flex-row">
                @foreach ($serviceTypes as $serviceType)
                    @if ($loop->iteration < 9)
                        <div class="nav-service-type">
                            <a href="/services?type%5B%5D={{ $serviceType->st_id }}"
                                class="text-decoration-none text-dark">
                                {{ $serviceType->st_name }}</a>
                        </div>
                    @endif
                @endforeach
                <div class="nav-service-type">
                    <a href="/services" class="text-decoration-none text-dark">
                        Other</a>
                </div>
            </div>
        </div>

    </header>

    <main>
        @error('password')
            <div class="alert alert-danger alert-dismissible fade show alert-login" role="alert">
                Failed to login. Please check your email and password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        @if (session('failedLogin'))
            <div class="alert alert-danger alert-dismissible fade show alert-login" role="alert">
                Failed to login. Please check your email and password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('failedRegister'))
            <div class="alert alert-danger alert-dismissible fade show alert-login" role="alert">
                Failed to Register. Please check again the form.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/home.js"></script>
</body>

</html>
