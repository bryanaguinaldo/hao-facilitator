@extends('layouts.base')

@section('headers')
<link href="../assets/css/datatable/datatable.css" rel="stylesheet" />
@endsection

@section('content')
<main>
    <div class="mt-2">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">All Users</h5>
                            </div>
                            <a href="#" type="button" class="btn bg-dark btn-sm mb-0 text-white" data-bs-toggle="modal" data-bs-target="#addUserModal"><span class="fa fa-plus"></span> &nbsp; New User</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-0">
                        <div class="table-responsive">
                            <div class="se-pre-con bg-white opacity-9"><span></span></div>
                            <table class="table align-items-center mb-0" id="manage-users-table">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Photo
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Username
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            First Name
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Last Name
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Health Facility
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Creation Date
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('modals')

<!-- Modal Add -->
<div class="col-md-6">
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModal" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Manage Users</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="card-header border-light">
                            <h5 class="font-weight-bolder mb-0">Create a New Account</h5>
                            <p class="mb-0 text-sm">Need reference for Facility IDs? <a href="{{ route('facilities') }}" target="_blank">Check them here!</a></p>
                            <form method="POST" id="addUserForm" role="form text-left">
                                <div class="row mt-3">
                                    @csrf
                                    <div class="col-12 col-sm-6">
                                        <label>Facility ID</label>
                                        <input class="multisteps-form__input form-control" name="facility" type="text" placeholder="Facility ID" />
                                        <span class="text-sm validation-error error-facility text-danger mb-0"></span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>First Name</label>
                                        <input class="multisteps-form__input form-control" name="firstname" type="text" placeholder="eg. Juan" />
                                        <span class="text-sm validation-error error-firstname text-danger mb-0"></span>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Last Name</label>
                                        <input class="multisteps-form__input form-control" type="text" name="lastname" placeholder="eg. Dela Cruz" />
                                        <span class="text-sm validation-error error-lastname text-danger mb-0"></span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Username</label>
                                        <input class="multisteps-form__input form-control" type="text" name="name" placeholder="eg. juandelacruz" />
                                        <span class="text-sm validation-error error-name text-danger mb-0"></span>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Email Address</label>
                                        <input class="multisteps-form__input form-control" type="email" name="email" placeholder="eg. juan_delacruz@gmail.com" />
                                        <span class="text-sm validation-error error-email text-danger mb-0"></span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Password</label>
                                        <input class="multisteps-form__input form-control" type="password" name="password" placeholder="••••••••" />
                                        <span class="text-sm validation-error error-password text-danger mb-0"></span>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Repeat Password</label>
                                        <input class="multisteps-form__input form-control" type="password" name="password_confirmation" placeholder="••••••••" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark text-white" form="addUserForm">Submit and Create Account</button>
                    <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="col-md-6">
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModal" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Manage Users</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="card-header border-light">
                            <h5 class="font-weight-bolder mb-0">Update Account Information</h5>
                            <p class="mb-0 text-sm">Need reference for Facility IDs? <a href="{{ route('facilities') }}" target="_blank">Check them here!</a></p>
                            <form method="POST" id="editUserForm" role="form text-left">
                                <div class="row mt-3">
                                    @csrf
                                    <div class="col-12 col-sm-6">
                                        <label>Facility ID</label>
                                        <input class="multisteps-form__input form-control" id="edit-facility" name="facility" type="text" placeholder="Facility ID" />
                                        <span class="text-sm edit-validation-error edit-error-facility text-danger mb-0"></span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>First Name</label>
                                        <input class="multisteps-form__input form-control" id="edit-firstname" name="firstname" type="text" placeholder="eg. Juan" />
                                        <span class="text-sm edit-validation-error edit-error-firstname text-danger mb-0"></span>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Last Name</label>
                                        <input class="multisteps-form__input form-control" type="text" id="edit-lastname" name="lastname" placeholder="eg. Dela Cruz" />
                                        <span class="text-sm edit-validation-error edit-error-lastname text-danger mb-0"></span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label>Username</label>
                                        <input class="multisteps-form__input form-control" type="text" id="edit-name" name="name" placeholder="eg. juandelacruz" />
                                        <span class="text-sm edit-validation-error edit-error-name text-danger mb-0"></span>
                                    </div>
                                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                        <label>Email Address</label>
                                        <input class="multisteps-form__input form-control" type="email" id="edit-email" name="email" placeholder="eg. juan_delacruz@gmail.com" />
                                        <span class="text-sm edit-validation-error edit-error-email text-danger mb-0"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark text-white" form="editUserForm">Update User Information</button>
                    <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModal" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Manage Users</h6>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="fa fa-trash text-danger fa-3x"></i>
                    <h4 class="text-gradient text-danger mt-4 font-weight-bolder">Confirm Deletion</h4>
                    <span class="text-md">Are you sure you want to delete this user?</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" id="confirm_delete">Yes</button>
                <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Restore -->
