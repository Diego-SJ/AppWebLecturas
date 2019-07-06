<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper">

  <!--=========== Content Header (Page header) =========== -->
  <section class="content-header">
    <h1>
      Detalle del alumno
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('Web/Home')?>"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="<?php echo site_url('Web/Alumno')?>"><i class="fa fa-users"></i> Alumnos</a></li>
      <li class="active"><i class="fa fa-user text-azuld"></i> Detalle alumno</li>
    </ol>
  </section>
  <!--=========== Content Header (Page header) =========== -->

  <section class="content">
    <div class="row">
      <!-- /.col -->
      <div class="col-md-4">

        <?php if (!empty($alumno)): ?>
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-azul">
              <h5 class="widget-user-username"><?php echo ucwords($alumno->nombre." ".$alumno->a_paterno." ".$alumno->a_materno); ?></h5>
            </div>
            <div class="widget-user-image">
              <?php if($alumno->genero == ("masculino")): ?>
                <img class="img-circle bg-yellow" src="<?php echo base_url(); ?>assets/img/chico.png" alt="User Avatar">
                <?php else: ?>
                  <img class="img-circle bg-yellow" src="<?php echo base_url(); ?>assets/img/chica.png" alt="User Avatar">
                <?php endif ?>
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-sm-6 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo $alumno->grado; ?></h5>
                      <span class="description-text">Grado</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm- border-right">
                    <div class="description-block">
                      <h5 class="description-header"><?php echo strtoupper($alumno->grupo); ?></h5>
                      <span class="description-text">Grupo</span>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
          <?php endif ?>

        </div>

        <div class="col-md-4 col-sm-4 col-xs-4">
          <div class="info-box bg-azul">
            <span class="info-box-icon"><i class="fa fa-bookmark"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Lecturas completadas</span>
              <span class="info-box-number">
                <?php if(!empty($alumno_detail)){echo $alumno_detail->lecturas;} else {echo "0";} ?>
              </span>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                en curso
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-4">
          <div class="info-box bg-verde">
            <span class="info-box-icon"><i class="fa  fa-check-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total de aciertos</span>
              <span class="info-box-number">
                <?php if(!empty($alumno_detail)){echo $alumno_detail->aciertos;} else {echo "0";} ?>
              </span>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                en curso
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-4 col-xs-4">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-graduation-cap"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">PROMEDIO</span>
              <span class="info-box-number">
                <?php if(!empty($alumno_detail)){echo $alumno_detail->promedio;} else {echo "0";} ?>
              </span>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                prom. general
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-4 col-sm-4 col-xs-4">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-times-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TOTAL DE INCORRECTAS</span>
              <span class="info-box-number">
                <?php if(!empty($alumno_detail)){echo $alumno_detail->incorrectos;} else {echo "0";} ?>
              </span>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                en curso
              </span>
            </div>
          </div>
        </div>

    </div>


    <div class="row">
      <div class="col-xs-12">
        <div class="box box-solid">
          <div class="box-body">
            <table id="tabla_alumnos_teacher_detail" class="table table-bordered table-hover">
              <thead class="bg-azul">
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Titulo</th>
                  <th class="text-center">Aciertos</th>
                  <th class="text-center">Incorrectos</th>
                  <th class="text-center">Promedio</th>
                  <th class="text-center">Fecha de conclusión</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php $indice = 1; ?>
                <?php if(!empty($alumno_lecturas)): ?>
                  <?php foreach($alumno_lecturas as $lectura): ?>
                    <tr>
                      <td class="text-center"><?php echo $indice++; ?></td>
                      <td class="text-center"><?php echo $lectura->titulo; ?></td>
                      <td class="text-center"><span class="badge bg-green"><?php echo $lectura->aciertos; ?></span></td>
                      <td class="text-center"><span class="badge bg-red"><?php echo $lectura->incorrectos; ?></span></td>
                      <td class="text-center"><span class="badge bg-yellow"><?php echo $lectura->calificacion; ?></span></td>
                      <td class="text-center"><?php echo $lectura->fecha; ?></td>
                      <td class="text-center">
                        <a 
                        href="<?php echo site_url('Web/Lecturas/detail');?>/<?php echo $lectura->idLectura; ?>" class="btn btn-success">
                        <span class="fa fa-eye text-white"></span>
                      </a>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php endif ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</section>

</div>