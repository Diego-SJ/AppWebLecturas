
<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box box-success">
        <!-- /.box-header -->
        <div class="box-body pad">
                <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-green"><b><i class="fa fa-file-text"></i> VISTA PREVIA</b></h4>
                </div>
          <form method="POST" action="">
              <div class="form-group">
                    <label for="num_pag" class="col-form-label text-green"><i class="fa fa-file-text"></i> Número de página: <?php echo $info_pagina->no_pagina; ?></label>
                </div>
                <blockquote>
                  <?php echo $info_pagina->contenido; ?>
                </blockquote> 
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cerrar</button> 
          </form>
        </div>
      </div>
    </div>
</div>