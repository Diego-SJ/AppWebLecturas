

<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper">

    <!--=========== Content Header (Page header) =========== -->
    <section class="content-header">
          <h1>
          Lecturas registradas
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Web/Home')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-book text-azuld"></i> Lecturas</li>
        </ol>
    </section>
    <!--=========== Content Header (Page header) =========== -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <button type="button" data-toggle="modal" data-target="#addLecturaModal" class="btn btn-verde btn-sm" title="Registrar nueva lectura">
                <i class="fa fa-plus"></i> <b>Agregar lectura</b>
            </button><br><br>
                <div class="box box-solid">
                      <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Titulo</th>
                                    <th class="text-center">Autor</th>
                                    <th class="text-center">Descripción</th>
                                    <th style="width: 20%" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $indice = 1; ?>
                                <?php if(!empty($lecturas)): ?>
                                    <?php foreach($lecturas as $lectura): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $indice++; ?></td>
                                            <td class="text-center"><?php echo $lectura->titulo; ?></td>
                                            <td class="text-center"><?php echo $lectura->autor; ?></td>
                                            <td class="text-center"><?php echo $lectura->desc_corta; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('Web/Lecturas/editLectura');?>/<?php echo $lectura->idLectura; ?>" class="btn btn-warning">
                                                    <span class="fa fa-pencil text-white"></span>
                                                </a>
                                                <button class="btn btn-danger btn-eliminar-lectura" data-toggle="modal" data-target="#Visualizar" value="<?php echo $lectura->idLectura; ?>">
                                                    <span class="fa fa-trash text-white"></span>
                                                </button>
                                                <a href="<?php echo site_url('Web/Lecturas/detail');?>/<?php echo $lectura->idLectura; ?>" value="<?php echo $lectura->idLectura; ?>" class="btn btn-verde">
                                                    <span class="fa fa-cog text-white"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
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


<!-- =====================.FIN CONTENIDO ========================== -->


                    


