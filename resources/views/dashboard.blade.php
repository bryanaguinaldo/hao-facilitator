@extends('layouts.base')

@section('content')
<main>
    <div class="container-fluid">
        <div class="row mt-1">
            <div class="col-lg-12 mb-4">
                <div class="page-header min-height-300 border-radius-xl bg-secondary" style="background-image: url('http://picsum.photos/1920/1080'); background-position-y: 25%;">
                    <span class="mask bg-gradient-dark opacity-5"></span>
                </div>
                <div class="card card-body blur shadow-blur mx-4 mt-n6">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="../assets/img/blank.png" alt="..." class="w-100 border-radius-lg shadow-sm">
                                <button href="#" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2" data-bs-toggle="modal" data-bs-target="#upload-image-modal">
                                    <i class="fa fa-pen top-0" data-bs-placement="top" title="Edit Image"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{ $user->usersinformation->firstname.' '.$user->usersinformation->lastname }}
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{ $user->getRoleNames()->implode(' '); }}
                                </p>
                                <p class="mb-0 text-sm text-capitalize">
                                    {{ $user->usersinformation->facilities->facility_name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Health Facility Code</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <span id="facility_code">{{ $user->usersinformation->facilities->hfhudcode }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                    <i class="fa fa-code text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Municipality</p>
                                    <h5 class="font-weight-bolder mb-0 text-capitalize">
                                        {{ $user->usersinformation->facilities->city_mun }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                    <i class="fa fa-globe-asia text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Province</p>
                                    <h5 class="font-weight-bolder mb-0 text-capitalize">
                                        {{ $user->usersinformation->facilities->province }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                    <i class="fa fa-globe-asia text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-6 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Facility Occupancy</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bed Type</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Total Beds</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="total-beds">
                                                <div class="spinner-border text-danger spinner-border-sm" role="status">
                                                </div>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Occupied Beds Percent</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="beds-occupied-percent">
                                                <div class="spinner-border text-danger spinner-border-sm" role="status">
                                                </div>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Total Occupied</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="total">
                                                <div class="spinner-border text-danger spinner-border-sm" role="status">
                                                </div>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">ICU Beds</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="icu">
                                                <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                </div>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Isolation Beds</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="isol">
                                                <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                </div>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Ward Beds</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="ward">
                                                <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                </div>
                                            </h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Equipment Availability</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bed Type</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Total Mechanical Ventilators</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="total-mechvents">
                                                <span class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                </span>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">Occupied Percent</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="occupied-mechvent-percent">
                                                <span class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                </span>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">[C] Vacant Mechanical Ventilators</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="c_mechvent_v">
                                                <span class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                </span>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">[C] Occupied Mechanical Ventilators</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="c_mechvent_o">
                                                <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                </div>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">[NC] Vacant Mechanical Ventilators</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="nc_mechvent_v">
                                                <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                </div>
                                            </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-3 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">[NC] Occupied Mechanical Ventilators</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-0 text-sm" id="nc_mechvent_o">
                                                <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                </div>
                                            </h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/aab94b6f488126e8f83fc7.js"></script>
</main>
@endsection

@section('modals')
<div class="col-md-4">
    <div class="modal fade" id="upload-image-modal" tabindex="-1" role="dialog" aria-labelledby="upload-image-modal" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Upload Profile Picture</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/file-upload" class="dropzone" enctype="multipart/form-data">
                        <div class="fallback">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-primary">Save changes</button>
                    <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
@endsection
