function number_format(number, decimals, dec_point, thousands_sep) {
    number = number.toFixed(decimals)

    var nstr = number.toString()
    nstr += ''
    x = nstr.split('.')
    x1 = x[0]
    x2 = x.length > 1 ? dec_point + x[1] : ''
    var rgx = /(\d+)(\d{3})/

    while (rgx.test(x1))
        x1 = x1.replace(rgx, '$1' + thousands_sep + '$2')

    return x1 + x2
}

// let rupiah = document.getElementById('inputDiskon2');
// rupiah.addEventListener('keyup', function(e){
//     rupiah.value = formatRupiah(this.value, 'Rp.');
//     convertToAngka(rupiah.value);
//     console.log(convertToAngka(rupiah.value));
//     // console.log(convertToRupiah(rupiah.value));
// });

// function formatRupiah(angka, prefix){
//     var number_string = angka.replace(/[^,\d]/g, '').toString(),
//     split   		= number_string.split(','),
//     sisa     		= split[0].length % 3,
//     rupiah     		= split[0].substr(0, sisa),
//     ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

//     if(ribuan){
//         separator = sisa ? '.' : '';
//         rupiah += separator + ribuan.join('.');
//     }

//     rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
//     return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
// }

// function convertToAngka(rupiah){
//     return parseInt(rupiah.toString().replace(/,.*|[^0-9]/g, ''), 10);
// }

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
                        $('#inputSubtotal2').val('Rp.'+number_format(Math.abs(parseInt(price)), 0, '.', ','));
                        $('#inputTotal').val(value[i].price_sales);
                        $('#inputTotal2').val('Rp.'+number_format(Math.abs(parseInt(value[i].price_sales)), 0, '.', ','));
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
    $('#inputSubtotal2').val('Rp.'+number_format(Math.abs(parseInt(subTotalCharge)), 0, '.', ','));
    $('#inputTotal').val(totalCharge);
    $('#inputTotal2').val('Rp.'+number_format(Math.abs(parseInt(totalCharge)), 0, '.', ','));
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


