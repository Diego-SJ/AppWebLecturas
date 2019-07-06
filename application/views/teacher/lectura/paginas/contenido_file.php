
<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box box-success">
        <!-- /.box-header -->
        <div class="box-body pad">
                <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-green"><b><i class="fa fa-file-text"></i> Archivo: <?php echo $info_file->nombre_archivo; ?></b></h4>
                </div>
          
          <embed src="<?php echo base_url().'/uploads/archivos/'.$info_file->nombre_archivo; ?>" type="application/pdf" width="100%" height="600px"/>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cerrar</button> 
        </div>
      </div>
    </div>
</div>