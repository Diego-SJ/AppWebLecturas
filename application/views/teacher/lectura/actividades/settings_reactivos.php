

      <!-- CONTENEDOR -->
      <div class="row">
        <div class="col-md-8">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title text-azuld text-center"><i class="fa fa-plus-circle"></i> Agregar reactivos
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-azul btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Mostrar">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body pad">
              <div class="box-group" id="accordion">

                  <!-- OPCION MULTIPLE -->
                  <div class="panel box">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed text-navy h4">
                          <i class="fa fa-list-ul"> Opción multiple</i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                      <div class="box-body">

                        <!-- FORM OPCION MULTIPLE -->
                        <form id="frm_om" method="POST" action="<?php echo site_url('Web/Actividades/addOpcionMultiple');?>/<?php echo $detail_lectura->idLectura; ?>">
                          <h4>Ingresa una pregunta, coloca las posibles respuestas y <span class="text-azuld">marca cual de todas es la respuesta correcta.</span></h4>

                            <div class="row">
                              <!-- tipo de reactivo -->
                              <input name="tr_om" type="text" value="1" hidden="true">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul"><i class="fa  fa-question-circle"></i> pregunta</span>
                                    <input name="fom_pregunta" type="text" class="form-control" required>
                                  </div>
                                </div>
                            </div>
                            <h4>Respuestas</h4>
                            <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul"> A)</span>
                                    <input name="fom_resp1" type="text" class="form-control" required>
                                    <span class="input-group-addon bg-gray">
                                      <input name="fom_resp_chk" value="A" type="checkbox">
                                    </span>
                                  </div>
                                </div>
                            </div>
                            <h4></h4>
                            <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul">B)</span>
                                    <input name="fom_resp2" type="text" class="form-control" required>
                                    <span class="input-group-addon bg-gray">
                                      <input name="fom_resp_chk" value="B" type="checkbox">
                                    </span>
                                  </div>
                                </div>
                            </div>
                            <h4></h4>
                            <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul">C)</span>
                                    <input name="fom_resp3" type="text" class="form-control" required>
                                    <span class="input-group-addon bg-gray">
                                      <input name="fom_resp_chk" value="C" type="checkbox">
                                    </span>
                                  </div>
                                </div>
                            </div>
                            <h4></h4>
                            <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul">D)</span>
                                    <input name="fom_resp4" type="text" class="form-control" required>
                                    <span class="input-group-addon bg-gray">
                                      <input name="fom_resp_chk" value="D" type="checkbox">
                                    </span>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                              <h1></h1>
                              <div class="col-xs-12">
                                  <button type="submit" class="btn btn-azul"><i class="fa fa-save"></i> Guardar</button>
                                  <a class="btn bg-gray" onclick="clear_form1()"><i class="fa  fa-eraser"></i> Limpiar</a>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- RELACIONAR COLUMNAS -->
                  <div class="panel box">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed text-navy h4" aria-expanded="false">
                          <i class="fa fa-exchange"> Relacionar culumnas</i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                      <div class="box-body">

                        <!-- FORM RELACIONAR COLUMAS -->
                        <form id="frm_rc" method="POST" action="<?php echo site_url('Web/Actividades/addRelacionarColumnas')?>/<?php echo $detail_lectura->idLectura; ?>">
                          <h4>Ingresa las oraciones del lado izquierdo, coloca las respuestas del lado derecho y marca la relación de la oración con la respuesta usando las listas despegables.</h4>

                            <div class="row">
                              <!-- tipoReactivo -->
                              <input name="tr_rc" type="text" value="3" hidden="true">
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul">1)</span>
                                    <input name="frc_o1" type="text" class="form-control" placeholder="Oración 1" required>
                                  </div>
                                </div>
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul">
                                      <select name="frc_slc1" class="text-azuld">
                                        <option name="frc_slc1" value="1" selected>1</option>
                                        <option name="frc_slc1" value="2">2</option>
                                        <option name="frc_slc1" value="3">3</option>
                                        <option name="frc_slc1" value="4">4</option>
                                      </select>
                                    </span>
                                    <input name="frc_r1" type="text" class="form-control" placeholder="Respuesta" required>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul">2)</span>
                                    <input name="frc_o2" type="text" class="form-control" placeholder="Oración 2" required>
                                  </div>
                                </div>
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul">
                                      <select name="frc_slc2" class="text-azul">
                                        <option name="frc_slc2" value="1">1</option>
                                        <option name="frc_slc2" value="2" selected>2</option>
                                        <option name="frc_slc2" value="3">3</option>
                                        <option name="frc_slc2" value="4">4</option>
                                      </select>
                                    </span>
                                    <input name="frc_r2" type="text" class="form-control" placeholder="Respuesta" required>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul">3)</span>
                                    <input name="frc_o3" type="text" class="form-control" placeholder="Oración 3" required>
                                  </div>
                                </div>
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul">
                                      <select name="frc_slc3" class="text-azul">
                                        <option name="frc_slc3" value="1">1</option>
                                        <option name="frc_slc3" value="2">2</option>
                                        <option name="frc_slc3" value="3" selected>3</option>
                                        <option name="frc_slc3" value="4">4</option>
                                      </select>
                                    </span>
                                    <input name="frc_r3" type="text" class="form-control" placeholder="Respuesta" required>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul">4)</span>
                                    <input name="frc_o4" type="text" class="form-control" placeholder="Oración 4" required>
                                  </div>
                                </div>
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul">
                                      <select name="frc_slc4" class="text-azul">
                                        <option name="frc_slc4" value="1">1</option>
                                        <option name="frc_slc4" value="2">2</option>
                                        <option name="frc_slc4" value="3">3</option>
                                        <option name="frc_slc4" value="4" selected>4</option>
                                      </select>
                                    </span>
                                    <input name="frc_r4" type="text" class="form-control" placeholder="Respuesta" required>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                              <h1></h1>
                              <div class="col-xs-12">
                                  <button type="submit" class="btn btn-azul"><i class="fa fa-save"></i> Guardar</button>
                                  <a class="btn bg-gray" onclick="clear_form2()"><i class="fa  fa-eraser"></i> Limpiar</a>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- VERDADERO O FALSO -->
                  <div class="panel box">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed text-navy h4" aria-expanded="false">
                          <i class="fa fa-check-square-o"> Verdadero o falso</i>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                      <div class="box-body">
                        <!-- FORM VERDAD O FALSO -->
                        <form id="frm_vf" method="POST" action="<?php echo site_url('Web/Actividades/addVerdaderoFalso')?>/<?php echo $detail_lectura->idLectura; ?>">
                          <h4>Ingresa una oración del lado izquierdo, con la lista desplegable indica si la oración es verdadera o falsa.</h4>

                            <div class="row">
                              <input name="tr_vf" type="text" value="2" hidden="true">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-azul"><i class="fa  fa-question-circle"></i></span>
                                    <input name="fvf_or" type="text" class="form-control" placeholder="Oración, pregunta, etc." required>
                                    <span class="input-group-addon bg-azul">
                                      <select name="fvf_slc" class="text-purple">
                                        <option name="fvf_slc" value="true" selected>verdadero</option>
                                        <option name="fvf_slc" value="false">falso</option>
                                      </select>
                                    </span>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                              <h1></h1>
                              <div class="col-xs-12">
                                  <button type="submit" class="btn btn-azul"><i class="fa fa-save"></i> Guardar</button>
                                  <a class="btn bg-gray" onclick="clear_form3()"><i class="fa  fa-eraser"></i> Limpiar</a>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
          </div>
        </div>
        <!-- /.col-->

        <div class="col-md-4">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title text-green text-center"><i class="fa fa-cubes"></i> Administrar reactivos
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-verde btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Mostrar">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 10%" class="text-center ">#</th>
                  <th class="text-center">Tipo</th>
                  <th class="text-center">Acciones</th>
                </tr>
                <?php $indice = 1; ?>
                <?php if(!empty($reactivos)): ?>
                <?php foreach($reactivos as $reactivo): ?>
                <tr>
                  <td class="text-center"><?php echo $indice++; ?></td>
                  <td class="text-center"><?php echo $reactivo->tipo; ?></td>
                  <td class="text-center">
                        <button class="btn btn-warning btn-editar-reactivo" data-toggle="modal" data-target="#Visualizar" value="<?php echo $reactivo->id; ?>">
                            <span class="fa fa-pencil text-white"></span>
                        </button>
                        <button class="btn btn-danger btn-eliminar-reactivo" data-toggle="modal" data-target="#Visualizar" value="<?php echo $reactivo->id; ?>">
                            <span class="fa fa-trash text-white"></span>
                        </button>
                        <button class="btn btn-verde btn-ver-reactivo" data-toggle="modal" data-target="#Visualizar" value="<?php echo $reactivo->id; ?>">
                            <span class="fa fa-eye text-white"></span>
                        </button>
                  </td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- FIN CONTENEDOR -->

    </section>

</div>