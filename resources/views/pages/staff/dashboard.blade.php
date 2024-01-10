@extends('layouts.staff.default')

@section('content')
    <div class="container py-4">
        <h1>Dashboard</h1>
        <div class="row pt-4">
            <div class="col">
                <div class="rounded border d-flex flex-row align-items-center py-4 px-3 bg-white">
                    <img src="{{ asset('storage/asset/icon/people.svg') }}" alt="" class="me-3">
                    <div class="flex flex-column">
                        <p class="mb-0 text-secondary">
                            <strong>
                                Total Employees
                            </strong>
                        </p>
                        <p class="mb-0 fs-4"><strong>{{ count($employees) == 0 ? 0 : count($employees) }} Peoples</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="rounded border d-flex flex-row align-items-center py-4 px-3 bg-white">
                    <img src="{{ asset('storage/asset/icon/calender.svg') }}" alt="" class="me-3">
                    <div class="flex flex-column">
                        <p class="mb-0 text-secondary">
                            <strong>
                                Total Bookings
                            </strong>
                        </p>
                        <p class="mb-0 fs-4"><strong>{{ count($bookings) == 0 ? 0 : count($bookings) }} Bookings
                            </strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="rounded border d-flex flex-row align-items-center py-4 px-3 bg-white">
                    <img src="{{ asset('storage/asset/icon/star.svg') }}" alt="" class="me-3">
                    <div class="flex flex-column">
                        <p class="mb-0 text-secondary">
                            <strong>
                                Average Rating
                            </strong>
                        </p>
                        <p class="mb-0 fs-4"><strong>{{ $avg_rating == null ? 0 : $avg_rating }} / 5</strong></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="rounded border d-flex flex-row align-items-center py-4 px-3 bg-white">
                    <img src="{{ asset('storage/asset/icon/reviews.svg') }}" alt="" class="me-3">
                    <div class="flex flex-column">
                        <p class="mb-0 text-secondary">
                            <strong>
                                Total Review(s)
                            </strong>
                        </p>
                        <p class="mb-0 fs-4"><strong>{{ $total_review }} Review(s)</strong></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-6">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h3>Employee List</h3>
                    <a href="/staff-employee" class="text-decoration-none ">Manage Employee</a>
                </div>
                <table class="table table-bordered rounded" id="employeesTable">
                    <thead class="rounded-top">
                        <tr>
                            <th scope="col-2" onclick="sortTable(0, 'employeesTable')">No <i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                            <th scope="col" onclick="sortTable(1, 'employeesTable')">Name <i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                            <th scope="col" onclick="sortTable(2, 'employeesTable')">Email <i
                                    class="bi bi-arrow-down-up"></i></th>
                            <th scope="col" onclick="sortTable(3, 'employeesTable')">No Telpon <i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                            <th scope="col" onclick="sortTable(4, 'employeesTable')">Role <i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="-show">
                        @foreach ($employees as $employee)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $employee->emp_name }}</td>
                                <td>{{ $employee->account->email }}</td>
                                <td>{{ $employee->emp_phone_number }}</td>
                                <td>{{ $employee->account->account_role }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h3>Booking List</h3>
                    <a href="/staff-booking" class="text-decoration-none ">Manage Booking</a>
                </div>
                <table class="table table-bordered rounded" id="bookingsTable">
                    <thead>
                        <tr>
                            <th scope="col-2" onclick="sortTable(0, 'bookingsTable')">No <i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                            <th scope="col" onclick="sortTable(1, 'bookingsTable')">Staff Name <i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                            <th scope="col" onclick="sortTable(2, 'bookingsTable')">Customer Name <i
                                    class="bi bi-arrow-down-up"></i></th>
                            <th scope="col" onclick="sortTable(3, 'bookingsTable')">Service Type<i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                            <th scope="col" onclick="sortTable(4, 'bookingsTable')">Date <i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="-show">
                        @foreach ($bookings as $booking)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $booking->bookingSlot->employee->emp_name }}</td>
                                <td>{{ $booking->user->user_name }}</td>
                                <td>{{ $booking->serviceType->st_name }}</td>
                                <td>{{ $booking->bookingSlot->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
