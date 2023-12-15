@extends('layouts.admin.default')

@section('content')
    <div class="container d-none" id="dashboard">
        <div class="row row-cols-1 row-cols-sm-2 pt-3">
            <div class="col">
                <div class="card border-0 card-dashboard mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex align-items-center justify-content-center justify-content-md-start">
                            <img src="{{ asset('storage/asset/images/admin/total-users.png') }}"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8 mt-2 mt-md-0 d-flex align-content-center justify-content-center flex-column">
                            <div>
                                <h5 class="card-title text-center">{{$user_count}}</h5>
                                <hr>
                                <h5 class="card-title text-center">Total Users</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 card-dashboard mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex align-items-center justify-content-center justify-content-md-start">
                            <img src="{{ asset('storage/asset/images/admin/total-users.png') }}"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8 mt-2 mt-md-0 d-flex align-content-center justify-content-center flex-column">
                            <div>
                                <h5 class="card-title text-center">{{$service_count}}</h5>
                                <hr>
                                <h5 class="card-title text-center">Total Services</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 card-dashboard mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex align-items-center justify-content-center justify-content-md-start">
                            <img src="{{ asset('storage/asset/images/admin/total-users.png') }}"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8 mt-2 mt-md-0 d-flex align-content-center justify-content-center flex-column">
                            <div>
                                <h5 class="card-title text-center">{{$booking_count}}</h5>
                                <hr>
                                <h5 class="card-title text-center">Total Books</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 card-dashboard mb-3">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex align-items-center justify-content-center justify-content-md-start">
                            <img src="{{ asset('storage/asset/images/admin/total-users.png') }}"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8 mt-2 mt-md-0 d-flex align-content-center justify-content-center flex-column">
                            <div>
                                <h5 class="card-title text-center">{{$review_count}}</h5>
                                <hr>
                                <h5 class="card-title text-center">Review</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-none" id="users">
        <form id="searchUsersForm" class="d-flex align-items-center mb-3 mt-3 mt-lg-0">
            <input type="text" id="searchUsers" name="searchUsers" placeholder="Search Name" class="form-control me-2">
            <input class="btn btn-outline-dark" type="submit" value="SEARCH" id="button-addon2"></input>
        </form>
        <div class="text-end mb-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddUser">
                <strong>Add User</strong>
            </button>
        </div>
        <table class="table table-bordered" id="usersTable">
            <thead>
                <tr>
                    <th scope="col-2" onclick="sortTable(0, 'usersTable')">No <i class="bi bi-arrow-down-up"></i></th>
                    <th scope="col" onclick="sortTable(1, 'usersTable')">Name <i class="bi bi-arrow-down-up"></i></th>
                    <th scope="col" onclick="sortTable(2, 'usersTable')">Email <i class="bi bi-arrow-down-up"></i></th>
                    <th scope="col" onclick="sortTable(3, 'usersTable')">No Telpon <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(4, 'usersTable')">Role <i class="bi bi-arrow-down-up"></i></th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="-show">
                <tr>
                    <td scope="row">1</td>
                    <td>Jeta</td>
                    <td>Jeta@email.com</td>
                    <td>088888888</td>
                    <td>Superduper admin</td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetailUser"
                            onclick ="showDetail()">
                            View Detail
                        </button>
                        <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalEditUser"
                            onclick ="showDetail()">
                            Edit
                        </button>
                        <button class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#modalBlockUser"
                            onclick ="showDetail()">
                            Block
                        </button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteUser"
                            onclick ="showDelete()">
                            Delete
                        </button>
                    </td>
                </tr>
                <tr>
                    <td scope="row">2</td>
                    <td>A</td>
                    <td>A@email.com</td>
                    <td>088888888</td>
                    <td>Admin</td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetailUser"
                            onclick ="showDetail()">
                            View Detail
                        </button>
                        <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalEditUser"
                            onclick ="showDetail()">
                            Edit
                        </button>
                        <button class="btn btn-warning text-white" data-bs-toggle="modal"
                            data-bs-target="#modalBlockUser" onclick ="showDetail()">
                            Block
                        </button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteUser"
                            onclick ="showDelete()">
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="modal fade" id="modalDetailUser" tabindex="-1" aria-labelledby="detailUser" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="detailUser">User Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="container-detail-">
                        <div class="container-fluid">
                            <div class="col-md">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <strong> Name</strong>: Test Detail
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Email: </strong>Jeta@gmail.com
                                    </li>
                                    <li class="list-group-item">
                                        <strong> City</strong>: Test Detail
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Gender: </strong>Gender
                                    </li>
                                    <li class="list-group-item"><strong> Date of Birth: </strong>Date</li>
                                    <li class="list-group-item">
                                        <strong> Phone Number: </strong>08888888888888
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Role: </strong>Superduper admin
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="editUser">Edit User Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="container-detail-">
                        <div class="container-fluid">
                            <div class="col-md">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <strong> Name</strong>: HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Email: </strong>HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> City</strong>: HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Gender: </strong>HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item"><strong> Date of Birth: </strong>HARUS GANTI FORM</li>
                                    <li class="list-group-item">
                                        <strong> Phone Number: </strong>HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Role: </strong>HARUS GANTI FORM
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalDeleteUser" tabindex="-1" aria-labelledby="ModalDeleteLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Delete Account</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="container-detail">
                        <h5>Are you sure want to delete this Account?</h5>
                        <div class="d-flex justify-content-center">
                            <a id="deleteButtonStudent" class="btn btn-outline-dark me-2">
                                <strong>Yes</strong>
                            </a>
                            <a class="btn btn-outline-dark" data-bs-dismiss="modal">
                                <strong>No</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="modalAddUser" class="modal fade">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Add Super Admin</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="registerForm" action="/register-super-admin">
                            @csrf
                            <div class="mb-3">
                                <label for="fn-register" class="form-label">Full Name</label>
                                <input type="Text" class="form-control form-login py-2" id="fn-register"
                                    placeholder="Your Name">
                            </div>
                            <div class="mb-3">
                                <label for="service-name" class="form-label">Service Name</label>
                                <select class="form-select form-login" aria-label="service-name">
                                    <option selected>Select Service</option>
                                    <option value="1">Toko A</option>
                                    <option value="2">Toko B</option>
                                    <option value="3">Toko C</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email-register" class="form-label">Email address</label>
                                <input type="email" class="form-control form-login py-2" id="email-register"
                                    placeholder="Input Your Email">
                            </div>
                            <div class="mb-3">
                                <label for="password-register" class="form-label">Create Password</label>
                                <input type="password" class="form-control form-login py-2" id="password-register"
                                    placeholder="Min. 8 characters and include special character">
                            </div>

                            <div class="mb-3">
                                <label for="password-reregister" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control form-login py-2" id="password-reregister"
                                    placeholder="Password">
                            </div>

                            <button type="submit" class="form-control btn-sign-in py-2">Register</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container d-none" id="services">
        <form id="searchUsersForm" class="d-flex align-items-center mb-3 mt-3 mt-lg-0">
            <input type="text" id="searchUsers" name="searchUsers" placeholder="Search Name"
                class="form-control me-2">
            <input class="btn btn-outline-dark" type="submit" value="SEARCH" id="button-addon2"></input>
        </form>

        <table class="table table-bordered" id="servicesTable">
            <thead>
                <tr>
                    <th scope="col-2" onclick="sortTable(0, 'servicesTable')">No <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(0, 'servicesTable')">Name <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(0, 'servicesTable')">Email <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col" onclick="sortTable(0, 'servicesTable')">No Telpon <i
                            class="bi bi-arrow-down-up"></i></th>
                    <th scope="col" onclick="sortTable(0, 'servicesTable')">Role <i class="bi bi-arrow-down-up"></i>
                    </th>
                    <th scope="col">Action <i class="bi bi-arrow-down-up"></i></th>
                </tr>
            </thead>
            <tbody id="-show">
                <tr>
                    <th scope="row">1</th>
                    <td>Jeta</td>
                    <td>Jeta@email.com</td>
                    <td>088888888</td>
                    <td>Superduper admin</td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetailUser"
                            onclick ="showDetail()">
                            View Detail
                        </button>
                        <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalEditUser"
                            onclick ="showDetail()">
                            Edit
                        </button>
                        <button class="btn btn-warning text-white" data-bs-toggle="modal"
                            data-bs-target="#modalBlockUser" onclick ="showDetail()">
                            Block
                        </button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteUser"
                            onclick ="showDelete()">
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="modal fade" id="modalDetailUser" tabindex="-1" aria-labelledby="detailUser" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="detailUser">User Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="container-detail-">
                        <div class="container-fluid">
                            <div class="col-md">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <strong> Name</strong>: Test Detail
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Email: </strong>Jeta@gmail.com
                                    </li>
                                    <li class="list-group-item">
                                        <strong> City</strong>: Test Detail
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Gender: </strong>Gender
                                    </li>
                                    <li class="list-group-item"><strong> Date of Birth: </strong>Date</li>
                                    <li class="list-group-item">
                                        <strong> Phone Number: </strong>08888888888888
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Role: </strong>Superduper admin
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="editUser">Edit User Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="container-detail-">
                        <div class="container-fluid">
                            <div class="col-md">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <strong> Name</strong>: HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Email: </strong>HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> City</strong>: HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Gender: </strong>HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item"><strong> Date of Birth: </strong>HARUS GANTI FORM</li>
                                    <li class="list-group-item">
                                        <strong> Phone Number: </strong>HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Role: </strong>HARUS GANTI FORM
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalDeleteUser" tabindex="-1" aria-labelledby="ModalDeleteLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Delete Account</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="container-detail">
                        <h5>Are you sure want to delete this Account?</h5>
                        <div class="d-flex justify-content-center">
                            <a id="deleteButtonStudent" class="btn btn-outline-dark me-2">
                                <strong>Yes</strong>
                            </a>
                            <a class="btn btn-outline-dark" data-bs-dismiss="modal">
                                <strong>No</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-none" id="reviews">
        <form id="searchUsersForm" class="d-flex align-items-center mb-3 mt-3 mt-lg-0">
            <input type="text" id="searchUsers" name="searchUsers" placeholder="Search Name"
                class="form-control me-2">
            <input class="btn btn-outline-dark" type="submit" value="SEARCH" id="button-addon2"></input>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col-2">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="-show">
                <tr>
                    <th scope="row">1</th>
                    <td>Jeta</td>
                    <td>Jeta@email.com</td>
                    <td>088888888</td>
                    <td>Superduper admin</td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetailUser"
                            onclick ="showDetail()">
                            View Detail
                        </button>
                        <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#modalEditUser"
                            onclick ="showDetail()">
                            Edit
                        </button>
                        <button class="btn btn-warning text-white" data-bs-toggle="modal"
                            data-bs-target="#modalBlockUser" onclick ="showDetail()">
                            Block
                        </button>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteUser"
                            onclick ="showDelete()">
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="modal fade" id="modalDetailUser" tabindex="-1" aria-labelledby="detailUser" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="detailUser">User Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="container-detail-">
                        <div class="container-fluid">
                            <div class="col-md">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <strong> Name</strong>: Test Detail
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Email: </strong>Jeta@gmail.com
                                    </li>
                                    <li class="list-group-item">
                                        <strong> City</strong>: Test Detail
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Gender: </strong>Gender
                                    </li>
                                    <li class="list-group-item"><strong> Date of Birth: </strong>Date</li>
                                    <li class="list-group-item">
                                        <strong> Phone Number: </strong>08888888888888
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Role: </strong>Superduper admin
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="editUser">Edit User Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="container-detail-">
                        <div class="container-fluid">
                            <div class="col-md">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <strong> Name</strong>: HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Email: </strong>HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> City</strong>: HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Gender: </strong>HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item"><strong> Date of Birth: </strong>HARUS GANTI FORM</li>
                                    <li class="list-group-item">
                                        <strong> Phone Number: </strong>HARUS GANTI FORM
                                    </li>
                                    <li class="list-group-item">
                                        <strong> Role: </strong>HARUS GANTI FORM
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalDeleteUser" tabindex="-1" aria-labelledby="ModalDeleteLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">Delete Account</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="container-detail">
                        <h5>Are you sure want to delete this Account?</h5>
                        <div class="d-flex justify-content-center">
                            <a id="deleteButtonStudent" class="btn btn-outline-dark me-2">
                                <strong>Yes</strong>
                            </a>
                            <a class="btn btn-outline-dark" data-bs-dismiss="modal">
                                <strong>No</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
