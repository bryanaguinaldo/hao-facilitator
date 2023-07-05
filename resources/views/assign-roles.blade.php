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
                                <h5 class="mb-0">Assign Role or Permissions</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-0">
                        <div class="table-responsive">
                            <div class="se-pre-con bg-white opacity-9"><span></span></div>
                            <table class="table align-items-center mb-0" id="role_assignment_table">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Username
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Role
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Permissions
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Assign to User
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
<!-- Assign Role -->
<div class="modal fade" id="assignRoleModal" tabindex="-1" role="dialog" aria-labelledby="assignRoleModal" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Assign Roles</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="card-header border-light">
                        <h5 class="font-weight-bolder mb-0">Assign Role to User</h5>
                        <p class="mb-4 text-sm">You are assigning a role to <span class="text-danger font-weight-bolder" id="assignment_username">bryanaguinaldo</span> with User ID <span class="text-danger font-weight-bolder" id="assignment_uid">500</p>
                        <form method="POST" id="assign_role" role="form text-left">
                            <select class="form-control" name="role_select">
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{$role->name}}</option>
                                @endforeach
                            </select>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark text-white" form="assign_role">Submit and Create Account</button>
                <button type="button" class="btn btn-link text-dark ml-auto" data-bs-dismiss="modal">Close</button>
            </div>
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

    var table = $('table').DataTable({
        processing: true,
        ordering: false,
        serverSide: true,
        autoWidth: false,
        autoHeight: false,
        responsive: true,
        pageResize: false,
        ajax: {
            url: "{{ route('assign_roles') }}",
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'role', name: 'role'},
            {data: 'permissions', name: 'permissions'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
            {
                targets: ['_all'],
                className: 'text-xs font-weight-bold mb-0 text-center',
            },
        ],
    });

    $("#role_assignment_table").off().on('click', '#assign-role-button', function () {
        let id = $(this).data('id');

        $('#assignRoleModal').modal('show');

        $("#assign_role").off().submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: window.location.href + '/role/' + id,
                data: {id: id, role: $("[name='role_select']").val()},
                dataType: "json",
            }).always(function () {
                table.ajax.reload();
                $('#assignRoleModal').modal('hide');
            });
        });
    });
</script>
@endsection
