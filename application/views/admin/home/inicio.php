
<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper">

    <!--=========== Content Header (Page header) =========== -->
    <section class="content-header">
          <h1>
            Panel de administración
            <small>Inicio</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-home"></i> Inicio</a></li>
        </ol>
    </section>
    <!--=========== Content Header (Page header) =========== -->

    <section class="content">
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>
                <?php
                if(!empty($t_alumno)){
                  echo $t_alumno->total_alumno; 
                } else {
                  echo "0";
                }
                ?>
                </h3>

                <p>Alumnos</p>
              </div>
              <div class="icon">
                <i class="ion ion-happy"></i>
              </div>
              <a class="small-box-footer"> Total de alumnos registrados <i class="fa fa-info-circle"></i></a>
            </div>
          </div>

    

          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>
                  <?php if(!empty($t_Lecturas)){
                    echo $t_Lecturas->total_lectura;
                    } else {
                      echo "0";
                    } ?>  
                </h3>

                <p>Lecturas</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-bookmarks"></i>
              </div>
              <a class="small-box-footer"> Total lecturas registradas <i class="fa fa-info-circle"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>
                  <?php
                if(!empty($t_Docentes)){ echo $t_Docentes->total_docente;
                } else {  echo "0"; } ?>    
                </h3>

                <p>Profesores</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
              <a href="<?php echo site_url('Web/admin/Docente')?>" class="small-box-footer"> Más información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
    </div>
          <!-- ./col -->
          <!-- ./col -->
            <!-- small box -->
          
       <!--  <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Vertical Progress Bars Different Sizes</h3>
            </div>
            <div class="box-body text-center">
              <p>By adding the class <code>.vertical</code> and <code>.progress-sm</code>, <code>.progress-xs</code> or
                <code>.progress-xxs</code> we achieve:</p>

              <div class="progress vertical active">
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="height: 40%">
                  <span class="sr-only">40%</span>
                </div>
              </div>
              <div class="progress vertical progress-sm">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="height: 100%">
                  <span class="sr-only">100%</span>
                </div>
              </div>
              <div class="progress vertical progress-xs">
                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 60%">
                  <span class="sr-only">60%</span>
                </div>
              </div>
              <div class="progress vertical progress-xxs">
                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 60%">
                  <span class="sr-only">60%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->


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


                    


