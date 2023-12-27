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
            <div class="row w-100 p-3 py-5">
                <div class="col-4">
                    <img src="{{ asset('storage/asset/images/logo-white.png') }}" alt="" class="w-75 py-3">
                    <p>Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> BeautiFind. All rights reserved
                    </p>
                    <div class="row" style="width: fit-content;">
                        <i class="bi bi-instagram col"></i>
                        <i class="bi bi-twitter-x col"></i>
                    </div>
                </div>
                <div class="col-2">
                    <h5 class="py-2">Services</h5>
                    @foreach ($serviceTypes as $serviceType)
                        @if ($loop->iteration < 5)
                            <a href="/services?type%5B%5D={{ $serviceType->st_id }}"
                                class="text-decoration-none text-white d-block mb-2">{{ $serviceType->st_name }}</a>
                        @endif
                    @endforeach
                    <a href="/services" class="text-decoration-none text-white d-block mb-2">Other</a>
                </div>
                <div class="col-2">
                    <h5 class="py-2">Quick Links</h5>
                    <a href="/about" class="d-block text-decoration-none text-white mb-2">About us</a>
                    <a href="/faq" class="d-block text-decoration-none text-white mb-2">FAQ</a>
                </div>
                <div class="col-4 py-2">
                    <h5>Stay up to date</h5>
                    <div class="input-group w-75">
                        <input type="email" name="email-footer" id="email-footer" class="form-control"
                            placeholder="Your email address">
                        <button class="bg-white form-control" style="width: fit-content; flex:unset;" type="button"
                            id="button-addon2"><i class="bi bi-send"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
