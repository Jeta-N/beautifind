@extends('layouts.admin.default')

@section('content')
    <div class="container pt-4">
        <h1>Employee Profile</h1>
        <div class="row pt-4">
            <div class="col-7">
                <p><strong>Employee Name: </strong><br>
                    {{ $employee->emp_name }}</p>
                <p><strong>Employee Email: </strong><br>
                    {{ $employee->account->email }}</p>
                <p><strong>Employee Gender:</strong><br> {{ $employee->emp_gender }}</p>
                <p><strong>Employee Phone Number:</strong><br> {{ $employee->emp_phone_number }}</p>
                <p><strong>Employee Birthdate:</strong>
                    <br>{{ \Carbon\Carbon::parse($employee->emp_birthdate)->format('j F Y') }}
                </p>
                <p><strong>Employee Service Type:</strong><br>
                    @foreach ($employee->employeeServiceType as $employeeServiceType)
                        <span class="pe-2">{{ $employeeServiceType->serviceType->st_name }}</span>
                        @if (!$loop->last)
                            &#8226; {{-- bullet --}}
                        @endif
                    @endforeach
                </p>
            </div>
            <div class="col-5">
                <p><strong>Employee Profile Picture:</strong></p>
                <div class="w-100">
                    <img src="{{ asset('storage/asset/images/dummy-salon-detail.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
