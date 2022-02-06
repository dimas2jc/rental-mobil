$(document).ready(function(){
    $("#manajemen_pengguna").addClass("active")
    $("#data_master").addClass("active")

    // Data Table
    $("#table-pegawai").DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            { "type": "any-number", "targets": 0 }
        ],
    });
})