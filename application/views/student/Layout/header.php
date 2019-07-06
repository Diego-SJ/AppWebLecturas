<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lecture kids | Movil</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- CSS -->
  <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png?3">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/custom_theme.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/iCheck/all.css">

</head>
<body class="hold-transition <?php echo $this->session->userdata('USER_THEME'); ?> sidebar-mini" >

  <!-- =====================.INICIO DEL DIV QUE CONTIENE TODO ========================== -->
  <div class="wrapper">

    <header class="main-header">
      <!-- LOGO -->
      <a href="<?php echo base_url(); ?>Web/Home" class="logo">
        <span class="logo-mini"><b>A</b>L</span>
        <span class="logo-lg"><b>App</b>Lecturas</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <!------------ USER ACOUNT ----------------->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if($this->session->userdata('USER_GENDER') != '' && 
                          $this->session->userdata('USER_GENDER') == 'masculino'): ?>
                  <img src="<?php echo base_url(); ?>assets/img/chico.png" class="user-image circle-white" >
                <?php else: ?>
                  <img src="<?php echo base_url(); ?>assets/img/chica.png" class="user-image circle-white" >
                <?php endif ?>
                <span class="hidden-xs">
                  <?php 
                    if($this->session->userdata('USER_NAME') != ''){
                      echo ucwords($this->session->userdata('USER_NAME_C'));
                    } else {
                      echo "Alumno";
                    }
                 ?>
                </span>
              </a>

              <!---------- USER ACOUNT DETAIL ------------->
              <ul class="dropdown-menu">
                <li class="user-header">
                  <?php if($this->session->userdata('USER_GENDER') != '' && 
                          $this->session->userdata('USER_GENDER') == 'masculino'): ?>
                    <img src="<?php echo base_url(); ?>assets/img/chico.png" class="img-circle circle-white" >
                  <?php else: ?>
                    <img src="<?php echo base_url(); ?>assets/img/chica.png" class="img-circle circle-white" >
                  <?php endif ?>
                  <p>
                    <?php 
                      if($this->session->userdata('USER_NAME') != ''){
                        echo ucwords($this->session->userdata('USER_NAME_C'));
                      } else {
                        echo "Alumno";
                      }
                    ?>
                    <small>
                      <?php 
                          if($this->session->userdata('USER_USER') != ''){
                            echo ucfirst($this->session->userdata('USER_USER'));
                          } else {
                            echo "Alumno";
                          }
                       ?>
                    </small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-12 text-center">
                      <a>
                        <?php 
                          if($this->session->userdata('USER_GYG') != ''){
                            echo "Grado y grupo: ".ucfirst($this->session->userdata('USER_GYG'));
                          } else {
                            echo "No se pudo cargar";
                          }
                       ?>
                      </a>
                    </div>
                  </div>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <a  href="<?php echo site_url('Welcome/logout');?>" class="btn bg-red btn-flat ol--xl-12 col-lg-12 col-md-12 col-sm-12 col-12">Cerrar sesión</a>
                  </div>
                </li>
              </ul>

            </li>

          </ul>
        </div>

      </nav>

    </header>


    <!-- MENU DESPLEGABLE DE INICIO -->
    <aside class="main-sidebar theme-slide-2" style="border: 0;">

      <!-- SUB MENU -->
      <section class="sidebar">

        <!-- USER info -->
        <div class="user-panel treeview active">
          <div class="pull-left image">
            <?php if($this->session->userdata('USER_GENDER') != '' && 
                          $this->session->userdata('USER_GENDER') == 'masculino'): ?>
              <img src="<?php echo base_url(); ?>assets/img/chico.png" class="img-circle circle-white" >
            <?php else: ?>
              <img src="<?php echo base_url(); ?>assets/img/chica.png" class="img-circle circle-white" >
            <?php endif ?>
          </div>
          <div class="pull-left info">
            <p>
              <?php 
                  if($this->session->userdata('USER_USER') != ''){
                    echo ucfirst($this->session->userdata('USER_USER'));
                  } else {
                    echo "Alumno";
                  }
               ?>
            </p>
            <a><i class="fa fa-circle" style="color: greenyellow;"></i> Activo</a>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li>
            <a href="<?php echo base_url(); ?>Movil/Home" class="">
              <i class="fa fa-home text-white"></i> <span class="text-white">INICIO</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>Movil/Lecturas">
              <i class="fa fa-book text-white"></i> <span class="text-white">LECTURAS</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>Movil/Perfil">
              <i class="fa fa-user text-white"></i> <span class="text-white">PERFIL</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('Welcome/logout');?>">
              <i class="fa fa-sign-out text-white"></i> <span class="text-white">CERRAR SESIÓN</span>
            </a>
          </li>
        </ul>
      </section>
    </aside>
    <!-- MENU DESPLEGABLE DE INICIO -->