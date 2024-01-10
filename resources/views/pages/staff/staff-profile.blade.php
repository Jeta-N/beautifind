@extends('layouts.staff.default')

@section('content')
    <div class="container pt-4">
        <h1>{{ $employee->emp_name }} Profile</h1>
        <form action="/edit-staff-profile" method="POST" class="pt-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-8">
                    <div class="mb-3">
                        <label for="fnProfile" class="form-label">Full Name</label>
                        <input type="Text" class="form-control form-login py-2  @error('username') is-invalid  @enderror"
                            id="fnProfile" placeholder="Your Name" value="{{ old('username', $employee->emp_name) }}"
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
                            value="{{ old('email', $employee->account->email) }}" name="email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phoneProfile" class="form-label">Phone Number</label>
                        <input type="text"
                            class="form-control form-login py-2  @error('phone_number') is-invalid  @enderror"
                            id="phoneProfile" placeholder="Input Your Phone Number"
                            value="{{ old('phone_number', $employee->emp_phone_number) }}" name="phone_number">
                        @error('phone_number')
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
                                    {{ $employee->emp_gender == 'Female' ? 'selected' : '' }}>Female
                                </option>
                                <option class=" @error('gender') is-invalid  @enderror" value="Male"
                                    {{ $employee->emp_gender == 'Male' ? 'selected' : '' }}>Male</option>
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
                                        data-default-date="{{ $employee->emp_birthdate }}" name="date">
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
                                            {{ substr($employee->emp_birthdate, 5, 2) == '01' ? 'selected' : '' }}>January
                                        </option>
                                        <option value="02" @error('month') class="is-invalid"  @enderror
                                            {{ substr($employee->emp_birthdate, 5, 2) == '02' ? 'selected' : '' }}>February
                                        </option>
                                        <option value="03" @error('month') class="is-invalid"  @enderror
                                            {{ substr($employee->emp_birthdate, 5, 2) == '03' ? 'selected' : '' }}>March
                                        </option>
                                        <option value="04" @error('month') class="is-invalid"  @enderror
                                            {{ substr($employee->emp_birthdate, 5, 2) == '04' ? 'selected' : '' }}>April
                                        </option>
                                        <option value="05" @error('month') class="is-invalid"  @enderror
                                            {{ substr($employee->emp_birthdate, 5, 2) == '05' ? 'selected' : '' }}>May
                                        </option>
                                        <option value="06" @error('month') class="is-invalid"  @enderror
                                            {{ substr($employee->emp_birthdate, 5, 2) == '06' ? 'selected' : '' }}>June
                                        </option>
                                        <option value="07" @error('month') class="is-invalid"  @enderror
                                            {{ substr($employee->emp_birthdate, 5, 2) == '07' ? 'selected' : '' }}>July
                                        </option>
                                        <option value="08" @error('month') class="is-invalid"  @enderror
                                            {{ substr($employee->emp_birthdate, 5, 2) == '08' ? 'selected' : '' }}>August
                                        </option>
                                        <option value="09" @error('month') class="is-invalid"  @enderror
                                            {{ substr($employee->emp_birthdate, 5, 2) == '09' ? 'selected' : '' }}>
                                            September
                                        </option>
                                        <option value="10" @error('month') class="is-invalid"  @enderror
                                            {{ substr($employee->emp_birthdate, 5, 2) == '10' ? 'selected' : '' }}>October
                                        </option>
                                        <option value="11" @error('month') class="is-invalid"  @enderror
                                            {{ substr($employee->emp_birthdate, 5, 2) == '11' ? 'selected' : '' }}>November
                                        </option>
                                        <option value="12" @error('month') class="is-invalid"  @enderror
                                            {{ substr($employee->emp_birthdate, 5, 2) == '12' ? 'selected' : '' }}>December
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
                </div>
                <div class="col-4">
                    <p><strong>Profile Picture:</strong></p>
                    <img src="{{ asset('storage/asset/images/profile-picture/' . $employee->emp_image_path) }}"
                        alt="" class="w-100">
                    <div class="my-3">
                        <label for="profilePicture">Edit Profile Picture</label>
                        <input class="form-control" type="file" id="profilePicture" name="profile_picture">
                        @error('profile_picture')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button class="profile-save-btn filter-btn" type="submit">Save</button>
            </div>
        </form>
    </div>
    @include('components.staff.info-toast')
@endsection

@section('scripts')
    @if (session('successEditProfile'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = 'The profile successfully edited!'
                toastBootstrap.show();
            });
        </script>
    @endif
@endsection
