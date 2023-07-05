// function fetchdata(hospital_name) {
//     fetch(
//         "https://covid19-api-philippines.herokuapp.com/api/facilities/summary?region=region%20iii%3A%20central%20luzon&hospital_name=" +
//             hospital_name
//     )
//         .then((result) => result.json())
//         .then((json) => {
//             if (hospital_name == "n/a") {
//             } else if (json.data.hospital_name == hospital_name) {
//             } else {
//             }
//         });
// }

// fetchdata(
//     String(document.getElementById("hospital_name").innerHTML).toLowerCase()
// );
$(document).ready(function () {
    function sum(obj) {
        var sum = 0;
        for (var el in obj) {
            if (obj.hasOwnProperty(el)) {
                sum += parseFloat(obj[el]);
            }
        }
        return sum;
    }

    function toTitleCase(str) {
        return str.replace(/\w\S*/g, function (txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
    }

    fetch("https://covid19-api-philippines.herokuapp.com/api/facilities")
        .then((result) => result.json())
        .then((json) => {
            var hfhudcode = $("#facility_code").text();
            var dataArr = [json.data.filter((x) => x.hfhudcode === hfhudcode)];
            if (hfhudcode === "N/A") {
                $("#total").text("No Facility");

                // Beds Occupied
                $("#icu").text("No Facility");
                $("#isol").text("No Facility");
                $("#ward").text("No Facility");

                // Mechanical Ventilators
                $("#c_mechvent_v").text("No Facility");
                $("#c_mechvent_o").text("No Facility");
                $("#nc_mechvent_v").text("No Facility");
                $("#nc_mechvent_o").text("No Facility");
            } else {
                var occupied_beds = {
                    icu: dataArr[0][0].icu_o,
                    isol: dataArr[0][0].isolbed_o,
                    ward: dataArr[0][0].beds_ward_o,
                };

                var vacant_beds = {
                    icu: dataArr[0][0].icu_v,
                    isol: dataArr[0][0].isolbed_v,
                    ward: dataArr[0][0].beds_ward_v,
                };

                var equipments = {
                    c_mechvent_v: dataArr[0][0].mechvent_v,
                    c_mechvent_o: dataArr[0][0].mechvent_o,
                    nc_mechvent_v: dataArr[0][0].mechvent_v_nc,
                    nc_mechvent_o: dataArr[0][0].mechvent_o_nc,
                };
                $("#total").text(
                    occupied_beds.icu + occupied_beds.isol + occupied_beds.ward
                );

                // Total beds
                $("#total-beds").text(
                    dataArr[0][0].icu_v +
                        dataArr[0][0].isolbed_v +
                        dataArr[0][0].beds_ward_v +
                        dataArr[0][0].icu_o +
                        dataArr[0][0].isolbed_o +
                        dataArr[0][0].beds_ward_o
                );
                $("#beds-occupied-percent").text(
                    (
                        ((dataArr[0][0].icu_o +
                            dataArr[0][0].isolbed_o +
                            dataArr[0][0].beds_ward_o) /
                            (dataArr[0][0].icu_v +
                                dataArr[0][0].isolbed_v +
                                dataArr[0][0].beds_ward_v +
                                dataArr[0][0].icu_o +
                                dataArr[0][0].isolbed_o +
                                dataArr[0][0].beds_ward_o)) *
                        100
                    ).toFixed(2) + "%"
                );

                // Beds Occupied
                $("#icu").text(
                    occupied_beds.icu +
                        " / " +
                        (vacant_beds.icu + occupied_beds.icu)
                );
                $("#isol").text(
                    occupied_beds.isol +
                        " / " +
                        (vacant_beds.isol + occupied_beds.isol)
                );
                $("#ward").text(
                    occupied_beds.ward +
                        " / " +
                        (vacant_beds.ward + occupied_beds.ward)
                );

                // Total Mechvents
                $("#total-mechvents").text(
                    equipments.c_mechvent_v +
                        equipments.c_mechvent_o +
                        equipments.nc_mechvent_v +
                        equipments.nc_mechvent_o
                );
                $("#occupied-mechvent-percent").text(
                    (
                        ((equipments.c_mechvent_o + equipments.nc_mechvent_o) /
                            (equipments.c_mechvent_v +
                                equipments.c_mechvent_o +
                                equipments.nc_mechvent_v +
                                equipments.nc_mechvent_o)) *
                        100
                    ).toFixed(2) + "%"
                );

                // Mechanical Ventilators
                $("#c_mechvent_v").text(equipments.c_mechvent_v);
                $("#c_mechvent_o").text(equipments.c_mechvent_o);
                $("#nc_mechvent_v").text(equipments.nc_mechvent_v);
                $("#nc_mechvent_o").text(equipments.nc_mechvent_o);

                var total = $("#total").text();
                // console.log(total);

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });

                $.ajax({
                    type: "POST",
                    url: window.location.href + "/refresh/patients",
                    data: { total: total },
                    dataType: "json",
                });
            }
        });
});
