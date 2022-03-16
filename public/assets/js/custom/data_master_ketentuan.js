$(document).ready(function(){
    $("#ketentuan").addClass('active');

    var table = $('#table-ketentuan').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/ketentuan_datatable',
            data: function(d) {

            }
        },
        columns:[
            {data:"id",name:"id"},
            {data:"ketentuan",name:"ketentuan"},
            {
                data: null,
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                return '<a id="'+data.id+'" class="btn btn-primary btn-sm tombol-hapus"><i class="fa fa-trash"></i></a>';
                }
            }
        ]
    });

    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $(".tombol-tambah-ketentuan").on("click", function(){
        $("#ketentuan").html("");

        $("#judul-modal-ketentuan").html("Tambah Ketentuan");
        url = baseUrl+"/ketentuan"
        $("#formKetentuan").attr('action', url);
        $("#formKetentuan").attr('method', 'POST');
    });

    $('#table-ketentuan tbody').on('click', '.tombol-hapus', function () {
        var id = $(this).attr("id");
        url = baseUrl+"/ketentuan/"+id;

        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function (data) {
                table.ajax.reload();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil dihapus.',
                    showConfirmButton: false,
                    timer: 2000
                });
            },
            error:function(data){
                console.log(data);
            }
        });
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
