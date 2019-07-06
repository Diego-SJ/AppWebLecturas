
<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box box-danger">
        <!-- /.box-header -->
        <div class="box-body pad">
          <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-red"><b><i class="fa fa-file-text"></i> ELIMINAR ARCHIVO</b></h4>
                </div>
          <form method="POST" action="<?php echo site_url('Web/Archivo/deletePdf');?>/<?php echo $info_pdf->idLectura; ?>">
                <blockquote>
                  Se eliminará el archivo llamado: <strong><?php echo $info_pdf->nombre_archivo; ?></strong>, ¿Deseas continuar?
                </blockquote> 
                <input type="text" class="question_hide" name="file_name" value="<?php echo $info_pdf->nombre_archivo; ?>" hidden>
                <button type="submit" class="btn btn-info" value="Aceptar"><i class="fa fa-check-circle"></i> Aceptar</button>
    			<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button> 
          </form>
        </div>
      </div>
    </div>
</div>