

<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper">

    <!--=========== Content Header (Page header) =========== -->
    <section class="content-header">
          <h1>
            Panel de administración
            <small>Inicio</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-home text-azuld"></i> Inicio</a></li>
        </ol>
    </section>
    <!--=========== Content Header (Page header) =========== -->

    <section class="content">
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-azul">
              <div class="inner">
                <h3>
                <?php if(!empty($teacher_alumnos)){ echo $teacher_alumnos->total_alumnos; } else { echo "0"; } ?>
                </h3>

                <p>Alumnos</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?php echo site_url('Web/Alumno')?>" class="small-box-footer"> Más información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-verde">
              <div class="inner">
                <h3>
                <?php if(!empty($teacher_lecturas)){ echo $teacher_lecturas->total_lecturas; } else { echo "0"; } ?>    
                </h3>

                <p>Lecturas</p>
              </div>
              <div class="icon">
                <i class="fa fa-university"></i>
              </div>
              <a href="<?php echo site_url('Web/Lecturas')?>" class="small-box-footer"> Más información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div id="disabled-button-form-ana" class="col-lg-3 col-xs-6 reg-alumno" data-toggle="modal" data-target="#modalNewAlumno">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3>+</h3>

                <p>Registrar alumno</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a class="small-box-footer"> Acceso directo <i class="fa fa-plus-circle"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-xs-6" data-toggle="modal" data-target="#addLecturaModal">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>+</h3>

                <p>Registrar lectura</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a class="small-box-footer"> Acceso directo <i class="fa fa-plus-circle"></i></a>
            </div>
          </div>
        <!-- ./col -->
        </div>

         <!-- CALENDARIO -->
        <div class="row">
        <div class="col-md-4">
          <div class="box box-solid">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendario</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
          </div>
          <!-- /. box -->

          
        </div>
        <!-- /.col -->

        <div class="col-md-8">
          <div class="box box-solid collapsed-box">
            <div class="box-header">
              <i class="fa fa-user text-azuld"></i>

              <h3 class="box-title">Editar datos del perfil</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-azul btn-sm" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" method="post" 
                    action="<?php echo site_url('Web/Home/updateUsuario')?>/<?php echo $teacher_info->idUsuario; ?>">
                  <!-- hidden -->
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="inputName" id="inputName" 
                      value="<?php if(!empty($teacher_info)){echo $teacher_info->nombre;} ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPaterno" class="col-sm-2 control-label">A. paterno</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="inputPaterno" id="inputPaterno" 
                      value="<?php if(!empty($teacher_info)){echo $teacher_info->a_paterno;} ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputMaterno" class="col-sm-2 control-label">A. materno</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="inputMaterno" id="inputMaterno"
                      value="<?php if(!empty($teacher_info)){echo $teacher_info->a_materno;} ?>" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputCorreo" class="col-sm-2 control-label">Correo</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="inputCorreo" id="inputCorreo"
                      value="<?php if(!empty($teacher_info)){echo $teacher_info->correo;} ?>" required="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-azul"><i class="fa fa-save"></i> Guardar cambios</button>
                    </div>
                  </div>
                </form>
            </div>

            
          </div>

          <?php 
            if(!empty($this->session->flashdata("error_one"))){
                    echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                    echo "<span>".$this->session->flashdata("error_one")."</span><br>";
                    echo "</div>";
            }
            if(!empty($this->session->flashdata("error_two"))){
                    echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                    echo "<span>".$this->session->flashdata("error_two")."</span><br>";
                    echo "</div>";
            }
            if(!empty($this->session->flashdata("error_three"))){
                    echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                    echo "<span>".$this->session->flashdata("error_three")."</span><br>";
                    echo "</div>";
            }
            if(!empty($this->session->flashdata("successUpdt"))){
                    echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                    echo "<span>".$this->session->flashdata("successUpdt")."</span><br>";
                    echo "</div>";
            } 
          ?>

          <div class="box box-solid collapsed-box">
            <div class="box-header">
              <i class="fa fa-lock text-azuld"></i>

              <h3 class="box-title">Cambiar contraseña</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-azul btn-sm" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="form-horizontal" method="post" 
                    action="<?php echo site_url('Web/Home/updatePassword')?>/<?php echo $teacher_info->idUsuario; ?>">
                  <div class="form-group">
                    <label for="inputPassActual" class="col-sm-2 control-label">Contraseña actual</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="inputPassActual" id="inputPassActual" 
                      placeholder="******">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassActual" class="col-sm-2 control-label">Nueva contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="inputPassNueva" id="inputPassNew" placeholder="******" required pattern=".{8,}" title="Utiliza una mezcla de letras, números y/o carácteres especiales. La contraseña debe tener un minímo de 8 digítos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassConfirm" class="col-sm-2 control-label">Confirmar contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="inputPassConfirm" id="inputPassConfirm" placeholder="******" required pattern=".{8,}" title="Utiliza una mezcla de letras, números y/o carácteres especiales. La contraseña debe tener un minímo de 8 digítos">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button id="btnUpdPass" type="button" class="btn btn-azul"><i class="fa fa-save"></i> Actualizar contraseña</button>
                      <button id="sendPass" type="submit" class="btn bg-blue">send</button>
                    </div>
                  </div>
                </form>

                <script type="text/javascript">
                  $(document).ready(function (){
                    
                  });
                </script>
            </div>
          </div>
          <!-- /. box -->
        </div>
      </div>


    </section>
</div>

<!-- =====================.FIN CONTENIDO ========================== -->
