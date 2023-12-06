<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beautifind</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/admin/style.css">
    {{-- Bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/1e820c1c1b.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <div class="nav-link sidebar-user active">
                                <div class="row">
                                    <div class="col-1 col-md-2 d-flex align-items-center">
                                        <i class="far fa-user-circle user-icon"></i>
                                    </div>
                                    <div class="col">Welcome Admin Jeta!</div>
                                </div>

                            </div>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <div class="nav-link active">
                                <button class="btn shadow-none" onclick="activeDashboard('dashboard')">
                                    <h4>Dashboard</h4>
                                </button>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link active">
                                <button class="btn shadow-none" onclick="activeDashboard('users')">
                                    <h4>View Users</h4>
                                </button>

                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link active">
                                <button class="btn shadow-none" onclick="activeDashboard('services')">
                                    <h4>View Services</h4>
                                </button>

                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="nav-link active">
                                <button class="btn shadow-none" onclick="activeDashboard('reviews')">
                                    <h4>View Review</h4>
                                </button>

                            </div>
                        </li>
                    </ul>
                    <hr>
                    <a onclick="logOut()" class="text-decoration-none log-out">
                        <div class="nav-link ">
                            LOG OUT <i class="fas fa-sign-out-alt"></i>
                        </div>
                    </a>

                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="h2" id="title-main"></div>
                    <div class="h2 mobile">Beautifind</div>
                    <div>
                        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <i class="bi bi-list"></i>
                        </button>
                    </div>
                </div>
                @yield('content')
            </main>

            <footer>

            </footer>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="./js/admin/app.js"></script>
</body>

</html>
