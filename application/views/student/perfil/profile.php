

<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper theme-2">

    <?php if($this->session->userdata('USER_SESSION') == ''){  ?>
    <script type="text/javascript">
      $('document').ready(function(){
        $("#message_bot_profile").modal();
      });
    </script>
  <?php } ?>

    <section class="content">

      <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
          <div class="box box-widget widget-user box-shadow">
            <div class="widget-user-header bg-azul">
              <h3 class="widget-user-username">
                <?php 
                  if($this->session->userdata('USER_NAME') != ''){
                    echo ucwords($this->session->userdata('USER_NAME_C'));
                  } else {
                    echo "Alumno";
                  }
                ?>
              </h3>
              <h5 class="widget-user-desc">
                <?php 
                  if($this->session->userdata('USER_USER') != ''){
                    echo ucfirst($this->session->userdata('USER_USER'));
                  } else {
                    echo "Alumno";
                  }
                ?>
              </h5>
            </div>
            <div class="widget-user-image">
              <?php if($this->session->userdata('USER_GENDER') != '' && 
                      $this->session->userdata('USER_GENDER') == 'masculino'): ?>
                <img src="<?php echo base_url(); ?>assets/img/chico.png" class="img-circle bg-aqua" >
              <?php else: ?>
                <img src="<?php echo base_url(); ?>assets/img/chica.png" class="img-circle bg-maroon-active" >
              <?php endif ?>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 col-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">
                      <?php
                        if(!empty($student_info)){
                          echo strtoupper($student_info->grado." ".$student_info->grupo) ; 
                        } else {
                          echo "no se pudo cargar";
                        }
                      ?>
                    </h5>
                    <span class="description-text"><span class="label bg-verde">GRADO Y GRUPO</span></span>
                  </div>
                </div>
                <div class="col-sm-6 col-6">
                  <div class="description-block">
                    <h5 class="description-header">
                      <?php
                        if(!empty($student_info)){
                          echo ucwords($student_info->teacher) ; 
                        } else {
                          echo "no se pudo cargar";
                        }
                      ?>
                    </h5>
                    <span class="description-text"><span class="label bg-verde">PROFESOR</span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
          <div class="box box-solid box-shadow">
            <div class="box-header with-border bg-verde">
              <h3 class="box-title"><i class="fa fa-line-chart"></i> Progreso</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <span class="text-gris-dark"><i class="fa fa-book"></i> 
                Lecturas leidas <?php if(!empty($progreso)){echo ($progreso);}else{echo "0";}?>%
              </span>
              <div class="progress progress-sm">
                <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" 
                style="width: <?php if(!empty($progreso)){echo ($progreso);}else{echo "0";}?>%">
                </div>
              </div>

              <!-- <span class="text-gris-dark"><i class="fa fa-question-circle"></i> Preguntas contestadas 58%</span>
              <div class="progress progress-sm">
                <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 58%">
                </div>
              </div>

              <span class="text-gris-dark"><i class="fa fa-graduation-cap"></i> Promedio general 85</span>
              <div class="progress progress-sm">
                <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                </div>
              </div> -->

            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <?php 
            if(!empty($this->session->flashdata("error"))){
                    echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                    echo "<span>".$this->session->flashdata("error")."</span><br>";
                    echo "</div>";
            } 
            if(!empty($this->session->flashdata("success"))){
                    echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                    echo "<span>".$this->session->flashdata("success")."</span><br>";
                    echo "</div>";
            } 
          ?>
        <div class="col-md-12">
          <div class="nav-tabs-custom">

            <!-- menu tab -->
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_completas" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-book text-verde"></i> Lecturas completas
                </a>
              </li>
              <li class="">
                <a href="#tab_pendientes" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-book text-yellow"></i> Lecturas pendientes
                </a>
              </li>
              <li class="">
                <a href="#tab_perfil" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-user text-blue"></i> Editar perfil
                </a>
              </li>
              <li class="">
                <a href="#tab_password" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-lock text-maroon"></i> Cambiar contraseña
                </a>
              </li>
              <li class="">
                <a href="#tab_theme" data-toggle="tab" aria-expanded="false">
                  <i class="fa fa-paint-brush text-navy"></i> Cambiar tema
                </a>
              </li>
            </ul>


            <div class="tab-content border-null">
              <br>

              <!-- LECTURAS COMPLEATAS -->
              <div class="tab-pane active" id="tab_completas">
                <div class="row">

                <?php if(!empty($lectura_complete)): ?>
                  <?php foreach($lectura_complete as $lectura): ?>
                  <a href="<?php echo site_url('Movil/Lecturas/detail');?>/<?php echo $lectura->idLectura; ?>">
                  <div class="col-md-4">
                    <div class="box box-widget widget-user-2 bg-white">
                      <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
                        <div class="widget-user-image">
                          <img class="img-circle img-thumbnail circle-green" 
                            src="<?php echo base_url(); ?>assets/img/book-green.png">
                        </div>
                        <h6 class="widget-user-desc text-gris">completa</h6>
                        <h5 class="widget-user-desc box-title text-black"><?php echo $lectura->titulo; ?></h5>
                        <h6 class="widget-user-desc text-azul">
                          <i class="fa fa-check-circle"></i> <?php echo $lectura->aciertos; ?> 
                          <i class="fa fa-times-circle"></i> <?php echo $lectura->incorrectos; ?>
                          <i class="fa fa-graduation-cap"></i> <?php echo $lectura->calificacion; ?>
                        </h6>
                      </div>
                    </div>
                  </div>
                </a>
                  <?php endforeach ?>
                <?php else: ?>
                  <div class="col-md-12">
                    <div class="box box-widget widget-user-2 bg-white">
                      <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
                        <h5>No has completado ninguna lectura</h5>
                      </div>
                    </div>
                  </div>
                <?php endif ?>

                </div>
              </div>

              <!-- LECTURAS PENDIENTES -->
              <div class="tab-pane" id="tab_pendientes">
                <div class="row">

                  <?php if(!empty($lectura_pending)): ?>
                  <?php foreach($lectura_pending as $lectura): ?>
                  <a href="<?php echo site_url('Movil/Lecturas/detail');?>/<?php echo $lectura->idLectura; ?>">
                  <div class="col-md-4">
                    <div class="box box-widget widget-user-2 bg-white">
                      <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
                        <div class="widget-user-image">
                          <img class="img-circle img-thumbnail circle-yellow" 
                            src="<?php echo base_url(); ?>assets/img/book-yellow.png">
                        </div>
                        <h6 class="widget-user-desc text-gris">pendiente</h6>
                        <h5 class="widget-user-desc box-title text-black"><?php echo $lectura->titulo; ?></h5>
                        <h6 class="widget-user-desc text-azul">
                          <i class="fa fa-check-circle"></i> <?php echo $lectura->aciertos; ?> 
                          <i class="fa fa-times-circle"></i> <?php echo $lectura->incorrectos; ?>
                          <i class="fa fa-graduation-cap"></i> <?php echo $lectura->calificacion; ?>
                        </h6>
                      </div>
                    </div>
                  </div>
                </a>
                  <?php endforeach ?>
                <?php else: ?>
                  <div class="col-md-12">
                    <div class="box box-widget widget-user-2 bg-white">
                      <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
                        <h5>No tienes lecturas pendientes</h5>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                </div>
              </div>

              <!-- EDITAR PERFIL -->
              <div class="tab-pane" id="tab_perfil">
                <form class="form-horizontal" method="post"
                action="<?php echo site_url('Movil/Perfil/editPerfil')?>">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nombre(s)</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="inputName" id="inputName" placeholder="nombre"
                      value="<?php if(!empty($student_info)){echo ucwords($student_info->nombre);}else{echo "no se pudo cargar";}?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ep_paterno" class="col-sm-2 control-label">Apellido paterno</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="ep_paterno" id="ep_paterno" placeholder="apellido paterno"
                      value="<?php if(!empty($student_info)){echo ucwords($student_info->a_paterno);}else{echo "no se pudo cargar";}?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ep_materno" class="col-sm-2 control-label">Apellido materno</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="ep_materno" id="ep_materno" placeholder="apellido materno"
                      value="<?php if(!empty($student_info)){echo ucwords($student_info->a_materno);}else{echo "no se pudo cargar";}?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ep_usuario" class="col-sm-2 control-label">Usuario</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="ep_usuario" id="ep_usuario" placeholder="usuario"
                      value="<?php if(!empty($student_info)){echo ucwords($student_info->usuario);}else{echo "no se pudo cargar";}?>" required pattern=".{8,}" title="Utiliza una mezcla de letras y números. El usuario debe ser minímo de 8 digítos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ep_grado" class="col-sm-2 control-label">Grado</label>

                    <div class="col-sm-3">
                      <input type="number" class="form-control" name="ep_grado" id="ep_grado" placeholder="grado"
                      value="<?php if(!empty($student_info)){echo ucwords($student_info->grado);}else{echo "no se pudo cargar";}?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ep_grupo" class="col-sm-2 control-label">Grupo</label>

                    <div class="col-sm-3">
                      <input type="text" class="form-control" name="ep_grupo" id="ep_grupo" placeholder="grupo"
                      value="<?php if(!empty($student_info)){echo ucwords($student_info->grupo);}else{echo "no se pudo cargar";}?>" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn bg-blue"> Guardar</button>
                    </div>
                  </div>
                </form>
              </div>

              <!-- CAMBIAR PASSWORD --> 
              <div class="tab-pane" id="tab_password">
                <form class="form-horizontal" method="post" action="<?php echo site_url('Movil/Perfil/editPassword')?>">
                  <div class="form-group">
                    <label for="ep_pass_actual" class="col-sm-2 control-label">Contraseña actual</label>

                    <div class="col-sm-6">
                      <input type="password" class="form-control" name="ep_pass_actual" id="ep_pass_actual" placeholder="contraseña actual" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ep_pass_confirm" class="col-sm-2 control-label">Nueva Contraseña</label>

                    <div class="col-sm-6">
                      <input type="password" class="form-control" name="ep_pass_nueva" id="ep_pass_nueva" placeholder="nueva contraseña" required pattern=".{8,}" title="Utiliza una mezcla de letras, números y/o carácteres especiales. La contraseña debe tener un minímo de 8 digítos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ep_pass_confirm" class="col-sm-2 control-label">Confirmar Contraseña</label>

                    <div class="col-sm-6">
                      <input type="password" class="form-control" name="ep_pass_confirm" id="ep_pass_confirm" placeholder="confirmar contraseña" required pattern=".{8,}" title="Utiliza una mezcla de letras, números y/o carácteres especiales. La contraseña debe tener un minímo de 8 digítos">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn bg-maroon"> Guardar</button>
                    </div>
                  </div>
                </form>
              </div>

              <!-- CAMBIAR TEMA -->
              <div class="tab-pane" id="tab_theme">
                <form class="form-horizontal" method="post" action="<?php echo site_url('Movil/Perfil/theme')?>">
                  <div class="form-group">
                    <label for="ep_pass_actual" class="col-sm-2 control-label">Eije un tema</label>

                    <div class="col-sm-6">
                      <input type="text" name="idAlumno" value="<?php if(!empty($student_info)){ echo ($student_info->idAlumno);}?>" hidden>

                      <select class="form-control" id="pick_thee" name="pick_thee">
                        <option value="skin-blue">Azul</option>
                        <option value="skin-black">Negro</option>
                        <option value="skin-purple">Morado</option>
                        <option value="skin-green">Verde</option>
                        <option value="skin-red">Rojo</option>
                        <option value="skin-yellow">Amarillo</option>
                        <!-- <option value="skin-blue-light">Azul light</option>
                        <option value="skin-black-light">Negro ligth</option>
                        <option value="skin-purple-light">Morado ligth</option>
                        <option value="skin-green-light">Verde ligth</option>
                        <option value="skin-red-light">Rojo ligth</option>
                        <option value="skin-yellow-light">Amarillo ligth</option> -->
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn bg-navy"> Guardar</button>
                    </div>
                  </div>
                </form>
              </div>

            </div>

          </div>
        </div>
      </div>

    	

    </section>
</div>
<!-- =====================.FIN CONTENIDO ========================== -->

