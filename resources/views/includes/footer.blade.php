<div class="bg-footer text-white full-width">
    <div class="container">
        <div class="d-flex d-md-none align-items-center flex-column p-2">
            <div class="text-center">
                <img src="{{ asset('storage/asset/images/logo-white.png') }}" alt="" class="w-75">
            </div>
            <div>
                <p class="mb-0">Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> BeautiFind. All rights reserved
                </p>
            </div>
        </div>
    </div>
    <div class="d-none d-md-flex">
        <div class="container">
            <div class="row w-100 p-3 py-5 justify-content-between">
                <div class="col-4">
                    <img src="{{ asset('storage/asset/images/logo-white.png') }}" alt="" class="w-75 py-3">
                    <p>Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> BeautiFind. All rights reserved
                    </p>
                    <div class="row" style="width: fit-content;">
                        <a href="https://www.instagram.com/" class="col text-white text-decoration-none"><i
                                class="bi bi-instagram"></i></a>
                        <a href="https://twitter.com/?lang=en" class="col text-white text-decoration-none"><i
                                class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row justify-content-end">
                        <div class="col-5 d-flex flex-row justify-content-end">
                            <div>
                                <h5 class="py-2">Services</h5>
                                @foreach ($serviceTypes as $serviceType)
                                    @if ($loop->iteration < 5)
                                        <a href="/services?type%5B%5D={{ $serviceType->st_id }}"
                                            class="text-decoration-none text-white d-block mb-2">{{ $serviceType->st_name }}</a>
                                    @endif
                                @endforeach
                                <a href="/services" class="text-decoration-none text-white d-block mb-2">Other</a>
                            </div>
                        </div>
                        <div class="col-5 d-flex flex-row justify-content-end">
                            <div>
                                <h5 class="py-2">Quick Links</h5>
                                <a href="/about" class="d-block text-decoration-none text-white mb-2">About us</a>
                                <a href="/faq" class="d-block text-decoration-none text-white mb-2">FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
