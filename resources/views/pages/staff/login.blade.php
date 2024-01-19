<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    <link rel="stylesheet" href="../css/staff/style.css">
</head>

<body class="p-0">
    <section class="vh-100">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-7">
                    <img src="{{ asset('storage/asset/images/staff/login-staff.png') }}" alt=""
                        class="w-100 vh-100">
                </div>
                <div class="col-5 d-flex align-items-center position-relative">
                    <div class="container w-75">
                        <div class="text-center logo-login">
                            <img src="{{ asset('storage/asset/images/logo.png') }}" alt="" class="w-75">
                        </div>
                        @if (session('failedLogin'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Failed to login. Incorrect email and/or password.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                    onclick="console.log('test')"></button>
                            </div>
                        @endif
                        @if (session('failedLoginBlocked'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Your account is blocked. Please contact your superior or customerhelp@beautifind.com.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                    onclick="console.log('test')"></button>
                            </div>
                        @endif
                        <h2 class="mb-5">Sign In</h2>
                        <form method="POST" class="d-block" id="loginStaffForm" action="/staff-login">
                            @csrf
                            <div class="mb-3">
                                <label for="email-login" class="form-label">Email address</label>
                                <input type="email"
                                    class="form-control form-login py-2  @error('email') is-invalid  @enderror"
                                    id="email-login" placeholder="Your Email" name="email" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-login" class="form-label">Password</label>
                                <input type="password"
                                    class="form-control form-login py-2 @error('password') is-invalid  @enderror"
                                    id="password-login" placeholder="Password" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="form-control btn-sign-in py-2">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>

</html>
