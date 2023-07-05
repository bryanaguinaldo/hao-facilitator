@extends('layouts.base')

@section('content')
<main>
    <div class="mt-2">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Beds</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                <span id="province_total_beds">
                                                    <div class="spinner-border text-danger text-sm spinner-border-sm" role="status"></div>
                                                </span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                            <i class="fa fa-chart-bar text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Occupied Beds</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                <span id="province_total_occupied">
                                                    <div class="spinner-border text-danger text-sm spinner-border-sm" role="status"></div>
                                                </span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                            <i class="fa fa-chart-bar text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Vacant Beds</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                <span id="province_total_vacant">
                                                    <div class="spinner-border text-danger text-sm spinner-border-sm" role="status"></div>
                                                </span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md">
                                            <i class="fa fa-chart-bar text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-4 col-md-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Suspected COVID Patients</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Asymptomatic</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="sus_asym">
                                                        <span class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                        </span>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Mild</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="sus_mild">
                                                        <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                        </div>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Severe</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="sus_severe">
                                                        <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                        </div>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Death</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="sus_death">
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
                    <div class="col-xl-4 col-md-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Probable COVID Patients</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Asymptomatic</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="prob_asym">
                                                        <span class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                        </span>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Mild</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="prob_mild">
                                                        <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                        </div>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Severe</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="prob_severe">
                                                        <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                        </div>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Death</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="prob_death">
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
                    <div class="col-xl-4 col-md-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Confirmed COVID Patients</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Asymptomatic</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="conf_asym">
                                                        <span class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                        </span>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Mild</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="conf_mild">
                                                        <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                        </div>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Severe</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="conf_severe">
                                                        <div class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                        </div>
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">Death</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="conf_death">
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
                <div class="row mt-2">
                    <div class="col-xl-6 col-md-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Vacant Beds</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">ICU Beds</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="icu_v_count">
                                                        <span class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                        </span>
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
                                                    <h6 class="mb-0 text-sm" id="ward_v_count">
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
                                                    <h6 class="mb-0 text-sm" id="isolation_v_count">
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
                    <div class="col-xl-6 col-md-12">
                        <div class="card mb-4">
                            <div class="card-header pb-0">
                                <h6>Occupied Beds</h6>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Count</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-3 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">ICU Beds</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0 text-sm" id="icu_o_count">
                                                        <span class="spinner-border text-danger text-sm spinner-border-sm" role="status">
                                                        </span>
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
                                                    <h6 class="mb-0 text-sm" id="ward_o_count">
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
                                                    <h6 class="mb-0 text-sm" id="isolation_o_count">
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
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

        fetch("https://covid19-api-philippines.herokuapp.com/api/facilities")
            .then((result) => result.json())
            .then((json) => {
            //   console.log(json.data.filter((v) => v.province === "bulacan"));
            var dataArr = [json.data.filter((x) => x.province === "bulacan")];
            var patient_sus = {
                asymptomatic: 0,
                mild: 0,
                severe: 0,
                died: 0,
            };
            var patient_prob = {
                asymptomatic: 0,
                mild: 0,
                severe: 0,
                died: 0,
            };
            var patient_conf = {
                asymptomatic: 0,
                mild: 0,
                severe: 0,
                died: 0,
            };
            var facility_beds = {
                icu_o: 0,
                isolbed_o: 0,
                beds_ward_o: 0,
                icu_v: 0,
                isolbed_v: 0,
                beds_ward_v: 0,
            };
            for (var i = 0; i < 60; i++) {
                patient_sus.asymptomatic += dataArr[0][i].susp_asym;
                patient_sus.mild += dataArr[0][i].susp_mild;
                patient_sus.severe += dataArr[0][i].susp_severe;
                patient_sus.died += dataArr[0][i].susp_died;
                patient_prob.asymptomatic += dataArr[0][i].prob_asym;
                patient_prob.mild += dataArr[0][i].prob_mild;
                patient_prob.severe += dataArr[0][i].prob_severe;
                patient_prob.died += dataArr[0][i].prob_died;
                patient_conf.asymptomatic += dataArr[0][i].conf_asym;
                patient_conf.mild += dataArr[0][i].conf_mild;
                patient_conf.severe += dataArr[0][i].conf_severe;
                patient_conf.died += dataArr[0][i].conf_died;

                facility_beds.icu_o += dataArr[0][i].icu_o;
                facility_beds.isolbed_o += dataArr[0][i].isolbed_o;
                facility_beds.beds_ward_o += dataArr[0][i].beds_ward_o;
                facility_beds.icu_v += dataArr[0][i].icu_v;
                facility_beds.isolbed_v += dataArr[0][i].isolbed_v;
                facility_beds.beds_ward_v += dataArr[0][i].beds_ward_v;
            }

            // Headers
            $("#province_total_beds").text(facility_beds.icu_o + facility_beds.isolbed_o + facility_beds.beds_ward_o + facility_beds.icu_v + facility_beds.isolbed_v + facility_beds.beds_ward_v);
            $("#province_total_occupied").text(facility_beds.icu_o + facility_beds.isolbed_o + facility_beds.beds_ward_o);
            $("#province_total_vacant").text(facility_beds.icu_v + facility_beds.isolbed_v + facility_beds.beds_ward_v);

            // Sus
            $('#sus_asym').text(patient_sus.asymptomatic);
            $('#sus_mild').text(patient_sus.mild);
            $('#sus_severe').text(patient_sus.severe);
            $('#sus_death').text(patient_sus.severe);

            // Probable
            $('#prob_asym').text(patient_prob.asymptomatic);
            $('#prob_mild').text(patient_prob.mild);
            $('#prob_severe').text(patient_prob.severe);
            $('#prob_death').text(patient_prob.severe);

            // Conf
            $('#conf_asym').text(patient_conf.asymptomatic);
            $('#conf_mild').text(patient_conf.mild);
            $('#conf_severe').text(patient_conf.severe);
            $('#conf_death').text(patient_conf.severe);

            // O Beds
            $('#icu_o_count').text(facility_beds.icu_o);
            $('#ward_o_count').text(facility_beds.beds_ward_o);
            $('#isolation_o_count').text(facility_beds.isolbed_o);

            // V Beds
            $('#icu_v_count').text(facility_beds.icu_v);
            $('#ward_v_count').text(facility_beds.beds_ward_v);
            $('#isolation_v_count').text(facility_beds.isolbed_v);
        });

    });

</script>
@endsection
