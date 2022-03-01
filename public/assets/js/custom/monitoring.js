$(document).ready(function(){
    $("#monitoring").addClass("active");

    // let idCharge;
    // $.ajax({
    //     type: 'GET',
    //     url: baseUrl+'/api/monitoring_datatable',
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

    // var table_monitoring = $('#table-monitoring').DataTable({
    //     processing: true,
    //     serverSide: true,
    //     paging: true,
    //     ajax : {
    //         // headers : {'Authorization' : 'Bearer '+authUser.api_token},
    //         url : baseUrl+'/api/monitoring_datatable',
    //         data: function(data) {
    //             console.log(data);
    //         }
    //     },
    //     columns:[
    //         {
    //             title: "Test",
    //             data: "type_unit",
    //             name: "type_unit"
    //         },
    //         {
    //             title: "Date",
    //             data: "date_start",
    //             name: "date_start",
    //             render  : function(data,type,row) {
    //                 return data.substring(0, 10);
    //             }
    //         },
    //         {
    //             title: "Sales",
    //             data: "name_sales",
    //             name: "name_sales"
    //         },
    //         {
    //             title: "User",
    //             data: "user",
    //             name: "user"
    //         },
    //         {
    //             title: "Pickup Time",
    //             data: "date_start",
    //             name: "date_start",
    //             render  : function(data,type,row) {
    //                 return data.substring(11, 16);
    //             }
    //         },
    //         {
    //             title: "Return Time",
    //             data: "date_finish",
    //             name: "date_finish",
    //             render  : function(data,type,row) {
    //                 return data.substring(11, 16);
    //             }
    //         },
    //         {
    //             title: "Price User",
    //             data: "price_user",
    //             name: "price_user"
    //         },
    //         {
    //             title: "Over Time",
    //             data: "o_charge",
    //             name: "o_charge",
    //             render  : function(data,type,row) {
    //                 if(data != null){
    //                     return data;
    //                 }else{
    //                     return "-";
    //                 }
    //             }
    //         },
    //         {
    //             title: "Lintas Wilayah",
    //             data: "lw_charge",
    //             name: "lw_charge",
    //             render  : function(data,type,row) {
    //                 if(data != null){
    //                     return data;
    //                 }else{
    //                     return "-";
    //                 }
    //             }
    //         },
    //         {
    //             title: "Insiden",
    //             data: "price_charge",
    //             name: "price_charge",
    //             render  : function(data,type,row) {
    //                 if(row.id_charge == 5){
    //                     return "Rp. "+data;
    //                 }else{
    //                     return "Rp. -";
    //                 }
    //             }
    //         },
    //         {
    //             title: "BBM",
    //             data: "bbm_charge",
    //             name: "bbm_charge",
    //             render  : function(data,type,row) {
    //                 if(data != null){
    //                     return data;
    //                 }else{
    //                     return "-";
    //                 }
    //             }
    //         },
    //         {
    //             title: "Car Wash",
    //             data: "cw_charge",
    //             name: "cw_charge",
    //             render  : function(data,type,row) {
    //                 if(data != null){
    //                     return data;
    //                 }else{
    //                     return "-";
    //                 }
    //             }
    //         },
    //         {
    //             title: "Total Prce + Charge",
    //             data: "price_charge",
    //             name: "price_charge",
    //             render  : function(data,type,row) {
    //                 return row.o_charge+row.lw_charge+row.bbm_charge+row.cw_charge+row.price_user;
    //             }
    //         },
    //         {
    //             title: "Down Payment",
    //             data: "dp_sales",
    //             name: "dp_sales"
    //         },
    //         {
    //             title: "Cash / TF",
    //             data: "description",
    //             name: "description"
    //         },
    //         {
    //             title: "Paid / Remaining Payment",
    //             data: "price_charge",
    //             name: "price_charge",
    //             render  : function(data,type,row) {
    //                 return (row.o_charge+row.lw_charge+row.bbm_charge+row.cw_charge+row.price_user)-row.dp_sales;
    //             }
    //         },
    //         {
    //             title: "Cash / TF",
    //             data: "description",
    //             name: "description"
    //         },
    //     ]
    // });

})
