<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lecture kids | Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- CSS -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png?3">
  <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/custom_theme.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/calendar/css/datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/css/dataTable.min.css">

  
</head>
<body class="hold-transition skin-black sidebar-mini">

  <!-- =====================.INICIO DEL DIV QUE CONTIENE TODO ========================== -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url(); ?>Web/Home" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>L</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>App</b>Lecturas</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">


              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>assets/img/programador.png" class="user-image" alt="User Image">
                <span class="hidden-xs">
                  <?php 
                    if($this->session->userdata('USER_NAME') != ''){
                      echo ucwords($this->session->userdata('USER_NAME'));
                    } else {
                      echo "Teacher";
                    }
                 ?>
                 </span>
              </a>


              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header ">
                  <img src="<?php echo base_url(); ?>assets/img/programador.png" class="img-circle" alt="User Image">

                  <p>
                    <?php 
                      if($this->session->userdata('USER_NAME') != ''){
                        echo ucwords($this->session->userdata('USER_NAME'));
                      } else {
                        echo "Profesor";
                      }
                    ?>
                    <small>
                      <?php 
                          if($this->session->userdata('USER_USER') != ''){
                            echo ucfirst($this->session->userdata('USER_USER'));
                          } else {
                            echo "Profesor";
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
                          if($this->session->userdata('USER_EMAIL') != ''){
                            echo $this->session->userdata('USER_EMAIL');
                          } else {
                            echo "Profesor";
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
    <aside class="main-sidebar">

      <!-- SUB MENU -->
      <section class="sidebar">

        <!-- USER info -->
        <div class="user-panel treeview active">
          <div class="pull-left image">
            <img src="<?php echo base_url(); ?>assets/img/programador.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>
              <?php 
                  if($this->session->userdata('USER_USER') != ''){
                    echo ucfirst($this->session->userdata('USER_USER'));
                  } else {
                    echo "Teacher";
                  }
               ?>
            </p>
            <a ><i class="fa fa-circle text-success"></i> Activo</a>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"><b class="">MENÚ DE NAVEGACIÓN</b></li>
          <li>
            <a href="<?php echo base_url(); ?>Web/Home">
              <i class="fa fa-home"></i> <span>INICIO</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>Web/Lecturas">
              <i class="fa fa-book"></i> <span>LECTURAS</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>Web/Alumno">
              <i class="fa fa-users"></i> <span>ALUMNOS</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('Welcome/logout');?>">
              <i class="fa fa-sign-out"></i> <span>CERRAR SESIÓN</span>
            </a>
          </li>
        </ul>
      </section>
    </aside>
    <!-- MENU DESPLEGABLE DE INICIO -->