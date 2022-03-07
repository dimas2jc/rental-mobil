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
                        return '<center><a id="'+data+'" class="btn btn-primary btn-sm pilih-charge"> <i class="fa fa-plus mr-1"></i>TAMBAH CHARGE</a></center>'
                    }
                },
            ]
        });        
    });
    
    $('#table-charge tbody').on('click', '.pilih-charge', function () {
        var id = $(this).attr("id");
        // console.log(id);
       

        $.ajax({
            type: 'GET',
            url: baseUrl+'/get_charge',
            dataType: 'json',
            success: function (data) {
                var data = data.data;
                var index;
                var colnum=0;
                for(var i=0;i<data.length;i++){
                    if(data[i].id_charge_vehicles == id){
                        index=i;
                        break;
                    }
                }
                $("#modal-tambah-charge").modal("hide");

                var table = document.getElementById("table-pos");

                var flag=-1;
        
                for(var z=1; z<table.rows.length; z++)
                {
                    var x=table.rows[z].childNodes[0].childNodes[0];
                    // console.log(x.value);
                    if(x.value == data[index].id_charge_vehicles)
                    {
                    flag = z;
                    break;
                    }
                }
        
                if(flag != -1)
                {
                    var colQty = table.rows[flag].childNodes[2].childNodes[0];
                    colQty.value = parseInt(colQty.value) + 1;
                    var idrow = table.rows[flag].childNodes[0].childNodes[0].value;
                    console.log(idrow);
                    recount(idrow);
                }
                else
                {
                var row = table.insertRow(table.rows.length);
                row.setAttribute('id','col'+colnum);
                var id = 'col'+colnum;
                colnum++;
        
                let rupiah = Intl.NumberFormat('id-ID');
        
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                // cell1.innerHTML = '<input type="hidden" name="id['+data[index].id_charge_vehicles+']" value="'+data[index].id_charge_vehicles+'">'+data[index].name_charge_vehicles;
                // cell2.innerHTML = '<input type="hidden" id="harga'+data[index].id_charge_vehicles+'" name="harga['+data[index].id_charge_vehicles+']" value="'+data[index].price_charge_vehicles+'" >'+rupiah.format(data[index].price_charge_vehicles);
                // cell3.innerHTML = '<i class="icon-copy fa fa-trash" onclick="hapusEl(\''+id+'\')" style="cursor:pointer"> Del</i>';
        
                }
        
            },
            error:function(data){
                console.log(data);
            }
        });
    
    });

})
