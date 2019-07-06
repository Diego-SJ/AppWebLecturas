
    <!--=========== Content Header (Page header) =========== -->
      <div class="row">
        <div class="col-md-12">
            <div class="callout bg-gris">
              <h4 class="text-azuld"><b>Nota:</b></h4>

              <p class="text-gris-dark">Puedes agregar contenido a la lectura personalizado haciendo uso de páginas o subir un archivo .pdf, pero solo estara disponible uno de los dos métodos.</p>

              <div class="form-group">
                <div class="input-group input-group-sm">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-azul dropdown-toggle" data-toggle="dropdown">
                      <?php if($detail_lectura->tipo_lectura == 1){
                        echo "Mostrar lectura como (Páginas)";
                      } else if($detail_lectura->tipo_lectura == 2){
                        echo "Mostrar lectura como (PDF)";
                      } else {
                        echo "Mostrar lectura como ...";
                      }?>
                      <span class="fa fa-caret-down"></span></button>
                    <ul class="dropdown-menu bg-azul text-azuld">
                      <li>
                        <form method="post" action="<?php echo base_url().'Web/Lecturas/tipoLectura/'.$detail_lectura->idLectura;?>">
                          <input class="question_hide" name="lecture_type" value="1" hidden>
                          <button type="submit" class="btn btn-block dropdown-list">Páginas</button>
                        </form>
                      </li>
                      <li>
                        <form method="post" action="<?php echo base_url().'Web/Lecturas/tipoLectura/'.$detail_lectura->idLectura;?>">
                          <input class="question_hide" name="lecture_type" value="2" hidden>
                          <button type="submit" class="btn btn-block dropdown-list">PDF</button>
                        </form>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>

      <div class="row">

        <!-- columna agregar contenido -->
        <div id="fila-actualizar-agregar-pagina" class="col-md-8">
          <!-- agregar paginas -->
          <div id="contenido-columna-pagina" class="box collapsed-box box-solid">
            <div class="box-header">
              <h3 class="box-title text-azuld"><i class="fa fa-plus-circle"></i> Agregar páginas</h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-azul btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Mostrar">
                  <i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body pad">
              <form method="POST" action="<?php echo site_url('Web/Pagina/addPage');?>/<?php echo $detail_lectura->idLectura; ?>">
                  <div class="form-group">
                    <label for="num_pag" class="col-form-label text-azuld">Número de página</label>
                    <div class="input-group">
                        <span class="input-group-addon bg-azul"><i class="fa fa-file-text"></i></span>
                        <input type="number" name="frm_no_pag" class="form-control" placeholder="número" required/>
                    </div>
                  </div>
                  <textarea name="editor1" id="editor1" rows="10" cols="80"></textarea>
                  <br>
                  <button type="submit" class="btn btn-azul"><i class="fa fa-save"></i> Guardar</button>
              </form>
            </div>
          </div>

          <?php 
          if(!empty($this->session->flashdata("error"))){
            echo "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
            echo "<span>".$this->session->flashdata("error")."</span><br>";
            echo "</div>";
          }
          if(!empty($this->session->flashdata("exito"))){
              echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
              echo "<span>".$this->session->flashdata("exito")."</span><br>";
              echo "</div>";
          } 
          ?>

          <!-- agregar pdf -->
          <div id="contenido-columna-pagina" class="box collapsed-box box-solid">
            <div class="box-header">
              <h3 class="box-title text-azuld"><i class="fa fa-plus-circle"></i> Agregar PDF
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-azul btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Mostrar">
                  <i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body pad">
              <form id="form-update-pdf" action="<?php echo base_url();?>Web/Archivo/subirArchivo" method="POST" enctype="multipart/form-data">
                <input type="text" class="question_hide" name="id_lectura" value="<?php echo $detail_lectura->idLectura; ?>" hidden="hidden">
                <div class="form-group">
                    <label for="num_pag" class="col-form-label text-azuld">Agrega un archivo PDF</label>
                </div>
                  <div class="input-file-container text-center">  

                    <input class="input-file" id="fileUpload" name="fileUpload" type="file">
                    <label tabindex="0" for="my-file" class="bg-maroon input-file-trigger">
                      <i class="fa fa-file-text"></i> Selecciona un archivo ...
                    </label>
                  </div>
                  <div class="text-center">
                    <p class="file-return">no has seleccionando ningun archivo</p>
                  </div>
                  <button id="btnSubirPdf" type="submit" class="btn btn-azul"><i class="fa fa-save"></i> Guardar</button>
              </form>
            </div>
          </div>
        </div>

        <!-- columna administrar contenido -->
        <div class="col-md-4">
          <!-- administrar paginas -->
          <div class="box collapsed-box box-solid">
            <div class="box-header">
              <h3 class="box-title text-green"><i class="fa fa-file-text-o"></i> Administrar páginas
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-verde btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Mostrar">
                  <i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 40%" class="text-center ">Número de página</th>
                  <th class="text-center">Acciones</th>
                </tr>
                <?php if(!empty($paginas)): ?>
                  <?php foreach($paginas as $pagina): ?>
                    <tr>
                      <td class="text-center"><?php echo $pagina->no_pagina; ?></td>
                      <td class="text-center">
                            <button class="btn btn-warning btn-editar-pagina" data-toggle="modal" data-target="#Visualizar" value="<?php echo $pagina->idPagina; ?>">
                                <span class="fa fa-pencil text-white"></span>
                            </button>
                            <button class="btn btn-danger btn-eliminar-pagina" data-toggle="modal" data-target="#Visualizar" value="<?php echo $pagina->idPagina; ?>">
                                <span class="fa fa-trash text-white"></span>
                            </button>
                            <button class="btn btn-verde btn-ver-pagina" data-toggle="modal" data-target="#Visualizar" value="<?php echo $pagina->idPagina; ?>">
                                <span class="fa fa-eye text-white"></span>
                            </button>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
              </table>
            </div>
          </div>

          <!-- administar pdf -->
          <div class="box collapsed-box box-solid">
            <div class="box-header">
              <h3 class="box-title text-green"><i class="fa fa-file-pdf-o"></i> Administrar PDF
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-verde btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Mostrar">
                  <i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 40%" class="text-center ">Información del archivo</th>
                </tr>
                <?php if(!empty($pdf)): ?>
                  <?php foreach($pdf as $archivo): ?>
                    <tr>
                      <td style="width: 40%" class="text-center"><?php echo $archivo->nombre_archivo; ?></td>
                    </tr>
                    <tr>
                      <td class="text-center">
                            <button class="btn btn-danger btn-eliminar-pdf" data-toggle="modal" data-target="#Visualizar" value="<?php echo $archivo->idLectura; ?>">
                                <span class="fa fa-trash text-white"></span>
                            </button>
                            <button class="btn btn-verde btn-ver-archivo" data-toggle="modal" data-target="#Visualizar" value="<?php echo $archivo->idLectura; ?>">
                                <span class="fa fa-eye text-white"></span>
                            </button>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php endif ?>
              </table>
            </div>
          </div>
        </div>

      </div>

    </section>
</div>