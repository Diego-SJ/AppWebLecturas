
<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box">
        <!-- /.box-header -->
        <div class="box-body pad">
          <form method="POST" action="">
            <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-green"><b><i class="fa fa-check-square-o"></i> VERDADERO FALSO</b></h4>
                </div>
                <blockquote>
                  <medium><label class="text-green">PREGUNTA: </label><b> <?php echo $ver_f->pregunta; ?></b></medium>
                  <small>
                    <p class="text-blue">
                      <b>
                        RESPUESTA CORRECTA: <span class="badge bg-blue"><?php echo $ver_f->resp_correcta; ?></span>
                      </b>
                    </p>
                  </small>
                </blockquote> 
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Aceptar</button> 
          </form>
        </div>
      </div>
    </div>
</div>