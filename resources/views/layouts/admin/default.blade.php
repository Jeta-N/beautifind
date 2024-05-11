<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.staff.head')
</head>

<body class="p-0 bg-body">
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu"
                class="col-md-3 col-lg-2 d-md-block rounded-end border min-vh-100 sidebar collapse bg-white">
                <div class="position-sticky min-vh-100 pt-3 d-flex flex-column top-0">
                    <ul class="nav flex-column">
                        <li class="pb-5">
                            <a href="/admin-dashboard" class="nav-link sidebar-user">
                                <img src="{{ asset('storage/asset/images/logo.png') }}" alt="" class="w-100">
                            </a>
                        </li>
                        <li class="pt-3">
                            <a href="/admin-dashboard" class="nav-link d-flex align-items-center">
                                <i class="bi bi-house-door me-2 fs-5" style="margin-bottom:2px;"></i>
                                <p class="mb-0">Dashboard</p>
                            </a>
                        </li>
                        <li class="pt-3">
                            <a href="/admin-users" class="nav-link d-flex align-items-center">
                                <i class="bi bi-people me-2 fs-5" style="margin-bottom:2px;"></i>
                                <p class="mb-0">Manage Users</p>
                            </a>
                        </li>
                        <li class="pt-3">
                            <a href="/admin-employees" class="nav-link d-flex align-items-center">
                                <i class="bi bi-people me-2 fs-5" style="margin-bottom:2px;"></i>
                                <p class="mb-0">Manage Employees</p>
                            </a>
                        </li>
                        <li class="pt-3">
                            <a href="/admin-services" class="nav-link d-flex align-items-center">
                                <i class="bi bi-grid me-2 fs-5" style="margin-bottom:2px;"></i>
                                <p class="mb-0">Manage Services</p>
                            </a>
                        </li>
                        <li class="pt-3">
                            <a href="/admin-reviews" class="nav-link d-flex align-items-center">
                                <i class="bi bi-pencil-square me-2 fs-5" style="margin-bottom:2px;"></i>
                                <p class="mb-0">Manage Reviews</p>
                            </a>
                        </li>
                    </ul>

                    <div class="mt-auto pb-5 ps-3">
                        <a href="/logout-staff"
                            class="text-decoration-none text-dark nav-link d-flex align-items-center">
                            <i class="bi bi-box-arrow-right me-2 fs-5"></i>
                            <p class="mb-0">Logout</p>
                        </a>
                    </div>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('content')
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="../js/admin/app.js"></script>
        @yield('scripts')
    </div>
</body>

</html>
