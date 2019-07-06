
<div class="row">
    <div id="fila-actualizar-agregar-pagina" class="col-md-12">
      <div id="contenido-columna-pagina" class="box">
        <!-- /.box-header -->
        <div class="box-body pad">
          <form method="POST" class="col-md-12 col-sm-12">
            <div class="form-group">
                    <h4 for="num_pag" class="col-form-label text-green"><b><i class="fa fa-exchange"></i> RELACIONAR COLUMNAS</b></h4>
                </div>
                <blockquote class="col-md-12 col-sm-12">
                    <table class="col-md-12 col-sm-12 table-hover">
                      <tr>
                        <th style="width: 50%" class="text-center"><label class="text-green">ORACIÓN</label></th>
                        <th style="width: 50%" class="text-center"><label class="text-green">RESPUESTA</label></th>
                      </tr>
                      <tr>
                        <td><b class="text-blue">1)</b> <?php echo $rel_c->preg_1; ?></td>
                        <td><b class="text-blue"><?php echo $rel_c->idx_r1; ?>)</b> <?php echo $rel_c->resp_1; ?></td>
                      </tr>
                      <tr>
                        <td><b class="text-blue">2)</b> <?php echo $rel_c->preg_2; ?></td>
                        <td><b class="text-blue"><?php echo $rel_c->idx_r2; ?>)</b> <?php echo $rel_c->resp_2; ?></td>
                      </tr>
                      <tr>
                        <td><b class="text-blue">3)</b> <?php echo $rel_c->preg_3; ?></td>
                        <td><b class="text-blue"><?php echo $rel_c->idx_r3; ?>)</b> <?php echo $rel_c->resp_3; ?></td>
                      </tr>
                      <tr>
                        <td><b class="text-blue">4)</b> <?php echo $rel_c->preg_4; ?></td>
                        <td><b class="text-blue"><?php echo $rel_c->idx_r4; ?>)</b> <?php echo $rel_c->resp_4; ?></td>
                      </tr>
                    </table>
                </blockquote> 
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Aceptar</button> 
          </form>
        </div>
      </div>
    </div>
</div>