@extends('layouts.admin.default')

@section('content')
    <div class="container pt-4">
        <h1>Manage Reviews</h1>
        <div class="d-flex flex-row w-100 pt-4">
            <form id="searchUsersForm" class="d-flex align-items-center mb-3 mt-3 mt-lg-0 w-75">
                <input type="text" id="searchUsers" name="name" placeholder="Search Name" class="form-control me-2">
                <input class="btn border border-dark" type="submit" value="SEARCH" id="button-addon2"></input>
            </form>
            <div class="text-end mb-2 ms-auto">
                <button class="btn border border-dark" data-bs-toggle="modal" data-bs-target="#filterEmployeeModal"
                    type="button">
                    <strong>Filter</strong>
                </button>
            </div>
        </div>
        <table class="table table-bordered" id="manageUsersTable">
            <thead>
                <tr class="align-middle">
                    <th scope="col" onclick="sortTable(0, 'manageUsersTable')">No<i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(1, 'manageUsersTable')">Name<i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(2, 'manageUsersTable')">Service Name<i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(3, 'manageUsersTable')">Booking Id<i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(4, 'manageUsersTable')">Rating<i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(5, 'manageUsersTable')">Review <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="review-table">
                @foreach ($reviews as $review)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $review->user->user_name }}</td>
                        <td>{{ $review->service->service_name }}</td>
                        <td>{{ $review->booking->booking_id }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->review_content }}</td>
                        <td>
                            <form action="/delete-review/{{ $review->review_id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="my-1 btn btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('components.admin.filter-employee-modal', ['title' => 'Filter Review'])
    @include('components.staff.info-toast')
@endsection

@section('scripts')
    <script src="../js/admin/review.js"></script>
    @if (session('successDeleteReview'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = 'The review has been deleted successfully!'
                toastBootstrap.show();
            });
        </script>
    @endif
@endsection