<div class="modal fade" id="restoreUserModal" tabindex="-1" role="dialog" aria-labelledby="restoreUserModal" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Manage Users</h6>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="fa fa-history text-warning fa-3x"></i>
                    <h4 class="text-gradient text-warning mt-4 font-weight-bolder">Confirm Restoration</h4>
                    <span class="text-md">Are you sure you want to restore this user?</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="click" class="btn btn-dark" id="confirm_restore">Yes</button>
                <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notify -->
<div class="position-fixed top-1 end-1 z-index-2">
    <div class="toast fade p-2 mt-2 bg-gradient-dark hide opacity-7" role="alert" aria-live="assertive" id="notification" aria-atomic="true">
        <div class="toast-header bg-transparent border-0 shadow">
            <i class="ni ni-bell-55 text-white me-2"></i>
            <span class="me-auto text-white font-weight-bold" id="toast_title"></span>
            <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close" aria-hidden="true"></i>
        </div>
        <hr class="horizontal light m-0">
        <div class="toast-body text-white" id="toast_body">
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Datatables -->
<script src="../assets/js/plugins/datatables.js"></script>
<script src="../assets/js/ajax/datatables.js"></script>
<script src="../assets/js/ajax/bootstrap-datatables.js"></script>
<!-- Additional scripts -->
<script src="../assets/js/dcf603d43fd35d493d63a.js"></script>
<script src="../assets/js/ajax/manage-users.js"></script>
<!-- AJAX -->
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $('#addUserModal').on('hidden.bs.modal', function () {
        $(this).find('#addUserForm').trigger('reset');
        $(this).find('#editUserForm').trigger('reset');
        $(this).find('span.validation-error').text('');
        alert('debug sa production haha');
    });

    $('#editUserModal').on('hidden.bs.modal', function () {
        $(this).find('#addUserForm').trigger('reset');
        $(this).find('#editUserForm').trigger('reset');
        $(this).find('span.validation-error').text('');
        alert('debug sa production haha');
    });

    var table = $('table').DataTable({
        processing: true,
        ordering: false,
        serverSide: true,
        autoWidth: false,
        autoHeight: false,
        responsive: true,
        pageResize: false,

        ajax: {
            url: "{{ route('manage_users') }}",
            error: function() {
                window.location.replace("{{ route('login') }}");
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'photo', name: 'photo'},
            {data: 'name', name: 'name'},
            {data: 'firstname', name: 'firstname'},
            {data: 'lastname', name: 'lastname'},
            {data: 'email', name: 'email'},
            {data: 'facility', name: 'facility'},
            {data: 'created_at', name: 'created_at'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        columnDefs: [
            {
                targets: ['_all'],
                className: 'text-xs font-weight-bold mb-0 text-center',
            },
        ],
    });

    $("table").on('click', '#edit', function (e) {
        e.preventDefault();

        let id = $(this).data('id');

        $.ajax({
            type: "POST",
            url: window.location.href + "/edit/" + id,
            data: {submit: true},
            dataType: "json",
            success: function (response) {
                if(response.status == 1){
                    $('#editUserModal').modal('show');
                    $("#edit-facility").val(response.facility);
                    $("#edit-firstname").val(response.firstname);
                    $("#edit-lastname").val(response.lastname);
                    $("#edit-name").val(response.name);
                    $("#edit-email").val(response.email);
                }
                else {
                    $('#toast_title').text(response.title);
                    $('#toast_body').text(response.message);
                    $('#notification').toast('show');
                }
            },
        });

        $("#editUserForm").off().submit(function (e) {
            e.preventDefault();
            var editForm = $('#editUserForm')[0];
            var addForm = $('#addUserForm')[0];

            var data = {
                facility: $("#edit-facility").val(),
                name: $("#edit-name").val(),
                firstname: $("#edit-firstname").val(),
                lastname: $("#edit-lastname").val(),
                email: $("#edit-email").val()
            };

            $.ajax({
                type: "PATCH",
                url: window.location.href+ '/update/' + id,
                data: data,
                dataType: "json",
                beforeSend: function () {
                    $('#editUserModal').find('span.validation-error');
                },
                success: function (response) {
                    if(response.status == 1) {
                        editForm.reset();
                        addForm.reset();
                        table.ajax.reload();
                        $('#toast_title').text(response.title);
                        $('#toast_body').text(response.message);
                        $('#notification').toast('show');
                        $('#editUserModal').modal('hide');
                    } else if(response.status == 2) {
                        $('#editUserModal').find('span.edit-validation-error').text('');
                        $.each(response.errors, function (s, v) {
                            $('span.edit-error-'+s).text(v[0]);
                        });
                    } else {
                        table.ajax.reload();
                        $('#toast_title').text(response.title);
                        $('#toast_body').text(response.message);
                        $('#notification').toast('show');
                    }
                },
            });
        });
    });

    $(".modal").off().on('click', '#confirm_restore', function () {
        $.ajax({
            type: "POST",
            url: window.location.href + "/restore/" + id,
            data: {submit: true},
            dataType: "json",
            success: function (response) {
                table.ajax.reload();
                $('#toast_title').text(response.title);
                $('#toast_body').text(response.message);
                $('#notification').toast('show');
            },
        }).always(function() {
            $('#restoreUserModal').modal('hide');
        });
    });

    $("table").on('click', '#delete', function (e) {
        e.preventDefault();

        let id = $(this).data('id');
        $('#deleteUserModal').modal('show');
        $("#confirm_delete").off().click(function (e) {
            $.ajax({
                type: "DELETE",
                url: window.location.href + "/" + id,
                data: {submit: true},
                dataType: "json",
                success: function (response) {
                    table.ajax.reload();
                    $('#toast_title').text(response.title);
                    $('#toast_body').text(response.message);
                    $('#notification').toast('show');
                    $('#deleteUserModal').modal('hide');
                },
            });
        });
    });

    $("table").on('click', '#restore', function (e) {
        e.preventDefault();

        let id = $(this).data('id');
        $('#restoreUserModal').modal('show');

        $(".modal").off().on('click', '#confirm_restore', function () {
            $.ajax({
                type: "POST",
                url: window.location.href + "/restore/" + id,
                data: {submit: true},
                dataType: "json",
                success: function (response) {
                    table.ajax.reload();
                    $('#toast_title').text(response.title);
                    $('#toast_body').text(response.message);
                    $('#notification').toast('show');
                },
            }).always(function() {
                $('#restoreUserModal').modal('hide');
            });
        });
    });

    $("#addUserForm").off().submit(function (e) {
        e.preventDefault();
        var addForm = $('#addUserForm')[0];
        var editForm = $('#editUserForm')[0];

        var data = {
            facility: $("[name='facility']").val(),
            name: $("[name='name']").val(),
            firstname: $("[name='firstname']").val(),
            lastname: $("[name='lastname']").val(),
            email: $("[name='email']").val(),
            password: $("[name='password']").val(),
            password_confirmation: $("[name='password_confirmation']").val()
        };

        $.ajax({
            type: "POST",
            url: "{{ route('manage_users.store') }}",
            data: data,
            dataType: "json",
            beforeSend: function () {
                $('#addUserModal').find('span.validation-error');
            },
            success: function (response) {
                if(response.status == 0) {
                    $('#addUserModal').find('span.validation-error').text('');
                    $.each(response.errors, function (s, v) {
                        $('span.error-'+s).text(v[0]);
                    });
                } else {
                    editForm.reset();
                    addForm.reset();
                    table.ajax.reload();
                    $('#toast_title').text(response.title);
                    $('#toast_body').text(response.message);
                    $('#notification').toast('show');
                    $('#addUserModal').modal('hide');
                }
            },
        });
    });

</script>
@endsection
