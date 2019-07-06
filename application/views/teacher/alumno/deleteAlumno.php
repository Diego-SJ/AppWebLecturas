
<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box box-danger">
        <!-- /.box-header -->
        <div class="box-body pad">
        <div class="form-group">
            <h4 for="num_pag" class="col-form-label text-red"><b><i class="fa fa-user"></i> ELIMINAR ALUMNO</b></h4>
        </div>
          <form method="POST" action="<?php echo site_url('Web/Alumno/deleteAlumno');?>/<?php echo $alumno->idAlumno; ?>">
              
            <blockquote>
              Se eliminará el alumno <strong><?php echo $alumno->nombre." ".$alumno->a_paterno." ".$alumno->a_materno ?></strong>, si elimina el registro el alumno perdera su cuenta en su totalidad (progreso, calificaciones, etc.) ¿Deseas continuar?
            </blockquote> 
            <button type="submit" class="btn btn-info" value="Aceptar"><i class="fa fa-check-circle"></i> Aceptar</button>
			<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button> 
          </form>
        </div>
      </div>
    </div>
</div>