@extends('layouts.admin.default')

@section('content')
    <div class="container pt-4">
        <div class="d-flex sticky-top bg-body">
            <h1>Manage Service</h1>
            <div class=" ms-auto d-flex align-items-center">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal" type="button">
                    <strong>Add Super Admin</strong>
                </button>
            </div>
        </div>
        <div class="d-flex flex-row w-100 pt-4">
            <form id="searchUsersForm" class="d-flex align-items-center mb-3 mt-3 mt-lg-0 w-75">
                <input type="text" id="searchUsers" name="name" placeholder="Search Name" class="form-control me-2">
                <input class="btn border border-dark" type="submit" value="SEARCH" id="button-addon2"></input>
            </form>
            <div class="text-end mb-2 ms-auto">
                <button class="btn border border-dark" data-bs-toggle="modal" data-bs-target="#filterServiceModal"
                    type="button">
                    <strong>Filter</strong>
                </button>
            </div>
        </div>
        <table class="table table-bordered" id="manageServiceTable">
            <thead>
                <tr class="align-middle">
                    <th scope="col-2" onclick="sortTable(0, 'manageServiceTable')">No <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(1, 'manageServiceTable')">Service Name <i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(2, 'manageServiceTable')">No Telpon <i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(3, 'manageServiceTable')">Email Name <i
                            class="bi bi-arrow-down-up"></i></th>
                    <th scope="col" onclick="sortTable(4, 'manageServiceTable')">City<i class="bi bi-arrow-down-up"></i>
                    <th scope="col" onclick="sortTable(5, 'manageServiceTable')">Status<i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="service-list">
                @foreach ($services as $service)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $service->service_name }}</td>
                        <td>{{ $service->service_phone ?? '-' }}</td>
                        <td>{{ $service->service_email ?? '-' }}</td>
                        <td>{{ $service->city->city_name }}</td>
                        <td>{{ $service->is_active == true ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a class="my-1 btn btn-primary" href="/admin-service-profile/{{ $service->service_id }}">
                                View Detail
                            </a>
                            <form action="/delete-service/{{ $service->service_id }}" method="POST" class="d-inline">
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
    @include('components.admin.filter-service-modal')
    @include('components.admin.add-service-modal')
    @include('components.staff.info-toast')
@endsection

@section('scripts')
    <script src="../js/admin/service.js"></script>
    @if (session('successDeleteService'))
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
