$(document).ready(function(){
    $("#customer").addClass("active")
    $("#data_master").addClass("active")
    var url = "";

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    //Customer
    var table_customer = $('#table-customer').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/customer_datatable',
            data: function(d) {

            }
        },
        columns:[
            {
                data:"no_kk_customer",
                name:"no_kk_customer",
                render: function(data, type, row){
                    if(data != null){
                        return data;
                    }else{
                        return "-";
                    }
                }
            },
            {data:"no_nik_customer",name:"no_nik_customer"},
            {data:"name_customer",name:"name_customer"},
            {data:"address_customer",name:"address_customer"},
            {
                data:"phone_customer",
                name:"phone_customer",
                render: function(data, type, row){
                    return '0'+data;
                }
            },
            {
                data:"sosmed_customer",
                name:"sosmed_customer",
                render: function(data, type, row){
                    if(data != null){
                        return data;
                    }else{
                        return "-";
                    }
                }
            },
            {data:"email_customer",name:"email_customer"},
            {
                data:"is_blacklist",name:"is_blacklist",
                render: function(data, type, row){
                    if(data == 0){
                        return '<button type="submit" class="btn btn-linkedin btn-sm btn-status-customer" id="'+row.id_customer+'">No</button>';
                    }else{
                        return '<button type="submit" class="btn btn-google btn-sm btn-status-customer" id="'+row.id_customer+'">Yes</button>';
                    }
                }
            },
            {
                data: null,
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                    return '<a id="'+data.id_customer+'" class="btn btn-primary btn-sm tombol-edit-customer"><i class="fa fa-pencil"></i></a>';
                }
            }
        ]
    });

    $('#table-customer tbody').on('click', '.btn-status-customer', function () {
        var id = $(this).attr("id");
        $.ajax({
            type: 'PUT',
            url: baseUrl+'/data_master/edit_status_customer/'+id,
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                alert('Customer Berhasil di Blacklist');
                window.location.href = "/data_master/customer";
            },
            error:function(data){
                console.log(data);
            }
        });
    });

    $('.tombol-tambah-customer').on('click', function () {
        $("#judul-modal-customer").html("Tambah Customer");
        url = baseUrl+"/data_master/customer";
        $("#formCustomer").attr('action', url);
        $("#formCustomer").attr('method', 'POST');

        $("#modal-tambah-customer").modal("show");
    });

    $('#table-customer tbody').on('click', '.tombol-edit-customer', function () {
        var id = $(this).attr("id");
        $("#judul-modal-customer").html("Edit Customer");
        url = baseUrl+"/data_master/customer/"+id;
        $("#formCustomer").attr('action', url);
        $("#formCustomer").attr('method', 'POST');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_customer/'+id,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $("#no_kk").val(data.no_kk_customer);
                $("#no_nik").val(data.no_nik_customer);
                $("#name").val(data.name_customer);
                $("#alamat").val(data.address_customer);
                $("#phone").val("0"+data.phone_customer);
                $("#sosmed").val(data.sosmed_customer);
                $("#email").val(data.email_customer);
                $("#sales").val(data.id_sales);
            },
            error:function(data){
                console.log(data);
            }
        });

        $("#modal-tambah-customer").modal("show");
    });

    //Customer
    var table_customer = $('#table-customer-b').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/customer_b_datatable',
            data: function(d) {

            }
        },
        columns:[
            {
                data:"no_kk_customer",
                name:"no_kk_customer",
                render: function(data, type, row){
                    if(data != null){
                        return data;
                    }else{
                        return "-";
                    }
                }
            },
            {data:"no_nik_customer",name:"no_nik_customer"},
            {data:"name_customer",name:"name_customer"},
            {data:"address_customer",name:"address_customer"},
            {
                data:"phone_customer",
                name:"phone_customer",
                render: function(data, type, row){
                    return '0'+data;
                }
            },
            {
                data:"sosmed_customer",
                name:"sosmed_customer",
                render: function(data, type, row){
                    if(data != null){
                        return data;
                    }else{
                        return "-";
                    }
                }
            },
            {data:"email_customer",name:"email_customer"},
            {
                data:"is_blacklist",
                name:"is_blacklist",
                render: function(data, type, row){
                    if(data == 0){
                        return '<button type="submit" class="btn btn-linkedin btn-sm btn-status-customer" id="'+row.id_customer+'">No</button>';
                    }else{
                        return '<button type="submit" class="btn btn-google btn-sm btn-status-customer" id="'+row.id_customer+'">Yes</button>';
                    }
                }
            }
        ]
    });

    $('#table-customer-b tbody').on('click', '.btn-status-customer', function () {
        var id = $(this).attr("id");
        $.ajax({
            type: 'PUT',
            url: baseUrl+'/data_master/unblacklist_customer/'+id,
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                alert('Customer Berhasil di Unblacklist');
                window.location.href = "/data_master/customer";
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
