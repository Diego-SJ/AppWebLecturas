

<!-- =====================.INICIO CONTENIDO ========================== -->
<div class="content-wrapper">

    <!--=========== Content Header (Page header) =========== -->
    <section class="content-header">
          <h1>
            Alumnos en clase
            </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('Web/Home')?>"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><i class="fa fa-users text-azuld"></i> Alumnos</li>
        </ol>
    </section>
    <!--=========== Content Header (Page header) =========== -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <button type="button" data-toggle="modal" data-target="#modalNewAlumno" class="btn btn-verde btn-sm reg-alumno" title="Registrar nueva lectura">
                              <i class="fa fa-plus"></i> <b>Registrar alumno</b>
            </button><br><br>
                <div class="box box-solid">
                    <div class="box-body">
                        <table id="tabla_alumnos_teacher" class="table table-bordered table-hover">
                            <thead class="bg-primary">
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
                                        <a href="<?php echo site_url('Web/Alumno/editAlumno');?>/<?php echo $alumno->idAlumno; ?>" class="btn btn-warning">
                                            <span class="fa fa-pencil text-white"></span>
                                        </a>
                                        <button class="btn btn-danger btn-eliminar-alumno" data-toggle="modal" data-target="#Visualizar" value="<?php echo $alumno->idAlumno; ?>">
                                            <span class="fa fa-trash text-white"></span>
                                        </button>
                                        <a href="<?php echo site_url('Web/Alumno/detail');?>/<?php echo $alumno->idAlumno; ?>" class="btn btn-verde">
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


                    


