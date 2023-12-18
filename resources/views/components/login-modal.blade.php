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

                    <form method="POST" class="d-block" id="loginForm" action="/login">
                        @csrf
                        <div class="mb-3">
                            <label for="email-login" class="form-label">Email address</label>
                            <input type="email" class="form-control form-login py-2" id="email-login"
                                placeholder="Your Email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password-login" class="form-label">Password</label>
                            <input type="password" class="form-control form-login py-2" id="password-login"
                                placeholder="Password" name="password">
                            <a href="#" class="d-block text-end mt-2">Forgot Password?</a>
                        </div>
                        <button type="submit" class="form-control btn-sign-in py-2">Sign in</button>
                    </form>

                    <form method="POST" class="d-none" id="registerForm" action="/register">
                        @csrf
                        <div class="mb-3">
                            <label for="fn-register" class="form-label">Full Name</label>
                            <input type="Text" class="form-control form-login py-2" id="fn-register"
                                placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <select class="form-select form-login" aria-label="city">
                                <option selected>Select your city</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="3">Three</option>
                                <option value="3">Three</option>
                                <option value="3">Three</option>
                                <option value="3">Three</option>
                                <option value="3">Three</option>
                                <option value="3">Three</option>
                                <option value="3">Three</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email-register" class="form-label">Email address</label>
                            <input type="email" class="form-control form-login py-2" id="email-register"
                                placeholder="Input Your Email">
                        </div>
                        <div class="mb-3">
                            <label for="password-register" class="form-label">Create Password</label>
                            <input type="password" class="form-control form-login py-2" id="password-register"
                                placeholder="Min. 8 characters and include special character">
                        </div>

                        <div class="mb-3">
                            <label for="password-reregister" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control form-login py-2" id="password-reregister"
                                placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <p>I'm looking for ....</p>
                            <div class="row row-cols-3 mx-0">
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="checkbox" name="typePreferences"
                                        id="typePreferences1">
                                    <label class="form-check-label" for="typePreferences1">
                                        Hair Salon
                                    </label>
                                </div>
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="checkbox" name="typePreferences"
                                        id="typePreferences2">
                                    <label class="form-check-label" for="typePreferences2">
                                        Nail Salon
                                    </label>
                                </div>
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="checkbox" name="typePreferences"
                                        id="typePreferences3">
                                    <label class="form-check-label" for="typePreferences3">
                                        Brow & Lashes
                                    </label>
                                </div>
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="checkbox" name="typePreferences"
                                        id="typePreferences4">
                                    <label class="form-check-label" for="typePreferences4">
                                        Barbershop
                                    </label>
                                </div>
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="checkbox" name="typePreferences"
                                        id="typePreferences5">
                                    <label class="form-check-label" for="typePreferences5">
                                        Barbershop
                                    </label>
                                </div>
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="checkbox" name="typePreferences"
                                        id="typePreferences6">
                                    <label class="form-check-label" for="typePreferences6">
                                        Barbershop
                                    </label>
                                </div>
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="checkbox" name="typePreferences"
                                        id="typePreferences7">
                                    <label class="form-check-label" for="typePreferences7">
                                        Wellness & Spa
                                    </label>
                                </div>
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="checkbox" name="typePreferences"
                                        id="typePreferences8">
                                    <label class="form-check-label" for="typePreferences8">
                                        Wellness & Spa
                                    </label>
                                </div>
                                <div class="form-check col mb-3">
                                    <input class="form-check-input" type="checkbox" name="typePreferences"
                                        id="typePreferences9">
                                    <label class="form-check-label" for="typePreferences9">
                                        Wellness & Spa
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="form-control btn-sign-in py-2">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
