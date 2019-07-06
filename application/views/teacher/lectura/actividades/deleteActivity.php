
<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box box-danger">
        <!-- /.box-header -->
        <div class="box-body pad">
          <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-red"><b><i class="fa fa-cubes"></i> ELIMINAR REACTIVO</b></h4>
                </div>
          <form method="POST" action="<?php echo site_url('Web/Actividades/eliminarActivity');?>/<?php echo $data_actividad->id; ?>">

          	<input type="text" name="id_lectura_dr" value="<?php echo $data_actividad->idLectura; ?>" hidden="true">
			<input type="text" name="id_actividad_dr" value="<?php echo $data_actividad->id; ?>" hidden="true">
			<input type="text" name="id_om_dr" value="<?php echo $data_actividad->idOpcionMultiple; ?>" hidden="true">
			<input type="text" name="id_rc_dr" value="<?php echo $data_actividad->idRelacionarColumnas; ?>" hidden="true">
			<input type="text" name="id_vf_dr" value="<?php echo $data_actividad->idVerdaderoFalso; ?>" hidden="true">

                <blockquote>
                 Se eliminará el reactivo, ¿Deseas continuar?
                </blockquote> 
                <button type="submit" class="btn btn-info" value="Aceptar"><i class="fa fa-check-circle"></i> Aceptar</button>
    			<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button> 
          </form>
        </div>
      </div>
    </div>
</div>