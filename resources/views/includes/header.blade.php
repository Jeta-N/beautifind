<nav class="navbar navbar-expand-md">
    <div class="container d-flex justify-content-between w-100">
        <a class="navbar-brand" href="/"> <img src="{{ asset('storage/asset/images/logo.png') }}" alt=""></a>

        @auth
            {{-- Mobile View When logged in --}}
            <div class="d-flex dropdown ms-auto d-md-none w-50 justify-content-end">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Jeta Nanda
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item py-2" href="/profile?activeTab=personalData">My Profile</a></li>
                    <li><a class="dropdown-item py-2" href="/profile?activeTab=myOrder">View My Orders</a></li>
                    <li><a class="dropdown-item py-2" href="/profile?activeTab=editPreferences">Edit My Preferences</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                </ul>
            </div>
        @else
            {{-- Mobile View Login --}}
            <div class="ms-auto w-50 d-flex d-md-none justify-content-end">
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                </button>
            </div>
        @endauth


        <form class="nav-input" action="/services">
            <input type="text" class="form-control input-search border-end" placeholder="Search for Services"
                aria-label="services">
            <input type="text" class="form-control input-location border-end" placeholder="Where?"
                aria-label="location">
            <input type="text" class="form-control input-datetime" placeholder="When?" aria-label="location">
            <button type="submit" class="nav-search form-control rounded-end-2">
                Search
            </button>
        </form>

        @auth
            {{-- Tablet & Desktop View When logged in --}}
            <div class="d-md-flex dropdown ms-auto d-none">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Jeta Nanda
                </a>
                <ul class="dropdown-menu p-3">
                    <li><a class="dropdown-item py-2" href="/profile?activeTab=personalData">My Profile</a></li>
                    <li><a class="dropdown-item py-2" href="/profile?activeTab=myOrder">View My Orders</a></li>
                    <li><a class="dropdown-item py-2" href="/profile?activeTab=editPreferences">Edit My Preferences</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                </ul>
            </div>
        @else
            {{-- Tablet & Desktop View not yet login --}}
            <div class="ms-auto d-md-flex d-none">
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#loginModal">
                    Login
                </button>
            </div>
        @endauth
    </div>
</nav>
<div class="navbar d-flex w-100">
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
