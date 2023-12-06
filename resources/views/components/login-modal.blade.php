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

                        <button type="submit" class="form-control btn-sign-in py-2">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
