@extends('layouts.admin.default')

@section('content')
    <div class="container pt-4">
        <h1>User Profile</h1>
        <div class="row pt-4">
            <div class="col-7">
                <p><strong>User Name: </strong><br>
                    {{ $user->user_name }}</p>
                <p><strong>User Email: </strong><br>
                    {{ $user->account->email }}</p>
                <p><strong>User Gender:</strong><br> {{ $user->user_gender ?? '-' }}</p>
                <p><strong>User Phone Number:</strong><br> {{ $user->user_phone_number ?? '-' }}</p>
                <p><strong>User Birthdate:</strong>
                    <br>{{ $user->user_birthdate == null ? '-' : \Carbon\Carbon::parse($user->user_birthdate)->format('j F Y') }}
                </p>
                <p><strong>User Service Type:</strong><br>
                    @foreach ($user->userServiceType as $userServiceType)
                        <span class="pe-2">{{ $userServiceType->serviceType->st_name }}</span>
                        @if (!$loop->last)
                            &#8226; {{-- bullet --}}
                        @endif
                    @endforeach
                </p>
            </div>
            <div class="col-5">
                <p><strong>User Profile Picture:</strong></p>
                <div class="w-100">
                    <img src="{{ asset('storage/asset/images/dummy-salon-detail.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
