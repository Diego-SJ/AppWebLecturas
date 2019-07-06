
<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box box-danger">
        <!-- /.box-header -->
        <div class="box-body pad">
          <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-red"><b><i class="fa fa-file-text"></i> ELIMINAR PÁGINA</b></h4>
                </div>
          <form method="POST" action="<?php echo site_url('Web/Pagina/deletePagina');?>/<?php echo $info_del_pagina->idPagina; ?>">
            <input type="text" name="id_lectura_dp" value="<?php echo $info_del_pagina->idLectura; ?>" hidden="true">

                <blockquote>
                  Se eliminará la página <strong><?php echo $info_del_pagina->no_pagina; ?></strong>, ¿Deseas continuar?
                </blockquote> 
                <button type="submit" class="btn btn-info" value="Aceptar"><i class="fa fa-check-circle"></i> Aceptar</button>
    			<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button> 
          </form>
        </div>
      </div>
    </div>
</div>