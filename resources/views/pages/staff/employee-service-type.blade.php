@extends('layouts.staff.default')

@section('content')
    <div class="container pt-4">
        <h1>Manage Employee Service Type</h1>
        <div class="d-flex flex-row w-100 pt-4">
            <form id="searchUsersForm" class="d-flex align-items-center mb-3 mt-3 mt-lg-0 w-75">
                <input type="text" id="searchUsers" name="name" placeholder="Search Name" class="form-control me-2">
                <input class="btn border border-dark" type="submit" value="SEARCH" id="button-addon2"></input>
            </form>
            <div class="text-end mb-2 ms-auto">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeServiceTypeModal"
                    type="button">
                    <strong>Add Employee Service Type</strong>
                </button>
            </div>
        </div>
        <table class="table table-bordered" id="manageEmployeeTable">
            <thead>
                <tr class="align-middle">
                    <th scope="col-2" onclick="sortTable(0, 'manageEmployeeTable')">No <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(1, 'manageEmployeeTable')">Name <i
                            class="bi bi-arrow-down-up"></i></th>
                    <th scope="col" onclick="sortTable(2, 'manageEmployeeTable')">Service Type <i
                            class="bi bi-arrow-down-up"></i></th>
                    <th scope="col" onclick="sortTable(3, 'manageEmployeeTable')">Price <i
                            class="bi bi-arrow-down-up"></i></th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="-show">
                @foreach ($employeeServiceTypes as $employeeServiceType)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $employeeServiceType->employee->emp_name }}</td>
                        <td>{{ $employeeServiceType->serviceType->st_name }}</td>
                        <td>Rp.{{ number_format($employeeServiceType->price, 0, ',') }} </td>
                        <td>
                            <form action="/delete-employee-service-type/{{ $employeeServiceType->est_id }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('components.staff.add-employee-service-type-modal')
    @include('components.staff.info-toast')
@endsection

@section('scripts')
    <script src="../js/staff/employee.js"></script>
    @if (session('successAdd'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = 'The employee service type has been added successfully!'
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('alreadyExist'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML =
                    'Failed to add employee service type. The employee service type already exist, Delete the existing first!'
                toastBootstrap.show();
            });
        </script>
    @endif
@endsection
