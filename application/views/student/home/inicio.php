

<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper theme-2">

    <?php if($this->session->userdata('USER_SESSION') == ''){  ?>
      <script type="text/javascript">
      $('document').ready(function(){
        $("#message_bot_inicio").modal();
      });
    </script>
    <?php } ?>

    <section class="content">

    	<div class="row">
    		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-azul box-shadow">
              <div class="widget-user-image">
                <img class="img-circle img-thumbnail circle-white" src="<?php echo base_url(); ?>assets/img/android-happy.png"  alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">¡Hola, <?php 
                      if($this->session->userdata('USER_NAME') != ''){
                        echo ucwords($this->session->userdata('USER_NAME'));
                      } else {
                        echo "Alumno";
                      }
                    ?>!</h3>
              <h5 class="widget-user-desc">Aquí estan tus resultados generales.</h5>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
    	</div>

        <div class="row">

          <div class="col-md-6">
          <div class="box box-widget widget-user-2 bg-white">
            <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
              <div class="widget-user-image">
                <img class="img-circle img-thumbnail circle-blue" 
                src="<?php echo base_url(); ?>assets/img/libros.png" alt="User Avatar">
              </div>
              <h5 class="widget-user-desc text-gris">Lecturas</h5>
              <h4 class="widget-user-desc box-title">
                <?php
                if(!empty($his_alumno)){
                  echo $his_alumno->lecturas; 
                } else {
                  echo "0";
                }
                ?>
              </h4>
              <h5 class="widget-user-desc text-azul">
                <i class="fa fa-book"></i> Total de lecturas completadas 
              </h5>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="box box-widget widget-user-2 bg-white">
            <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
              <div class="widget-user-image">
                <img class="img-circle img-thumbnail circle-yellow" 
                src="<?php echo base_url(); ?>assets/img/graduacion.png" alt="User Avatar">
              </div>
              <h5 class="widget-user-desc text-gris">Promedio</h5>
              <h4 class="widget-user-desc box-title">
                <?php
                if(!empty($his_alumno)){
                  echo $his_alumno->promedio; 
                } else {
                  echo "0";
                }
                ?>
              </h4>
              <h5 class="widget-user-desc text-amarillo">
                <i class="fa fa-graduation-cap"></i> Promedio general 
              </h5>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="box box-widget widget-user-2 bg-white shadow">
            <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
              <div class="widget-user-image">
                <img class="img-circle img-thumbnail circle-green" 
                src="<?php echo base_url(); ?>assets/img/star.png" alt="User Avatar">
              </div>
              <h5 class="widget-user-desc text-gris">Aciertos</h5>
              <h4 class="widget-user-desc box-title">
                <?php
                if(!empty($his_alumno)){
                  echo $his_alumno->aciertos; 
                } else {
                  echo "0";
                }
                ?>
              </h4>
              <h5 class="widget-user-desc text-verde-dark">
                <i class="fa fa-check-circle"></i> Aciertos totales 
              </h5>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="box box-widget widget-user-2 bg-white shadow">
            <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
              <div class="widget-user-image">
                <img class="img-circle img-thumbnail circle-red" 
                src="<?php echo base_url(); ?>assets/img/error.png" alt="User Avatar">
              </div>
              <h5 class="widget-user-desc text-gris">Incorrectos</h5>
              <h4 class="widget-user-desc box-title">
                <?php
                if(!empty($his_alumno)){
                  echo $his_alumno->incorrectos; 
                } else {
                  echo "0";
                }
                ?>
              </h4>
              <h5 class="widget-user-desc text-rojo">
                <i class="fa fa-times-circle"></i> Incorrectos totales 
              </h5>
            </div>
          </div>
        </div>

        </div>
      </div>


    </section>
</div>

<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog"
aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header  bg-blue" style="color: white;">
            <h3 class="modal-title" id="exampleModalLiveLabel"><i class="fa fa-book"></i> Agregar nueva lectura</h3>
        </div>
        <div class="modal-body">
            <form method="POST" action="<?php echo site_url('Web/Lecturas/addLectura')?>">
                <div class="form-group">
                    <label for="frm_titulo" class="col-form-label">Título</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                        <input type="text" name="frm_titulo" class="form-control" placeholder="título de la lectura" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="frm_autor" class="col-form-label">Autor</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="frm_autor" class="form-control" placeholder="autor de la lectura" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="frm_desc_corta" class="col-form-label">Descripción corta</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-comments"></i></span>
                        <textarea class="form-control" name="frm_desc_corta" placeholder="Pequeña introducción de la lectura." required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
                    <a class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- =====================.FIN CONTENIDO ========================== -->
