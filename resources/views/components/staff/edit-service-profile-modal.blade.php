<div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="editServiceModalHeader">Nice to see you again :)</h2>
                    <form method="POST" id="editServiceForm" action="/edit-service-profile"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="serviceName" class="form-label">Service Name</label>
                            <input type="Text"
                                class="form-control form-login py-2 @error('name') is-invalid  @enderror"
                                id="serviceName" placeholder="Service Name" name="name"
                                value="{{ old('name', $service->service_name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="serviceDesc" class="form-label">Service Description</label>
                            <textarea class="form-control form-login py-2 @error('description') is-invalid  @enderror" id="serviceDesc"
                                name="description" required>{{ old('description', $service->service_description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="serviceAddress" class="form-label">Service Address</label>
                            <textarea class="form-control form-login py-2 @error('address') is-invalid  @enderror" id="serviceAddress"
                                name="address" required>{{ old('address', $service->service_address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="servicePhone" class="form-label">Service Phone</label>
                            <input type="Text"
                                class="form-control form-login py-2 @error('phone') is-invalid  @enderror"
                                id="servicePhone" placeholder="Service Phone" name="phone"
                                value="{{ old('phone', $service->service_phone) }}" required>
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email"
                                class="form-control form-login py-2 @error('email') is-invalid  @enderror"
                                id="email" placeholder="Input Your Email" name="email"
                                value="{{ old('email', $service->service_email ?? '') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="serviceInstagram" class="form-label">Service Instagram</label>
                            <input type="Text"
                                class="form-control form-login py-2 @error('instagram') is-invalid  @enderror"
                                id="serviceInstagram" placeholder="Service Instagram" name="instagram"
                                value="{{ old('instagram', $service->service_instagram) }}">
                            @error('Instagram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="serviceOpenHours" class="form-label">Service Opening Hours</label>
                            <input type="Text"
                                class="form-control form-login py-2 @error('opening_hours') is-invalid  @enderror"
                                id="serviceOpenHours" placeholder="Monday - Sunday 10 AM - 9 PM" name="opening_hours"
                                value="{{ old('opening_hours', $service->service_opening_hours) }}" required>
                            @error('opening_hours')
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
                                        @if ($loop->iteration == old('city', $service->city_id)) selected @endif>
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
                            <label for="serviceLogo" class="form-label">Service Logo (Recommended 350px x 80px )</label>
                            <input class="form-control" type="file" id="serviceLogo" name="logo_image">
                            @error('logo_image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="serviceThumbnail" class="form-label">Service Thumbnail (Recommended
                                Landscape)</label>
                            <input class="form-control" type="file" id="serviceThumbnail" name="service_image">
                            @error('service_image')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="form-control btn-sign-in py-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
