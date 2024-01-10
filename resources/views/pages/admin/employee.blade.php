@extends('layouts.admin.default')

@section('content')
    <div class="container pt-4">
        <h1>Manage Employee</h1>
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
        <table class="table table-bordered" id="manageEmployeeTable">
            <thead>
                <tr>
                    <th scope="col-2" onclick="sortTable(0, 'manageEmployeeTable')">No <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(2, 'manageEmployeeTable')">Name <i
                            class="bi bi-arrow-down-up"></i></th>
                    <th scope="col" onclick="sortTable(3, 'manageEmployeeTable')">Email <i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(1, 'manageEmployeeTable')">Service Name <i
                            class="bi bi-arrow-down-up"></i></th>
                    <th scope="col" onclick="sortTable(4, 'manageEmployeeTable')">Role <i
                            class="bi bi-arrow-down-up"></i></th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="-show">
                @foreach ($superAdmins as $superAdmin)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $superAdmin->sa_name }}</td>
                        <td>{{ $superAdmin->account->email }}</td>
                        <td>{{ $superAdmin->service->service_name }}</td>
                        <td>{{ $superAdmin->account->account_role }}</td>
                        <td>
                            <button class="my-1 btn btn-info text-white" data-bs-toggle="modal"
                                data-bs-target="#editAdminPasswordModal{{ $loop->iteration }}" type="button">
                                Edit Password
                            </button>
                        </td>
                    </tr>
                    @include('components.admin.edit-admin-password')
                @endforeach
                @foreach ($employees as $employee)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $employee->emp_name }}</td>
                        <td>{{ $employee->account->email }}</td>
                        <td>{{ $employee->service->service_name }}</td>
                        <td>{{ $employee->account->account_role }}</td>
                        <td>
                            <a class="my-1 btn btn-primary" href="/admin-employee-profile/{{ $employee->emp_id }}">
                                View Detail
                            </a>
                            <button class="my-1 btn btn-warning text-white" data-bs-toggle="modal"
                                data-bs-target="#editRoleModal{{ $loop->iteration }}" type="button">
                                Edit Role
                            </button>
                            <button class="my-1 btn btn-info text-white" data-bs-toggle="modal"
                                data-bs-target="#editEmployeePasswordModal{{ $loop->iteration }}" type="button">
                                Edit Password
                            </button>
                            <form action="/delete-employee/{{ $employee->emp_id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="my-1 btn btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @include('components.staff.edit-employee-password')
                    @include('components.staff.edit-role-modal')
                @endforeach
            </tbody>
        </table>
    </div>
    @include('components.admin.filter-employee-modal')
    @include('components.staff.info-toast')
@endsection

@section('scripts')
    <script src="../js/admin/employee.js"></script>
    @if (session('successChangePassword'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = 'The password has been changed successfully!'
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('successChangeRole'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = 'The role has been changed successfully!'
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('successDeleteEmployee'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = 'The employee has been deleted successfully!'
                toastBootstrap.show();
            });
        </script>
    @endif
@endsection
