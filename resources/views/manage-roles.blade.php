@extends('layouts.base')

@section('headers')
<link href="../assets/css/datatable/datatable.css" rel="stylesheet" />
@endsection

@section('content')
<main>
    <div class="mt-2">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Roles</h5>
                            </div>
                            <a href="#" type="button" class="btn bg-dark btn-sm mb-0 text-white" data-bs-toggle="modal" data-bs-target="#addRoleModal"><span class="fa fa-plus"></span> &nbsp; Create New Role</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-0">
                        <div class="table-responsive">
                            <div class="se-pre-con bg-white opacity-9"><span></span></div>
                            <table class="table align-items-center mb-0" id="roles-table">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Role Name
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
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Permissions</h5>
                            </div>
                            <a href="#" type="button" class="btn bg-dark btn-sm mb-0 text-white" data-bs-toggle="modal" data-bs-target="#addPermissionModal"><span class="fa fa-plus"></span> &nbsp; Create New Permission</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-0">
                        <div class="table-responsive">
                            <div class="se-pre-con bg-white opacity-9"><span></span></div>
                            <table class="table align-items-center mb-0" id="permissions-table">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Permission Name
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
<!-- Add Roles -->
<div class="col-md-6">
    <div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="addRoleModal" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Manage Roles</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="card-header border-light">
                            <h5 class="font-weight-bolder mb-0">Create a New Role</h5>
                            <form method="POST" id="addRoleForm" role="form text-left">
                                @csrf
                                <label>Role Name</label>
                                <input class="multisteps-form__input form-control" name="role" type="text" placeholder="Role Name" />
                                <span class="text-sm validation-error error-role text-danger mb-0"></span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark text-white" form="addRoleForm">Submit and Create Role</button>
                    <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Permission -->
<div class="col-md-6">
    <div class="modal fade" id="addPermissionModal" tabindex="-1" role="dialog" aria-labelledby="addPermissionModal" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Manage Roles</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-12">
                        <div class="card-header border-light">
                            <h5 class="font-weight-bolder mb-0">Create a New Permission</h5>
                            <form method="POST" id="addPermissionForm" role="form text-left">
                                @csrf
                                <label>Permission Name</label>
                                <input class="multisteps-form__input form-control" name="permission" type="text" placeholder="Permission Name" />
                                <span class="text-sm validation-error error-role text-danger mb-0"></span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark text-white" form="addPermissionForm">Submit and Create Role</button>
                    <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Datatables -->
<script src="../assets/js/plugins/datatables.js"></script>
<script src="../assets/js/ajax/datatables.js"></script>
<script src="../assets/js/ajax/bootstrap-datatables.js"></script>
<!-- AJAX -->
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    var role_table = $('#roles-table').DataTable({
        processing: true,
        ordering: false,
        serverSide: true,
        autoWidth: false,
        autoHeight: false,
        responsive: true,
        pageResize: false,

        ajax: {
            url: "{{ route('manage_roles.roles_table') }}",
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
        ],
        columnDefs: [
            {
                targets: ['_all'],
                className: 'text-xs font-weight-bold mb-0 text-center',
            },
        ],
    });

    var permission_table = $('#permissions-table').DataTable({
        processing: true,
        ordering: false,
        serverSide: true,
        autoWidth: false,
        autoHeight: false,
        responsive: true,
        pageResize: false,

        ajax: {
            url: "{{ route('manage_roles.permissions_table') }}",
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
        ],
        columnDefs: [
            {
                targets: ['_all'],
                className: 'text-xs font-weight-bold mb-0 text-center',
            },
        ],
    });

    $('#addRoleForm').off().submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '{{ route("manage_roles.store_role") }}',
            data: { role: $('input[name="role"]').val() },
            dataType: "json",
        }).always(function () {
            $('#addRoleModal').modal('hide');
            $(this).find('#addRoleForm').trigger('reset');
            role_table.ajax.reload();
        });
    });

    $('#addPermissionForm').off().submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: '{{ url("manage_roles.store_permission") }}',
            data: { permission: $('input[name="permission"]').val() },
            dataType: "json",
        }).always(function () {
            $('#addPermissionModal').modal('hide');
            $("#addPermissionForm").trigger('reset');
            permission_table.ajax.reload();
        });
    });
</script>
@endsection
