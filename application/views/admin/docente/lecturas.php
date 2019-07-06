

<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper">

    <!--=========== Content Header (Page header) =========== -->
    <section class="content-header">
          <h1>
            Lecturas registradas por docente
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Web/admin/Home')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?php echo site_url('Web/admin/Docente')?>"><i class="fa fa-users"></i> Docentes</a></li>
            <li class="active"><i class="fa fa-book"></i> Lecturas</li>
        </ol>
    </section>
    <!--=========== Content Header (Page header) =========== -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                      <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead class="bg-purple">
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
                                <?php if(!empty($lecturas_docentes)): ?>
                                    <?php foreach($lecturas_docentes as $lectura): ?>
                                        <tr>
                                            <td class="text-center"><?php echo $indice++; ?></td>
                                            <td class="text-center"><?php echo $lectura->titulo; ?></td>
                                            <td class="text-center"><?php echo $lectura->autor; ?></td>
                                            <td class="text-center"><?php echo $lectura->desc_corta; ?></td>
                                            <td class="text-center">
                                               <a href="<?php echo site_url('Web/admin/Lectura/detail');?>/<?php echo $lectura->idLectura; ?>" value="<?php echo $lectura->idLectura; ?>" class="btn btn-success btn-info-lectura">
                                                    <span class="fa fa-eye text-white"></span>
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


                    


    