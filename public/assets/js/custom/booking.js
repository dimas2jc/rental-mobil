$(document).ready(function(){
    $("#booking").addClass("active")

    var token = $('meta[name="csrf-token"]').attr('content');

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    $('#harga').mask('000000000000');
    $('#no_telp').mask('000000000000');
    $('#no_kk').mask('0000000000000000');
    $('#nik').mask('0000000000000000');

    $('.datepicker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    $('.clockpicker-example').clockpicker({
        autoclose: true
    });

    $("#customCheck").on("change", function(){
        if($("input[type='checkbox']").val() == 1){
            $("input[type='checkbox']").val(0);
            $(".select-customer").css("display", "none");
            $(".input-customer").css("display", "block");
        }
        else{
            $("input[type='checkbox']").val(1);
            $(".input-customer").css("display", "none");
            $(".select-customer").css("display", "block");
        }
    })

    $("#customer").on("change", function(){
        let id_cust = $(this).val();
        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_customer/'+id_cust,
            dataType: 'json',
            success: function (data) {
                $("#cust").val(data.name_customer);
                $("#sales").val(data.name_sales);
            },
            error:function(data){
                console.log(data);
            }
        });
    })

    var start_date;
    var end_date;
    var start_time;
    var end_time;
    $("#start_date").on("change", function(){
        start_date = $("#start_date").val()+" "+$("#start_time").val();
        end_date = $("#end_date").val()+" "+$("#end_time").val();
        get_vehicle(start_date, end_date);
    })

    $("#end_date").on("change", function(){
        start_date = $("#start_date").val()+" "+$("#start_time").val();
        end_date = $("#end_date").val()+" "+$("#end_time").val();
        get_vehicle(start_date, end_date);
    })

    $("#start_time").on("change", function(){
        start_date = $("#start_date").val()+" "+$("#start_time").val();
        end_date = $("#end_date").val()+" "+$("#end_time").val();
        get_vehicle(start_date, end_date);
    })

    $("#end_time").on("change", function(){
        start_date = $("#start_date").val()+" "+$("#start_time").val();
        end_date = $("#end_date").val()+" "+$("#end_time").val();
        get_vehicle(start_date, end_date);
    })

    // $(".change-date").on("change", function(){
    //     start_date = $("#start_date").val()+" "+$("#start_time").val();
    //     end_date = $("#end_date").val()+" "+$("#end_time").val();
    //     get_vehicle(start_date, end_date);
    // })

    $("#vehicle").on("change", function(){
        $.ajax({
            type: 'POST',
            url: baseUrl+'/get_harga',
            dataType: 'json',
            data: {
                date_start: $("#start_date").val()+" "+$("#start_time").val(),
                date_end: $("#end_date").val()+" "+$("#end_time").val(),
                id_vehicles: $("#vehicle").val(),
                _token: token
            },
            success: function (data) {
                // $("#harga").val(data);
                $("#real_price").val(data);
            },
            error:function(data){
                console.log(data);
            }
        });
    });

    $("#kendaraan_sama").on("change", function(){
        if($("#kendaraan_sama").val() == 1){
            $("#kendaraan_sama").val(0);
            $("#pilih_kendaraan #update_pilih_kendaraan").css("display", "block");
            $("#pilih_kendaraan #nopol_update").css("display", "none");
        }
        else{
            $("#kendaraan_sama").val(1);
            $("#pilih_kendaraan #update_pilih_kendaraan").css("display", "none");
            $("#pilih_kendaraan #nopol_update").css("display", "block");
        }
    })

    $(".reschedule").on("click", function(){
        $("#viewEventModal").modal("hide");
        var id_booking = $(this).attr('id');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/reschedule_booking/'+id_booking,
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                $("#name_update").val(data.name);
                $("#update_start_date").val(data.start_date);
                $("#update_end_date").val(data.end_date);
                $("#update_start_time").val(data.start_time);
                $("#update_end_time").val(data.end_time);
                $("#harga_update").val(data.price_sales);
                $("#real_price_update").val(data.start_time);
                $("#dp_update").val(data.dp_sales);
                $("#nopol_update").val(data.nopol);
                $("#id_vehicle_update").val(data.id_vehicles);
                $("#id_booking_update").val(id_booking);
                $("#update-jadwal").modal("show")
            },
            error:function(data){
                console.log(data);
            }
        });
    });

    $(".approve").on("click", function(){
        var id = $(this).attr('id');
        // console.log(id);
        $.ajax({
            type: 'GET',
            url: baseUrl+'/approve/'+id,
            dataType: 'json',
            success: function (data) {
                location.reload();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Booking berhasil disetujui.',
                    showConfirmButton: false,
                    timer: 2000
                });
                $("#"+id+".approve").css("display", "none");
            },
            error:function(data){
                console.log(data);
            }
        });
    });

    function get_vehicle(start, end){
        // console.log(start+" "+end);
        $.ajax({
            type: 'POST',
            url: baseUrl+'/get_kendaraan',
            dataType: 'json',
            data: {
                start: start,
                end: end,
                _token: token
            },
            success: function (results) {
                $('#vehicle').empty();
                $('#vehicle').append('<option selected disabled>Pilih kendaraan . . </option>');
                for(let i=0;i<results.length;i++){
                    $('#vehicle').append(
                        '<option value="'+results[i].id_vehicles+'" >'+results[i].name+' / '+results[i].nopol+'</option>'
                    );
                }
            },
            error:function(results){
                console.log(results);
            }
        });
    }

    $.ajax({
        type: 'GET',
        url: baseUrl+'/get_all_service',
        dataType: 'json',
        success: function (data) {
            $('#service').empty();
            $('#service').append('<option selected disabled>Pilih pelayanan . . </option>');
            for(let i=0;i<data.length;i++){
                $('#service').append(
                    '<option value="'+data[i].id+'" >'+data[i].name_service+'</option>'
                );
            }
        },
        error:function(data){
            console.log(data);
        }
    });
})
