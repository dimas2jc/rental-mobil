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
                {data:"name_charge_vehicles",name:"name_charge_vehicles"},
                {data:"price_charge_vehicles",name:"price_charge_vehicles"},
                {
                    data:"id_charge_vehicles",
                    name:"id_charge_vehicles",
                    render: function(data, type, row){
                        return '<center><button id="'+data+'" class="btn btn-sm bg-dribbble ml-auto">\
                            <i class="fa fa-plus mr-1"></i>Tambah\
                        </button></center>'
                    }
                },
            ]
        });
    });

})
