$(document).ready(function(){
    $("#monitoring").addClass("active");

    var table_monitoring = $('#table-monitoring').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/pegawai_datatable',
            data: function(d) {

            }
        },
        columns:[
            {data:"name_employes",name:"name_employes"},
            {data:"address_employes",name:"address_employes"},
            {
                data:"phone_employes",
                name:"phone_employes",
                render: function(data, type, row){
                    return '0'+data;
                }
            },
            {
                data:"status_employes",name:"status_employes",
                render: function(data, type, row){
                    if(data == 1){
                        return '<button type="submit" class="btn btn-linkedin btn-sm btn-status-employes" id="'+row.id_employes+'">On</button>';
                    }else{
                        return '<button type="submit" class="btn btn-google btn-sm btn-status-employes" id="'+row.id_employes+'">Off</button>';
                    }
                }
            },
            {
                data: null,
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                    return '<a id="'+data.id_employes+'" class="btn btn-primary btn-sm tombol-edit-pegawai"><i class="fa fa-pencil"></i></a>';
                }
            }
        ]
    });

})
