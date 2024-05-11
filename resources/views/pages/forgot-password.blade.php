@extends('layouts.default')

@section('content')
    <div class="my-5 d-flex justify-content-center align-items-center">
        <div class="w-50 border rounded p-3">
            <h1>Forgot Password</h1>
            <div id="checkEmail">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control form-login py-2  @error('email') is-invalid  @enderror"
                        id="email" placeholder="Your Email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="invalid-feedback d-none" id="errorMessage">
                        Email doesn't exist, please check again.
                    </div>
                </div>
                <button class="confirmation-book-btn-book filter-btn" id="forgotPasswordBtn" type="button"
                    onclick="checkEmail()">
                    Forgot Password
                </button>
            </div>
            <div id="securityQuestion" class="d-none">
                <p id="question"></p>
                <div class="mb-3">
                    <label for="answer" class="form-label">Answer</label>
                    <input type="hidden" name="user_id" id="user_id">
                    <input type="answer" class="form-control form-login py-2  @error('answer') is-invalid  @enderror"
                        id="answer" placeholder="Your answer" name="answer" value="{{ old('answer') }}" required>
                    @error('answer')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="invalid-feedback d-none" id="errorAnswerMessage">
                        Your Answer is incorrect. Please try again. (Case Sensitive)
                    </div>
                </div>
                <button class="confirmation-book-btn-book filter-btn" id="forgotPasswordBtn" type="button"
                    onclick="checkAnswer()">
                    Submit
                </button>
            </div>
            <div id="changePassword" class="d-none">
                <form method="POST" id="editPasswordForm" action="/edit-password">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="acc_id" id="acc_id" value="{{ old('acc_id') }}">
                    <div class="mb-3">
                        <label for="passwordNew" class="form-label">New Password</label>
                        <input type="password"
                            class="form-control form-login py-2 @error('new_password') is-invalid  @enderror"
                            id="passwordNew" placeholder="Min. 8 characters" name="new_password" required>
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
                            id="passwordReNew" placeholder="Min. 8 characters" name="confirm_password" required>
                        @error('confirm_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="confirmation-book-btn-book filter-btn py-2">Change Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="../js/forgotPass.js"></script>
    @if ($errors->any())
        {
        <script>
            changePassword.classList.remove('d-none');
            securityQuestion.classList.add('d-none');
            const checkEmailError = document.getElementById('checkEmail');
            checkEmailError.classList.add('d-none');
        </script>
        }
    @endif
@endsection
