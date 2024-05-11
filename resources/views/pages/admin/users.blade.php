@extends('layouts.admin.default')

@section('content')
    <div class="container pt-4">
        <h1>Manage Users</h1>
        <div class="d-flex flex-row w-100 pt-4">
            <form id="searchUsersForm" class="d-flex align-items-center mb-3 mt-3 mt-lg-0 w-75">
                <input type="text" id="searchUsers" name="name" placeholder="Search Name" class="form-control me-2">
                <input class="btn border border-dark" type="submit" value="SEARCH" id="button-addon2"></input>
            </form>
        </div>
        <table class="table table-bordered" id="manageUsersTable">
            <thead>
                <tr class="align-middle">
                    <th scope="col-2" onclick="sortTable(0, 'manageUsersTable')">No <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(1, 'manageUsersTable')">Name <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(2, 'manageUsersTable')">Gender <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(3, 'manageUsersTable')">Email <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(4, 'manageUsersTable')">Phone Number<i
                            class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(5, 'manageUsersTable')">Status <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="-show">
                @foreach ($users as $user)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->user_gender ?? '-' }}</td>
                        <td>{{ $user->account->email }}</td>
                        <td>{{ $user->user_phone_number ?? '-' }}</td>
                        <td>{{ $user->account->is_blocked == true ? 'Blocked' : 'Active' }}</td>
                        <td>
                            <a class="my-1 btn btn-primary" href="/user-profile/{{ $user->user_id }}">
                                View Detail
                            </a>
                            <button class="my-1 btn btn-info text-white" data-bs-toggle="modal"
                                data-bs-target="#editUserPasswordModal{{ $user->user_id }}" type="button">
                                Edit Password
                            </button>
                            <form action="/block-user/{{ $user->account->account_id }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button class="my-1 btn btn-warning text-white" type="submit">
                                    {{ $user->account->is_blocked == true ? 'Unblock' : 'Block' }}
                                </button>
                            </form>
                            <form action="/delete-user/{{ $user->user_id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="my-1 btn btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @include('components.admin.edit-user-password')
                @endforeach
            </tbody>
        </table>
    </div>
    @include('components.staff.info-toast')
@endsection

@section('scripts')
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
    @if (session('successDeleteUser'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');
                toastBody.innerHTML = 'The user has been deleted successfully!'
                toastBootstrap.show();
            });
        </script>
    @endif
    @if (session('successBlockAccount'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');

                toastBody.innerHTML = "{!! addslashes(session('successBlockAccount')) !!}";
                toastBootstrap.show();
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const informationToast = document.getElementById(
                    'informationToast')
                const toastBootstrap = new bootstrap.Toast(informationToast);
                const toastBody = document.getElementById('toastBody');

                toastBody.innerHTML = "Failed to edit password, please check the form again!";
                toastBootstrap.show();

                const editModal = document.getElementById('editUserPasswordModal' + {{ old('id') }});
                if (editModal) {
                    const modal = new bootstrap.Modal(editModal)
                    modal.show();
                }
            });
        </script>
    @endif
@endsection
