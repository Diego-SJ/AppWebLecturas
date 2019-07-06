

<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box box-warning">
        <!-- /.box-header -->
        <div class="box-body pad">
          <div class="form-group">
            <h4 for="num_pag" class="col-form-label text-yellow">
              <b><i class="fa fa-check-square-o"></i> EDITAR VERDADERO FALSO</b></h4>
            </div>

            <form id="frm_om" method="POST" 
            action="<?php echo site_url('Web/Actividades/updateVF');?>/<?php echo $ver_f->idVerdaderoFalso; ?>">

              <!-- DATA HIDDEN -->  
              <input id="reesp_vf" name="reesp_om" type="text" value="<?php echo $ver_f->resp_correcta; ?>" hidden="true">
              <input id="idLectura" name="idLectura" type="text" value="<?php echo $id_lectura->idLectura; ?>" hidden="true">

              <h4>
                Ingresa una oración del lado izquierdo, con la lista desplegable indica si la oración es verdadera o falsa.
              </h4>

                <div class="row">
                  <input name="tr_vf" type="text" value="2" hidden="true">
                    <div class="col-xs-12">
                      <div class="input-group">
                        <span class="input-group-addon bg-maroon"><i class="fa  fa-question-circle"></i></span>
                        <input value="<?php echo $ver_f->pregunta; ?>" name="fvf_or" type="text" class="form-control" placeholder="Oración, pregunta, etc." required>
                        <span class="input-group-addon bg-maroon">
                          <select id="slc_vf" name="fvf_slc" class="text-purple">
                            <option name="fvf_slc" value="verdadero" selected>verdadero</option>
                            <option name="fvf_slc" value="falso">falso</option>
                          </select>
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
                  var respuesta = $("#reesp_vf").val();
                  $("#slc_vf").val(respuesta);
              });
            </script>
        </div>
      </div>
    </div>
</div>