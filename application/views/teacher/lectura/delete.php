

<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box box-danger">
        <!-- /.box-header -->
        <div class="box-body pad">
          <div class="form-group">
              <h4 for="num_pag" class="col-form-label text-red"><b><i class="fa fa-book"></i> ELIMINAR LECTURA</b></h4>
          </div>
          <form method="POST" action="<?php echo site_url('Web/Lecturas/deleteLectura');?>/<?php echo $lectura->idLectura; ?>">
            <blockquote>
              Se eliminará la lectura <strong><?php echo $lectura->titulo; ?></strong>, también se eliminara del progreso de los alumnos que la hayan concluido. ¿Deseas continuar?
            </blockquote> 
            <button type="submit" class="btn btn-info" value="Aceptar"><i class="fa fa-check-circle"></i> Aceptar</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button> 
          </form>
        </div>
      </div>
    </div>
</div>