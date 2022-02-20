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
          {data:"NAME_EMPLOYES",name:"NAME_EMPLOYES"},
          {data:"ADDRESS_EMPLOYES",name:"ADDRESS_EMPLOYES"},
          {data:"PHONE_EMPLOYES",name:"PHONE_EMPLOYES"},
        //   {data:"action",name:"",className:"text-center",orderable: false, searchable: false},
        {
            data: null,
            className: "text-center",
            orderable: false,
            searchable: false,
            render: function ( data, type, row ) {
              return '<a onClick="edit('+data.ID_EMPLOYES+')" id="'+data.ID_EMPLOYES+'" class="btn btn-primary btn-sm tombol-edit-pegawai"><i class="fa fa-pencil"></i></a>';
            }
        }
        ]
    });

    $(".tombol-tambah-pegawai").on("click", function(){
        $("#name").val("");
        $("#alamat").val("");
        $("#phone").val("");

        $("#judul-modal").html("Tambah Pegawai");
        url = baseUrl+"/data_master/pegawai"
        $("#formPegawai").attr('action', url);
        $("#formPegawai").attr('method', 'POST');
    });

    $('#phone').mask('000000000000');

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
                $("#name").val(data.NAME_EMPLOYES);
                $("#alamat").val(data.ADDRESS_EMPLOYES);
                $("#phone").val("0"+data.PHONE_EMPLOYES);
            },
            error:function(){
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
          {data:"NAME_SALES",name:"NAME_SALES"},
          {data:"ADDRESS_SALES",name:"ADDRESS_SALES"},
          {data:"PHONE_SALES",name:"PHONE_SALES"},
        //   {data:"action",name:"",className:"text-center",orderable: false, searchable: false},
        {
            data: null,
            className: "text-center",
            orderable: false,
            searchable: false,
            render: function ( data, type, row ) {
              return '<a onClick="edit('+data.ID_SALES+')" id="'+data.ID_SALES+'" class="btn btn-primary btn-sm tombol-edit-sales"><i class="fa fa-pencil"></i></a>';
            }
        }
        ]
    });

    $(".tombol-tambah-sales").on("click", function(){
        $("#name").val("");
        $("#alamat").val("");
        $("#phone").val("");

        $("#judul-modal").html("Tambah Sales");
        url = baseUrl+"/data_master/sales"
        $("#formPegawai").attr('action', url);
        $("#formPegawai").attr('method', 'POST');
    });

    $('#table-sales tbody').on('click', '.tombol-edit-sales', function () {
        var id = $(this).attr("id");
        $("#judul-modal").html("Edit Sales");
        url = baseUrl+"/data_master/sales/"+id;
        $("#formPegawai").attr('action', url);
        $("#formPegawai").attr('method', 'POST');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_sales/'+id,
            dataType: 'json',
            success: function (data) {
                $("#name").val(data.NAME_SALES);
                $("#alamat").val(data.ADDRESS_SALES);
                $("#phone").val("0"+data.PHONE_SALES);
            },
            error:function(){
                console.log(data);
            }
        });

        $("#modal-tambah-pegawai").modal("show");
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
