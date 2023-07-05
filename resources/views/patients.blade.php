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
                                <h5 class="mb-0">Admitted Patients</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-0">
                        <div class="table-responsive">
                            <div class="se-pre-con bg-white opacity-9"><span></span></div>
                            <table class="table align-items-center mb-0" id="admitted_patients">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name of Patient
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Age
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Address
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Admitted Since
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Admission Date
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Expected Release Date
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
    <div class="mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Released Patients</h5>
                                <span class="text-uppercase text-secondary text-xxs">Note: Lists last fifty released patients within the last thirty days</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-0">
                        <div class="table-responsive">
                            <div class="se-pre-con bg-white opacity-9"><span></span></div>
                            <table class="table align-items-center mb-0" id="released_patients">
                                <thead>
                                    <tr>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name of Patient
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Age
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Address
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Release Date
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Released Since
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

@section('scripts')
<script src="../assets/js/plugins/datatables.js"></script>
<script src="../assets/js/ajax/datatables.js"></script>
<script src="../assets/js/ajax/bootstrap-datatables.js"></script>
<script>
    var table1 = $('#admitted_patients').DataTable({
        processing: true,
        ordering: false,
        serverSide: true,
        autoWidth: false,
        autoHeight: false,
        responsive: true,
        pageResize: false,

        ajax: {
            url: "{{ route('patients.admitted') }}",
        },
        columns: [
            {data: 'patient_name', name: 'patient_name'},
            {data: 'age', name: 'age'},
            {data: 'address', name: 'address'},
            {data: 'admitted_since', name: 'admitted_since'},
            {data: 'admission_date', name: 'admission_date'},
            {data: 'expected_release', name: 'expected_release'},
        ],
        columnDefs: [
            {
                targets: ['_all'],
                className: 'text-xs font-weight-bold mb-0 text-center',
            },
        ],
    });

    var table2 = $('#released_patients').DataTable({
        processing: true,
        ordering: false,
        serverSide: true,
        autoWidth: false,
        autoHeight: false,
        responsive: true,
        pageResize: false,

        ajax: {
            url: "{{ route('patients.released') }}",
        },
        columns: [
            {data: 'patient_name', name: 'patient_name'},
            {data: 'age', name: 'age'},
            {data: 'address', name: 'address'},
            {data: 'release_date', name: 'release_date'},
            {data: 'released_since', name: 'released_since'},
        ],
        columnDefs: [
            {
                targets: ['_all'],
                className: 'text-xs font-weight-bold mb-0 text-center',
            },
        ],
    });
</script>
@endsection
