<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Recuperar contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
          <div id="test_result" class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">RECUPERAR CONTRASEÑA</h1>
            <p class="text-muted">Ingresa el correo eléctronico al que enviaremos un link para recuperar tu contrseña.</p>
            <form id="reset_password_form" action="<?php echo base_url().'Welcome/resetLink';?>" method="post" class="mt-4">
              <div class="form-group mb-4">
                <input id="email_in" type="email" name="email_reset" placeholder="Correo" class="form-control shadow form-control-lg" required title="El correo eléctronico es requerido">
              </div>
              
              <div class="form-group mb-4">
                  <button id="sendLinkReset" type="submit" class="btn btn-primary shadow px-5">Enviar link de recuperación</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    $( function() {
      $("#reset_password_form").bind("submit",function(){
        // Capturamnos el boton de envío
        var btnEnviar = $("#sendLinkReset");
        $.ajax({
          type: $(this).attr("method"),
          url: $(this).attr("action"),
          data:$(this).serialize(),
          beforeSend: function(){
            btnEnviar.text("Enviando link");
            btnEnviar.val("Enviando");
            // Para input de tipo button
            btnEnviar.attr("disabled","disabled");
            $("#email_in").attr("disabled","disabled");
          },complete:function(data){
            btnEnviar.val("Enviar formulario");
            btnEnviar.removeAttr("disabled");
          },success: function(data){
            $("#test_result").html(data);
          },error: function(data){
            alert("Problemas al tratar de enviar el formulario");
            btnEnviar.val("Enviar formulario");
            btnEnviar.removeAttr("disabled");
          }
        });
        return false;
      });

    });
  </script>
</html>