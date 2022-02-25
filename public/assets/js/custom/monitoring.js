$(document).ready(function(){
    $("#monitoring").addClass("active");

    var table_monitoring = $('#table-monitoring').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/monitoring_datatable',
            data: function(d) {
                
            }
        },
        columns:[
        ]
    });

})
