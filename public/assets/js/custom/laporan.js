$(document).ready(function(){
    $("#laporan").addClass("active");

    // $.ajax({
    //     type: 'GET',
    //     url: baseUrl+'/api/laporan_datatable',
    //     dataType: 'json',
    //     success: function (data) {
    //         for(let i=0;i<data.data.length;i++){
    //             if(data.data[i].id_charge == 1){
    //                 idCharge = data.data[i].id_charge;
    //             }
    //         }
    //     },
    //     error:function(data){
    //         console.log(data);
    //     }
    // });

    var table_laporan = $('#table-laporan').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/laporan_datatable',
            data: function(data) {
                console.log(data);
            }
        },
        columns:[
            {
                data: "id_booking",
                name: "id_booking"
            },
            {
                data: "type_unit",
                name: "type_unit"
            },
            {
                data: "name_customer",
                name: "name_customer"
            },
            {
                data: "name_sales",
                name: "name_sales"
            },
            {
                data: "user",
                name: "user"
            },
            {
                data: "date_start",
                name: "date_start",
                render  : function(data,type,row) {
                    return data.substring(0, 10);
                }
            },
            {
                data: "date_start",
                name: "date_start",
                render  : function(data,type,row) {
                    return data.substring(11, 16);
                }
            },
            {
                data: "date_finish",
                name: "date_finish",
                render  : function(data,type,row) {
                    return data.substring(11, 16);
                }
            },
            {
                data: "price_user",
                name: "price_user"
            },
            {
                data: "dp_sales",
                name: "dp_sales"
            },
            {
                data: "price_user",
                name: "price_user",
                render  : function(data,type,row) {
                    return data-row.dp_sales;
                }
            },
            {
                data: "description",
                name: "description"
            },
            {
                data: null,
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                    return '<a id="'+data.id_booking+'" href="/laporan/cetak/'+data.id_booking+'" target="_blank" class="btn btn-primary btn-sm tombol-print-laporan"><i class="fa fa-print"></i></a>';
                }
            },
        ]
    });

})
