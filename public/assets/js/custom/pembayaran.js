$(document).ready(function(){
    $("#pembayaran").addClass("active");

    $(".tombol-tambah-pembayaran").on("click", function(){
        window.location.href = "/pembayaran/pos";
    });

    // $.ajax({
    //     type: 'GET',
    //     url: baseUrl+'/api/laporan_datatable',
    //     dataType: 'json',
    //     success: function (data) {
    //         for(let i=0;i<data.data.length;i++){
    //             if(data.data[i].id_charge == 1){
    //                 idCharge = data.data[i].id_charge;
    //             }
    //         }
    //     },
    //     error:function(data){
    //         console.log(data);
    //     }
    // });


})
