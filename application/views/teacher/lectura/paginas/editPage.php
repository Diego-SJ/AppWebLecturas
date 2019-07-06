
<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box box-warning">
        <!-- /.box-header -->
        <div class="box-body pad">
          <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-yellow"><b><i class="fa fa-file-text"></i> EDITAR PÁGINA</b></h4>
                </div>
          <form method="POST" action="<?php echo site_url('Web/Pagina/editPagina');?>/<?php echo $info_del_pagina->idPagina; ?>">
          	<input type="text" name="id_lectura_up" value="<?php echo $info_del_pagina->idLectura; ?>" hidden="true">
              <div class="form-group">
                    <label for="num_pag" class="col-form-label text-yellow">Número de página</label>
                    <div class="input-group">
                        <span class="input-group-addon bg-yellow"><i class="fa fa-file-text"></i></span>
                        <input value="<?php echo $info_del_pagina->no_pagina; ?>" type="number" name="frm_no_pag_updt" class="form-control" placeholder="número" required/>
                    </div>
                </div>
                <textarea name="editor2" id="editor2" rows="10" cols="80">
                	<?php echo $info_del_pagina->contenido; ?>
                </textarea>
                <br>
                <button type="submit" class="btn bg-yellow"><i class="fa fa-refresh"></i> Actualizar página</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button> 
                <script>
			        CKEDITOR.replace( 'editor2' );
			    </script>
          </form>
        </div>
      </div>
    </div>


</div>

