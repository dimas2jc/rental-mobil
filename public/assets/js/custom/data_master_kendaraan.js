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
            {data:"nopol",name:"nopol"},
            {data:"name_vendrs",name:"name_vendrs"},
            {data:"nama_varian",name:"nama_varian"},
            {data:"name_vehicles_bodies",name:"name_vehicles_bodies"},
            {data:"name_doc_vehicles",name:"name_doc_vehicles"},
            {data:"warna",name:"warna"},
            {data:"no_rangka",name:"no_rangka"},
            {data:"nomesin",name:"nomesin"},
            {data:"tahun_pembuatan",name:"tahun_pembuatan"},
            {data:"no_stnk",name:"no_stnk"},
            {data:"nama_stnk",name:"nama_stnk"},
            {data:"alamat_stnk",name:"alamat_stnk"},
            {data:"no_bpkb",name:"no_bpkb"},
            {data:"tgl_kir",name:"tgl_kir"},
            {
                data: null,
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                return '<a id="'+data.id_vehicles+'" class="btn btn-primary btn-sm tombol-edit-kendaraan"><i class="fa fa-pencil"></i></a>';
                }
            }
        ]
    });

    $(".tombol-tambah-kendaraan").on("click", function(){
        $("#pemilik").val("");
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

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_pemilik_kendaraan',
            dataType: 'json',
            success: function (data) {
                $('#pemilik').empty();
                $('#pemilik').append('<option selected disabled>Pilih Pemilik . . </option>');
                for(let i=0;i<data.length;i++){
                    $('#pemilik').append(
                        '<option value="'+data[i].id_vendors+'" >'+data[i].name_vendrs+'</option>'
                    );
                }
            },
            error:function(data){
                console.log(data);
            }
        });

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_dokumen_kendaraan',
            dataType: 'json',
            success: function (data) {
                $('#dokumen').empty();
                $('#dokumen').append('<option selected disabled>Pilih Dokumen . . </option>');
                for(let i=0;i<data.length;i++){
                    $('#dokumen').append(
                        '<option value="'+data[i].id_doc_vehicles+'" >'+data[i].name_doc_vehicles+'</option>'
                    );
                }
            },
            error:function(data){
                console.log(data);
            }
        });

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_body_kendaraan',
            dataType: 'json',
            success: function (data) {
                $('#body').empty();
                $('#body').append('<option selected disabled>Pilih Body . . </option>');
                for(let i=0;i<data.length;i++){
                    $('#body').append(
                        '<option value="'+data[i].id_vehicle_bodies+'" >'+data[i].name_vehicles_bodies+'</option>'
                    );
                }
            },
            error:function(data){
                console.log(data);
            }
        });

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_varian_kendaraan',
            dataType: 'json',
            success: function (data) {
                $('#varian').empty();
                $('#varian').append('<option selected disabled>Pilih Varian . . </option>');
                for(let i=0;i<data.length;i++){
                    $('#varian').append(
                        '<option value="'+data[i].id_varian_vehicles+'" >'+data[i].nama_varian+'</option>'
                    );
                }
            },
            error:function(data){
                console.log(data);
            }
        });

    });

    let id_pemilik;
    let id_dokumen;
    let id_body;
    let id_varian;
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
                console.log(data);
                id_pemilik = data[0].id_vendors;
                id_dokumen = data[0].id_doc_vehicles;
                id_body = data[0].id_vehicle_bodies;
                id_varian = data[0].id_varian_vehicles;
                $('#pemilik').empty();
                $('#dokumen').empty();
                $('#body').empty();
                $('#varian').empty();
                $('#pemilik').append(new Option(data[0].name_vendrs, data[0].id_vendors));
                $('#dokumen').append(new Option(data[0].name_doc_vehicles, data[0].id_doc_vehicles));
                $('#body').append(new Option(data[0].name_vehicles_bodies, data[0].id_vehicle_bodies));
                $('#varian').append(new Option(data[0].nama_varian, data[0].id_varian_vehicles));
                $("#nopol").val(data[0].nopol);
                $("#no_rangka").val(data[0].no_rangka);
                $("#no_mesin").val(data[0].nomesin);
                $("#warna").val(data[0].warna);
                $("#kapasitas_bbm").val(data[0].kapasitas_bbm);
                $("#tahun_pembuatan").val(data[0].tahun_pembuatan);
                $("#no_stnk").val(data[0].no_stnk);
                $("#nama_stnk").val(data[0].nama_stnk);
                $("#masa_stnk").val(data[0].masa_stnk);
                $("#alamat_stnk").val(data[0].alamat_stnk);
                $("#no_bpkb").val(data[0].no_bpkb);
                $("#tgl_kir").val(data[0].tgl_kir);
            },
            error:function(data){
                console.log(data);
            }
        });

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_pemilik_kendaraan',
            dataType: 'json',
            success: function (data) {
                for(let i=0;i<data.length;i++){
                    if(data[i].id_vendors != id_pemilik){
                        $('#pemilik').append(
                            '<option value="'+data[i].id_vendors+'" >'+data[i].name_vendrs+'</option>'
                        );
                    }
                }
            },
            error:function(data){
                console.log(data);
            }
        });

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_dokumen_kendaraan',
            dataType: 'json',
            success: function (data) {
                for(let i=0;i<data.length;i++){
                    console.log(data);
                    if(data[i].id_doc_vehicles != id_dokumen){
                        $('#dokumen').append(
                            '<option value="'+data[i].id_doc_vehicles+'" >'+data[i].name_doc_vehicles+'</option>'
                        );
                    }
                }
            },
            error:function(data){
                console.log(data);
            }
        });

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_body_kendaraan',
            dataType: 'json',
            success: function (data) {
                for(let i=0;i<data.length;i++){
                    if(data[i].id_vehicle_bodies != id_body){
                        $('#body').append(
                            '<option value="'+data[i].id_vehicle_bodies+'" >'+data[i].name_vehicles_bodies+'</option>'
                        );
                    }
                }
            },
            error:function(data){
                console.log(data);
            }
        });

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_varian_kendaraan',
            dataType: 'json',
            success: function (data) {
                for(let i=0;i<data.length;i++){
                    if(data[i].id_varian_vehicles != id_varian){
                        $('#varian').append(
                            '<option value="'+data[i].id_varian_vehicles+'" >'+data[i].nama_varian+'</option>'
                        );
                    }
                }
            },
            error:function(data){
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
          {data:"nama_varian",name:"nama_varian"},
          {data:"vehicles_type",name:"vehicles_type"},
          {data:"vehicles_pabrikan",name:"vehicles_pabrikan"},
          {data:"silinder",name:"silinder"},
          {data:"kapasitas_cc",name:"kapasitas_cc"},
          {data:"tipe_bbm",name:"tipe_bbm"},
          {data:"kapasitas_bbm",name:"kapasitas_bbm"},
          {data:"rasio_bbm",name:"rasio_bbm"},
          {data:"jenis_transmisi",name:"jenis_transmisi"},
          {data:"konfigurasi_axle",name:"konfigurasi_axle"},
          {data:"jumlah_sumbu",name:"jumlah_sumbu"},
          {data:"ukuran_ban",name:"ukuran_ban"},
          {data:"vehicles_sit",name:"vehicles_sit"},
          {data:"note",name:"note"},
        {
            data: null,
            className: "text-center",
            orderable: false,
            searchable: false,
            render: function ( data, type, row ) {
              return '<a id="'+data.id_varian_vehicles+'" class="btn btn-primary btn-sm tombol-edit-varian"><i class="fa fa-pencil"></i></a>';
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
                $("#name_varian").val(data.nama_varian);
                $("#type_varian").val(data.vehicles_type);
                $("#pabrikan").val(data.vehicles_pabrikan);
                $("#silinder").val(data.silinder);
                $("#kapasitas_cc").val(data.kapasitas_cc);
                $("#tipe_bbm").val(data.tipe_bbm);
                $("#kapasitas_bbm_varian").val(data.kapasitas_bbm);
                $("#rasio_bbm").val(data.rasio_bbm);
                $("#jenis_transmisi").val(data.jenis_transmisi);
                $("#konfigurasi_axle").val(data.konfigurasi_axle);
                $("#jumlah_sumbu").val(data.jumlah_sumbu);
                $("#ukuran_ban").val(data.ukuran_ban);
                $("#vehicle_sit").val(data.vehicles_sit);
                $("#note").val(data.note);
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
            {data:"name_doc_vehicles",name:"name_doc_vehicles"},
            {data:"type_doc_vehicles",name:"type_doc_vehicles"},
            {
                data:"expired_doc_vehicles",
                name:"expired_doc_vehicles",
                render  : function(data,type,row) {
                    return data.substring(0, 10);
                }
            },
            {data:"description",name:"description"},
            {
                data: null,
                className: "text-center",
                orderable: false,
                searchable: false,
                render: function ( data, type, row ) {
                    return '<a id="'+data.id_doc_vehicles+'" class="btn btn-primary btn-sm tombol-edit-dokumen"><i class="fa fa-pencil"></i></a>';
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

    $('#table-dokumen tbody').on('click', '.tombol-edit-dokumen', function () {
        var id = $(this).attr("id");
        console.log(id);
        $("#judul-modal-dokumen").html("Edit Dokumen");
        url = baseUrl+"/data_master/dokumen_kendaraan/"+id;
        $("#formDokumen").attr('action', url);
        $("#formDokumen").attr('method', 'POST');

        $.ajax({
            type: 'GET',
            url: baseUrl+'/data_master/get_dokumen_kendaraan/'+id,
            dataType: 'json',
            success: function (data) {
                $("#name_dokumen").val(data.name_doc_vehicles);
                $("#type_dokumen").val(data.type_doc_vehicles);
                $("#expired_date").val((data.expired_doc_vehicles).substring(0, 10));
                $("#description").html(data.description);
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
