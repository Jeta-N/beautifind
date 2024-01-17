<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="position-absolute top-0 end-0 pt-3 pe-3 z-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 id="addEmployeeModalHeader">Add Employee</h2>
                    <form method="POST" id="addEmployeeForm" action="/create-employee">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email"
                                class="form-control form-login py-2 @error('email') is-invalid  @enderror"
                                id="email" placeholder="Input Employee Email" name="email"
                                value="{{ old('email') }}" required>
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
                            <label for="passwordConfirmation" class="form-label">Confirm Password</label>
                            <input type="password"
                                class="form-control form-login py-2 @error('password_confirmation') is-invalid  @enderror"
                                id="passwordConfirmation" placeholder="Confirm Your Password"
                                name="password_confirmation" required>
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="accountRole" class="form-label">Role</label>
                            <div class="row row-cols-2 mx-0">
                                <div class="form-check col mb-3">
                                    <input class="form-check-input @error('account_role') is-invalid  @enderror"
                                        type="radio" name="account_role" id="empRoleRadio1" value="Manager"
                                        @if (Auth::user()->account_role == 'Manager') disabled @endif
                                        @if (old('account_role') == 'Manager') checked @endif>
                                    <label class="form-check-label" for="empRoleRadio1">
                                        Manager
                                    </label>
                                </div>
                                <div class="form-check col mb-3">
                                    <input class="form-check-input @error('account_role') is-invalid  @enderror"
                                        type="radio" name="account_role" id="empRoleRadio2" value="Staff"
                                        @if (old('account_role') == 'Staff') checked @endif>
                                    <label class="form-check-label" for="empRoleRadio2">
                                        Staff
                                    </label>
                                </div>
                            </div>
                            @error('account_role')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="employeeName" class="form-label">Employee Name</label>
                            <input type="Text"
                                class="form-control form-login py-2 @error('name') is-invalid  @enderror"
                                id="employeeName" placeholder="Employee Name" name="name" value="{{ old('name') }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="genderProfile" class="form-label">Employee Gender</label>
                            <select class="form-select" id="genderProfile" name="gender" required>
                                <option value="">Choose Your Gender</option>
                                <option class=" @error('gender') is-invalid  @enderror" value="Female"
                                    @if (old('gender') == 'Female') selected @endif>
                                    Female
                                </option>
                                <option class=" @error('gender') is-invalid  @enderror" value="Male"
                                    @if (old('gender') == 'Male') selected @endif>Male</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phoneProfile" class="form-label">Employee Phone Number</label>
                            <input type="text"
                                class="form-control form-login py-2  @error('phone_number') is-invalid  @enderror"
                                id="phoneProfile" placeholder="Input Employee Phone Number"
                                value="{{ old('phone_number') }}" name="phone_number" required>
                            @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dateProfile" class="form-label">Employee Birthdate</label>
                            <div class="row">
                                <div class="col">
                                    <select class="form-select" id="dateProfile" name="date" required>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select" id="monthProfile" name="month" required>
                                        <option value="">Month</option>
                                        <option value="01" @error('month') class="is-invalid"  @enderror>January
                                        </option>
                                        <option value="02" @error('month') class="is-invalid"  @enderror>February
                                        </option>
                                        <option value="03" @error('month') class="is-invalid"  @enderror>March
                                        </option>
                                        <option value="04" @error('month') class="is-invalid"  @enderror>April
                                        </option>
                                        <option value="05" @error('month') class="is-invalid"  @enderror>May
                                        </option>
                                        <option value="06" @error('month') class="is-invalid"  @enderror>June
                                        </option>
                                        <option value="07" @error('month') class="is-invalid"  @enderror>July
                                        </option>
                                        <option value="08" @error('month') class="is-invalid"  @enderror>August
                                        </option>
                                        <option value="09" @error('month') class="is-invalid"  @enderror>September
                                        </option>
                                        <option value="10" @error('month') class="is-invalid"  @enderror>October
                                        </option>
                                        <option value="11" @error('month') class="is-invalid"  @enderror>November
                                        </option>
                                        <option value="12" @error('month') class="is-invalid"  @enderror>December
                                        </option>
                                    </select>
                                    @error('month')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <select class="form-select" id="yearProfile" name="year" required>
                                    </select>
                                    @error('year')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            @error('date')
                                <div class="invalid-feedback d-block">
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
