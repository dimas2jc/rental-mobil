$(document).ready(function(){
    $("#services").addClass("active")
    $("#data_master").addClass("active")

    var url = "";

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    var table_service = $('#table-service').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/service_datatable',
            data: function(d) {

            }
        },
        columns:[
            {data:null,name:null},
            {data:"name_service",name:"name_service"},
            {
                data: null,
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                    let status;
                    if(data.status == 1){
                        status = 'AKTIF'
                    }
                    else{
                        status = 'TIDAK AKTIF'
                    }
                    return status;
                }
            },
            {
                data: null,
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                    let btn = '';
                    if(data.status == 0){
                        btn += '<button type="button" id="'+data.id+'" class="btn btn-primary btn-sm tombol-status">On</i></button>'
                    }
                    else{
                        btn = '<button type="button" id="'+data.id+'" class="btn btn-danger btn-sm tombol-status">Off</i></button>'
                    }
                    return btn;
                }
            }
        ]
    });

    table_service.on( 'order.dt search.dt', function () {
        table_service.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $(".tombol-tambah-service").on("click", function(){
        url = baseUrl+"/data_master/service"
        $("#nama").val("")
        $("#judul-modal").html("Tambah Service")
        $("#formService").attr("action", url)
        $("#modal-tambah-service").modal("show");
    })

    $("#table-service tbody").on("click", ".tombol-status", function(){
        console.log("status");
        var id = $(this).attr('id');
        let token = $('meta[name="csrf-token"]').attr('content')

        $.ajax({
            type: 'PUT',
            url: baseUrl+'/data_master/service/'+id,
            data: {
                _token: token
            },
            dataType: 'json',
            success: function (data) {
                table_service.ajax.reload();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Perubahan berhasil disimpan.',
                    showConfirmButton: false,
                    timer: 2000
                });
            },
            error:function(data){
                console.log(data);
            }
        });
    })

})
