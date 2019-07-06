<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recuperar contraseña</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    
    <!--  CSS-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png?3">
    <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/style.default.css" id="theme-stylesheet">
  </head>
  <body>
    <div class="page-holder d-flex align-items-center ">
      <div class="container py-5">
        <div class="row align-items-center">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="<?php echo base_url(); ?>assets/img/illustration.svg" alt="" class="img-fluid"></div>
          </div>
          <div id="check_result" class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">NUEVA CONTRASEÑA</h1>
            <p class="text-muted">Ingresa tu nueva contraseña para poder iniciar sesi&oacute;n.</p>
            <form id="recover_password_form" method="post" action="<?php echo site_url('Welcome/updatePassword/'.$tokenD)?>" class="mt-4">
              <div class="form-group mb-4">
                <input id="np" type="password" name="new_password" placeholder="Nueva contraseña" class="form-control border-0 shadow form-control-lg" pattern=".{8,}" title="Utiliza una mezcla de letras, números y/o carácteres especiales. La contraseña debe tener un minímo de 8 digítos" required>
                <br>
                <input id="npr" type="password" name="new_password_repeat" placeholder="Confirmar contraseña" class="form-control border-0 shadow form-control-lg" pattern=".{8,}" title="Utiliza una mezcla de letras, números y/o carácteres especiales. La contraseña debe tener un minímo de 8 digítos" required>
              </div>
              
              <div class="form-group mb-4">
                <button id="sendPassData" type="submit" class="question_hide"></button>
                <button id="updtPass" type="button" class="btn btn-primary shadow px-5">Actualizar contraseña</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="<?php echo base_url() ?>assets/theme/js/actions-footer.js"></script>
  <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $( function() {
      $("#recover_password_form").bind("submit",function(){
        // Capturamnos el boton de envío
        var btnEnviar = $("#sendPassData");
        $.ajax({
          type: $(this).attr("method"),
          url: $(this).attr("action"),
          data:$(this).serialize(),
          beforeSend: function(){
            btnEnviar.text("Actualizando");
            btnEnviar.attr("disabled","disabled");
          },complete:function(data){
            btnEnviar.text("Actualizar contraseña");
            btnEnviar.removeAttr("disabled");
          },success: function(data){
            $("#check_result").html(data);
          },error: function(data){
            alert("No hemos podido actualizar tu contraseña en estos momentos, intenta más tarde.");
          }
        });
        return false;
      });

      $("#updtPass").on("click", function (){
          if(checkPassReset()){
            $("#sendPassData").click();
          }
      });
    });
  </script>
</html>