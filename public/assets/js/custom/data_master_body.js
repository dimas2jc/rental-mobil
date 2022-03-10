$(document).ready(function(){
    $("#body").addClass('active');

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    // Body
    var table_body = $('#table-body').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/body_datatable',
            data: function(d) {

            }
        },
        columns:[
            {data:"name_vehicles_bodies",name:"name_vehicles_bodies"},
            {
                data: null,
                className: "text-center",
                orderable: true,
                searchable: false,
                render: function ( data, type, row ) {
                    let html = ''
                    if(data.is_active == 1){
                        html = 'Active';
                    }
                    else{
                        html = 'Non-Active';
                    }

                    return html;
                }
            },
            {
                data: null,
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                return '<a id="'+data.id_vehicle_bodies+'" class="btn btn-primary btn-sm tombol-edit-body"><i class="fa fa-pencil"></i></a>';
                }
            }
        ]
    });

    $.ajax({
        type: 'GET',
        url: baseUrl+'/data_master/get_all_kendaraan',
        dataType: 'json',
        success: function (data) {
            $('#kendaraan').empty();
            $('#kendaraan').append('<option selected disabled>Pilih kendaraan . . </option>');
            for(let i=0;i<data.length;i++){
                $('#kendaraan').append(
                    '<option value="'+data[i].id_vehicles+'" >'+data[i].nopol+'</option>'
                );
            }
        },
        error:function(data){
            console.log(data);
        }
    });

    $(".tombol-tambah-body").on("click", function(){
        $("#name").val("");

        $("#judul-modal-body").html("Tambah Body");
        url = baseUrl+"/data_master/body_kendaraan"
        $("#formBody").attr('action', url);
        $("#formBody").attr('method', 'POST');
    });

    $('#table-body tbody').on('click', '.tombol-edit-body', function () {
        var id = $(this).attr("id");
        $("#judul-modal-body").html("Edit Body");
        url = baseUrl+"/data_master/body_kendaraan/"+id;
        $("#formBody").attr('action', url);
        $("#formBody").attr('method', 'POST');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_body_kendaraan/'+id,
            dataType: 'json',
            success: function (data) {
                $("#name").val(data.name_vehicles_bodies);
                $("#kendaraan").val(data.id_vehicles);
                if(data.is_active == 1){
                    $("#customCheck").prop("checked", true);
                }
                else{
                    $("#customCheck").prop("checked", false);
                }
            },
            error:function(){
                console.log(data);
            }
        });

        $("#modal-tambah-body").modal("show");
    });
})
