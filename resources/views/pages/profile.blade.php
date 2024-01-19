@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row py-3">
            <div class="col-3 ">
                <div class="border rounded p-4">
                    <h3 class="p-1">{{ $user->user_name }}</h3>
                    <hr>
                    <p class="cursor-pointer profile-tab bg-secondary-subtle p-1 rounded" id="personalData">My
                        Profile</p>
                    <p class="cursor-pointer profile-tab p-1 rounded" id="myOrder">View My Bookings</p>
                    <p class="cursor-pointer profile-tab p-1 rounded" id="editPreferences">Edit My
                        Preferences
                    </p>
                    <hr>
                    <a class="p-1 cursor-pointer text-decoration-none text-black" href="/logout">Log Out</a>
                </div>
            </div>
            <div class="col-9">
                @include('components.profile.personal-data')
                @include('components.profile.my-order')
                @include('components.profile.edit-preference')
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="./js/profile.js"></script>
    @if ($errors->any() || session('errorPassword'))
        <script>
            const btnChangePass = document.getElementById('btnChangePassword');
            btnChangePass.click();
        </script>
    @endif
@endsection
