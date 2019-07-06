

<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box box-warning">
        <!-- /.box-header -->
        <div class="box-body pad">
          <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-yellow"><b><i class="fa fa-list-ul"></i> EDITAR OPCIÓN MULTIPLE</b></h4>
                </div>
            <form id="frm_om" method="POST" action="<?php echo site_url('Web/Actividades/updateOM');?>/<?php echo $opc_m->idOpcionMultiple; ?>">
              <h4>Ingresa una pregunta, coloca las posibles respuestas y <span class="text-maroon">marca cual de todas es la respuesta correcta.</span></h4>

                <div class="row">

                <!-- DATA HIDDEN -->  
                <input id="reesp_om" name="reesp_om" type="text" value="<?php echo $opc_m->resp_correcta; ?>" hidden="true">
                <input id="idLectura" name="idLectura" type="text" value="<?php echo $id_lectura->idLectura; ?>" hidden="true">


                    <div class="col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon bg-maroon"><i class="fa  fa-question-circle"></i> pregunta</span>
                        <input value="<?php echo $opc_m->pregunta; ?>" name="fom_pregunta" type="text" class="form-control" required>
                      </div>
                    </div>
                </div>
                <h4>Respuestas</h4>
                <div class="row">
                    <div class="col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon bg-purple"> A)</span>
                        <input value="<?php echo $opc_m->resp_1; ?>" name="fom_resp1" type="text" class="form-control" required>
                        <span class="input-group-addon bg-gray">
                          <input id="resp_A" name="fom_resp_chk" value="A" type="checkbox">
                        </span>
                      </div>
                    </div>
                </div>
                <h4></h4>
                <div class="row">
                    <div class="col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon bg-purple">B)</span>
                        <input value="<?php echo $opc_m->resp_2; ?>" name="fom_resp2" type="text" class="form-control" required>
                        <span class="input-group-addon bg-gray">
                          <input id="resp_B" name="fom_resp_chk" value="B" type="checkbox">
                        </span>
                      </div>
                    </div>
                </div>
                <h4></h4>
                <div class="row">
                    <div class="col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon bg-purple">C)</span>
                        <input value="<?php echo $opc_m->resp_3; ?>" name="fom_resp3" type="text" class="form-control" required>
                        <span class="input-group-addon bg-gray">
                          <input id="resp_C" name="fom_resp_chk" value="C" type="checkbox">
                        </span>
                      </div>
                    </div>
                </div>
                <h4></h4>
                <div class="row">
                    <div class="col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon bg-purple">D)</span>
                        <input value="<?php echo $opc_m->resp_4; ?>" name="fom_resp4" type="text" class="form-control" required>
                        <span class="input-group-addon bg-gray">
                          <input id="resp_D" name="fom_resp_chk" value="D" type="checkbox">
                        </span>
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
                  var respuesta = $("#reesp_om").val();

                  if(respuesta == "A"){
                    $("#resp_A").prop("checked",true);
                  } else if (respuesta == "B"){
                    $("#resp_B").prop("checked",true);
                  } else if (respuesta == "C"){
                    $("#resp_C").prop("checked",true);
                  } else {
                    $("#resp_D").prop("checked",true);
                  }
              });
            </script>
        </div>
      </div>
    </div>
</div>