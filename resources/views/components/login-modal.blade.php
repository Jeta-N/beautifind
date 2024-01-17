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
                            <a href="/forgot-password" class="d-block text-end mt-2">Forgot Password?</a>
                        </div>
                        <button type="submit" class="form-control btn-sign-in py-2">Sign in</button>
                    </form>

                    <form method="POST" class="d-none" id="registerForm" action="/register">
                        @csrf
                        <div class="mb-3">
                            <label for="fn-register" class="form-label">Full Name</label>
                            <input type="Text"
                                class="form-control form-login py-2 @error('name') is-invalid  @enderror"
                                id="fn-register" placeholder="Your Name" name="name" value="{{ old('name') }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <select class="form-select form-login @error('city') is-invalid  @enderror"
                                aria-label="city" name="city" required>
                                <option value="">Select your city</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $loop->iteration }}"
                                        @if ($loop->iteration == old('city')) selected @endif>
                                        {{ $city->city_name }}</option>
                                @endforeach
                            </select>
                            @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email-register" class="form-label">Email address</label>
                            <input type="email"
                                class="form-control form-login py-2 @error('register_email') is-invalid  @enderror"
                                id="email-register" placeholder="Input Your Email" name="register_email"
                                value="{{ old('register_email') }}" required>
                            @error('register_email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password-register" class="form-label">Create Password</label>
                            <input type="password"
                                class="form-control form-login py-2 @error('register_password') is-invalid  @enderror"
                                id="password-register" placeholder="Min. 8 characters" name="register_password"
                                required>
                            @error('register_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-reregister" class="form-label">Confirm Password</label>
                            <input type="password"
                                class="form-control form-login py-2 @error('register_password_confirmation') is-invalid  @enderror"
                                id="password-reregister" placeholder="Password" name="register_password_confirmation"
                                required>
                            @error('register_password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <p>I'm looking for ....</p>
                            <div class="row row-cols-3 mx-0">
                                @foreach ($serviceTypes as $serviceType)
                                    <div class="form-check col mb-3">
                                        <input class="form-check-input @error('typePreferences') is-invalid  @enderror"
                                            type="checkbox" name="typePreferences[]"
                                            id="typePreferences{{ $loop->iteration }}"
                                            value="{{ $loop->iteration }}">
                                        <label class="form-check-label" for="typePreferences{{ $loop->iteration }}">
                                            {{ $serviceType->st_name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('typePreferences')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="question" class="form-label">Security Question</label>
                            <select class="form-select form-login @error('question') is-invalid  @enderror"
                                aria-label="question" name="question" required>
                                <option value="">Select your Question</option>
                                @foreach ($questions as $question)
                                    <option value="{{ $loop->iteration }}"
                                        @if ($loop->iteration == old('question')) selected @endif>
                                        {{ $question->sq_question }}</option>
                                @endforeach
                            </select>
                            @error('question')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Security Answer</label>
                            <input type="Text"
                                class="form-control form-login py-2 @error('answer') is-invalid  @enderror"
                                id="answer" placeholder="Input Your Security Answer" name="answer"
                                value="{{ old('answer') }}" required>
                            @error('answer')
                                <div class="invalid-feedback">
                                    {{ $message }}
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
