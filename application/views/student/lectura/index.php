<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>3D FlipBook</title>
     <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/flipbook/css/black-book-view.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/flipbook/css/font-awesome.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/flipbook/css/lightbox.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/flipbook/css/short-black-book-view.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/flipbook/css/short-white-book-view.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/flipbook/css/white-book-view.css">
    <style type="text/css">
      body {
          margin: 0;
          padding: 0;
      }
      .solid-container {
        height: 100vh;
      }
    </style>
  </head>
  <body>

    <div class="flip-book-container solid-container" src="<?php echo base_url() ?>uploads/archivos/curp_JDSJ.pdf">

    </div>

   
    <script src="<?php echo base_url() ?>assets/flipbook/js/html2canvas.min.js"></script>
    <script src="<?php echo base_url() ?>assets/flipbook/js/three.min.js"></script>
    <script src="<?php echo base_url() ?>assets/flipbook/js/pdf.min.js"></script>
    <script src="<?php echo base_url() ?>assets/flipbook/js/3dflipbook.min.js"></script>
  </body>
</html>