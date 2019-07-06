

<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box box-warning">
        <!-- /.box-header -->
        <div class="box-body pad">
          <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-yellow"><b><i class="fa fa-exchange"></i> EDITAR RELACIONAR COLUMNAS</b></h4>
                </div>
            <form id="frm_rc" method="POST" action="<?php echo site_url('Web/Actividades/updateRC')?>/<?php echo $rel_c->idRelacionarColumnas ?>">

              <!-- DATA HIDDEN -->  
            <input id="idLectura" name="idLectura" type="text" value="<?php echo $id_lectura->idLectura; ?>" hidden="true">
            <input id="idx_r1" type="text" value="<?php echo $rel_c->idx_r1; ?>" hidden="true">
            <input id="idx_r2" type="text" value="<?php echo $rel_c->idx_r2; ?>" hidden="true">
            <input id="idx_r3" type="text" value="<?php echo $rel_c->idx_r3; ?>" hidden="true">
            <input id="idx_r4" type="text" value="<?php echo $rel_c->idx_r4; ?>" hidden="true">

                          <h4>Ingresa las oraciones del lado izquierdo, coloca las respuestas del lado derecho y marca la relación de la oración con la respuesta usando las listas despegables.</h4>

                            <div class="row">
                              <!-- tipoReactivo -->
                              <input name="tr_rc" type="text" value="3" hidden="true">
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-maroon">1)</span>
                                    <input value="<?php echo $rel_c->preg_1; ?>" name="frc_o1" type="text" class="form-control" placeholder="Oración 1" required>
                                  </div>
                                </div>
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-purple">
                                      <select id="slc_1" name="frc_slc1" class="text-purple">
                                        <option name="frc_slc1" value="1">1</option>
                                        <option name="frc_slc1" value="2">2</option>
                                        <option name="frc_slc1" value="3">3</option>
                                        <option name="frc_slc1" value="4">4</option>
                                      </select>
                                    </span>
                                    <input value="<?php echo $rel_c->resp_1; ?>" name="frc_r1" type="text" class="form-control" placeholder="Respuesta" required>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-maroon">2)</span>
                                    <input value="<?php echo $rel_c->preg_2; ?>" name="frc_o2" type="text" class="form-control" placeholder="Oración 2" required>
                                  </div>
                                </div>
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-purple">
                                      <select id="slc_2" name="frc_slc2" class="text-purple">
                                        <option name="frc_slc2" value="1">1</option>
                                        <option name="frc_slc2" value="2">2</option>
                                        <option name="frc_slc2" value="3">3</option>
                                        <option name="frc_slc2" value="4">4</option>
                                      </select>
                                    </span>
                                    <input value="<?php echo $rel_c->resp_2 ?>" name="frc_r2" type="text" class="form-control" placeholder="Respuesta" required>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-maroon">3)</span>
                                    <input value="<?php echo $rel_c->preg_3 ?>" name="frc_o3" type="text" class="form-control" placeholder="Oración 3" required>
                                  </div>
                                </div>
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-purple">
                                      <select id="slc_3" name="frc_slc3" class="text-purple">
                                        <option name="frc_slc3" value="1">1</option>
                                        <option name="frc_slc3" value="2">2</option>
                                        <option name="frc_slc3" value="3">3</option>
                                        <option name="frc_slc3" value="4">4</option>
                                      </select>
                                    </span>
                                    <input value="<?php echo $rel_c->resp_3 ?>" name="frc_r3" type="text" class="form-control" placeholder="Respuesta" required>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-maroon">4)</span>
                                    <input value="<?php echo $rel_c->preg_4 ?>" name="frc_o4" type="text" class="form-control" placeholder="Oración 4" required>
                                  </div>
                                </div>
                                <div class="col-xs-6">
                                  <div class="input-group">
                                    <span class="input-group-addon bg-purple">
                                      <select id="slc_4" name="frc_slc4" class="text-purple">
                                        <option name="frc_slc4" value="1">1</option>
                                        <option name="frc_slc4" value="2">2</option>
                                        <option name="frc_slc4" value="3">3</option>
                                        <option name="frc_slc4" value="4" selected>4</option>
                                      </select>
                                    </span>
                                    <input value="<?php echo $rel_c->resp_4 ?>" name="frc_r4" type="text" class="form-control" placeholder="Respuesta" required>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                              <h1></h1>
                              <div class="col-xs-12">
                                <button type="submit" class="btn bg-maroon"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar cambios</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button> 
                              </div>
                            </div>
                        </form>
            <script type="text/javascript">
              $(document).ready(function(){
                  var slc_index_1 = $("#idx_r1").val();
                  $("#slc_1").val(slc_index_1);

                  var slc_index_2 = $("#idx_r2").val();
                  $("#slc_2").val(slc_index_2);

                  var slc_index_3 = $("#idx_r3").val();
                  $("#slc_3").val(slc_index_3);

                  var slc_index_4 = $("#idx_r4").val();
                  $("#slc_4").val(slc_index_4);
              });
            </script>
        </div>
      </div>
    </div>
</div>