

<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper">

    <!--=========== Content Header (Page header) =========== -->
    <section class="content-header">
          <h1>
            Alumnos registrados por el docente
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Web/admin/Home')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="<?php echo site_url('Web/admin/Docente')?>"><i class="fa fa-users"></i> Docentes</a></li>
            <li class="active"><i class="fa fa-user"></i> Alumnos</li>
        </ol>
    </section>
    <!--=========== Content Header (Page header) =========== -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                      <!-- /.box-header -->
                    <div class="box-body">
                        <table id="tabla_alumnos" class="table table-bordered table-hover">
                            <thead class="bg-maroon-active">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Grado</th>
                                    <th class="text-center">Grupo</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $indice = 1; ?>
                            <?php if(!empty($alumnos)): ?>
                            <?php foreach($alumnos as $alumno): ?>
                                <tr>
                                    <td class="text-center"><?php echo $indice++; ?></td>
                                    <td class="text-center"><?php echo $alumno->nombre." ".$alumno->a_paterno." ".$alumno->a_materno ?></td>
                                    <td class="text-center"><?php echo $alumno->grado; ?></td>
                                    <td class="text-center"><?php echo $alumno->grupo; ?></td>
                                    <td class="text-center"><?php echo $alumno->usuario; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo site_url('Web/admin/Docente/detail');?>/<?php echo $alumno->idAlumno; ?>" class="btn btn-success">
                                            <span class="fa fa-users text-white"></span>
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


                    


