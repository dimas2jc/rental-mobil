$(document).ready(function(){
    $("#pembayaran").addClass("active");

    $.ajax({
        type: 'GET',
        url: baseUrl+'/get_booking',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('.select-booking').append('<option selected disabled>Pilih Booking . . </option>');
            for(let i=0;i<data.length;i++){
                $('.select-booking').append(
                    '<option value="'+data[i].id_booking+'">'+data[i].name_customer+'-'+data[i].nopol+'</option>'
                );
            }
        },
        error:function(data){
            console.log(data);
        }
    });


        var table_booking = $('#table-booking').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            ajax : {
                // headers : {'Authorization' : 'Bearer '+authUser.api_token},
                url : baseUrl+'/api/get_booking',
                data: function(d) {

                }
            },
            columns:[
                {data:"nopol",name:"nopol"},
                {data:"name",name:"name"},
                {
                    data:"date_start",
                    name:"date_start",
                    render  : function(data,type,row) {
                        return data.substring(0, 10);
                    }
                },
                {
                    data:"date_finish",
                    name:"date_finish",
                    render  : function(data,type,row) {
                        return data.substring(0, 10);
                    }
                },
                {data:"price",name:"price"},
                {
                    data:"price",
                    name:"price",
                    render: function(data, type, row){
                        return row.price_sales - data;
                    }
                },
                {data:"price_sales",name:"price_sales"},
                {
                    data:"id",
                    name:"id",
                    render: function(data, type, row){
                        return '<center><a id="'+data+'" class="pilih-charge"> <i class="fa fa-plus mr-1" style="cursor: pointer;"></i></a></center>'
                    }
                },
            ]
        });      

    $(".tombol-tambah-charge").on("click", function(){
        $('#table-charge').DataTable().clear().destroy();
        var table_charge = $('#table-charge').DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            ajax : {
                // headers : {'Authorization' : 'Bearer '+authUser.api_token},
                url : baseUrl+'/api/get_charge',
                data: function(d) {

                }
            },
            columns:[
                {data:"id_charge_vehicles",name:"id_charge_vehicles"},
                {data:"name_charge_vehicles",name:"name_charge_vehicles"},
                {data:"price_charge_vehicles",name:"price_charge_vehicles"},
                {
                    data:"id_charge_vehicles",
                    name:"id_charge_vehicles",
                    render: function(data, type, row){
                        return '<center><a id="'+data+'" class="pilih-charge"> <i class="fa fa-plus mr-1" style="cursor: pointer;"></i></a></center>'
                    }
                },
            ]
        });        
    });
    
    $('#table-charge tbody').on('click', '.pilih-charge', function () {
        let id_charge = $(this).attr("id");
        // console.log('id 1 '+ id_charge);
       
        $.ajax({
            type: 'GET',
            url: baseUrl+'/get_charge',
            dataType: 'json',
            success: function (data) {
                var value = data.data;
                var index;
                var colnum=0;
                for(var i=0;i<=value.length;i++){
                    if(value[i].id_charge_vehicles == id_charge){
                        index=i;
                        break;
                    }
                }
                $("#modal-tambah-charge").modal("hide");
                $('#table-pos tbody').append(
                    '<tr id="idTr'+value[index].id_charge_vehicles+'">\
                      <td>'+value[index].name_charge_vehicles+'</td>\
                      <td>'+value[index].price_charge_vehicles+'</td>\
                      <td><button type="button" onclick="hapusEl('+value[index].id_charge_vehicles+')" class="btn btn-danger hapus">Delete</button></td>\
                    </tr>'
                );
            },
            error:function(data){
                console.log(data);
            }
        });
        
    });

})

function hapusEl(id){
    $('#idTr'+id).remove();
}
