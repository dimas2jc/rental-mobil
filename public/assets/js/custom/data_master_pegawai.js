$(document).ready(function(){
    $("#pegawai").addClass("active")
    $("#data_master").addClass("active")
    var url = "";

    // Pegawai
    var table_pegawai = $('#table-pegawai').DataTable({
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

    $(".tombol-tambah-pegawai").on("click", function(){
        $("#name").val("");
        $("#alamat").val("");
        $("#phone").val("");
        $("#email").val("");

        $("#judul-modal-pegawai").html("Tambah Pegawai");
        urlPegawai = baseUrl+"/data_master/pegawai"
        $("#formPegawai").attr('action', urlPegawai);
        $("#formPegawai").attr('method', 'POST');
    });

    $('#phone').mask('000000000000');

    $('#table-pegawai tbody').on('click', '.btn-status-employes', function () {
        var id = $(this).attr("id");
        $.ajax({
            type: 'PUT',
            url: baseUrl+'/data_master/edit_status_pegawai/'+id,
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                alert('Status Pegawai Berhasil di Edit');
                window.location.href = "/data_master/employes";
            },
            error:function(data){
                console.log(data);
            }
        });
    });

    $('#table-pegawai tbody').on('click', '.tombol-edit-pegawai', function () {
        var id = $(this).attr("id");
        $("#judul-modal").html("Edit Pegawai");
        url = baseUrl+"/data_master/pegawai/"+id;
        $("#formPegawai").attr('action', url);
        $("#formPegawai").attr('method', 'POST');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_pegawai/'+id,
            dataType: 'json',
            success: function (data) {
                $("#name").val(data.name_employes);
                $("#alamat").val(data.address_employes);
                $("#phone").val("0"+data.phone_employes);
                $("#email").val("0"+data.email_employes);
            },
            error:function(data){
                console.log(data);
            }
        });

        $("#modal-tambah-pegawai").modal("show");
    });

    // Sales
    var table_sales = $('#table-sales').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/sales_datatable',
            data: function(d) {

            }
        },
        columns:[
          {data:"name_sales",name:"name_sales"},
          {data:"address_sales",name:"address_sales"},
          {
              data:"phone_sales",
              name:"phone_sales",
              render: function(data, type, row){
                return '0'+data;
              }
          },
          {
            data:"status_sales",name:"status_sales",
            render: function(data, type, row){
                if(data == 1){
                    return '<button type="submit" class="btn btn-linkedin btn-sm btn-status-sales" id="'+row.id_sales+'">On</button>';
                }else{
                    return '<button type="submit" class="btn btn-google btn-sm btn-status-sales" id="'+row.id_sales+'">Off</button>';
                }
            }
        },
        {
            data: null,
            className: "text-center",
            orderable: false,
            searchable: false,
            render: function ( data, type, row ) {
              return '<a id="'+data.id_sales+'" class="btn btn-primary btn-sm tombol-edit-sales"><i class="fa fa-pencil"></i></a>';
            }
        }
        ]
    });

    $(".tombol-tambah-sales").on("click", function(){
        $("#name").val("");
        $("#alamat").val("");
        $("#phone").val("");
        $("#email_sales").val(""); 

        $("#judul-modal-sales").html("Tambah Sales");
        urlSales = baseUrl+"/data_master/sales"
        $("#formSales").attr('action', urlSales);
        $("#formSales").attr('method', 'POST');
    });

    $('#table-sales tbody').on('click', '.btn-status-sales', function () {
        var id = $(this).attr("id");
        $.ajax({
            type: 'PUT',
            url: baseUrl+'/data_master/edit_status_sales/'+id,
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                alert('Status Sales Berhasil di Edit');
                window.location.href = "/data_master/employes";
            },
            error:function(data){
                console.log(data);
            }
        });
    });

    $('#table-sales tbody').on('click', '.tombol-edit-sales', function () {
        var id = $(this).attr("id");
        $("#judul-modal-sales").html("Edit Sales");
        url = baseUrl+"/data_master/sales/"+id;
        $("#formSales").attr('action', url);
        $("#formSales").attr('method', 'POST');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_sales/'+id,
            dataType: 'json',
            success: function (data) {
                $("#name_sales").val(data.name_sales);
                $("#alamat_sales").val(data.address_sales);
                $("#phone_sales").val("0"+data.phone_sales);
                $("#email_sales").val("0"+data.email_sales);
            },
            error:function(data){
                console.log(data);
            }
        });

        $("#modal-tambah-sales").modal("show");
    });

});

(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
})();
