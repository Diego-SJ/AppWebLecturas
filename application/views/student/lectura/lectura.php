

<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper theme-2">
    <?php if($this->session->userdata('USER_SESSION') == ''){  ?>
    <script type="text/javascript">
      $('document').ready(function(){
        $("#message_bot_lecturas").modal();
      });
    </script>
    <?php } ?>

    <section class="content">

    	<div class="row">
    		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-azul box-shadow">
              <div  class="widget-user-image">
                <img class="img-circle img-thumbnail circle-white" src="<?php echo base_url(); ?>assets/img/android-angry.png"  alt="User Avatar">
              </div>
              <h3 class="widget-user-username">¡Elije una lectura!</h3>
              <h5 class="widget-user-desc">Completa las actividades al terminar cada lectura.</h5>
            </div>
          </div>
        </div>
    	</div>


      <!-- CONTENEDOR LECTURAS -->
      <div class="row">
        <?php if(!empty($lecturas_teacher)): ?>
          <?php foreach($lecturas_teacher as $lectura): ?>
            <a href="<?php echo site_url('Movil/Lecturas/detail');?>/<?php echo $lectura->idLectura; ?>">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="box box-widget widget-user-2 bg-white">
                <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
                  <div  class="widget-user-image">
                    <img class="img-circle img-thumbnail circle-purple"  
                    src="<?php echo base_url(); ?>assets/img/book-purple.png" alt="User Avatar">
                  </div>
                  <h6 class="widget-user-desc text-gris">
                    Publicada el: <?php echo $lectura->fecha_creacion; ?>
                  </h6>
                  <h5 class="widget-user-desc box-title text-black"><?php echo $lectura->titulo; ?></h5>
                  <h6 class="widget-user-desc text-azul">
                    <i class="fa fa-plus-circle"></i> Da click para ver más
                  </h6>
                </div>
              </div>
            </div>
            </a>
          <?php endforeach ?>
        <?php endif ?>
      </div>
      <!-- FIN CONTENEDOR LECTURAS -->

    </section>
</div>
<!-- =====================.FIN CONTENIDO ========================== -->

