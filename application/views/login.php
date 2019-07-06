<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inicio de sesión</title>
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
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">
              <?php echo $this->config->item('app_name'); ?>
            </h1>
            <h2 class="mb-4">¡BIENVENIDO!</h2>
            <p class="text-muted">Ingresa tu usuario o correo electronico con tu contraseña para iniciar sesión.</p>
            <?php 
            if(!empty($this->session->flashdata("error"))){
                    echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                    echo "<span>".$this->session->flashdata("error")."</span><br>";
                    echo "</div>";
            }
            if(!empty($this->session->flashdata("resetSuccess"))){
                    echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                    echo "<span>".$this->session->flashdata("resetSuccess")."</span><br>";
                    echo "</div>";
            } 
            ?>
            <form id="" class="" action="<?php echo site_url('Welcome/iniciarSesion')?>" method="post" class="mt-4">
              <div class="form-group mb-4">
                <input type="text" name="log_username" placeholder="Usuario o correo" class="form-control border-0 shadow form-control-lg" required pattern=".{8,}" title="El usuario debe ser minímo de 8 digítos">
              </div>
              <div class="form-group mb-4">
                <input type="password" name="log_passowrd" placeholder="Contraseña" class="form-control border-0 shadow form-control-lg text-violet" required pattern=".{8,}" title="La contraseña debe ser minímo de 8 digítos">
              </div>
              <div class="form-group mb-4 ">
                <select name="log_tipo_usuario" class="form-control ">
                  <option value="0" name="log_tipo_usuario">Selecciona un tipo de usuario</option>
                  <option value="1" name="log_tipo_usuario">Alumno</option>
                  <option value="2" name="log_tipo_usuario">Maestro</option>
                  <option value="3" name="log_tipo_usuario">Director</option>
                </select>
              </div>
              
              <div class="form-group mb-4">
                  <button type="submit" class="btn btn-primary shadow px-5">Iniciar sesión</button>
                  <a href="<?php echo site_url('Welcome/registro');?>" class="btn btn-danger shadow px-5">Registrarme</a>
              </div>
              <div class="form-group mb-4">
                  <a href="<?php echo site_url('Welcome/forgot');?>" class="">Olvide mi contraseña</a>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>