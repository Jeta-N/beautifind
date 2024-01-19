@extends('layouts.staff.default')

@section('content')
    <div class="container pt-4">
        <div class="d-flex sticky-top bg-body">
            <h1>Manage Booking Slot</h1>
            <div class=" ms-auto d-flex align-items-center">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookingSlotModal" type="button">
                    <strong>Add Booking Slot</strong>
                </button>
            </div>
        </div>
        <div class="d-flex flex-row w-100 pt-4">
            <form id="searchNameForm" class="d-flex align-items-center mb-3 mt-3 mt-lg-0 w-50">
                <input type="text" id="searchNameBooking" name="name" placeholder="Search Employee Name"
                    class="form-control me-2">
                <input class="btn border border-dark" type="submit" value="SEARCH" id="button-addon2"></input>
            </form>
            <div class="text-end mb-2 ms-auto">
                <button class="btn border border-dark" data-bs-toggle="modal" data-bs-target="#filterBookingModal"
                    type="button">
                    <strong>Filter</strong>
                </button>

            </div>
        </div>
        <table class="table table-bordered" id="bookingSlotTable">
            <thead>
                <tr class="align-middle">
                    <th scope="col-2" onclick="sortTable(0, 'bookingSlotTable')">No <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(1, 'bookingSlotTable')">Employee Name<i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(2, 'bookingSlotTable')">Date<i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(3, 'bookingSlotTable')">Time Start<i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(4, 'bookingSlotTable')">Time End<i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(5, 'bookingSlotTable')">Status<i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="bookingSlotTableBody">
                @foreach ($bookingSlots as $bookingSlot)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $bookingSlot->employee->emp_name }}</td>
                        <td>{{ $bookingSlot->date }}</td>
                        <td>{{ substr($bookingSlot->time_start, 0, 5) }}</td>
                        <td>{{ substr($bookingSlot->time_end, 0, 5) }}</td>
                        <td>{{ $bookingSlot->is_available != 0 ? 'Available' : 'Booked' }} </td>
                        <td>
                            @if ($bookingSlot->is_available != 0)
                                <form action="/delete-booking-slot/{{ $bookingSlot->bs_id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-danger" type="submit">
                                        Delete
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
    @include('components.staff.add-booking-slot-modal')
    @include('components.staff.filter-booking-slot-modal')
    @include('components.staff.info-toast')
@endsection

@section('scripts')
    <script src="../js/staff/bookingSlot.js"></script>
    @if (session('errorDeleteBookingSlot'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = "Can't delete the booking slot, the booking slot is reserved"
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('successCreateBookingSlot'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = "The booking slot has been added successfully!"
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('failedCreateBookingSlot'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = "Failed to create all of the booking slots, some schedules is clashing!"
                toastBootstrap.show();
            });
        </script>
    @endif
@endsection
