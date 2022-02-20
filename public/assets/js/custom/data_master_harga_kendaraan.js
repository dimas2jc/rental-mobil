$(document).ready(function(){
    $("#harga_kendaraan").addClass("active")
    $("#data_master").addClass("active")
    var url = "";

    var table_harga = $('#table-harga').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/harga_kendaraan_datatable',
            data: function(d) {

            }
        },
        columns:[
          {data:"NOPOL",name:"NOPOL"},
          {data:"NAMA_VARIAN",name:"NAMA_VARIAN"},
          {data:"KAPASITAS_BBM",name:"KAPASITAS_BBM"},
          {data:"PRICE_VEHICLES",name:"PRICE_VEHICLES"},
          {data:"TIME_RENT",name:"TIME_RENT"},
        {
            data: null,
            className: "text-center",
            orderable: false,
            searchable: false,
            render: function ( data, type, row ) {
              return '<a onClick="edit('+data.ID_VEHICLES+')" id="'+data.ID_VEHICLES+'" class="btn btn-primary btn-sm tombol-edit-pegawai"><i class="fa fa-pencil"></i></a>';
            }
        }
        ]
    });

    $(".tombol-tambah-harga").on("click", function(){
        $("#name").val("");
        $("#alamat").val("");
        $("#phone").val("");

        $("#judul-modal").html("Tambah Harga Kendaraan");
        url = baseUrl+"/data_master/harga_kendaraan"
        $("#formHarga").attr('action', url);
        $("#formHarga").attr('method', 'POST');
    });

    $('#harga').mask('000000000000');
    $('#waktu').mask('00');

    $('#table-harga tbody').on('click', '.tombol-edit-harga', function () {
        var id = $(this).attr("id");
        $("#judul-modal").html("Edit Harga Kendaraan");
        url = baseUrl+"/data_master/harga_kendaraan/"+id;
        $("#formHarga").attr('action', url);
        $("#formHarga").attr('method', 'POST');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_harga_kendaraan/'+id,
            dataType: 'json',
            success: function (data) {
                $("#kendaraan").val(data.ID_VEHICLES);
                $("#harga").val(data.PRICE_VEHICLES);
                // $("#waktu").val(data.TIME_RENT);
            },
            error:function(){
                console.log(data);
            }
        });

        $("#modal-tambah-harga").modal("show");
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
