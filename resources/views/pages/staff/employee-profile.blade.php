@extends('layouts.staff.default')

@section('content')
    <div class="container pt-4">
        <h1>Employee Profile</h1>
        <div class="row pt-4">
            <div class="col-8">
                <p><strong>Employee Name: </strong><br>
                    {{ $employee->emp_name }}</p>
                <p><strong>Employee Email: </strong><br>
                    {{ $employee->account->email }}</p>
                <p><strong>Employee Gender:</strong><br> {{ $employee->emp_gender ?? '-' }}</p>
                <p><strong>Employee Phone Number:</strong><br> {{ $employee->emp_phone_number ?? '-' }}</p>
                <p><strong>Employee Birthdate:</strong>
                    <br>{{ $employee->emp_birthdate == null ? '-' : \Carbon\Carbon::parse($employee->emp_birthdate)->format('j F Y') }}
                </p>
                <p><strong>Employee Service Type:</strong><br>
                    @foreach ($employee->employeeServiceType as $employeeServiceType)
                        <span class="pe-2">{{ $employeeServiceType->serviceType->st_name }}</span>
                        @if (!$loop->last)
                            &#8226; {{-- bullet --}}
                        @endif
                    @endforeach
                    @if ($employee->employeeServiceType->count() == 0)
                        -
                    @endif
                </p>
            </div>
            <div class="col-4">
                <p><strong>Employee Profile Picture:</strong></p>
                <div class="w-100">
                    <img src="{{ asset('storage/asset/images/profile-picture/' . $employee->emp_image_path) }}" alt=""
                        class="img-fluid">
                </div>
            </div>
        </div>
        <div class="mt-3">
            <hr>
            <h2>Booking History</h2>
            <table class="table table-bordered" id="bookingProfileTable">
                <thead>
                    <tr class="align-middle">
                        <th scope="col-2" onclick="sortTable(0, 'bookingProfileTable')">No <i
                                class="bi bi-arrow-down-up"></i>
                        </th>
                        <th scope="col" onclick="sortTable(1, 'bookingProfileTable')">Customer Name<i
                                class="bi bi-arrow-down-up"></i>
                        </th>
                        <th scope="col" onclick="sortTable(2, 'bookingProfileTable')">Customer Phone<i
                                class="bi bi-arrow-down-up"></i>
                        </th>
                        <th scope="col" onclick="sortTable(3, 'bookingProfileTable')">Service Type<i
                                class="bi bi-arrow-down-up"></i>
                        </th>
                        <th scope="col" onclick="sortTable(4, 'bookingProfileTable')">Date<i
                                class="bi bi-arrow-down-up"></i>
                        </th>
                        <th scope="col" onclick="sortTable(5, 'bookingProfileTable')">Time Start<i
                                class="bi bi-arrow-down-up"></i>
                        </th>
                        <th scope="col" onclick="sortTable(6, 'bookingProfileTable')">Time End<i
                                class="bi bi-arrow-down-up"></i>
                        </th>
                        <th scope="col" onclick="sortTable(7, 'bookingProfileTable')">Status<i
                                class="bi bi-arrow-down-up"></i>
                        </th>
                    </tr>
                </thead>
                <tbody id="bookingStaffProfile">
                    @foreach ($bookings as $booking)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $booking->user->user_name }}</td>
                            <td>{{ $booking->user->user_phone_number }}</td>
                            <td>{{ $booking->serviceType->st_name }}</td>
                            <td>{{ $booking->bookingSlot->date }}</td>
                            <td>{{ substr($booking->bookingSlot->time_start, 0, 5) }}</td>
                            <td>{{ substr($booking->bookingSlot->time_end, 0, 5) }}</td>
                            <td>{{ $booking->booking_status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
