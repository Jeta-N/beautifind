@extends('layouts.staff.default')

@section('content')
    <div class="container pt-4">
        <h1>Manage Service Service Type</h1>
        <div class="d-flex flex-row w-100 pt-4">
            <div class="text-end mb-2 ms-auto">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceServiceTypeModal"
                    type="button">
                    <strong>Add Service Service Type</strong>
                </button>
            </div>
        </div>
        <table class="table table-bordered" id="manageServiceServiceTypeTable">
            <thead>
                <tr>
                    <th scope="col-2" onclick="sortTable(0, 'manageServiceServiceTypeTable')">No <i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(1, 'manageServiceServiceTypeTable')">Service Type <i
                            class="bi bi-arrow-down-up"></i></th>
                    <th scope="col" onclick="sortTable(2, 'manageServiceServiceTypeTable')">Duration (Minutes)<i
                            class="bi bi-arrow-down-up"></i></th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="-show">
                @foreach ($serviceServiceTypes as $serviceServiceType)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $serviceServiceType->serviceType->st_name }}</td>
                        <td>{{ $serviceServiceType->duration }} Min</td>
                        <td>
                            <form action="/delete-service-service-type/{{ $serviceServiceType->sst_id }}" method="POST"
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
    @include('components.staff.add-service-service-type-modal')
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
                toastBody.innerHTML = 'The service type has been added successfully!'
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
                    'Failed to add service type. The service type already exist, Delete the existing first!'
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('successDelete'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML =
                    'The service type has been deleted successfully!'
                toastBootstrap.show();
            });
        </script>
    @endif
@endsection
