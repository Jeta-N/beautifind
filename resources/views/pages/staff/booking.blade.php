@extends('layouts.staff.default')

@section('content')
    <div class="container pt-4">
        <h1>Manage Booking</h1>
        <div class="d-flex flex-row w-100 pt-4">
            @if (Auth::user()->account_role != 'Staff')
                <form id="searchNameForm" class="d-flex align-items-center mb-3 mt-3 mt-lg-0 w-50">
                    <input type="text" id="searchNameBooking" name="name" placeholder="Search Employee Name"
                        class="form-control me-2">
                    <input class="btn border border-dark" type="submit" value="SEARCH" id="button-addon2"></input>
                </form>
            @endif
            <div class="text-end mb-2 ms-auto">
                <button class="btn border border-dark" data-bs-toggle="modal" data-bs-target="#filterBookingModal"
                    type="button">
                    <strong>Filter</strong>
                </button>
            </div>
        </div>
        <table class="table table-bordered" id="usersTable">
            <thead>
                <tr>
                    <th scope="col-2" onclick="sortTable(0, 'usersTable')">No <i class="bi bi-arrow-down-up"></i></th>
                    <th scope="col" onclick="sortTable(1, 'usersTable')">Employee Name<i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(2, 'usersTable')">Customer Name<i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(3, 'usersTable')">Customer Phone<i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(4, 'usersTable')">Service Type<i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(5, 'usersTable')">Date and Time<i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(6, 'usersTable')">Time End<i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(7, 'usersTable')">Status<i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="-show">
                @foreach ($bookings as $booking)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $booking->bookingSlot->employee->emp_name }}</td>
                        <td>{{ $booking->user->user_name }}</td>
                        <td>{{ $booking->user->user_phone_number }}</td>
                        <td>{{ $booking->serviceType->st_name }}</td>
                        <td>{{ $booking->bookingSlot->date }} {{ substr($booking->bookingSlot->time_start, 0, 5) }}</td>
                        <td>{{ substr($booking->bookingSlot->time_end, 0, 5) }}</td>
                        <td>{{ $booking->booking_status }}</td>
                        <td>
                            @if ($booking->booking_status == 'Upcoming')
                                <form action="/done-booking-employee/{{ $booking->booking_id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Done" id="hiddenStatusDone">
                                    <button class="btn btn-primary" type="submit">
                                        Done
                                    </button>
                                </form>
                                <form action="/cancel-booking-employee/{{ $booking->booking_id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="Cancelled" id="hiddenStatusCancelled">
                                    <button class="btn btn-danger mt-2" type="submit">
                                        Cancel
                                    </button>
                                </form>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('components.staff.filter-booking-modal')
@endsection

@section('scripts')
    <script src="../js/staff/booking.js"></script>
@endsection
