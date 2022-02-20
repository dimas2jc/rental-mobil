$(document).ready(function(){
    $("#kendaraan").addClass("active")
    $("#data_master").addClass("active")
    var url = "";

    // Select2
    const selectComponent = document.getElementsByClassName("select-component");
    $(selectComponent).select2();

    // Kendaraan
    var table_kendaraan = $('#table-kendaraan').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/kendaraan_datatable',
            data: function(d) {

            }
        },
        columns:[
            {data:"NOPOL",name:"NOPOL"},
            {data:"NAME_VENDRS",name:"NAME_VENDRS"},
            {data:"WARNA",name:"WARNA"},
            {data:"KAPASITAS_BBM",name:"KAPASITAS_BBM"},
            {
                data: null,
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                return '<a onClick="edit('+data.ID_VEHICLES+')" id="'+data.ID_VEHICLES+'" class="btn btn-primary btn-sm tombol-edit-kendaraan"><i class="fa fa-pencil"></i></a>';
                }
            }
        ]
    });

    $(".tombol-tambah-kendaraan").on("click", function(){
        $("#vedor").val("");
        $("#dokumen").val("");
        $("#body").val("");
        $("#varian").val("");
        $("#nopol").val("");
        $("#no_rangka").val("");
        $("#no_mesin").val("");
        $("#warna").val("");
        $("#kapasitas_bbm").val("");
        $("#tahun_pembuatan").val("");
        $("#no_stnk").val("");
        $("#nama_stnk").val("");
        $("#masa_stnk").val("");
        $("#alamat_stnk").val("");
        $("#no_bpkb").val("");
        $("#tgl_kir").val("");

        $("#judul-modal-kendaraan").html("Tambah Kendaraan");
        url = baseUrl+"/data_master/kendaraan"
        $("#formKendaraan").attr('action', url);
        $("#formKendaraan").attr('method', 'POST');
    });

    $('#table-kendaraan tbody').on('click', '.tombol-edit-kendaraan', function () {
        var id = $(this).attr("id");
        $("#judul-modal-kendaraan").html("Edit Kendaraan");
        url = baseUrl+"/data_master/kendaraan/"+id;
        $("#formKendaraan").attr('action', url);
        $("#formKendaraan").attr('method', 'POST');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_kendaraan/'+id,
            dataType: 'json',
            success: function (data) {
                $("#vedor").val(data.ID_VENDORS);
                $("#dokumen").val(data.ID_DOC_VEHICLES);
                $("#body").val(data.ID_VEHICLE_BODIES);
                $("#varian").val(data.ID_VARIAN_VEHICLES);
                $("#nopol").val(data.NOPOL);
                $("#no_rangka").val(data.NO_RANGKA);
                $("#no_mesin").val(data.NOMESIN);
                $("#warna").val(data.WARNA);
                $("#kapasitas_bbm").val(data.KAPASITAS_BBM);
                $("#tahun_pembuatan").val(data.TAHUN_PEMBUATAN);
                $("#no_stnk").val(data.NO_STNK);
                $("#nama_stnk").val(data.NAMA_STNK);
                $("#masa_stnk").val(data.MASA_STNK);
                $("#alamat_stnk").val(data.ALAMAT_STNK);
                $("#no_bpkb").val(data.NO_BPKB);
                $("#tgl_kir").val(data.TGL_KIR);
            },
            error:function(){
                console.log(data);
            }
        });

        $("#modal-tambah-kendaraan").modal("show");
    });

    $('#tahun_pembuatan').mask('0000')

    // Varian
    var table_varian = $('#table-varian').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/varian_datatable',
            data: function(d) {

            }
        },
        columns:[
          {data:"NAMA_VARIAN",name:"NAMA_VARIAN"},
          {data:"VEHICLES_TYPE",name:"VEHICLES_TYPE"},
          {data:"VEHICLES_PABRIKAN",name:"VEHICLES_PABRIKAN"},
          {data:"TIPE_BBM",name:"TIPE_BBM"},
          {data:"NOTE",name:"NOTE"},
        //   {data:"action",name:"",className:"text-center",orderable: false, searchable: false},
        {
            data: null,
            className: "text-center",
            orderable: false,
            searchable: false,
            render: function ( data, type, row ) {
              return '<a onClick="edit('+data.ID_VARIAN_VEHICLES+')" id="'+data.ID_VARIAN_VEHICLES+'" class="btn btn-primary btn-sm tombol-edit-varian"><i class="fa fa-pencil"></i></a>';
            }
        }
        ]
    });

    $(".tombol-tambah-varian").on("click", function(){
        $("#name_varian").val("");
        $("#type_varian").val("");
        $("#pabrikan").val("");
        $("#silinder").val("");
        $("#kapasitas_cc").val("");
        $("#tipe_bbm").val("");
        $("#kapasitas_bbm_varian").val("");
        $("#rasio_bbm").val("");
        $("#janis_transmisi").val("");
        $("#konfigurasi_axle").val("");
        $("#jumlah_sumbu").val("");
        $("#ukuran_ban").val("");
        $("#vehicle_sit").val("");
        $("#note").val("");

        $("#judul-modal-varian").html("Tambah Varian");
        url = baseUrl+"/data_master/varian_kendaraan"
        $("#formVarian").attr('action', url);
        $("#formVarian").attr('method', 'POST');
    });

    $('#table-varian tbody').on('click', '.tombol-edit-varian', function () {
        var id = $(this).attr("id");
        $("#judul-modal-varian").html("Edit Varian");
        url = baseUrl+"/data_master/varian_kendaraan/"+id;
        $("#formVarian").attr('action', url);
        $("#formVarian").attr('method', 'POST');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_varian_kendaraan/'+id,
            dataType: 'json',
            success: function (data) {
                $("#name_varian").val(data.NAMA_VARIAN);
                $("#type_varian").val(data.VEHICLES_TYPE);
                $("#pabrikan").val(data.VEHICLES_PABRIKAN);
                $("#silinder").val(data.SILINDER);
                $("#kapasitas_cc").val(data.KAPASITAS_CC);
                $("#tipe_bbm").val(data.TIPE_BBM);
                $("#kapasitas_bbm_varian").val(data.KAPASITAS_BBM);
                $("#rasio_bbm").val(data.RASIO_BBM);
                $("#janis_transmisi").val(data.JENIS_TRANSMISI);
                $("#konfigurasi_axle").val(data.KONFIGURASI_AXLE);
                $("#jumlah_sumbu").val(data.JUMLAH_SUMBU);
                $("#ukuran_ban").val(data.UKURAN_BAN);
                $("#vehicle_sit").val(data.VEHICLES>SIT);
                $("#note").val(data.NOTE);
            },
            error:function(){
                console.log(data);
            }
        });

        $("#modal-tambah-varian").modal("show");
    });

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
            {data:"NAME_VEHICLES_BODIES",name:"NAME_VEHICLES_BODIES"},
            {
                data: null,
                className: "text-center",
                orderable: true,
                searchable: false,
                render: function ( data, type, row ) {
                    let html = ''
                    if(data.IS_ACTIVE == 1){
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
                return '<a onClick="edit('+data.ID_VEHICLE_BODIES+')" id="'+data.ID_VEHICLE_BODIES+'" class="btn btn-primary btn-sm tombol-edit-body"><i class="fa fa-pencil"></i></a>';
                }
            }
        ]
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
                $("#name").val(data.NAME_VEHICLES_BODIES);
                if(data.IS_ACTIVE == 1){
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

    // Dokumen
    var table_dokumen = $('#table-dokumen').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax : {
            // headers : {'Authorization' : 'Bearer '+authUser.api_token},
            url : baseUrl+'/api/dokumen_datatable',
            data: function(d) {

            }
        },
        columns:[
            {data:"NAME_DOC_VEHICLES",name:"NAME_DOC_VEHICLES"},
            // {data:"TYPE_DOC_VEHICLES",name:"TYPE_DOC_VEHICLES"},
            {data:"EXPIRED_DOC_VEHICLES",name:"EXPIRED_DOC_VEHICLES"},
            {data:"DESCRIPTION",name:"DESCRIPTION"},
            {
                data: null,
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                return '<a onClick="edit('+data.ID_DOC_VEHICLES+')" id="'+data.ID_DOC_VEHICLES+'" class="btn btn-primary btn-sm tombol-edit-dokumen"><i class="fa fa-pencil"></i></a>';
                }
            }
        ]
    });

    $(".tombol-tambah-dokumen").on("click", function(){
        $("#name_dokumen").val("");
        $("#type_dokumen").val("");
        $("#expired_date").val("");
        $("#description").html("");
        $("#file").val("");

        $("#file").attr('required', '');

        $("#judul-modal-dokumen").html("Tambah Dokumen");
        url = baseUrl+"/data_master/dokumen_kendaraan"
        $("#formDokumen").attr('action', url);
        $("#formDokumen").attr('method', 'POST');
    });

    $('#table-body tbody').on('click', '.tombol-edit-dokumen', function () {
        var id = $(this).attr("id");
        $("#judul-modal-dokumen").html("Edit Dokumen");
        url = baseUrl+"/data_master/dokumen_kendaraan/"+id;
        $("#formDokumen").attr('action', url);
        $("#formDokumen").attr('method', 'POST');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_dokumen_kendaraan/'+id,
            dataType: 'json',
            success: function (data) {
                $("#name_dokumen").val(data.NAME_DOC_VEHICLES);
                $("#type_dokumen").val(data.TYPE_DOC_VEHICLES);
                $("#expired_date").val(data.EXPIRED_DOC_VEHICLES);
                $("#description").html(data.DESCRIPTION);
            },
            error:function(){
                console.log(data);
            }
        });

        $("#modal-tambah-dokumen").modal("show");
    });
    $('#type_dokumen').mask('0000000000')

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
