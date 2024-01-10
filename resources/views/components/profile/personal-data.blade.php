<div id="personalDataActive" class="tab-content">
    <div class="border rounded p-4">
        <p class="fs-5 mb-3"><strong>Personal Data</strong></p>
        <div class="nav">
            <div class="nav-item me-4 cursor-pointer" onclick="toggleActiveProfile('accInfo')">
                <span id="accInfoText" style="color:#5E5946;">Account Information</span>
                <div class="rectangle-active" id="accInfoActive"></div>
            </div>
            <div class="nav-item cursor-pointer" onclick="toggleActiveProfile('passSec')">
                <span id="passSecText">Change Password</span>
                <div class="rectangle-active d-none" id="passSecActive"></div>
            </div>
        </div>
        <div id="accInfoContent" class="py-4">
            @if (session('successEditProfile'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('successEditProfile') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('successChangePassword'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('successChangePassword') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('errorPassword'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('errorPassword') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
            <form action="edit-profile" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="fnProfile" class="form-label">Full Name</label>
                    <input type="Text" class="form-control form-login py-2  @error('username') is-invalid  @enderror"
                        id="fnProfile" placeholder="Your Name" value="{{ old('username', $user->user_name) }}"
                        name="username">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="emailProfile" class="form-label">Email address</label>
                    <input type="email" class="form-control form-login py-2  @error('email') is-invalid  @enderror"
                        id="emailProfile" placeholder="Input Your Email"
                        value="{{ old('email', $user->account->email) }}" name="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phoneProfile" class="form-label">Phone Number</label>
                    <input type="text"
                        class="form-control form-login py-2  @error('phoneNumber') is-invalid  @enderror"
                        id="phoneProfile" placeholder="Input Your Phone Number"
                        value="{{ old('phoneNumber', $user->user_phone_number) }}" name="phoneNumber">
                    @error('phoneNumber')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <select class="form-select form-login" aria-label="city" name="city">
                        <option>Select your city</option>
                        @foreach ($cities as $city)
                            <option value="{{ $loop->iteration }}" class=" @error('city') is-invalid  @enderror"
                                {{ $user->city_id == $city->city_id ? 'selected' : '' }}>{{ $city->city_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-5">
                        <label for="genderProfile" class="form-label">Gender</label>
                        <select class="form-select" id="genderProfile" name="gender">
                            <option value="">Choose Your Gender</option>
                            <option class=" @error('gender') is-invalid  @enderror" value="Female"
                                {{ $user->user_gender == 'Female' ? 'selected' : '' }}>Female
                            </option>
                            <option class=" @error('gender') is-invalid  @enderror" value="Male"
                                {{ $user->user_gender == 'Male' ? 'selected' : '' }}>Male</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-7">
                        <div class="row">
                            <div class="col">
                                <label for="dateProfile" class="form-label">Birthdate</label>
                                <select class="form-select" id="dateProfile"
                                    data-default-date="{{ $user->user_birthdate }}" name="date">
                                </select>
                                @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="monthProfile" class="form-label opacity-0">month</label>
                                <select class="form-select" id="monthProfile" name="month">
                                    <option value="">Month</option>
                                    <option value="01" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '01' ? 'selected' : '' }}>January
                                    </option>
                                    <option value="02" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '02' ? 'selected' : '' }}>February
                                    </option>
                                    <option value="03" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '03' ? 'selected' : '' }}>March
                                    </option>
                                    <option value="04" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '04' ? 'selected' : '' }}>April
                                    </option>
                                    <option value="05" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '05' ? 'selected' : '' }}>May
                                    </option>
                                    <option value="06" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '06' ? 'selected' : '' }}>June
                                    </option>
                                    <option value="07" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '07' ? 'selected' : '' }}>July
                                    </option>
                                    <option value="08" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '08' ? 'selected' : '' }}>August
                                    </option>
                                    <option value="09" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '09' ? 'selected' : '' }}>September
                                    </option>
                                    <option value="10" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '10' ? 'selected' : '' }}>October
                                    </option>
                                    <option value="11" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '11' ? 'selected' : '' }}>November
                                    </option>
                                    <option value="12" @error('month') class="is-invalid"  @enderror
                                        {{ substr($user->user_birthdate, 5, 2) == '12' ? 'selected' : '' }}>December
                                    </option>
                                </select>
                                @error('month')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="yearProfile" class="form-label opacity-0">year</label>
                                <select class="form-select" id="yearProfile" name="year">
                                </select>
                                @error('year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button class="profile-save-btn" type="submit">Save</button>
                </div>
            </form>
        </div>
        <div id="passSecContent" class="d-none py-4">
            <form action="/change-password" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="passwordCurrent" class="form-label">Current Password</label>
                    <input type="password"
                        class="form-control form-login py-2 @error('old_password') is-invalid  @enderror @if (session('errorPassword')) is-invalid @endif"
                        id="passwordCurrent" placeholder="Enter Your Current Password" name="old_password" required>
                    @error('old_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @if (session('errorPassword'))
                        <div class="invalid-feedback">
                            {{ session('errorPassword') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="passwordNew" class="form-label">New Password</label>
                    <input type="password"
                        class="form-control form-login py-2 @error('new_password') is-invalid  @enderror"
                        id="passwordNew" placeholder="Min. 8 characters and include special character"
                        name="new_password" required>
                    @error('new_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="passwordReNew" class="form-label">Confirm New Password</label>
                    <input type="password"
                        class="form-control form-login py-2 @error('confirm_password') is-invalid  @enderror"
                        id="passwordReNew" placeholder="Min. 8 characters and include special character"
                        name="confirm_password" required>
                    @error('confirm_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="text-end">
                    <button class="profile-cancel-btn">
                        Cancel
                    </button>
                    <button class="profile-save-btn" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
