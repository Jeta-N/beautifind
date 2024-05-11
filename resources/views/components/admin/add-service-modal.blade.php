<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="addServiceModalHeader">Add Service</h2>
                    <form method="POST" id="addServiceForm" action="/create-service">
                        @csrf
                        <div class="mb-3">
                            <label for="service_name" class="form-label">Service Name</label>
                            <input type="text"
                                class="form-control form-login py-2 @error('service_name') is-invalid  @enderror"
                                id="service_name" placeholder="Input Service Name" name="service_name"
                                value="{{ old('service_name') }}" required>
                            @error('service_name')
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
                            <label for="name" class="form-label">Admin Name</label>
                            <input type="text"
                                class="form-control form-login py-2 @error('name') is-invalid  @enderror" id="name"
                                placeholder="Input Admin Name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Admin Email Address</label>
                            <input type="email"
                                class="form-control form-login py-2 @error('email') is-invalid  @enderror"
                                id="email" placeholder="Input Your Email" name="email" value="{{ old('email') }}"
                                required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Create Password</label>
                            <input type="password"
                                class="form-control form-login py-2 @error('password') is-invalid  @enderror"
                                id="password" placeholder="Min. 8 characters" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-reregister" class="form-label">Confirm Password</label>
                            <input type="password"
                                class="form-control form-login py-2 @error('password_confirmation') is-invalid  @enderror"
                                id="password-reregister" placeholder="Password" name="password_confirmation" required>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="form-control btn-sign-in py-2">Add Service</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
