$(document).ready(function(){
    $("#vendor").addClass("active")
    $("#data_master").addClass("active")
    var url = "";

    var table_pemilik_kendaraan = $('#table-pemilik-kendaraan').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/pemilik_kendaraan_datatable',
            data: function(d) {

            }
        },
        columns:[
          {data:"NAME_VENDRS",name:"NAME_VENDRS"},
          {data:"ADDRESS_VENDORS",name:"ADDRESS_VENDORS"},
          {data:"PHONE_VENDORS",name:"PHONE_VENDORS"},
          {data:"EMAIL_VENDORS",name:"EMAIL_VENDORS"},
        //   {data:"action",name:"",className:"text-center",orderable: false, searchable: false},
        {
            data: null,
            className: "text-center",
            orderable: false,
            searchable: false,
            render: function ( data, type, row ) {
              return '<a onClick="edit('+data.ID_VENDORS+')" id="'+data.ID_VENDORS+'" class="btn btn-primary btn-sm tombol-edit-pegawai"><i class="fa fa-pencil"></i></a>';
            }
        }
        ]
    });

    $(".tombol-tambah-pemilik_kendaraan").on("click", function(){
        $("#name").val("");
        $("#alamat").val("");
        $("#phone").val("");

        $("#judul-modal").html("Tambah Pemilik Kendaraan");
        url = baseUrl+"/data_master/pemilik_kendaraan"
        $("#formPemilikKendaraan").attr('action', url);
        $("#formPemilikKendaraan").attr('method', 'POST');
    });

    $('#phone').mask('000000000000');

    $('#table-pemilik_kendaraan tbody').on('click', '.tombol-edit-pemilik_kendaraan', function () {
        var id = $(this).attr("id");
        $("#judul-modal").html("Edit Pemilik Kendaraan");
        url = baseUrl+"/data_master/pemilik_kendaraan/"+id;
        $("#formPemilikKendaraan").attr('action', url);
        $("#formPemilikKendaraan").attr('method', 'POST');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_pemilik_kendaraan/'+id,
            dataType: 'json',
            success: function (data) {
                $("#name").val(data.NAME_VENDRS);
                $("#alamat").val(data.ADDRESS_VENDORS);
                $("#phone").val("0"+data.PHONE_VENDORS);
                $("#email").val("0"+data.EMAIL_VENDORS);
            },
            error:function(){
                console.log(data);
            }
        });

        $("#modal-tambah-pemilik_kendaraan").modal("show");
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
