<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="loginModalHeader">Nice to see you again :)</h2>
                    <div class="row bg-secondary-subtle p-1 rounded mx-0 my-4">
                        <button class="col btn bg-white border-0" id="signInBtn">
                            Sign in
                        </button>
                        <button class="col btn border-0" id="registerBtn">
                            Register
                        </button>
                    </div>

                    <div class="d-block" id="loginForm">
                        <form method="POST" class="d-block" id="loginForm" action="/login">
                            @csrf
                            <div class="mb-3">
                                <label for="email-login" class="form-label">Email address</label>
                                <input type="email" class="form-control form-login py-2" id="email-login" name='email' placeholder="Your Email" value="{{old('email')}}">
                                @error('email')
                                <div class="col-auto">
                                    <div class="card-text fs-6 mb-2 red-warning mt-1">
                                        {{ $message }}
                                    </div>
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-login" class="form-label">Password</label>
                                <input type="password" class="form-control form-login py-2" id="password-login" name='password' placeholder="Password">
                                @error('password')
                                <div class="col-auto">
                                    <div class="card-text fs-6 mb-2 red-warning mt-1">
                                        {{ $message }}
                                    </div>
                                </div>
                                @enderror
                                <a href="#" class="d-block text-end mt-2">Forgot Password?</a>
                            </div>
                            <button type="submit" class="form-control btn-sign-in py-2">Sign in</button>
                        </form>
                    </div>

                    <div class="d-none" id="registerForm">
                        <form method="POST" class="d-none" id="registerForm" action="/register">
                            @csrf
                            <div class="mb-3">
                                <label for="fn-register" class="form-label">Full Name</label>
                                <input type="Text" class="form-control form-login py-2" id="fn-register" placeholder="Your Name" name="name" value="{{old('name')}}">
                                @error('name')
                                <div class="col-auto">
                                    <div class="card-text fs-6 mb-2 red-warning mt-1">
                                        {{ $message }}
                                    </div>
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <select class="form-select form-login" aria-label="city" name="city">
                                    <option selected disabled hidden>Select your city</option>
                                    <option value="1">Jakarta</option>
                                    <option value="2">Bandung</option>
                                    <option value="3">Surabaya</option>
                                    <option value="4">Denpasar</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email-register" class="form-label">Email address</label>
                                <input type="email" class="form-control form-login py-2" id="email-register" placeholder="Input Your Email" name="reg_email" value="{{old('reg_email')}}">
                                @error('reg_email')
                                <div class="col-auto">
                                    <div class="card-text fs-6 mb-2 red-warning mt-1">
                                        {{ $message }}
                                    </div>
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-register" class="form-label">Create Password</label>
                                <input type="password" class="form-control form-login py-2" id="password-register" placeholder="Min. 8 characters" name="reg_password">
                                @error('reg_password')
                                <div class="col-auto">
                                    <div class="card-text fs-6 mb-2 red-warning mt-1">
                                        {{ $message }}
                                    </div>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-reregister" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control form-login py-2" id="password-reregister" placeholder="Password" name="reg_password_confirmation">
                                @error('reg_password_confirmation')
                                <div class="col-auto">
                                    <div class="card-text fs-6 mb-2 red-warning mt-1">
                                        {{ $message }}
                                    </div>
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="form-control btn-sign-in py-2">Register</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
