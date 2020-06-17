<link href="assets/css/toastr.min.css" rel="stylesheet">
<script src="assets/js/jquery-3.3.1.js"></script>
<script src="assets/js/toastr.min.js"></script>

<script type="text/javascript">

$(function() {
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "rtl": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": 300,
    "hideDuration": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000,
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  var msg = '';

  if(msg_notification == '1') {
    msg = 'Menú guardado con éxito';
    toastr.success(msg);
  }
  else if(msg_notification == '2'){
    msg = 'Menú actualizado con éxito';
    toastr.success(msg);
  }
  else if(msg_notification == '3'){
    msg = 'Menú eliminado con éxito';
    toastr.error(msg);
  }

  setTimeout(function(){
    $(location).attr('href', 'index.php');
  }, 5000);

});
</script>
