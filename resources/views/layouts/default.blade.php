<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>

    <header class="fixed-top">
        @include('includes.header')
    </header>

    <main>
        @error('password')
            <div class="alert alert-danger alert-dismissible fade show alert-login" role="alert">
                Failed to login. Incorrect email and/or password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        @if (session('failedLogin'))
            <div class="alert alert-danger alert-dismissible fade show alert-login" role="alert">
                Failed to login. Incorrect email and/or password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('failedLoginBlocked'))
            <div class="alert alert-danger alert-dismissible fade show alert-login" role="alert">
                Your account has been Blocked, Contact customerhelp@beautifind.com for more detail.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('failedRegister'))
            <div class="alert alert-danger alert-dismissible fade show alert-login" role="alert">
                Failed to Register. Please check the form again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('successRegister'))
            <div class="alert alert-success alert-dismissible fade show alert-login" role="alert">
                Account registered successfully. Login Now.
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
    @yield('scripts')

    @if (session('failedLogin') || session('failedRegister'))
        <script>
            @if (session('failedRegister'))
                var registerBtn = document.getElementById('registerBtn');
                registerBtn.click();
            @endif

            const addModal = document.getElementById('loginModal');
            if (addModal) {
                const modal = new bootstrap.Modal(addModal)
                modal.show();
            }
        </script>
    @endif

</body>

</html>
