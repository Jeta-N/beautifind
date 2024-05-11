@extends('layouts.admin.default')

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
                                Total Users
                            </strong>
                        </p>
                        <p class="mb-0 fs-4"><strong>{{ count($users) }} Users</strong>
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
                                Total Services
                            </strong>
                        </p>
                        <p class="mb-0 fs-4"><strong>{{ count($services) }} Services
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
                                Total Employees
                            </strong>
                        </p>
                        <p class="mb-0 fs-4"><strong>{{ $employees }} Employees</strong></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="rounded border d-flex flex-row align-items-center py-4 px-3 bg-white">
                    <img src="{{ asset('storage/asset/icon/reviews.svg') }}" alt="" class="me-3">
                    <div class="flex flex-column">
                        <p class="mb-0 text-secondary">
                            <strong>
                                Total Bookings
                            </strong>
                        </p>
                        <p class="mb-0 fs-4"><strong>{{ $bookings }} Bookings</strong></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-6">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h3>User List</h3>
                    <a href="/admin-users" class="text-decoration-none ">Manage User</a>
                </div>
                <table class="table table-bordered rounded" id="usersTable">
                    <thead class="rounded-top">
                        <tr class="align-middle">
                            <th scope="col-2" onclick="sortTable(0, 'usersTable')">No <i class="bi bi-arrow-down-up"></i>
                            </th>
                            <th scope="col" onclick="sortTable(1, 'usersTable')">Name <i class="bi bi-arrow-down-up"></i>
                            </th>
                            <th scope="col" onclick="sortTable(2, 'usersTable')">Email <i
                                    class="bi bi-arrow-down-up"></i></th>
                            <th scope="col" onclick="sortTable(3, 'usersTable')">No Telp<i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="-show">
                        @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $user->user_name }}</td>
                                <td>{{ $user->account->email }}</td>
                                <td>{{ $user->user_phone_number ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h3>Service List</h3>
                    <a href="/admin-services" class="text-decoration-none ">Manage Service</a>
                </div>
                <table class="table table-bordered rounded" id="adminServicesTable">
                    <thead>
                        <tr class="align-middle">
                            <th scope="col-2" onclick="sortTable(0, 'adminServicesTable')">No<i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                            <th scope="col" onclick="sortTable(1, 'adminServicesTable')">Service Name<i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                            <th scope="col" onclick="sortTable(2, 'adminServicesTable')">Admin Name<i
                                    class="bi bi-arrow-down-up"></i></th>
                            <th scope="col" onclick="sortTable(3, 'adminServicesTable')">No Telp<i
                                    class="bi bi-arrow-down-up"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="-show">
                        @foreach ($services as $service)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $service->service_name }}</td>
                                <td>{{ $service->superAdmin->sa_name ?? '-' }}</td>
                                <td>{{ $service->service_phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
