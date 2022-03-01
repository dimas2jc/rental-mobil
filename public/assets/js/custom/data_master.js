$(document).ready(function(){
    $.ajax({
        type: 'GET',
        url: baseUrl+'/data_master/get_data_master',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $("#total_pegawai").html(data.pegawai);
            $("#total_vendor").html(data.vendor);
            $("#total_kendaraan").html(data.vehicle);
            $("#total_customer").html(data.customer);
        },
        error:function(data){
            console.log(data);
        }
    });
})
