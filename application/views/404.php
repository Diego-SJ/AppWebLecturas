<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>App lecturas | 404 Pagina no encontrada</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png?3">
  <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/custom_theme.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/calendar/css/datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/css/dataTable.min.css">
  <style type="text/css">
    html {
      min-height: 100%;
      position: relative;
    }
    body {
      margin: 0;
      margin-bottom: 0px;
    }
    footer {
      background-color: black;
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 50px;
      color: white;
    }
  </style>
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="">

  <div class="content">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('Welcome');?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">404</li>
      </ol>`
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="error-page">
        <h1 class="headline text-blue"> 404</h1>

        <div class="error-content">
          <h2><i class="fa fa-warning text-blue"></i> ¡Oops! P&aacute;gina no encontrada.</h2>

          <h4>
            No podemos encontrar la p&aacute;gina que t&uacute; intentas ver.
            Mientras tanto, puedes <!-- <a href="<?php echo site_url('Welcome');?>"> -->regresar a inicio<!-- </a> -->.
          </h4>

          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Buscar">

              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn bg-blue btn-flat"><i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

  </div>

  <footer>
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="<?php echo site_url('Welcome');?>" class="text-blue"><?php echo $this->config->item('app_name'); ?></a>.</strong> ITSOEH.
  </footer>
</div>
</body>
</html>
