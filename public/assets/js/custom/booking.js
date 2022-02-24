$(document).ready(function(){
    $("#booking").addClass("active")

    var token = $('meta[name="csrf-token"]').attr('content');

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

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

    var start_date;
    var end_date;
    var start_time;
    var end_time;
    // $("#start_date").on("click", function(){
    //     start_date = $(this).val();
    //     end_date = $("#end_date").val();
    //     get_vehicle(start_date, end_date);
    // })

    // $("#end_date").on("click", function(){
    //     end_date = $(this).val();
    //     start_date = $("#start_date").val();
    //     get_vehicle(start_date, end_date);
    // })

    $(".change-date").on("change", function(){
        start_date = $("#start_date").val()+" "+$("#start_time").val();
        end_date = $("#end_date").val()+" "+$("#end_time").val();
        get_vehicle(start_date, end_date);
    })

    $("#vehicle").on("change", function(){
        $.ajax({
            type: 'POST',
            url: baseUrl+'/get_harga',
            dataType: 'json',
            data: {
                date_start: $("#start_date").val()+" "+$("#start_time").val(),
                date_end: $("#end_date").val()+" "+$("#end_time").val(),
                _token: token
            },
            success: function (data) {
                results.data.forEach(addOption);
                function addOption(item, index, arr){
                    let text = item.name;
                    let val = item.id_vehicles;
                    var option = new Option(text, val);
                    $(option).html(text);
                    $("#vehicle"+no).append(option);
                }
            },
            error:function(){
                console.log(data);
            }
        });
    });

    function get_vehicle(start, end){
        console.log(start+" "+end);
        $.ajax({
            type: 'POST',
            url: baseUrl+'/get_kendaraan',
            dataType: 'json',
            data: {
                start: start,
                end: end,
                _token: token
            },
            success: function (data) {
                results.data.forEach(addOption);
                function addOption(item, index, arr){
                    let text = item.name;
                    let val = item.id_vehicles;
                    var option = new Option(text, val);
                    $(option).html(text);
                    $("#vehicle"+no).append(option);
                }
            },
            error:function(){
                console.log(data);
            }
        });
    }
})
