

<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper theme-2">

    <?php if($this->session->userdata('USER_SESSION') == ''){  ?>
    <script type="text/javascript">
      $('document').ready(function(){
        $("#message_bot_detail").modal();
      });
    </script>
  <?php } ?>

    <section class="content">
      <div class="row">
        <!-- LECTURA DETAIL -->
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
          <!-- COLUMNA 1 -->
          <div class="box box-widget widget-user box-shadow">
            <div class="widget-user-header bg-maroon-active">
              <h3 class="widget-user-username">
                <?php
                  if(!empty($lectura_info)){echo strtoupper($lectura_info->titulo);} else {echo "No se pudo cargar";}
                ?>
              </h3>
              <h5 class="widget-user-desc "><i>
                <?php
                  if(!empty($lectura_info)){
                    echo "subido el: ".$lectura_info->fecha_creacion; 
                  } else {
                    echo "No se pudo cargar";
                  }
                ?>
              </i></h5>
            </div>
            <div  class="widget-user-image">
              <img class="img-circle img-thumbnail circle-purple"  
              src="<?php echo base_url(); ?>assets/img/book-purple.png">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 col-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">
                      <?php
                        if(!empty($lectura_detail)){ echo $lectura_detail->aciertos; } else { echo "0"; }
                      ?>
                    </h5>
                    <span class="description-text"><span class="label bg-green"><i class="fa fa-check-circle"></i> Aciertos</span></span>
                  </div>
                </div>
                <div class="col-sm-4 col-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">
                      <?php if(!empty($lectura_detail)){ echo $lectura_detail->incorrectos; } else { echo "0";}?>
                    </h5>
                    <span class="description-text"><span class="label bg-red"><i class="fa fa-times-circle"></i> Incorrectos</span></span>
                  </div>
                </div>
                <div class="col-sm-4 col-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">
                      <?php
                        if(!empty($lectura_detail)){ echo $lectura_detail->calificacion; } else { echo "0.00"; }
                      ?>
                    </h5>
                    <span class="description-text"><span class="label bg-yellow"><i class="fa fa-graduation-cap"></i> Promedio</span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
          <div class="row">
            <div class="col-md-6">
              <div class="box box-widget widget-user-2 bg-white">
                <a href="<?php echo base_url(); ?>Movil/Lecturas/read/<?php if(!empty($lectura_info)){echo $lectura_info->idLectura;}?>">
                <div class="widget-user-header box-shadow-sm" style="padding: 10px 10px 5px 10px;">
                  <div  class="widget-user-image">
                    <img class="img-circle img-thumbnail circle-blue"  
                    src="<?php echo base_url(); ?>assets/img/read-2.png" alt="User Avatar">
                  </div>
                  <h6 class="widget-user-desc text-gris">
                    <?php
                      if(!empty($lectura_detail)){
                        echo $lectura_detail->reading; 
                      } else {
                        echo "incompleto";
                      }
                    ?>
                  </h6>
                  <h5 class="widget-user-desc box-title text-black">Leer lectura</h5>
                  <h6 class="widget-user-desc text-azul">
                    <i class="fa fa-eye"></i> Completala para habilitar los reactivos 
                  </h6>
                </div>
                </a>
              </div>
            </div>

            <div class="col-md-6">
              <div class="box box-widget widget-user-2 collapsed-box " >
                <div class="widget-user-header box-shadow-sm btn-box-tool" data-widget="collapse" style="padding: 10px 10px 5px 10px;">
                  <div  class="widget-user-image">
                    <img class="img-circle img-thumbnail circle-green"  
                    src="<?php echo base_url(); ?>assets/img/reactivos.png" alt="User Avatar">
                  </div>
                  <h6 class="widget-user-desc text-gris">
                    <?php
                      if(!empty($lectura_detail)){
                        echo $lectura_detail->reactivos; 
                      } else {
                        echo "incompleto";
                      }
                    ?>
                  </h6>
                  <h5 class="widget-user-desc box-title text-black">Reactivos</h5>
                  <h6 class="widget-user-desc text-verde">
                    <i class="fa fa-graduation-cap"></i> Completalos para finalizar la lectura
                  </h6>
                </div>
                <div class="box-body no-padding" style="">
                  <?php
                    if(!empty($lectura_detail)){
                      if($lectura_detail->idEstado == 3){
                        echo "<ul class=\"nav nav-stacked\">
                                <li>
                                  <a>
                                    <i class=\"fa fa-warning\"></i> Aún no termias la lectura. 
                                  </a>
                                </li>
                              </ul>";
                      } else if($lectura_detail->idEstado == 4 && !empty($lectura_info)){
                        echo "<ul class=\"nav nav-stacked\">";
                        if ($lectura_info->check_om != 0) {
                          echo "<li>
                                  <a href=\"".base_url()."Movil/Actividades/opcion_multiple/".$lectura_info->idLectura."\">Opción multiple 
                                    <span class=\"pull-right badge bg-green\">ver</span>
                                  </a>
                                </li>";
                        }
                        if ($lectura_info->check_vf != 0) {
                          echo "<li>
                                  <a href=\"".base_url()."Movil/Actividades/verdadero_falso/".$lectura_info->idLectura."\">Cierto o falso 
                                    <span class=\"pull-right badge bg-green\">ver</span>
                                  </a>
                                </li>";
                        }
                        if ($lectura_info->check_rc != 0) {
                          echo "<li>
                                  <a href=\"".base_url()."Movil/Actividades/relacionar_columnas/".$lectura_info->idLectura."\">Relacionar columnas 
                                    <span class=\"pull-right badge bg-green\">ver</span>
                                  </a>
                                </li>";
                        }
                        echo "</ul>";
                      }
                    } else {
                      echo "<ul class=\"nav nav-stacked\">
                              <li>
                                <a>
                                  <i class=\"fa fa-warning\"></i> Aún no termias la lectura. 
                                </a>
                              </li>
                            </ul>";
                    }
                  ?>
                </div>
              </div>
            </div>

          </div>
          <!-- COLUMNA 1 -->
        </div>


        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
          <!-- COLUMNA 2 -->
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-orange box-shadow">
              <div  class="widget-user-image">
                <img class="img-circle img-thumbnail circle-white" src="<?php echo base_url(); ?>assets/img/android-smile.png">
              </div>
              <h3 class="widget-user-username">¡Completa la lectura!</h3>
              <h5 class="widget-user-desc">Al terminar completa los reactivos para registrar tu progreso.</h5>
            </div>
          </div>

          <div class="box box-solid box-shadow">
            <div class="box-header with-border bg-aqua">
              <h3 class="box-title"><i class="fa fa-file-text margin-r-5"></i> Descripción</h3>
            </div>
            <div class="box-body">
              <p>
                <?php
                  if(!empty($lectura_info)){
                    echo $lectura_info->desc_corta; 
                  } else {
                    echo "No se pudo cargar";
                  }
                ?>
              </p>
            </div>
          </div>

          <div class="box box-solid box-shadow">
            <div class="box-header bg-verde">
              <h3 class="box-title text-white"><i class="fa fa-check-circle"></i> Alumnos que completaron esta lectura</h3>
            </div>
            <div class="box-body no-padding">
              <table id="tabla_alumnos_teacher_detail" class="table">
                <tbody>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th style="width: 40px">Calificación</th>
                  </tr>
                  <?php $indice = 1; ?>
                  <?php if(!empty($lectura_finished_by)): ?>
                    <?php foreach($lectura_finished_by as $finished_by): ?>
                      <tr>
                        <td><?php echo $indice++; ?>)</td>
                        <td><?php echo $finished_by->alumno; ?></td>
                        <td class="text-center">
                          <span class="badge bg-blue">
                            <?php echo $finished_by->calificacion; ?>
                          </span>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- COLUMNA 2 -->
        </div>
        <!-- LECTURA DETAIL -->
      </div>
    </section>
</div>
<!-- =====================.FIN CONTENIDO ========================== -->

