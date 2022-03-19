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
                    return '<center><a id="'+data+'" class="pilih-booking"> <i class="fa fa-plus mr-1" style="cursor: pointer;"></i></a></center>'
                }
            },
        ]
    });

    $('#table-booking tbody').on('click', '.pilih-booking', function () {
        let id_booking = $(this).attr("id");
        $.ajax({
            type: 'GET',
            url: baseUrl+'/get_booking',
            dataType: 'json',
            success: function (data) {
                var value = data.data;
                for(var i=0;i<value.length;i++){
                    if(value[i].id == id_booking){
                        var price = parseInt(value[i].price_sales) - parseInt(value[i].dp_sales);
                        $('#inputBooking').val(value[i].nopol);
                        $('#label-booking').html(value[i].nopol);
                        $('#inputSubtotal').val(price);
                        $('#label-subTotal').html(price);
                        $('#inputTotal').val(value[i].price_sales);
                        $('#label-total').html(value[i].price_sales);
                        $('#idBooking').val(value[i].id);
                        subtotal(price);
                        $("#modal-booking").modal("hide");
                        break;
                    }
                }
            },
            error:function(data){
                console.log(data);
            }
        });

    });

    $("#modalCharge").on("click", function(){
        $("#modal-charge").modal('hide');
        $("#modal-tambah-charge").modal('show');

        $("#name").val("");
        $("#harga").val("");
        // urlCharge = baseUrl+"/data_master/charge"
        // $("#formCharge").attr('action', urlCharge);
        // $("#formCharge").attr('method', 'POST');
    });

    $('#simpanCharge').on('click', function(){
        var name = $("#name").val();
        var harga = $("#harga").val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/data_master/charge",
            type: "POST",
            data: {
                name: name,
                harga: harga,
            },
            cache: false,
            success: function (data) {
                alert("Charge berhasil ditambahkan");
                $("#modal-tambah-charge").modal('hide');
                // console.log("Berhasil Tambah");
            },
            error:function(data){
              console.log(data);
            }
        });
    });

    $(".tombol-charge").on("click", function(){
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

    var data_charge = []
    $('#table-charge tbody').on('click', '.pilih-charge', function () {
        let id_charge = $(this).attr("id");
        if(data_charge.indexOf(id_charge) != -1){
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Data Sudah Ada',
                showConfirmButton: false,
                timer: 1000
            });
        }
        else{
            data_charge.push(id_charge);

            $.ajax({
                type: 'GET',
                url: baseUrl+'/get_charge',
                dataType: 'json',
                success: function (data) {
                    var value = data.data;
                    var index;
                    for(var i=0;i<=value.length;i++){
                        if(value[i].id_charge_vehicles == id_charge){
                            index=i;
                            break;
                        }
                    }
                    // var arrayCharge = [];
                    // arrayCharge.push(value[index].id_charge_vehicles);
                    // console.log(arrayCharge);

                    $("#modal-charge").modal("hide");
                    $('#table-pos tbody').append(
                        '<tr id="idTr-'+id_charge+'">\
                            <td><input class="id_charge" id="id_charge['+value[index].id_charge_vehicles+']" name="id_charge[]" hidden value="'+value[index].id_charge_vehicles+'">'+value[index].name_charge_vehicles+'</td>\
                            <td><input class="price_charge" id="price_charge['+value[index].id_charge_vehicles+']" name="price_charge[]" hidden value="'+value[index].price_charge_vehicles+'">'+value[index].price_charge_vehicles+'</td>\
                            <td><button type="button" id="'+id_charge+'" class="btn btn-danger delete">Delete</button></td>\
                        </tr>'
                    );
                    total();
                },
                error:function(data){
                    console.log(data);
                }
            });
        }
    });

    let index;
    $("#table-pos tbody").on("click", ".delete", function(){
        let id = $(this).attr('id')
        $('#idTr-'+id).remove();
        index = data_charge.indexOf(id);
        data_charge.splice(index, 1);
        total();
    })
})

// function hapusEl(id){
//     console.log('hapus');
//     $('#idTr-'+id).remove();
//     total();
// }

var subTotal = 0;
function subtotal(subtotal){
    subTotal = 0;
    subTotal += Number(subtotal);
    total();
}

var inputDiskon = 0;
function diskon(){
    inputDiskon = $('#inputDiskon').val();
    total();
}

var arrayCharge = [];
function total(){
    arrayCharge = [];
    var subTotalCharge = 0;
    var subtotals = $('.price_charge');
    var id_charge = $('.id_charge');
    for(var i=0; i<subtotals.length;++i){
        subTotalCharge = subTotalCharge + Number(subtotals[i].value);
    }
    for(var i=0; i<id_charge.length;++i){
        arrayCharge.push(id_charge[i].value);
    }
    subTotalCharge += Number(subTotal);
    totalCharge = subTotalCharge - inputDiskon;
    $('#inputSubtotal').val(subTotalCharge);
    $('#label-subTotal').html(subTotalCharge);
    $('#inputTotal').val(totalCharge);
    $('#label-total').html(totalCharge);
}

$("#bayar").on("click", function(){
    var sub = $('#inputSubtotal').val();
    var diskon = $('#inputDiskon').val();
    var total = $('#inputTotal').val();
    // console.log(arrayCharge, sub, diskon, total);
    urlPembayaran = baseUrl+"/pembayaran/insert"
    $("#formPembayaran").attr('action', urlPembayaran);
    $("#formPembayaran").attr('method', 'POST');

    // array = charge;
    // for(var i=0; i<array.length;++i){
    //     console.log(array[i]);
    // }
});


