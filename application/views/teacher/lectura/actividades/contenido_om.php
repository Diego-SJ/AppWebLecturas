
<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box">
        <!-- /.box-header -->
        <div class="box-body pad">
          <form method="POST" action="">
              <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-green"><b><i class="fa fa-list-ul"></i> OPCIÓN MULTIPLE</b></h4>
                </div>
                <blockquote>
                  <medium><label class="text-green">PREGUNTA: </label><b> <?php echo $opc_m->pregunta; ?></b></medium>
                  <small>
                  <p><label class="text-blue">A) </label><b> <?php echo $opc_m->resp_1; ?></b></p>
                  <p><label class="text-blue">B) </label><b> <?php echo $opc_m->resp_2; ?></b></p>
                  <p><label class="text-blue">C) </label><b> <?php echo $opc_m->resp_3; ?></b></p>
                  <p><label class="text-blue">D) </label><b> <?php echo $opc_m->resp_4; ?></b></p>
                  <medium><b class="text-blue">RESPUESTA CORRECTA: <span class="badge bg-blue"><?php echo $opc_m->resp_correcta; ?></span></b></medium>
                  </small>
                </blockquote> 
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Aceptar</button> 
          </form>
        </div>
      </div>
    </div>
</div>