<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    
    <!--  CSS-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png?3">
    <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/style.default.css" id="theme-stylesheet">

    <script type="text/javascript">

    function validar(e) { // 1
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==8) return true; // 3
          
        patron =/[A-Za-z\s]/; // 4
        te = String.fromCharCode(tecla); // 5
        return patron.test(te); // 6
    }

    </script>

  </head>
  <body>
    <div class="page-holder d-flex align-items-center">
      <div class="container py-5">
        <div class="row align-items-center">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5"><img src="<?php echo base_url(); ?>assets/img/illustration.svg" alt="" class="img-fluid"></div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4"><?php echo $this->config->item('app_name'); ?></h1>
            <h2 class="mb-2">¡REGISTRATE!</h2>
            <p class="text-muted">Llena los campos con tu información.</p>
            <?php 
            if(!empty($errors)){
                  if(count($errors) > 0){
                    echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                    foreach($errors as $error)
                    {
                      echo "<span>".$error."</span><br>";
                    }
                    echo "</div>";
                  }
            } ?>
            <form id="loginForm" action="<?php echo site_url('Welcome/verificar')?>" method="post" class="mt-2">
              <div class="form-group mb-2">
              <input type="text" name="reg_name" placeholder="Nombre(s)" class="form-control border-0 shadow form-control-lg" required onkeypress="return validar(event)" title="Solo letras">
              </div>
              <div class="form-group mb-2">
                <input value="" type="text" name="reg_paterno" placeholder="Apellido paterno" class="form-control border-0 shadow form-control-lg" onkeypress="return validar(event)" title="Solo letras">
              </div>
              <div class="form-group mb-2">
                <input type="text" name="reg_materno" placeholder="Apellido materno" class="form-control border-0 shadow form-control-lg" onkeypress="return validar(event)" title="Solo letras">
              </div>
              <div class="form-group mb-2">
                <input type="text" name="reg_user" placeholder="Usuario" class="form-control border-0 shadow form-control-lg" required pattern=".{8,}" title="Utiliza una mezcla de letras y números. El usuario debe ser minímo de 8 digítos">
              </div>
              <div class="form-group mb-2">
                <input type="email" name="reg_email" placeholder="Correo electronico" class="form-control border-0 shadow form-control-lg" required>
              </div>
              <div class="form-group mb-2">
                <input type="password" name="reg_password" placeholder="Contraseña" class="form-control border-0 shadow form-control-lg text-violet" required pattern=".{8,}" title="Utiliza una mezcla de letras, números y/o carácteres especiales. La contraseña debe tener un minímo de 8 digítos">
              </div>
              <div class="form-group mb-2">
                <input type="password" name="reg_password_confirm" placeholder="Confirmar contraseña" class="form-control border-0 shadow form-control-lg text-violet" required pattern=".{8,}" title="Utiliza una mezcla de letras, números y/o carácteres especiales. La contraseña debe tener un minímo de 8 digítos">
              </div>
              <div class="form-group mb-2">
                <br>
                  <button type="submit" class="btn btn-danger shadow px-6">Registrarme</button>
                  <a href="<?php echo site_url('Welcome')?>" class="btn btn-primary shadow px-6">Iniciar sesión</a>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </body>
</html>