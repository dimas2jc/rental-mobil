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
                {data:"id_charge_vehicles",name:"id_charge_vehicles"},
                {data:"name_charge_vehicles",name:"name_charge_vehicles"},
                {data:"price_charge_vehicles",name:"price_charge_vehicles"},
                {
                    data:"id_charge_vehicles",
                    name:"id_charge_vehicles",
                    render: function(data, type, row){
                        return '<center><a id="'+data+'" class="btn btn-primary btn-sm pilih-charge"> <i class="fa fa-plus mr-1"></i>TAMBAH CHARGE</a></center>'
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
                // console.log(value[1].id_charge_vehicles);
                var index;
                var colnum=0;
                for(var i=0;i<=value.length;i++){
                    if(value[i].id_charge_vehicles == id_charge){
                        index=i;
                        // console.log('id 2 '+index);
                        break;
                    }
                }
                $("#modal-tambah-charge").modal("hide");
                var table = document.getElementById("table-pos");
                var row = table.insertRow(table.rows.length);
                row.setAttribute('id','col'+colnum);
                var id = 'col'+colnum;
                colnum++;
                
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = '<input type="hidden" name="id['+value[index].id_charge_vehicles+']" value="'+value[index].id_charge_vehicles+'">'+value[index].name_charge_vehicles;
                cell2.innerHTML = '<input type="hidden" id="harga'+value[index].id_charge_vehicles+'" name="harga['+value[index].id_charge_vehicles+']" value="'+value[index].price_charge_vehicles+'" >'+value[index].price_charge_vehicles;
                cell3.innerHTML = '<i class="icon-copy fa fa-trash" onclick="'+hapusEl+'(\''+id+'\')" style="cursor:pointer"> Del</i>';
                
                function hapusEl(idCol) {
                    document.getElementById(idCol).remove();
                }
        
            },
            error:function(data){
                console.log(data);
            }
        });

    
    });

})
