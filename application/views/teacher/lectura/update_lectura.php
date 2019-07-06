<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper">

    <!--=========== Content Header (Page header) =========== -->
    <section class="content-header">
          <h1>
          Editar lectura
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Web/Home')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?php echo site_url('Web/Lecturas')?>"><i class="fa fa-book"></i> Lecturas</a></li>
            <li class="active"><i class="fa fa-pencil"></i> Editar lectura</li>
        </ol>
    </section>
    <!--=========== Content Header (Page header) =========== -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid">
                    <div class="box-header bg-primary text-white">
                          <h3 class="box-title"><i class="fa fa-edit"></i> Editar lectura</h3>
                    </div>
                      <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="<?php echo site_url('Web/Lecturas/updtLectura')?>/<?php echo $lectura->idLectura; ?>">
                            <div class="form-group">
                                <label for="frm_titulo" class="col-form-label">Título</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-azul"><i class="fa fa-book"></i></span>
                                    <input type="text" name="frm_titulo" class="form-control" placeholder="título de la lectura" value="<?php echo $lectura->titulo; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="frm_autor" class="col-form-label">Autor</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-azul"><i class="fa fa-user"></i></span>
                                    <input type="text" name="frm_autor" class="form-control" placeholder="autor de la lectura" value="<?php echo $lectura->autor; ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="frm_desc_corta" class="col-form-label">Descripción corta</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-azul"><i class="fa fa-comments"></i></span>
                                    <textarea class="form-control" name="frm_desc_corta" placeholder="Pequeña introducción de la lectura." required><?php echo $lectura->desc_corta; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-azul"><i class="fa fa-refresh"></i> Actualizar</button>
                                <a href="<?php echo site_url('Web/Lecturas')?>" class="btn bg-gray"><i class="fa fa-times-circle"></i> Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
        <!-- /.box -->
            </div>
    <!-- /.col -->
        </div>
    <!-- /.row -->
    </section>

</div>