$(document).ready(function(){
    $("#setting").addClass("active")
    $("#data_master").addClass("active")

    // $("#formSubmit").on("click", function(){
    //     $.ajax({
    //         type: 'POST',
    //         url: baseUrl+'/data_master/setting',
    //         dataType: 'json',
    //         success: function (data) {
    //             $(".layout-wrapper").load(baseUrl+"/data_master/settings")
    //         },
    //         error:function(){
    //             console.log(data);
    //         }
    //     });
    // })
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
