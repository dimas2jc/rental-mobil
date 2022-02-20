$(document).ready(function(){
    $.ajax({
        type: 'GET',
        url: baseUrl+'/data_master/get_data_master',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $("#total_pegawai").html(data.pegawai);
            $("#total_vendor").html(data.vendor);
            $("#total_kendaraan").html(data.kendaraan);
        },
        error:function(){
            console.log(data);
        }
    });
})
