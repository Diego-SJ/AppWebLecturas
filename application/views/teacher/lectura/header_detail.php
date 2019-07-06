<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper">

    <!--=========== Content Header (Page header) =========== -->
    <section class="content-header">
          <h1>
            Configuracioón de lectura
          </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Web/Home')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?php echo site_url('Web/Lecturas')?>"><i class="fa fa-book"></i> Lecturas</a></li>
            <li class="active text-azuld"><i class="fa fa-info-circle text-azuld"></i> Detalle lectura</li>
        </ol>
    </section>
    <!--=========== Content Header (Page header) =========== -->

    <section class="content">
        <div id="header_lectura_detail" class="row">


<!-- titulo lectura -->
          <div class="col-md-4">
            <div class="box box-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-azul">
                <a class="bg-maroon" href="<?php echo site_url('Web/Lecturas/detail');?>/<?php echo $detail_lectura->idLectura; ?>">
                <div  class="widget-user-image">
                  <img class="img-circle img-thumbnail circle-blue"  
                  src="<?php echo base_url(); ?>assets/img/book-green.png" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?php echo $detail_lectura->titulo; ?> </h3>
                <h5 class="widget-user-desc">Autor: <i><?php echo $detail_lectura->autor; ?></i></h5>
              </a>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li><a>Fecha de creación <span class="pull-right badge bg-azul"><?php echo $detail_lectura->fecha_creacion; ?></span></a></li>
                  <li><a href="<?php echo site_url('Web/Lecturas/editLectura');?>/<?php echo $detail_lectura->idLectura; ?>">Editar <span class="pull-right badge bg-yellow"> <i class="fa fa-edit"></i> </span></a></li>
                  <li>
                    <form action="<?php echo site_url('Web/Lecturas/updtStatus')?>/<?php echo $detail_lectura->idLectura; ?>" method="post">
                      <input type="text" name="status_enabled_lecture" id="status_enabled_lecture" value="<?php echo $detail_lectura->idEstado; ?>" hidden="true">
                      <?php 
                        if($detail_lectura->idEstado == 1){
                          echo "<button class=\"btn btn-block bg-white btn-flat\">No publicada <i class=\"fa fa-square-o\"></i></button>";
                        } else {
                          echo "<button class=\"btn btn-block bg-secondary text-green btn-flat\">Lectura publicada <i class=\"fa fa-check-square-o\"></i></button>";
                        }
                      ?>
                    </form>
                  </li>

                </ul>
              </div>
            </div>
          </div>

          <!-- paginas lectura -->
          <a href="<?php echo site_url('Web/Pagina/pages')?>/<?php echo $detail_lectura->idLectura; ?>" class="col-md-4 col-sm-12">
            <div class="info-box text-azuld">
              <span class="info-box-icon text-white bg-azul"><i class="fa fa-file-text"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">LECTURA</span>

                <div class="progress">
                  <div class="progress-bar bg-gray" style="width: 100%"></div>
                </div>
                <span class="progress-description">
                  <i>Contenido de la lectura.</i>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>

          <!-- reactivos lectura -->
          <a href="<?php echo base_url(); ?>Web/Actividades/activities/<?php echo $detail_lectura->idLectura; ?>" class="col-md-4 col-sm-12">
            <div class="info-box text-green">
              <span class="info-box-icon text-white bg-verde"><i class="fa fa-cubes"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">REACTIVOS</span>
                <div class="progress">
                  <div class="progress-bar bg-gray" style="width: 100%"></div>
                </div>
                    <span class="progress-description">
                      <i>Actividades de la lectura.</i>
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>

          <a data-toggle="modal" data-target="#attemps-form" class="col-md-8 col-sm-12">
            <div class="info-box text-yellow">
              <span class="info-box-icon text-white bg-yellow"><i class="fa fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-number">INTENTOS (<?php echo $detail_lectura->attemps; ?>)</span>
                <div class="progress">
                  <div class="progress-bar bg-gray" style="width: 100%"></div>
                </div>
                    <span class="progress-description">
                      <i>Veces que el alumno puede repetir las evaluaciones.</i>
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </a>

          <!-- MODAL ATTEMPS LECTURA -->
          <div id="attemps-form" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-azul">
                      <h3 class="modal-title" id="exampleModalLiveLabel"><i class="fa fa-heart"></i> Intentos</h3>
                  </div>
                  <div class="modal-body">
                      <form method="POST" action="<?php echo site_url('Web/Lecturas/attemps')?>/<?php echo $detail_lectura->idLectura; ?>">
                          <div class="form-group">
                              <label for="frm_titulo" class="col-form-label">Elije el número de intentos que el alumno tendrá para respoder cada tipo de reactivos. <br>
                              Nota: si no se ingresa un número de intentos, 2 es el número predeterminado.</label>
                              <div class="input-group col-sm-6">
                                  <span class="input-group-addon bg-azul"><i class="fa fa-heart text-white"></i></span>
                                  <input type="number" name="num_attemps" class="form-control" value="<?php echo $detail_lectura->attemps; ?>" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <button type="submit" class="btn btn-azul"><i class="fa fa-save"></i> Guardar</button>
                              <a class="btn bg-gray" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</a>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          </div>
          
        </div>